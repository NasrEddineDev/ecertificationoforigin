<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Enums\Steps;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Certificate;
use App\Providers\RouteServiceProvider;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['guest']);
        // $this->middleware(['verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // App::setLocale('ar');
            $locale = App::currentLocale();

            // $user = User::where('email', '=', "f.hasni@caci.dz")->first();

            // if ($user && Hash::check("password", $user->password)) {
            //     if (Auth::login($user)) {
            //         event(new login($user));
            //     }
            // }

            if (Auth::check()) {
                if (Auth::user()->role->name != 'user') return redirect(RouteServiceProvider::HOME);

                if (!Auth::user()->hasVerifiedEmail()) {
                    return view('registration_wizard', ['step' => Steps::ACTIVATION]);
                } else if (!Auth::user()->enterprise) {
                    $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                    // $cities = City::all()->where('country_code', '==', 'DZ');
                    $activities = Activity::all();
                    $step = Steps::ENTERPRISE;
                    return view('registration_wizard', compact('step', 'states', 'cities', 'activities'));
                } else if (!Auth::user()->enterprise->manager_id) {
                    $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                    // $cities = City::all()->where('country_code', '==', 'DZ');
                    // $cities = City::all()->where('state_code', '==', $state_code);
                    $step = Steps::MANAGER;
                    return view('registration_wizard', compact('step', 'states', 'cities'));
                } else if (Auth::user()->enterprise->status == 'DRAFT') {
                    return view('registration_wizard', ['step' => Steps::CONFIRMATION]);
                }
                return redirect(RouteServiceProvider::HOME);
            }

            return view('index');
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

                    // if ($certificateName == 'gzale' || $certificateName == 'acp-tunisie')
                    $page1 = ($certificate->status == "DRAFT") ? 'data/documents/' . $certificateName . '/' . $certificateName . '1.jpg'
                        : (($certificate->status == "PENDING"
                            || $certificate->status == "REJECTED") ? 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/'
                            . $certificateName . '/' . $certificateName . '1.jpg'
                            : 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $certificateName . '/'
                            . $certificateName . '1-dri-signed.jpg');
                    $page2 = 'data/documents/' . $certificateName . '/' . $certificateName . '2.jpg';
                    $page3 = ($certificate->status == "DRAFT") ? 'data/documents/' . $certificateName . '/' . $certificateName . '3.jpg'
                        : 'data/enterprises/' . $certificate->Enterprise->id . '/documents' . '/' . $certificateName . '/' . $certificateName . '3.jpg';

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
                        'original_country' => ($certificateName == 'gzale' || $certificateName == 'acp-tunisie') ? "الجزائر" : "Algeria",
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

                    //   $url = 'data/'. ((Auth::User()->role->name == 'user') 
                    //     ? 'enterprises/'.$certificate->Enterprise->id : 'dri/'.Auth::User()->username).'/certificates/gzal-draft.pdf';
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
}
