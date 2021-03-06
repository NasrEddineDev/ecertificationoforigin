<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Enums\Steps;
use App\Functions\Functions;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\State;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use App\Models\Certificate;
use App\Providers\RouteServiceProvider;
use PDF;
use Lang;

class HomeController extends Controller
{
    use Functions;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $locale = App::currentLocale();

            if (Auth::check()) {
                if (Auth::user()->profile && Auth::user()->profile->language){
                    App::setLocale(Auth::user()->profile->language);
                }
                if (Auth::user()->role->name != 'user') return redirect(RouteServiceProvider::HOME);

                if (!Auth::user()->hasVerifiedEmail()) {
                    return view('register', ['step' => Steps::ACTIVATION]);
                } else if (!Auth::user()->enterprise) {
                    $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                    $activities = Activity::all();
                    $step = Steps::ENTERPRISE;
                    return view('register', compact('step', 'states', 'activities'));
                } else if (!Auth::user()->enterprise->manager_id) {
                    $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                    $step = Steps::MANAGER;
                    return view('register', compact('step', 'states', 'cities'));
                } else if (Auth::user()->enterprise->status == 'DRAFT') {
                    return view('register', ['step' => Steps::CONFIRMATION]);
                }
                return redirect(RouteServiceProvider::HOME);
            }

            $repeat = true;
            $count = 1;
            $faq = [];
            while ($repeat){
                if (Lang::has('FAQ'.$count.'Q', $locale) && Lang::has('FAQ'.$count.'A', $locale)){
                    $faq[__('FAQ'.$count.'Q')] = __('FAQ'.$count.'A');
                    $count ++;
                }else{
                    $repeat =false;
                }
            }
            return view('index', compact('faq'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function verifiyCertificate($id)
    {
        try {
            $url = url('data/documents/certificate-not-exist.pdf');
            $certificate = Certificate::where('code', '=', $id)->first();
            $certificate = $certificate ? $certificate : Certificate::find($id);
            if ($certificate) {

                $certificateName = strtolower($certificate->type);

                if ($certificate->status == "SINGED") {
                    $url = url('data/enterprises/' . $certificate->Enterprise->id
                        . '/certificates' . '/' . $certificateName . '/' . $certificate->signed_document);
                } else {

                    $count = 1;
                    $products = $certificate->products->map(function ($items, $count = 1) {
                        $count++;
                        $data['number'] = $count;
                        $data['product_name'] = $items->name;
                        $data['package_type'] = $items->pivot->package_type;
                        $data['unit_price'] = $items->pivot->unit_price;
                        $data['package_type_name'] = $items->pivot->package_type;
                        $data['package_quantity'] = $items->pivot->package_quantity;
                        $data['package_count'] = $items->pivot->package_count;
                        $data['description'] = $items->pivot->description;
                        return $data;
                    });

                    $settings = Setting::all();
                    $template = Setting::where('name', 'Default Certificate Template')->first()->value;
                    $page1 = '';
                    $page2 = '';
                    $page3 = '';
            
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

                    $data = [
                        'rtl' => ($certificateName == 'gzale' || $certificateName == 'acp-tunisie') ? true : false,
                        //(preg_match("/[a-zA-Z]/i", $certificate->producer_name)) ? false : true,
                        'code' => $certificate->code,
                        'exporter_name' => $certificate->Enterprise->name,
                        'exporter_address' => $certificate->Enterprise->address,
                        'producer_name' => '', $certificate->producer_id ? $certificate->Producer->name : '',
                        'producer_address' => $certificate->producer_id ? $certificate->Producer->address : '',
                        'importer_name' => $certificate->importer->name,
                        'importer_address' => $certificate->importer->address,
                        'original_country' => ($certificateName == 'gzale' || $certificateName == 'acp-tunisie') ? "??????????????" : "Algeria",
                        'destination_country' => $certificate->importer->state->country->name,
                        'accumulation' => $certificate->accumulation,
                        'accumulation_country' => ($certificate->accumulation == 'Yes') ? $certificate->accumulation_country : null,
                        'shipment_type' => $certificate->shipment_type,
                        'notes' => $certificate->notes == 'null' ? '' : $certificate->notes,
                        'net_weight' => $certificate->net_weight,
                        'real_weight' => $certificate->real_weight,
                        'invoice' => $certificate->invoice ? true : false,
                        'invoice_path' => $certificate->invoice ? 'data/enterprises/' . $certificate->Enterprise->id .
                            '/' . 'invoices/' . $certificate->invoice : "data/documents/invoice-template-blue.png",
                        'invoice_date' => $certificate->invoice_date,
                        'invoice_number' => $certificate->invoice_number,
                        'integrity_rate' => $certificate->integrity_rate,
                        'products' => (array)json_decode($products),
                        'status' => $certificate->status,
                        'copy_type' => $certificate->copy_type,
                        'original_code' => ($certificate->copy_type != "NONE") ? $certificate->certificate->code : '',
                        'signature_date' => $certificate->signature_date,
                        'dri_signature_date' => $certificate->dri_signature_date,
                        'is_digitally_signed' => ($settings->where('name', 'Activate Digital Signature')->first()->value == 'Yes'),
                        'template' => $template,
                        'page1' => $page1,
                        'page2' => $page2,
                        'page3' => $page3,
                    ];

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
                    $pdf->save($path . '/gzal-draft.pdf');
                    $url = url($path . '/gzal-draft.pdf');
                }
            }
            return view('verifiy_certificate', compact('url'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function verifiyCertificateHome(Request $request)
    {
        try {
            $url = url('data/documents/certificate-not-exist.pdf');
            $certificate = Certificate::where('code', '=', $request->certificate_id)->first();
            $certificate = $certificate ? $certificate : Certificate::find($request->certificate_id);
            if ($certificate) {

                $certificateName = strtolower($certificate->type);

                if ($certificate->status == "SINGED") {
                    $url = url('data/enterprises/' . $certificate->Enterprise->id
                        . '/certificates' . '/' . $certificateName . '/' . $certificate->signed_document);
                } else {

                    $count = 1;
                    $products = $certificate->products->map(function ($items, $count = 1) {
                        $count++;
                        $data['number'] = $count;
                        $data['product_name'] = $items->name;
                        $data['package_type'] = $items->pivot->package_type;
                        $data['unit_price'] = $items->pivot->unit_price;
                        $data['package_type_name'] = $items->pivot->package_type;
                        $data['package_quantity'] = $items->pivot->package_quantity;
                        $data['package_count'] = $items->pivot->package_count;
                        $data['description'] = $items->pivot->description;
                        return $data;
                    });
                    $settings = Setting::all();
                    $template = Setting::where('name', 'Default Certificate Template')->first()->value;
                    $page1 = '';$page2 = '';$page3 = '';
                    
                    $certificateName = strtolower($certificate->type);
                    
                    if ($template != 0){
                    
            
                    $page1 = ($certificate->status == "DRAFT") ? 'data/settings/certificates_images/'.$template.'/' . $certificateName . '/' . $certificateName . '1.jpg'
                        : (($certificate->status == "PENDING"
                            || $certificate->status == "REJECTED") ? 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/'. $template. '/'
                            . $certificateName . '/' . $certificateName . '1.jpg'
                            : 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/'. $template. '/' . $certificateName . '/'
                            . $certificateName . '1-dri-signed.jpg');
                    $page2 = 'data/settings/certificates_images/'.$template .'/'. $certificateName . '/' . $certificateName . '2.jpg';
                    $page3 = ($certificate->status == "DRAFT") ? 'data/settings/certificates_images/'.$template .'/' . $certificateName . '/' . $certificateName . '3.jpg'
                        : 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/'. $template. '/' . $certificateName . '/' . $certificateName . '3.jpg';
                    }

                    $data = [
                        'rtl' => ($certificateName == 'gzale' || $certificateName == 'acp-tunisie') ? true : false,
                        //(preg_match("/[a-zA-Z]/i", $certificate->producer_name)) ? false : true,
                        'code' => $certificate->code,
                        'exporter_name' => $certificate->Enterprise->name,
                        'exporter_address' => $certificate->Enterprise->address,
                        'producer_name' => '', $certificate->producer_id ? $certificate->Producer->name : '',
                        'producer_address' => $certificate->producer_id ? $certificate->Producer->address : '',
                        'importer_name' => $certificate->importer->name,
                        'importer_address' => $certificate->importer->address,
                        'original_country' => ($certificateName == 'gzale' || $certificateName == 'acp-tunisie') ? "??????????????" : "Algeria",
                        'destination_country' => $certificate->importer->state->country->name,
                        'accumulation' => $certificate->accumulation,
                        'accumulation_country' => ($certificate->accumulation == 'Yes') ? $certificate->accumulation_country : null,
                        'shipment_type' => $certificate->shipment_type,
                        'notes' => $certificate->notes == 'null' ? '' : $certificate->notes,
                        'net_weight' => $certificate->net_weight,
                        'real_weight' => $certificate->real_weight,
                        'invoice' => $certificate->invoice ? true : false,
                        'invoice_path' => $certificate->invoice ? 'data/enterprises/' . $certificate->Enterprise->id .
                            '/' . 'invoices/' . $certificate->invoice : "data/documents/invoice-template-blue.png",
                        'invoice_date' => $certificate->invoice_date,
                        'invoice_number' => $certificate->invoice_number,
                        'integrity_rate' => $certificate->integrity_rate,
                        'products' => (array)json_decode($products),
                        'status' => $certificate->status,
                        'copy_type' => $certificate->copy_type,
                        'original_code' => ($certificate->copy_type != "NONE") ? $certificate->certificate->code : '',
                        'signature_date' => $certificate->signature_date,
                        'dri_signature_date' => $certificate->dri_signature_date,
                        'is_digitally_signed' => ($settings->where('name', 'Activate Digital Signature')->first()->value == 'Yes'),
                        'template' => $template,
                        'page1' => $page1,
                        'page2' => $page2,
                        'page3' => $page3,
                    ];

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
                    $pdf->save($path . '/gzal-draft.pdf');
                    $url = url($path . '/gzal-draft.pdf');
                }
            }
            return view('verifiy_certificate', compact('url'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function indexHakim()
    {
        try {
            return view('indexHakim');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function setlocale($locale)
    {
        try {
            App::setlocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function leaveMessage(Request $request)
    {
        try {

            $this->SendEmailMessageTo(
                $request->name,
                $request->anonymous_email,
                $request->message
            );

            return response()->json([
                                     'message' => 'Message sent',
                                     'result' => true
                                    ], 200);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());
            return false;
        }
    }
}
