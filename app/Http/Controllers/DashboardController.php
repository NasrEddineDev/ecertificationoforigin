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
                'current_balance_rate' => (100 * Auth::User()->Enterprise->balance / (Auth::User()->Enterprise->balance +
                    Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count())) . '%',
                'consumed_balance' => Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count(),
                'consumed_balance_rate' => (100 * Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count() / (Auth::User()->Enterprise->balance +
                    Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count())) . '%',
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
                // 'total_prices' =>
                // 'total_prices/product' =>
                // 'package_types' =>

                //Auth::User()->Enterprise->products()->pivot->package_count->sum(),
                //$this->products()->sum(DB::raw('products.weight * quantity'));
                'total_importers' => Auth::User()->Enterprise->importers()->count(),
                'total_countries' => DB::table('countries')
                    ->whereIn('id', DB::table('states')
                        ->whereIn('id', Auth::User()->Enterprise->importers->pluck('state_id')->toArray())
                        ->pluck('country_id')->toArray())->distinct()->count(),
                //             Auth::User()->Enterprise->certificates()
                // ->where('status', '==', 'SIGNED')->pluck('id')->toArray())
                //  Auth::User()->Enterprise->importers->state->select('country_id')->distinct()->count(),
                'total_products_weight' => Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->sum('net_weight'),
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
            $data['gzale_rate'] = ($data['total_certificates'] != 0) ? $data['total_gzale'] / $data['total_certificates'] : 0;
            $data['acp_tunisie_rate'] = ($data['total_certificates'] != 0) ? $data['total_acp_tunisie'] / $data['total_certificates'] : 0;
            $data['form_a_en_rate'] = ($data['total_certificates'] != 0) ? $data['total_form_a_en'] / $data['total_certificates'] : 0;
            $data['formule_a_fr_rate'] = ($data['total_certificates'] != 0) ? $data['total_formule_a_fr'] / $data['total_certificates'] : 0;
            $selected_attribute = Auth::User()->Enterprise->certificates()->selectRaw('month(created_at) as month, type')->where('copy_type', '==', 'NONE')->get();
            // dd($selected_attribute);
            $certificates_morris_area = ($selected_attribute) ? '' : 
                                            $selected_attribute->select(DB::raw('month, type, count(*) as certificate_count'))
                                            // Auth::User()->Enterprise->certificates->select(DB::raw('month(created_at) as 
                                            // month, type, count(*) as certificate_count'))
                                            // ->where('copy_type', '==', 'NONE')
                                            ->groupBy('month, type')
                                            ->get();
            
            // ->select('created_at', 'type', DB::raw('count(*)'))
            // ->groupBy('data', 'agenda_id')
            // ->get();
            
            // Auth::User()->Enterprise->certificates->where('copy_type', '==', 'NONE')->groupBy('type')->map->count();
            $data['morris_area'] = ($selected_attribute) ? '' : $certificates_morris_area->map(function ($item, $key) {
                // $result['month']              = $certificates_morris_area->;
                // $address['a_new_attribute'] = $input['a_new_attribute'];
                // return $result;
                return [
                    'month' => $item->month,
                    'GZALE' => $item->where('type', '==', 'GZALE')->where('month', '==', $item->month)->first()->certificate_count,
                    'ACP_TUNISIE' => $item->where('type', '==', 'ACP-TUNISIE')->where('month', '==', $item->month)->first()->certificate_count,
                    'FORM_A_EN' => $item->where('type', '==', 'FORM-A-EN')->where('month', '==', $item->month)->first()->certificate_count,
                    'FORMULE_A_FR' => $item->where('type', '==', 'FORMULE-A-FR')->where('month', '==', $item->month)->first()->certificate_count,
                ];
            });
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
