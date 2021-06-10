<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        // $locale = App::currentLocale();
        $locale = Auth::user()->profile->language;

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

            $data['certificates_morris_area'] = DB::select("select MONTH(created_at) as month,"
                . "(select count(*) from certificates c1 where c1.`type` = 'GZALE' and MONTH(c1.created_at) = month) as GZALE,"
                . "(select count(*) from certificates c2 where c2.`type` = 'FORM-A-EN' and MONTH(c2.created_at) = month) as 'FORM-A-EN',"
                . "(select count(*) from certificates c2 where c2.`type` = 'FORMULE-A-FR' and MONTH(c2.created_at) = month) as 'FORMULE-A-FR',"
                . "(select count(*) from certificates c3 where c3.`type` = 'ACP-TUNISIE' and MONTH(c3.created_at) = month) as 'ACP-TUNISIE'"
                . " from certificates where enterprise_id = 1 and copy_type = 'NONE' group BY month");
        } else {
            $data = [
                'current_balance' => '0',
                'current_balance_rate' => '0%',
                'consumed_balance' => '0',
                'consumed_balance_rate' => '0%',
                'total_balance' => '0',
                'total_certificates' => '0',
                'signed_certificates' => '0',
                'rejected_certificates' => '0',
                'total_requests' => '0',
                'total_products' => '0',
                'total_products_weight' => '0',
                'total_importers' => '0',
                'total_countries' => '0',
                'gzale_rate' => '0',
                'acp_tunisie_rate' => '0',
                'formule_a_fr_rate' => '0',
                'form_a_en_rate' => '0',
                'morris_area' => '0',


            ];
        }
        return view('dashboard', $data);
    }

    public function setlocale($locale)
    {
        App::setlocale($locale);
        session()->put('locale', $locale);
        Auth::user()->profile->update(['language' => $locale]);
        return redirect()->back();
    }
}
