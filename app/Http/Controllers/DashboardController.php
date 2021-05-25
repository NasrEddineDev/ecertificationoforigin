<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware(['auth','verified', 'information.verified']);
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

        if (Auth::user()->Role->name == "user"){
        $data = [
            'current_balance' => Auth::User()->Enterprise->balance,
            'current_balance_rate' => (100 * Auth::User()->Enterprise->balance/(Auth::User()->Enterprise->balance + 
                                      Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count())).'%',
            'consumed_balance' => Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count(),
            'consumed_balance_rate' => (100 * Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count()/(Auth::User()->Enterprise->balance + 
                                      Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count())).'%',
            'total_balance' => Auth::User()->Enterprise->balance + 
                                  Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count(),
            'total_certificates' => Auth::User()->Enterprise->certificates()->count(),
            'signed_certificates' => Auth::User()->Enterprise->certificates->where('status', '==', 'SIGNED')->count(),
            'rejected_certificates' => Auth::User()->Enterprise->certificates->where('status', '==', 'REJECTED')->count(),
        ];
        }
        else {
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

    public function setlocale($locale){
        App::setlocale($locale);
        session()->put('locale', $locale);
        Auth::user()->profile->update(['language' => $locale]);
        return redirect()->back();
    }
}
