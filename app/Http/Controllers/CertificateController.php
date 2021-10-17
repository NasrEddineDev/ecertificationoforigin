<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\Product;
use App\Models\Producer;
use App\Models\Importer;
use App\Models\Setting;
use App\Models\User;
use App\Models\Request as ModelsRequest;
use PDF;
use File;
use QRCode;
use Storage;
use Image;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Events\CertificatePendingEvent;
use App\Events\CertificateSignedEvent;
use App\Events\CertificateRejectedEvent;



class CertificateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->certificates->sortByDesc('id') : ((Auth::User()->role->name
            == 'dri_user') ? Certificate::all()->where('status', '!=', 'DRAFT')->sortByDesc('id') : Certificate::all()->sortByDesc('id'));
        return view('certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $importers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->importers : Importer::all();
        $producers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->producers : Producer::all();
        $products = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->products : Product::all();
        $countries = Country::all();
        return view('certificates.create', compact(['importers', 'producers', 'products', 'countries']));
    }

    public function createType($type)
    {
        $importers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->importers : Importer::all();
        $producers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->producers : Producer::all();
        $products = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->products : Product::all();
        $countries = Country::all();
        return view('certificates.create', compact(['type', 'importers', 'producers', 'products', 'countries']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $certificate = new Certificate([
            'code' => $request->certificate_number,
            'original_country' => "Algeria",
            'accumulation' => $request->accumulation,
            'accumulation_country' => ($request->accumulation == 'Yes') ? $request->accumulation_country : '',
            'shipment_type' => $request->shipment_type,
            'status' => "DRAFT",
            'type' => strtoupper($request->type),
            'validation_url' => "",
            'notes' => "",
            'rejection_reason' => "",
            'net_weight' => $request->net_weight,
            'real_weight' => $request->real_weight,
            'invoice_date' => $request->invoice_date,
            'invoice_number' => $request->invoice_number,
            'signature_date' => null,
            'invoice' => '',
            'anvoice_number' => $request->anvoice_number,
            'incoterm' => $request->incoterm,
            'products_description' => $request->products_description,
            'created_pdf' => "",
            'signed_document' => "",
            'description' => $request->notes ? $request->notes : '',
            'integrity_rate' => $request->integrity_rate ? (str_contains($request->integrity_rate, '%')  ?
                $request->integrity_rate : $request->integrity_rate . '%') : '',
            "importer_id" => $request->importer_id,
            "producer_id" => $request->producer_id,
            "enterprise_id" => Auth::User()->Enterprise->id,
            'copy_type' => "NONE",
            "certificate_id" => null
        ]);

        $file = $request->invoice;
        if ($file  && $file != 'undefined') {
            $destinationPath = 'enterprises/' . Auth::User()->Enterprise->id . '/' . 'invoices/';
            $fileName = 'invoice_' . date('YmdHs') . '.' . $file->getClientOriginalExtension();
            if (!file_exists('data/' . $destinationPath)) {
                File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
            }
            Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
            $certificate->invoice = $fileName;
        }
        $certificate->save();

        Log::channel('users_activities')->info('New Certificate', [
            'user_id' => Auth::user()->id,
            'certificate_id' => $certificate->id,
        ]);

        $products = (array)json_decode($request->products);
        foreach ($products as $product) {
            $certificate->products()->attach($product->product_id, [
                'certificate_id' => $certificate->id,
                'package_type' => $product->package_type,
                'unit_price' => $product->unit_price,
                'currency' => $product->currency,
                'package_count' => $product->package_count,
                'package_quantity' => $product->package_quantity,
                'description' => $product->description
            ]);
        }

        return redirect()->route('certificates.index')
            ->with('success', 'Certificate created successfully.');
    }

    public function createRetrospectiveCopy($id, $reason)
    {
        $certificate = Certificate::where('code', '=', $id)->first();
        $certificate = $certificate ? $certificate : Certificate::find($id);
        if ($certificate) {
            $count = 1;
            $exported_products = (Auth::User()->role->name != 'user') ? null :
                $certificate->products->map(function ($items, $count = 1) {
                    $data['number'] = $count;
                    $data['product_id'] = $items->id;
                    $data['product_name'] = $items->name;
                    $data['package_type'] = $items->pivot->package_type;
                    $data['unit_price'] = $items->pivot->unit_price;
                    $data['currency'] = $items->pivot->currency;
                    $data['package_type_name'] = __($items->pivot->package_type);
                    $data['package_quantity'] = $items->pivot->package_quantity;
                    $data['package_count'] = $items->pivot->package_count;
                    $data['description'] = $items->pivot->description;
                    $count++;
                    return $data;
                });
            $importers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->importers : Importer::all();
            $producers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->producers : Producer::all();
            $products = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->products : Product::all();
            $countries = Country::all();
            return view('certificates.create_retrospective_copy', compact([
                'certificate', 'reason', 'importers', 'producers', 'products', 'countries', 'exported_products'
            ]));
        }
        $certificates = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->certificates : ((Auth::User()->role->name
            == 'dri_user') ? Certificate::all()->where('status', '!=', 'DRAFT') : Certificate::all());
        return view('certificates.index', compact('certificates'));
    }

    public function storeRetrospectiveCopy(Request $request, $id)
    {
        $certificate = Certificate::find($id);
        if ($certificate) {
            $duplicatedCertificate = $certificate->replicate();
            $duplicatedCertificate->code = $request->code;
            $duplicatedCertificate->status = 'PENDING';
            $duplicatedCertificate->signature_date = date('Y-m-d H:m:s');
            $duplicatedCertificate->notes = __('Retrospective Copy from certificcate No');
            $duplicatedCertificate->copy_type = 'RETROACTIVE';
            $duplicatedCertificate->certificate_id = $certificate->id;
            $duplicatedCertificate->accumulation = $request->accumulation;
            $duplicatedCertificate->accumulation_country = ($request->accumulation == 'Yes') ? $request->accumulation_country : '';
            $duplicatedCertificate->shipment_type = $request->shipment_type;
            $duplicatedCertificate->net_weight = $request->net_weight;
            $duplicatedCertificate->real_weight = $request->real_weight;
            $duplicatedCertificate->invoice_date = $request->invoice_date;
            $duplicatedCertificate->invoice_number = $request->invoice_number;
            $duplicatedCertificate->incoterm = $request->incoterm;
            $duplicatedCertificate->products_description = $request->products_description;
            $duplicatedCertificate->integrity_rate = $request->integrity_rate ? $request->integrity_rate : '';
            $duplicatedCertificate->importer_id = $request->importer_id;
            $duplicatedCertificate->producer_id = $request->producer_id;

            $duplicatedCertificate->save();

            // $duplicatedCertificate->update(['code' => "E-" . date("Y") . str_repeat("0", 4 - strlen($duplicatedCertificate->id)) . $duplicatedCertificate->id]);

            $lastRequest = Auth::User()->requests->sortByDesc('created_at')->first();
            $newRequest = new ModelsRequest([
                'number' => $lastRequest ? $lastRequest->number + 1 : 1,
                'title' => 'Retrospective Request',
                'description' => '',
                'message' => $request->reason ? $request->reason : '',
                'status' => "PENDING",
                'type' => 'RETROACTIVE',
                "user_id" => Auth::User()->id,
                "certificate_id" => $duplicatedCertificate->id
            ]);

            $newRequest->save();

            $file = $request->file('invoice');
            if ($file && $file->getClientOriginalExtension()) {
                $destinationPath = 'enterprises/' . Auth::User()->Enterprise->id . '/' . 'invoices/';
                $fileName = 'invoice_' . date('YmdHs') . '.' . $file->getClientOriginalExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                $duplicatedCertificate->invoice = $fileName;
            }

            $duplicatedCertificate->save();

            $duplicatedCertificate->products()->detach();
            $products = (array)json_decode($request->products);
            foreach ($products as $product) {
                $duplicatedCertificate->products()->attach($product->product_id, [
                    'certificate_id' => $duplicatedCertificate->id,
                    'package_type' => $product->package_type,
                    'unit_price' => $product->unit_price,
                    'currency' => $product->currency,
                    'package_count' => $product->package_count,
                    'package_quantity' => $product->package_quantity,
                    'description' => $product->description
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $certificate = Certificate::find($id);
        return view('certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        
        $certificate = Certificate::where('code', '=', $id)->first();
        $certificate = $certificate ? $certificate : Certificate::find($id);
        if ($certificate) {
            $count = 1;
            $exported_products = $certificate->products->map(function ($items, $count = 1) {
                $data['number'] = $count;
                $data['product_id'] = $items->id;
                $data['product_name'] = $items->name;
                $data['package_type'] = $items->pivot->package_type;
                $data['unit_price'] = $items->pivot->unit_price;
                $data['currency'] = $items->pivot->currency;
                $data['package_type_name'] = __($items->pivot->package_type);
                $data['package_quantity'] = $items->pivot->package_quantity;
                $data['package_count'] = $items->pivot->package_count;
                $data['description'] = $items->pivot->description;
                $count++;
                return $data;
            });
            $importers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->importers : Importer::all();
            $producers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->producers : Producer::all();
            $products = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->products : Product::all();
            $countries = Country::all();
            return view('certificates.edit', compact(['certificate', 'importers', 'producers', 'products', 'countries', 'exported_products']));
        }
        $certificates = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->certificates : ((Auth::User()->role->name
            == 'dri_user') ? Certificate::all()->where('status', '!=', 'DRAFT') : Certificate::all());
        return view('certificates.index', compact('certificates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $certificate = Certificate::find($id);
        if ($certificate) {
            $certificate->importer_id = $request->importer_id;
            $certificate->accumulation = $request->accumulation;
            $certificate->accumulation_country = ($request->accumulation == 'Yes') ? $request->accumulation_country : '';
            $certificate->producer_id = $request->producer_id;
            $certificate->shipment_type = $request->shipment_type;
            $certificate->invoice_number = $request->invoice_number;
            $certificate->invoice_date = $request->invoice_date;
            $certificate->net_weight = $request->net_weight;
            $certificate->real_weight = $request->real_weight;
            $certificate->integrity_rate = $request->integrity_rate ? $request->integrity_rate : '';
            $certificate->products_description = $request->products_description;
            $certificate->incoterm = $request->incoterm;

            $certificate->save();

            $file = $request->file('invoice');
            if ($file && $file->getClientOriginalExtension()) {
                $destinationPath = 'enterprises/' . Auth::User()->Enterprise->id . '/' . 'invoices/';
                $fileName = 'invoice_' . date('YmdHs') . '.' . $file->getClientOriginalExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                $certificate->invoice = $fileName;
            }

            $certificate->save();

            $certificate->products()->detach();
            $products = (array)json_decode($request->products);
            foreach ($products as $product) {
                $certificate->products()->attach($product->product_id, [
                    'certificate_id' => $certificate->id,
                    'package_type' => $product->package_type,
                    'unit_price' => $product->unit_price,
                    'currency' => $product->currency,
                    'package_count' => $product->package_count,
                    'package_quantity' => $product->package_quantity,
                    'description' => $product->description
                ]);
            }
        }

        return response()->json([
            'message' => 'Certificate updated',
            '$request->shipment_type' => $request->shipment_type,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //        
        if (str_contains($id, ',')) {
            foreach (explode(',', $id) as $code) {
                $certificate = Certificate::where('code', '=', $code)->first();
                $certificate = $certificate ? $certificate : Certificate::find($code);
                if ($certificate) {
                    $certificate->delete();
                }
            }
            return response()->json([
                'message' => 'Certificates deleted successfully'
            ], 200);
        } else {
            $certificate = Certificate::where('code', '=', $id)->first();
            $certificate = $certificate ? $certificate : Certificate::find($id);
            if ($certificate) {
                $certificate->delete();
                return response()->json([
                    'message' => 'Certificate deleted successfully'
                ], 200);
            }
        }

        return response()->json([
            'message' => 'Certificate not found'
        ], 200);
    }

    public function preview($id)
    {
        $certificate = Certificate::where('code', '=', $id)->first();
        $certificate = $certificate ? $certificate : Certificate::find($id);
        if ($certificate) {

            $certificateName = strtolower($certificate->type);

            $data = $this->certificateToPDF($certificate, 2);
            $pdf = PDF::loadView('pdfs.' . $certificateName, $data, [], [
                'title' => 'Another Title',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'display_mode' => 'fullpage',
            ]);
            $pdf->showImageErrors = true;

            $path =  'data/enterprises/' . $certificate->Enterprise->id . '/certificates' . '/' . $certificateName . '/';
            if (!file_exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $pdf->save($path . '/' . $certificateName . '-certificate.pdf');

            return response()->json([
                'message' => 'Certificate generated',
                'url' => url($path . '/' . $certificateName . '-certificate.pdf'),
                'status' => $certificate->status,
                'copy_type' => $certificate->copy_type
            ], 200);
        }
    }

    public function previewWhite($id)
    {
        $certificate = Certificate::where('code', '=', $id)->first();
        $certificate = $certificate ? $certificate : Certificate::find($id);
        if ($certificate) {

            $certificateName = strtolower($certificate->type);

            $data = $this->certificateToPDF($certificate, 1);
            $pdf = PDF::loadView('pdfs.' . $certificateName, $data, [], [
                'title' => 'Another Title',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'display_mode' => 'fullpage',
            ]);
            $pdf->showImageErrors = true;

            $path =  'data/enterprises/' . $certificate->Enterprise->id . '/certificates' . '/' . $certificateName . '/';
            if (!file_exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $pdf->save($path . '/' . $certificateName . '-certificate.pdf');

            return response()->json([
                'message' => 'Certificate generated',
                'url' => url($path . '/' . $certificateName . '-certificate.pdf'),
                'status' => $certificate->status,
                'copy_type' => $certificate->copy_type
            ], 200);
        }
    }

    public function print($id)
    {
        //
        $certificate = Certificate::where('code', '=', $id)->first();
        $certificate = $certificate ? $certificate : Certificate::find($id);
        if ($certificate) {

            $certificateName = strtolower($certificate->type);

            $data = $this->certificateToPDF($certificate, 0);
            $data['qrcode_url'] = 'data/enterprises/' . $certificate->enterprise->id . '/documents/qrcode.png';
            $url = route('verifiy-certificate', $certificate->code);
            QRCode::url($url)
                ->setOutfile($data['qrcode_url'])
                ->setSize(4)
                ->setMargin(2)
                ->png();

            $data['round_stamp'] = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . $certificate->Enterprise->User->Profile->round_stamp;
            $data['square_stamp'] = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . $certificate->Enterprise->User->Profile->square_stamp;
            $data['signature'] = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . $certificate->Enterprise->User->Profile->signature;
            if ($certificate->status == "SIGNED") { 
                $data['dri_round_stamp'] = config('settings.ROUND_STAMP_AR_FILE_PATH');
                $data['dri_square_stamp'] = 'data/dri/3/3_square_stamp.png';
                $data['dri_signature'] = 'data/dri/3/3_signature.png';
                // $data['dri_square_stamp'] = 'data/dri/' . $certificate->signedBy->id . '/' . $certificate->signedBy->Profile->square_stamp;
                // $data['dri_signature'] = 'data/dri/' . $certificate->signedBy->id . '/' . $certificate->signedBy->Profile->signature;
            }

            $pdf = PDF::loadView('pdfs.' . $certificateName . '-trans', $data, [], [
                'title' => 'Another Title',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'display_mode' => 'fullpage',
            ]);
            $pdf->showImageErrors = true;

            $path =  'data/enterprises/' . $certificate->Enterprise->id . '/certificates' . '/' . $certificateName . '/';
            if (!file_exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $pdf->save($path . '/' . $certificateName . '-certificate.pdf');
            return response()->json([
                'message' => 'Certificate generated',
                'url' => url($path . '/' . $certificateName . '-certificate.pdf'),
                'status' => $certificate->status,
                'copy_type' => $certificate->copy_type
            ], 200);
        }
    }

    public function generateGZAL(Request $request)
    {
        $invoice = "";
        $file = $request->invoice;
        if ($file  && $file != 'undefined') {
            $destinationPath = 'enterprises/' . Auth::User()->Enterprise->id . '/' . 'invoices/';
            $fileName = 'invoice.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
            $invoice =  'data/' . $destinationPath . $fileName;
        }

        $lastId = Certificate::latest()->first() ? Certificate::latest()->first()->id : 0;
        $template = 2;
        $page1 = '';
        $page2 = '';
        $page3 = '';

        if ($template != 0) {
            $page1 = 'data/settings/certificates_images/' . $template . '/' . $request->type . '/' . $request->type . '1.jpg';
            $page2 = 'data/settings/certificates_images/' . $template . '/' . $request->type . '/' . $request->type . '2.jpg';
            $page3 = 'data/settings/certificates_images/' . $template . '/' . $request->type . '/' . $request->type . '3.jpg';
        }

        $importer = Importer::find($request->importer_id);
        $producer = Producer::find($request->producer_id);

        $data = [
            'rtl' => (strtolower($request->type) == 'gzale' || strtolower($request->type) == 'acp-tunisie') ? true : false,
            'code' => $request->certificate_number,
            'exporter_name' => Auth::User()->Enterprise->name,
            'exporter_address' => Auth::User()->Enterprise->address,
            'producer_name' => $producer ? $producer->name : '',
            'producer_address' => $producer ? $producer->address : '',
            'original_country' => $producer ? $producer->state->country->name : "Algeria",
            'importer_name' =>  $importer ? $importer->name : "",
            'importer_address' => $importer ? $importer->address : "",
            'destination_country' => $importer ? $importer->state->country->name : "",
            'accumulation' => $request->accumulation,
            'accumulation_country' => ($request->accumulation == 'Yes') ? $request->accumulation_country : null,
            'shipment_type' => $request->shipment_type,
            'notes' => $request->is_retrospective ? $request->code . ' ' . __('Retrospective Copy from certificcate No') : '',
            'net_weight' => $request->net_weight,
            'real_weight' => $request->real_weight,
            'invoice' => !empty($invoice) ? true : false,
            'invoice_path' => !empty($invoice) ? $invoice : "data/documents/invoice-template-blue.png",
            'invoice_date' => $request->invoice_date,
            'invoice_number' => $request->invoice_number,
            'integrity_rate' => $request->integrity_rate ? (str_contains($request->integrity_rate, '%')  ?
                $request->integrity_rate : $request->integrity_rate . '%') : '',
            'products' => (array)json_decode($request->products),
            'signature_date' => '',
            'dri_signature_date' => '',
            'copy_type' => "NONE",
            'original_code' => '',
            'status' => 'DRAFT',
            'template' => $template,
            'page1' => $page1,
            'page2' => $page2,
            'page3' => $page3,
        ];
        $pdf = PDF::loadView('pdfs.' . $request->type, $data, [], [
            'title' => 'Another Title',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'display_mode'         => 'fullpage',
        ]);

        $path = 'data/enterprises/' . Auth::User()->Enterprise->id . '/certificates' . '/' . $request->type . '/';
        if (!file_exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $pdf->save($path . '/gzal-draft.pdf');
        return response()->json([
            'message' => 'Certificate generated',
            'url' => url($path . '/gzal-draft.pdf'),
            'invoice' => $invoice,
        ], 200);
    }

    public function sign($id, $notes)
    {
        $certificate = Certificate::where('code', '=', $id)->first();
        $certificate = $certificate ? $certificate : Certificate::find($id);
        if ($certificate) {

            $certificateName = strtolower($certificate->type);

            $data = $this->certificateToPDF($certificate, 2);
            $template = 2;

            if (Auth::User()->role->name == 'user' && $certificate->status == 'DRAFT') {
                $certificate->status = 'PENDING';
                $certificate->signature_date = date('Y-m-d H:m:s');
                $certificate->update();
                $data['status'] = 'PENDING';
                $data['signature_date'] = date('d-m-Y', strtotime($certificate->signature_date));
                $data['page1'] = 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/' . $certificateName . '1.jpg';
                $data['page3'] = 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/' . $certificateName . '3.jpg';

                if (!file_exists('data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/')) {
                    File::makeDirectory('data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/', $mode = 0777, true, true);
                }

                if ($template != 0) {
                    $source_image = 'data/settings/certificates_images/' . $template . '/' . $certificateName . '/' . $certificateName . '1.jpg';
                    $round_stamp = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . Auth::User()->Profile->round_stamp;
                    $square_stamp = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . Auth::User()->Profile->square_stamp;
                    $signature = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . Auth::User()->Profile->signature;
                    $destination_image = $data['page1'];
                    $this->addEnterpriseSignatureAndStampPage1($source_image, $round_stamp, $square_stamp, $signature, $destination_image, $certificateName);
                    $url = route('verifiy-certificate', $certificate->code);
                    $this->addQRCode($destination_image, $url, $destination_image, $certificateName);

                    if ($certificateName == 'gzale' || $certificateName == 'acp-tunisie') {
                        $source_image = 'data/settings/certificates_images/' . $template . '/' . $certificateName . '/' . $certificateName . '3.jpg';
                        $round_stamp = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . Auth::User()->Profile->round_stamp;
                        $square_stamp = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . Auth::User()->Profile->square_stamp;
                        $signature = 'data/enterprises/' . $certificate->Enterprise->id . '/' . 'documents/' . Auth::User()->Profile->signature;
                        $destination_image = $data['page3'];
                        $this->addEnterpriseSignatureAndStampPage3($source_image, $round_stamp, $square_stamp, $signature, $destination_image, $certificateName);
                    }
                }
                $pdf = PDF::loadView('pdfs.' . $certificateName, $data, [], [
                    'title' => 'Another Title',
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'margin_top' => 0,
                    'margin_bottom' => 0,
                    'display_mode' => 'fullpage',
                ]);

                $destinationPath =  'data/enterprises/' . $certificate->Enterprise->id . '/certificates' . '/' . $certificateName . '/';
                if (!file_exists($destinationPath)) {
                    File::makeDirectory($destinationPath, $mode = 0777, true, true);
                }
                $pdf->save($destinationPath . '/gzal-draft.pdf');

                event(new CertificatePendingEvent($certificate));

                return response()->json([
                    'message' => 'Certificate signed',
                    'certificate_id' => $certificate->id,
                    'status' => $certificate->status,
                    'url' => url($destinationPath . '/gzal-draft.pdf')
                ], 200);
            } else if (Auth::User()->role->name != 'user' && $certificate->status == 'PENDING') {
                // DRI Agent Signature                
                $certificate->status = 'SIGNED';

                if ($certificate->copy_type == "NONE") $certificate->notes = $notes;
                $certificate->dri_signature_date = date('Y-m-d H:m:s');
                $certificate->signer_id = Auth::User()->id;
                $certificate->signed_document = $certificate->id . '-gzal-dri-signed.pdf';
                $certificate->Enterprise->balance = $certificate->Enterprise->balance - 1;
                $certificate->Enterprise->update();
                $certificate->update();
                $data['status'] = $certificate->status;
                $data['notes'] = $notes == 'null' ? '' : $notes;
                $data['dri_signature_date'] = date('d-m-Y', strtotime($certificate->dri_signature_date));
                $data['page1'] = 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/' . $certificateName . '1-dri-signed.jpg';
                $data['page3'] = 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/' . $certificateName . '3.jpg';

                $source_image = 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/' . $certificateName . '1.jpg';
                $round_stamp = config('settings.ROUND_STAMP_AR_FILE_PATH');
                $square_stamp = 'data/dri/' . Auth::User()->id . '/' . Auth::User()->Profile->square_stamp;
                $signature = 'data/dri/' . Auth::User()->id . '/' . Auth::User()->Profile->signature;
                $destination_image = $data['page1'];

                $this->addDriSignatureAndStamp($source_image, $round_stamp, $square_stamp, $signature, $destination_image, $certificateName);

                $source_image_path = $data['page1'];
                $img = Image::make($source_image_path);
                $img->resize(1000, 1300, function ($constraint) { // (827, 1169) (1240, 1754) (1000, 1300)
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save();
                $destination_image_path = $data['page1'];
                imagejpeg(imagecreatefromjpeg($source_image_path), $destination_image_path, 90); // 30 50 90
                $pdf = PDF::loadView('pdfs.' . $certificateName, $data, [], [
                    'title' => 'Another Title',
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'margin_top' => 0,
                    'margin_bottom' => 0,
                    'display_mode' => 'fullpage',
                ]);
                $destinationPath =  'data/enterprises/' . $certificate->Enterprise->id . '/certificates' . '/' . $certificateName . '/';
                $pdf->save($destinationPath . $certificate->signed_document);

                $settings = Setting::all();
                if ($settings->where('name', 'Activate Digital Signature')->first()->value == 'Yes') {
                    ////////////////////////////////////
                    //  AGCE-CACI Digital Signature   //
                    ////////////////////////////////////

                    // AGCE Digital Signature 
                    $originator_id = $settings->where('name', 'AGCE ORIGINATOR ID')->first()->value;
                    $user_id = Auth::User()->Profile->agce_user_id;
                    $ssl_cert_file_path = $settings->where('name', 'File Path Of The AGCE SSL Certificate')->first()->value;
                    // 'app/Http/Requests/Certificates/ouennadi.amine/CACI-6523985471.crt';
                    $ssl_key_file_path = $settings->where('name', 'File Path Of The AGCE SSL Key')->first()->value;
                    // 'app/Http/Requests/Certificates/ouennadi.amine/CACI-6523985471.key';
                    
                    // Global function sign document, it will use all functions(four fcts)
                    // AGCE/rest-api-sdk-laravel-php-digital-signature.SignDocument ()
                    // $status = $this->AGCE_SDK_SignDocument(
                    //     $originator_id,
                    //     $user_id,
                    //     $certificate->signed_document,
                    //     $ssl_cert_file_path,
                    //     $ssl_key_file_path
                    // );

                    ////////////////////////////////////
                    // Get User Certificate Alias
                    // AGCE/rest-api-sdk-laravel-php-digital-signature.GetCertificateAlias()
                    $certificate_alias = $this->AGCE_SDK_GetCertificateAlias($originator_id, $user_id, $ssl_cert_file_path, $ssl_key_file_path);

                    // Create Authorized Signature
                    // AGCE/rest-api-sdk-laravel-php-digital-signature.CreateAuthorizedSignature()
                    $transaction_id = $this->AGCE_SDK_CreateAuthorizedSignature(
                        $originator_id,
                        $user_id,
                        $certificate_alias,
                        $destinationPath . $certificate->signed_document,
                        $ssl_cert_file_path,
                        $ssl_key_file_path
                    );

                    // Signature Status 
                    // AGCE/rest-api-sdk-laravel-php-digital-signature.GetSignatureDocument()
                    $status = $this->AGCE_SDK_GetSignedDocument(
                        $originator_id,
                        $transaction_id,
                        $destinationPath . $certificate->signed_document,
                        $ssl_cert_file_path,
                        $ssl_key_file_path
                    );

                    // Signature Verification 
                    // AGCE/rest-api-sdk-laravel-php-digital-signature.VerifySignedDocument()
                    if ($status == 'SUCCESS') {
                        $document_is_signed = $this->VerifySignedDocument(
                            $originator_id,
                            $destinationPath . $certificate->signed_document,
                            $ssl_cert_file_path,
                            $ssl_key_file_path
                        );
                    }
                }

                event(new CertificateSignedEvent($certificate));

                return response()->json([
                    'message' => 'Certificate signed',
                    'certificate_id' => $certificate->id,
                    'status' => 'SIGNED',
                    'url' => url($destinationPath . $certificate->signed_document)
                ], 200);
            }

            return response()->json([
                'message' => 'Certificate not signed',
            ], 200);
        }
    }

    public function duplicateGZALE($id, $type, $reason)
    {
        $certificate = Certificate::where('code', '=', $id)->first();
        $certificate = $certificate ? $certificate : Certificate::find($id);
        if ($certificate) {
            if ($type == "R") {
                return redirect()->route('certificates.create-retrospective-copy', [$id, $reason]);
                return response()->json(['url' => route('certificates.create-retrospective-copy', [$id, $reason])], 200);
            } else if ($type == "D") {
                $duplicatedCertificate = $certificate->replicate();
                $duplicatedCertificate->code = str_repeat("0", 7 - strlen($duplicatedCertificate->id)) . ($duplicatedCertificate->id);
                $duplicatedCertificate->status = 'PENDING';
                $certificate->signature_date = date('Y-m-d H:m:s');
                $duplicatedCertificate->notes = __('Duplicate Certificate from certificcate No');
                $duplicatedCertificate->copy_type = 'DUPLICATE';
                $duplicatedCertificate->certificate_id = $certificate->id;
                $duplicatedCertificate->save();

                $duplicatedCertificate->update(['code' => "E-" . date("Y") . str_repeat("0", 4 - strlen($duplicatedCertificate->id)) . $duplicatedCertificate->id]);

                $lastRequest = Auth::User()->requests->sortByDesc('created_at')->first();
                $request = new ModelsRequest([
                    'number' => $lastRequest ? $lastRequest->number + 1 : 1,
                    'title' => 'Duplicate Request',
                    'description' => '',
                    'message' => $reason,
                    'status' => "PENDING",
                    'type' => 'DUPLICATE',
                    "user_id" => Auth::User()->id,
                    "certificate_id" => $duplicatedCertificate->id
                ]);

                $request->save();

                foreach ($certificate->products as $product) {
                    $duplicatedCertificate->products()->attach($product->pivot->product_id, [
                        'certificate_id' => $duplicatedCertificate->id,
                        'package_type' => $product->pivot->package_type,
                        'unit_price' => $product->pivot->unit_price ? $product->pivot->unit_price : 0,
                        'currency' => $product->pivot->currency ? $product->pivot->currency : 'DZD',
                        'package_count' => $product->pivot->package_count,
                        'package_quantity' => $product->pivot->package_quantity,
                        'description' => $product->pivot->description
                    ]);
                }
                return response()->json(['message' => 'Certificate duplicated'], 200);
            }
            return response()->json([
                'message' => 'Certificate duplicated'
            ], 200);
        }
        return response()->json([
            'message' => 'Nothing!'
        ], 200);
    }

    public function rejectGZAL($id, $reason)
    {
        //
        $certificate = Certificate::find($id);
        if ($certificate) {
            if (Auth::User()->role->name != 'user' && $certificate->status == 'PENDING') {
                $certificate->status = 'REJECTED';

                event(new CertificateRejectedEvent($certificate));

                $certificate->rejection_reason = 'I don\'t know';
                $certificate->dri_signature_date = date('Y-m-d H:m:s');
                $certificate->update();
            }

            return response()->json([
                'message' => 'Certificate rejected',
                'certificate_id' => $certificate->id,
                'status' => $certificate->status
            ], 200);
        }
    }

    public function  SignDocument($originator_id, $user_id, $document_path, $ssl_cert_file_path, $ssl_key_file_path)
    {
        // Get User Certificate Alias
        // AGCE/rest-api-sdk-laravel-php-digital-signature.GetCertificateAlias()
        $certificate_alias = $this->AGCE_SDK_GetCertificateAlias($originator_id, $user_id, $ssl_cert_file_path, $ssl_key_file_path);

        // Create Authorized Signature
        // AGCE/rest-api-sdk-laravel-php-digital-signature.CreateAuthorizedSignature()
        $transaction_id = $this->AGCE_SDK_CreateAuthorizedSignature(
            $originator_id,
            $user_id,
            $certificate_alias,
            $document_path,
            $ssl_cert_file_path,
            $ssl_key_file_path
        );

        // Signature Status 
        // AGCE/rest-api-sdk-laravel-php-digital-signature.GetSignatureDocument()
        $status = $this->AGCE_SDK_GetSignedDocument(
            $originator_id,
            $transaction_id,
            $document_path,
            $ssl_cert_file_path,
            $ssl_key_file_path
        );

        // Signature Verification 
        // AGCE/rest-api-sdk-laravel-php-digital-signature.VerifySignedDocument()
        if ($status == 'SUCCESS') {
            $document_is_signed = $this->VerifySignedDocument(
                $originator_id,
                $document_path,
                $ssl_cert_file_path,
                $ssl_key_file_path
            );
        }
        return $status;
    }

    public function  AGCE_SDK_GetCertificateAlias($originator_id, $user_id, $ssl_cert_file_path, $ssl_key_file_path)
    {
        $curl     = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL            => 'https://ras-ba.stg.agce.dz/adss/service/ras/v1/keypairs/cert/' . $originator_id . '/' . $user_id,
                CURLOPT_SSLCERT           => $ssl_cert_file_path,
                CURLOPT_SSLKEY           => $ssl_key_file_path,
                CURLOPT_SSL_VERIFYHOST => FALSE,
                CURLOPT_SSL_VERIFYPEER => FALSE,
                CURLOPT_FRESH_CONNECT => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => TRUE,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1
            )
        );
        $response = curl_exec($curl);
        curl_close($curl);

        if (!$response) {
            return 'Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl);
        } else {
            $response_array = json_decode($response);
            return $response_array[0]->key_alias;
        }
        return '';
    }

    public function  AGCE_SDK_CreateAuthorizedSignature($originator_id, $user_id, $certificate_alias, $document_path, $ssl_cert_file_path, $ssl_key_file_path)
    {
        $document_name = 'test.pdf';
        $displayed_message = "<b style='width: 100%; text-align: center;'>" . 'CACI E-Certification' . "</b>" .
            "<b style='width: 100%; text-align: center; color:red;'> " . __('This is for testing purposes') . "</b><br/>" .
            "<p style='width: 100%; text-align: center; color:black;'>" . __('Document number') . ": <b>"
            . $document_name . "</b>. " . __('Is requesting your approval for certification') . ".</p>";
        $headers = [
            'Content-Type: text/xml',
            'ORIGINATOR_ID: ' . $originator_id,
            'PROFILE_ID: adss:signing:profile:014',
            'CERTIFICATE_ALIAS: ' . $certificate_alias,
            'MIME_TYPE: PDF',
            'USER_ID: ' . $user_id,
            'DOCUMENT_NAME: ' . $document_name . '',
            'DATA_TO_BE_DISPLAYED: ' . $displayed_message . ''
        ];
        $curl     = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL            => 'https://sign.stg.agce.dz/adss/signing/hdsi',
                CURLOPT_SSLCERT           => $ssl_cert_file_path,
                CURLOPT_SSLKEY           => $ssl_key_file_path,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_SSL_VERIFYHOST => FALSE,
                CURLOPT_SSL_VERIFYPEER => FALSE,
                CURLOPT_FRESH_CONNECT => TRUE,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => TRUE,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_POST           => 1,
                CURLOPT_POSTFIELDS     => file_get_contents($document_path),
                CURLOPT_HEADER         => TRUE,
                CURLOPT_HTTPHEADER     => $headers,
            )
        );
        $response = curl_exec($curl);
        curl_close($curl);

        if (!$response) {
            return 'Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl);
        } else {
            $headers = $this->get_headers_from_curl_response($response);
            return $headers["TRANSACTION_ID"];
        }
        return '';
    }

    public function  AGCE_SDK_GetSignedDocument($originator_id, $transaction_id, $signed_document_path, $ssl_cert_file_path, $ssl_key_file_path)
    {
        $status = 'TIMEOUT';
        $headers = [
            'Content-Type: text/xml',
            'ORIGINATOR_ID: ' . $originator_id,
            'PROFILE_ID: adss:signing:profile:014',
            'MIME_TYPE: STATUS',
            'TRANSACTION_ID: ' . $transaction_id,
        ];
        $tempFP = fopen($signed_document_path, 'w+');
        $curl     = curl_init();
        $count = 20;
        while (true) {
            $count--;
            sleep(5);
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL            => 'https://sign.stg.agce.dz/adss/signing/hdsi',
                    CURLOPT_SSLCERT           => $ssl_cert_file_path,
                    CURLOPT_SSLKEY           => $ssl_key_file_path,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_SSL_VERIFYHOST => FALSE,
                    CURLOPT_SSL_VERIFYPEER => FALSE,
                    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST  => 'POST',
                    CURLOPT_HEADER         => TRUE,
                    CURLOPT_HTTPHEADER     => $headers,
                )
            );
            $response = curl_exec($curl);
            if (!$response) {
                return 'Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl);
            } else {
                $response_info = curl_getinfo($curl);
                if (($response_info["http_code"] >= 200) && ($response_info["http_code"] <= 299)) {
                    $headers1 = $this->get_headers_from_curl_response($response);

                    $status = $headers1["RESPONSE_STATUS"];
                    if ($status == 'SUCCESS') {
                        fwrite($tempFP, $response);
                        break;
                    }
                }
                if ($status == 'FAILLED' || $count == 0) {
                    break;
                }
            }
        }
        curl_close($curl);
        fclose($tempFP);
        return $status;
    }

    public function  VerifySignedDocument($originator_id, $signed_document_path, $ssl_cert_file_path, $ssl_key_file_path)
    {
        $status = 'Invalid';
        $headers = [
            'Content-Type: text/xml',
        ];

        $body =
            '<?xml version="1.0" encoding="UTF-8"?>
        <Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
            <Header />
            <Body>
                <ns3:VerifyRequest xmlns:ns3="urn:oasis:names:tc:dss:1.0:core:schema" xmlns="http://www.w3.org/2000/09/xmldsig#" xmlns:ns2="urn:oasis:names:tc:dss-x:1.0:profiles:verificationreport:schema#" xmlns:ns4="http://uri.etsi.org/01903/v1.3.2#" xmlns:ns5="http://uri.etsi.org/02231/v2#" xmlns:ns6="http://www.ascertia.com/products/adss/protocol/dss/extensions" xmlns:ns7="urn:oasis:names:tc:dss:1.0:profiles:VA:schema#" RequestID="Trans-001">
                    <ns3:OptionalInputs>
                        <ns3:ClaimedIdentity>
                            <ns3:Name>' . $originator_id . '</ns3:Name>
                        </ns3:ClaimedIdentity>
                        <ns3:ReturnSigningTimeInfo xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:nil="true" />
                        <ns3:ReturnSignerIdentity xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:nil="true" />
                    </ns3:OptionalInputs>
                    <ns3:InputDocuments>
                        <ns3:Document>
                            <ns3:Base64Data MimeType="PDF">' .
            base64_encode(file_get_contents($signed_document_path)) .
            '</ns3:Base64Data>
                        </ns3:Document>
                    </ns3:InputDocuments>
                </ns3:VerifyRequest>
            </Body>
        </Envelope>';

        $curl     = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL            => 'https://verif.stg.agce.dz/adss/verification/dss',
                CURLOPT_SSLCERT           => $ssl_cert_file_path,
                CURLOPT_SSLKEY           => $ssl_key_file_path,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_SSL_VERIFYHOST => FALSE,
                CURLOPT_SSL_VERIFYPEER => FALSE,
                CURLOPT_FRESH_CONNECT => TRUE,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => TRUE,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_POST           => 1,
                CURLOPT_POSTFIELDS         => $body,
                CURLOPT_HEADER         => TRUE,
                CURLOPT_HTTPHEADER     => $headers,
            )
        );
        $response = curl_exec($curl);

        if (!$response) {
            return 'Error: "' . curl_error($curl) . '" -xx Code: ' . curl_errno($curl);
        } else {
            $response1 = substr($response, strpos($response, '<?xml'), strlen($response));
            $response2 = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response1);
            $xml = new \SimpleXMLElement($response2);
            $array = json_decode(json_encode((array)$xml), TRUE);
            if (isset($array['Body']['ns2VerifyResponse']['ns2OptionalOutputs']['ns7ContentVerifyInfo']['ns7VerifyInfo'][0]['@attributes']['AssertionStatus'])) {
                $status = $array['Body']['ns2VerifyResponse']['ns2OptionalOutputs']['ns7ContentVerifyInfo']['ns7VerifyInfo'][0]['@attributes']['AssertionStatus'];
            } else if (isset($array['Body']['ns5VerifyResponse'])) {
                $status = $array['Body']['ns5VerifyResponse'];
            }
        }
        curl_close($curl);
        return $status;
    }

    public function get_headers_from_curl_response($response)
    {

        $headers = [];
        $output = rtrim($response);
        $data = explode("\n", $output);
        $headers['status'] = $data[0];
        array_shift($data);

        foreach ($data as $part) {
            $middle = explode(":", $part, 2);
            if (!isset($middle[1])) {
                $middle[1] = null;
            }
            $headers[trim($middle[0])] = trim($middle[1]);
        }
        return $headers;
    }

    public function certificateToPDF($certificate, $template)
    {
        $products = $certificate->products->map(function ($items, $count = 1) {
            $count++;
            $data['number'] = $count;
            $data['product_name'] = $items->name;
            $data['package_type'] = $items->pivot->package_type;
            $data['unit_price'] = $items->pivot->unit_price;
            $data['package_type_name'] = __($items->pivot->package_type);
            $data['currency'] = __($items->pivot->currency);
            $data['package_quantity'] = $items->pivot->package_quantity;
            $data['package_count'] = $items->pivot->package_count;
            $data['description'] = $items->pivot->description;
            return $data;
        });
        $settings = Setting::all();
        $page1 = '';
        $page2 = '';
        $page3 = '';

        $certificateName = strtolower($certificate->type);

        if ($template != 0) {
            $page1 = ($certificate->status == "DRAFT") ? 'data/settings/certificates_images/' . $template . '/' . $certificateName . '/' . $certificateName . '1.jpg'
                : (($certificate->status == "PENDING"
                    || $certificate->status == "REJECTED") ? 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/'
                    . $certificateName . '/' . $certificateName . '1.jpg'
                    : 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/'
                    . $certificateName . '1-dri-signed.jpg');
            $page2 = 'data/settings/certificates_images/' . $template . '/' . $certificateName . '/' . $certificateName . '2.jpg';
            $page3 = ($certificate->status == "DRAFT") ? 'data/settings/certificates_images/' . $template . '/' . $certificateName . '/' . $certificateName . '3.jpg'
                : 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $template . '/' . $certificateName . '/' . $certificateName . '3.jpg';
        }

        $importer = Importer::find($certificate->importer_id);
        $producer = Producer::find($certificate->producer_id);

        $data = [
            'rtl' => ($certificateName == 'gzale' || $certificateName == 'acp-tunisie') ? true : false,
            //'rtl' => true, //(preg_match("/[a-zA-Z]/i", $certificate->producer_name)) ? false : true,
            'code' => $certificate->code,
            'exporter_name' => $certificate->Enterprise->name_ar,
            'exporter_address' => $certificate->Enterprise->address_ar,
            'producer_name' => $producer ? $producer->name : '',
            'producer_address' => $producer ? $producer->address : '',
            'original_country' => $producer ? $producer->state->country->native : "Algeria",
            'importer_name' =>  $importer ? $importer->name : "",
            'importer_address' => $importer ? $importer->address : "",
            'destination_country' => $importer ? $importer->state->country->name : "",
            'accumulation' => $certificate->accumulation,
            'accumulation_country' => ($certificate->accumulation == 'Yes') ? $certificate->accumulation_country : null,
            'shipment_type' => $certificate->shipment_type,
            'notes' => $certificate->notes == 'null' ? '' : $certificate->notes,
            'net_weight' => $certificate->net_weight,
            'real_weight' => $certificate->real_weight,
            'invoice' => $certificate->invoice,
            'invoice_path' => $certificate->invoice ? 'data/enterprises/' . $certificate->Enterprise->id .
                '/' . 'invoices/' . $certificate->invoice : "data/documents/invoice-template-blue.png",
            'invoice_date' => $certificate->invoice_date,
            'invoice_number' => $certificate->invoice_number,
            'integrity_rate' => $certificate->integrity_rate,
            'products' => (array)json_decode($products),
            'status' => $certificate->status,
            'copy_type' => $certificate->copy_type,
            'original_code' => ($certificate->copy_type != "NONE") ? $certificate->certificate->code : '',
            'signature_date' => date('d-m-Y', strtotime($certificate->signature_date)),
            'dri_signature_date' => date('d-m-Y', strtotime($certificate->dri_signature_date)),
            'is_digitally_signed' => ($settings->where('name', 'Activate Digital Signature')->first()->value == 'Yes'),
            'template' => $template,
            'page1' => $page1,
            'page2' => $page2,
            'page3' => $page3,
        ];
        return $data;
    }

    public function addQRCode($source_image, $url, $destination_image, $type)
    {
        $enterprise_id = Auth::User()->Enterprise->id;
        $qrcode_url = 'data/enterprises/' . $enterprise_id . '/documents/qrcode.png';
        QRCode::url($url)
            ->setOutfile($qrcode_url)
            ->setSize(4)
            ->setMargin(2)
            ->png();

        $img = Image::make($source_image);
        // and insert a watermark for example
        if ($type == 'gzale') {
            $img->insert($qrcode_url, 'top-right', 150, 200);
        } else if ($type == 'acp-tunisie') {
            $img->insert($qrcode_url, 'top-right', 150, 230);
        } else if ($type == 'form-a-en') {
            $img->insert($qrcode_url, 'top-right', 80, 300);
        } else if ($type == 'formule-a-fr') {
            $img->insert($qrcode_url, 'top-right', 100, 300);
        }
        // finally we save the image as a new file
        $img->save($destination_image);
    }

    public function addEnterpriseSignatureAndStampPage1($source_image, $round_stamp, $square_stamp, $signature, $destination_image, $type)
    {
        $img = Image::make($source_image);
        if ($type == 'gzale') {
            $img->insert($round_stamp, 'bottom-right', 220, 230);
            $img->insert($square_stamp, 'bottom-right', 250, 170);
            $img->insert($signature, 'bottom-right', 280, 80);
        } else if ($type == 'acp-tunisie') {
            $img->insert($round_stamp, 'bottom-right', 220, 230);
            $img->insert($square_stamp, 'bottom-right', 250, 170);
            $img->insert($signature, 'bottom-right', 280, 80);
        } else if ($type == 'form-a-en') {
            $img->insert($round_stamp, 'bottom-right', 80, 130);
            $img->insert($square_stamp, 'bottom-right', 500, 200);
            $img->insert($signature, 'bottom-right', 500, 130);
        } else if ($type == 'formule-a-fr') {
            $img->insert($round_stamp, 'bottom-right', 80, 130);
            $img->insert($square_stamp, 'bottom-right', 500, 200);
            $img->insert($signature, 'bottom-right', 500, 130);
        }
        $img->save($destination_image);
    }

    public function addEnterpriseSignatureAndStampPage3($source_image, $round_stamp, $square_stamp, $signature, $destination_image, $type)
    {
        $img = Image::make($source_image);
        if ($type == 'gzale') {
            $img->insert($round_stamp, 'bottom-right', 450, 370);
            $img->insert($square_stamp, 'bottom-right', 450, 280);
            $img->insert($signature, 'bottom-right', 480, 230);
        } else if ($type == 'acp-tunisie') {
            $img->insert($round_stamp, 'bottom-right', 1150, 370);
            $img->insert($square_stamp, 'bottom-right', 1150, 280);
            $img->insert($signature, 'bottom-right', 1180, 230);
        }
        $img->save($destination_image);
    }

    public function addDriSignatureAndStamp($source_image, $round_stamp, $square_stamp, $signature, $destination_image, $type)
    {
        $img = Image::make($source_image);
        if ($type == 'gzale') {
            $img->insert($round_stamp, 'bottom-right', 750, 150);
            $img->insert($square_stamp, 'bottom-right', 750, 150);
            $img->insert($signature, 'bottom-right', 700, 250);
        } else if ($type == 'acp-tunisie') {
            $img->insert($round_stamp, 'bottom-right', 750, 150);
            $img->insert($square_stamp, 'bottom-right', 750, 150);
            $img->insert($signature, 'bottom-right', 700, 250);
        } else if ($type == 'form-a-en') {
            $img->insert($round_stamp, 'bottom-right', 850, 150);
            $img->insert($square_stamp, 'bottom-right', 1200, 250);
            $img->insert($signature, 'bottom-right', 1200, 200);
        } else if ($type == 'formule-a-fr') {
            $img->insert($round_stamp, 'bottom-right', 850, 150);
            $img->insert($square_stamp, 'bottom-right', 1200, 250);
            $img->insert($signature, 'bottom-right', 1200, 200);
        }
        $img->save($destination_image);
    }
}
