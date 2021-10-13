<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use ArrayObject;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['guest']);
        $this->middleware(['auth', 'verified', 'information.verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // $locale = App::currentLocale();
            // $locale = Auth::user()->profile ? Auth::user()->profile->language : 'ar';
            $locale = Auth::user()->profile->language;

            // User or Enterprise KPI
            if (Auth::user()->Role->name == "user") {

                $data = [
                    'current_balance' => Auth::User()->Enterprise->balance,
                    'current_balance_rate' => number_format((float)(100 * Auth::User()->Enterprise->balance / (Auth::User()->Enterprise->balance +
                        Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count())), 2, '.', '') . '%',
                    'consumed_balance' => Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count(),
                    'consumed_balance_rate' => number_format((float)(100 * Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')
                        ->count() / (Auth::User()->Enterprise->balance +
                            Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count())), 2, '.', '') . '%',
                    'total_balance' => Auth::User()->Enterprise->balance +
                        Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count(),
                    'total_certificates' => Auth::User()->Enterprise->certificates()->count(),
                    'signed_certificates' => Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count(),
                    'rejected_certificates' => Auth::User()->Enterprise->certificates->where('status', '==', 'REJECTED')->count(),
                    'total_requests' => Auth::User()->Enterprise->certificates->where('copy_type', '!=', 'NONE')->count(),
                    'total_products' => Auth::User()->Enterprise->products()->count(),
                    'total_packages' => DB::table('products_certificates')
                        ->whereIn('certificate_id', Auth::User()->Enterprise->certificates()
                            ->where('status', '==', 'SIGNED')->pluck('id')->toArray())
                        ->sum('package_count'),
                    'total_importers' => Auth::User()->Enterprise->importers()->count(),
                    'total_countries' => DB::table('countries')
                        ->whereIn('id', DB::table('states')
                            ->whereIn('id', Auth::User()->Enterprise->importers->pluck('state_id')->toArray())
                            ->pluck('country_id')->toArray())->distinct()->count(),
                    'total_products_weight' => Auth::User()->Enterprise->certificates->where('status', '!=', 'DRAFT')
                        ->where('status', '!=', 'REJECTED')->sum('net_weight'),
                    // Piechart
                    'total_gzale' => Auth::User()->Enterprise->certificates->where('type', '==', 'GZALE')
                        ->where('copy_type', '==', 'NONE')->count(),
                    'total_acp_tunisie' => Auth::User()->Enterprise->certificates->where('type', '==', 'ACP-TUNISIE')
                        ->where('copy_type', '==', 'NONE')->count(),
                    'total_form_a_en' => Auth::User()->Enterprise->certificates->where('type', '==', 'FORM-A-EN')
                        ->where('copy_type', '==', 'NONE')->count(),
                    'total_formule_a_fr' => Auth::User()->Enterprise->certificates->where('type', '==', 'FORMULE-A-FR')
                        ->where('copy_type', '==', 'NONE')->count(),
                ];
                $data['gzale_rate'] = ($data['total_certificates'] != 0) ? ($data['total_gzale'] * 100) / $data['total_certificates'] : 0;
                $data['acp_tunisie_rate'] = ($data['total_certificates'] != 0) ? ($data['total_acp_tunisie'] * 100) / $data['total_certificates'] : 0;
                $data['form_a_en_rate'] = ($data['total_certificates'] != 0) ? ($data['total_form_a_en'] * 100) / $data['total_certificates'] : 0;
                $data['formule_a_fr_rate'] = ($data['total_certificates'] != 0) ? ($data['total_formule_a_fr'] * 100) / $data['total_certificates'] : 0;
                $certificate = Auth::User()->Enterprise->certificates->sortBy('created_at')->first();

                $array = DB::select("select MONTH(created_at) as month,"
                    . "(select count(*) from certificates c1 where c1.`type` = 'GZALE' and MONTH(c1.created_at) = month) as GZALE,"
                    . "(select count(*) from certificates c2 where c2.`type` = 'FORM-A-EN' and MONTH(c2.created_at) = month) as 'FORM-A-EN',"
                    . "(select count(*) from certificates c2 where c2.`type` = 'FORMULE-A-FR' and MONTH(c2.created_at) = month) as 'FORMULE-A-FR',"
                    . "(select count(*) from certificates c3 where c3.`type` = 'ACP-TUNISIE' and MONTH(c3.created_at) = month) as 'ACP-TUNISIE'"
                    . " from certificates where enterprise_id = " . Auth::User()->enterprise->id . " and copy_type = 'NONE' group BY month");

                array_unshift($array, (object)(array(
                    'month' => isset($certificate) ? (int)date('m', strtotime($certificate->created_at)) - 1 : '0',
                    'GZALE' => '0', 'FORM-A-EN' => '0', 'FORMULE-A-FR' => '0', 'ACP-TUNISIE' => '0'
                )));

                $data['certificates_morris_area'] = $array;


                // User or Enterprise KPI
            } else if (Auth::user()->Role->name == "dri_user") {
                $data = [
                    'current_balance' => '0',
                    'current_balance_rate' => '0%',
                    'consumed_balance' => '0',
                    'consumed_balance_rate' => '0%',
                    'total_balance' => '0',
                    'total_certificates' => 0,
                    'signed_certificates' => 0,
                    'rejected_certificates' => 0,
                    'total_requests' => '0',
                    'total_products' => '0',
                    'total_products_weight' => '0',
                    'total_importers' => '0',
                    'total_countries' => '0',
                    'gzale_rate' => 0,
                    'total_gzale' => 0,
                    'acp_tunisie_rate' => 0,
                    'total_acp_tunisie' => 0,
                    'formule_a_fr_rate' => 0,
                    'total_formule_a_fr' => 0,
                    'form_a_en_rate' => 0,
                    'total_form_a_en' => 0,
                    'certificates_morris_area' => '',
                ];

                // dd(Auth::user()->actions->where('log_name', 'certificate')->pluck('properties')->toArray());

                $firstAction = Auth::user()->actions->where('log_name', 'certificate')->sortBy('created_at')->first();
                $array = [];
                $startMonth = isset($firstAction) ? (int)date('m', strtotime($firstAction->created_at)) - 1 : '0';
                array_push($array, (object)(array('month' => $startMonth, 'GZALE' => '0', 'FORM-A-EN' => '0', 'FORMULE-A-FR' => '0', 'ACP-TUNISIE' => '0')));

                $driUserActions = Auth::user()->actions->where('log_name', 'certificate');
                //->pluck('properties')->toArray();

                $gzaleCount = 0;
                $acpTunisieCount = 0;
                $formAEnCount = 0;
                $formuleAFrCount = 0;
                $currentMonth = $startMonth + 1;
                foreach ($driUserActions as $action) {
                    if ($currentMonth != (int)date('m', strtotime($action->created_at))) {
                        array_push($array, (object)(array(
                            'month' => $currentMonth,
                            'GZALE' => $gzaleCount,
                            'FORM-A-EN' => $formAEnCount,
                            'FORMULE-A-FR' => $formuleAFrCount,
                            'ACP-TUNISIE' => $acpTunisieCount
                        )));
                        $data['total_gzale'] = $data['total_gzale']+$gzaleCount;
                        $data['total_acp_tunisie'] = $data['total_acp_tunisie']+$acpTunisieCount;
                        $data['total_form_a_en'] = $data['total_form_a_en']+$formAEnCount;
                        $data['total_formule_a_fr'] = $data['total_formule_a_fr']+$formuleAFrCount;
                        $gzaleCount = 0;
                        $acpTunisieCount = 0;
                        $formAEnCount = 0;
                        $formuleAFrCount = 0;
                        $currentMonth = (int)date('m', strtotime($action->created_at));
                    }

                    $properties = $action->properties->toArray();
                    if ($properties['attributes']["status"] == 'SIGNED' && $properties['old']["status"] == 'PENDING') {
                        $data['total_certificates']++;
                        $data['signed_certificates']++;
                    } else if ($properties['attributes']["status"] == 'REJECTED' && $properties['old']["status"] == 'PENDING') {
                        $data['total_certificates']++;
                        $data['rejected_certificates']++;
                    }

                    if ($properties['attributes']["type"] == 'GZALE') $gzaleCount++;
                    if ($properties['attributes']["type"] == 'FORM-A-EN') $formAEnCount++;
                    if ($properties['attributes']["type"] == 'FORMULE-A-FR') $formuleAFrCount++;
                    if ($properties['attributes']["type"] == 'ACP-TUNISIE') $acpTunisieCount++;
                }
                
                array_push($array, (object)(array(
                    'month' => $currentMonth,
                    'GZALE' => $gzaleCount,
                    'FORM-A-EN' => $formAEnCount,
                    'FORMULE-A-FR' => $formuleAFrCount,
                    'ACP-TUNISIE' => $acpTunisieCount
                )));
                $data['total_gzale'] = $data['total_gzale']+$gzaleCount;
                $data['total_acp_tunisie'] = $data['total_acp_tunisie']+$acpTunisieCount;
                $data['total_form_a_en'] = $data['total_form_a_en']+$formAEnCount;
                $data['total_formule_a_fr'] = $data['total_formule_a_fr']+$formuleAFrCount;

                

                $data['gzale_rate'] = ($data['total_certificates'] != 0) ? ($data['total_gzale'] * 100) / $data['total_certificates'] : 0;
                $data['acp_tunisie_rate'] = ($data['total_certificates'] != 0) ? ($data['total_acp_tunisie'] * 100) / $data['total_certificates'] : 0;
                $data['form_a_en_rate'] = ($data['total_certificates'] != 0) ? ($data['total_form_a_en'] * 100) / $data['total_certificates'] : 0;
                $data['formule_a_fr_rate'] = ($data['total_certificates'] != 0) ? ($data['total_formule_a_fr'] * 100) / $data['total_certificates'] : 0;
                // dd($array);
                $data['certificates_morris_area'] = $array;
            } else {
                $certificates = DB::table('certificates')->get();
                $enterprises = DB::table('enterprises')->get();
                $products = DB::table('products')->get();
                $total_balance = $enterprises->sum('balance') + $certificates->where('status', '==', 'SIGNED')->count();
                $data = [
                    'current_balance' => $enterprises->sum('balance'),
                    'current_balance_rate' => $total_balance == 0 ? '0%' : number_format((float)(100 * $enterprises->sum('balance') / $total_balance), 2, '.', '') . '%',
                    'consumed_balance' => $certificates->where('status', '==', 'SIGNED')->count(),
                    'consumed_balance_rate' => $total_balance == 0 ? '0%' : number_format((float)(100 * $certificates->where('status', '==', 'SIGNED')
                        ->count() / $total_balance), 2, '.', '') . '%',
                    'total_balance' => $total_balance,
                    'total_certificates' => $certificates->count(),
                    'signed_certificates' => $certificates->where('status', '==', 'SIGNED')->count(),
                    'rejected_certificates' => $certificates->where('status', '==', 'REJECTED')->count(),
                    'total_requests' => $certificates->where('copy_type', '!=', 'NONE')->count(),
                    'total_products' => DB::table('products')->count(),
                    'total_packages' => DB::table('products_certificates')
                        ->whereIn('certificate_id', $certificates->where('status', '==', 'SIGNED')->pluck('id')->toArray())->sum('package_count'),
                    'total_importers' => DB::table('importers')->count(),
                    'total_countries' => DB::table('countries')
                        ->whereIn('id', DB::table('states')
                            ->whereIn('id', DB::table('importers')->pluck('state_id')->toArray())
                            ->pluck('country_id')->toArray())->distinct()->count(),
                    'total_products_weight' => $certificates->where('status', '!=', 'DRAFT')
                        ->where('status', '!=', 'REJECTED')->sum('net_weight'),
                    // Piechart
                    'total_gzale' => $certificates->where('type', '==', 'GZALE')->where('copy_type', '==', 'NONE')->count(),
                    'total_acp_tunisie' => $certificates->where('type', '==', 'ACP-TUNISIE')->where('copy_type', '==', 'NONE')->count(),
                    'total_form_a_en' => $certificates->where('type', '==', 'FORM-A-EN')->where('copy_type', '==', 'NONE')->count(),
                    'total_formule_a_fr' => $certificates->where('type', '==', 'FORMULE-A-FR')->where('copy_type', '==', 'NONE')->count(),
                ];

                $data['gzale_rate'] = ($data['total_certificates'] != 0) ? ($data['total_gzale'] * 100) / $data['total_certificates'] : 0;
                $data['acp_tunisie_rate'] = ($data['total_certificates'] != 0) ? ($data['total_acp_tunisie'] * 100) / $data['total_certificates'] : 0;
                $data['form_a_en_rate'] = ($data['total_certificates'] != 0) ? ($data['total_form_a_en'] * 100) / $data['total_certificates'] : 0;
                $data['formule_a_fr_rate'] = ($data['total_certificates'] != 0) ? ($data['total_formule_a_fr'] * 100) / $data['total_certificates'] : 0;
                $certificate = $certificates->sortBy('created_at')->first();

                $array = DB::select("select MONTH(created_at) as month,"
                    . "(select count(*) from certificates c1 where c1.`type` = 'GZALE' and MONTH(c1.created_at) = month) as GZALE,"
                    . "(select count(*) from certificates c2 where c2.`type` = 'FORM-A-EN' and MONTH(c2.created_at) = month) as 'FORM-A-EN',"
                    . "(select count(*) from certificates c2 where c2.`type` = 'FORMULE-A-FR' and MONTH(c2.created_at) = month) as 'FORMULE-A-FR',"
                    . "(select count(*) from certificates c3 where c3.`type` = 'ACP-TUNISIE' and MONTH(c3.created_at) = month) as 'ACP-TUNISIE'"
                    . " from certificates where copy_type = 'NONE' group BY month");

                array_unshift($array, (object)(array(
                    'month' => isset($certificate) ? (int)date('m', strtotime($certificate->created_at)) - 1 : '0',
                    'GZALE' => '0', 'FORM-A-EN' => '0', 'FORMULE-A-FR' => '0', 'ACP-TUNISIE' => '0'
                )));

                $data['certificates_morris_area'] = $array;
            }
            return view('dashboard', $data);
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
            Auth::user()->profile->update(['language' => $locale]);
            return redirect()->back();
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }
}
