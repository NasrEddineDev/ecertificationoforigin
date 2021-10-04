<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Enterprise;
use App\Models\Request as ModelsRequest;
use App\Models\Setting;
use PDF;
use File;
use Storage;
use GuzzleHttp\Client;
use App\Providers\NewPaymentEvent;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $current_balance = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->balance : '';
            $payments = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->payments->sortByDesc('created_at') : Payment::all()->sortByDesc('created_at');
            return view('payments.index', compact('payments'), compact('current_balance'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            $enterprises = Enterprise::all();
            return view('payments.create', compact('enterprises'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $payment = new Payment([
                'amount' => $request->input('amount'),
                'date' => date('Y-m-d H:m:s'),
                'mode' => $request->input('mode'),
                'type' => $request->input('type'),
                'status' => 'ACCEPTED',
                'document' => '',
                'description' => $request->input('description') ? $request->input('category') : '',
                'enterprise_id' => $request->input('enterprise_id')
            ]);

            $payment->save();

            event(new EnterprisePendingEvent($enterprise));

            if ($payment->mode == 'CREDIT')
                $payment->Enterprise->update(['balance' => $payment->Enterprise->balance + $payment->amount]);
            else
                $payment->Enterprise->update(['balance' => $payment->Enterprise->balance - $payment->amount]);

            if ($file = $request->file('invoice')) {
                $destinationPath = 'enterprises/' . $request->input('enterprise_id') . '\/payments/';
                $fileName = $payment->id . '_' . date('Y-m-d H:m:s') . '.' . $file->getClientOriginalExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                $payment->Enterprise->update(['document' => $fileName]);
            }

            return redirect()->route('payments.index')
                ->with('success', 'Payment created successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     try {
    //         $payment = Payment::find($id);
    //         return view('payments.show', compact('payment'));
    //     } catch (Throwable $e) {
    //         report($e);
    //         Log::error($e->getMessage());

    //         return false;
    //     }
    // }

    public function show($id)
    {
        try {
            $payment = Payment::find($id);
            if ($payment) {
                $settings = Setting::all();
                $unit_price = $settings->where('name', 'Unit Price')->first();
                $username_poste = $settings->where('name', 'Username Poste')->first();
                $password_poste = $settings->where('name', 'Password Poste')->first();
                $order_status_url_poste = $settings->where('name', 'Order Status Extended Url Poste')->first();

                $client = new Client(['base_uri' => $order_status_url_poste->value]);
                $params['form_params'] = [
                    "userName" => $username_poste->value,
                    "password" => $password_poste->value,
                    "language" => "en",
                    'orderId' => $payment->order_id,
                ];
                $response = $client->post($order_status_url_poste->value, $params);
                $params = json_decode((string)$response->getBody(), true);
                // dd($params);
                return view('payments.payment-receipt-balance-poste', compact(['payment', 'params', 'unit_price']));
            }

            $current_balance = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->balance : '';
            $payments = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->payments : Payment::all();
            return view('payments.index', compact(['payments', 'current_balance']));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {
            $payment = Payment::find($id);
            return view('payments.edit', compact('payment'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            //
            $payment = Payment::find($id);
            $payment->name = $request->input('name');
            $payment->order_number = $request->input('order_number');
            $payment->brand = $request->input('brand');
            $payment->type = $request->input('type');
            $payment->category = $request->input('category');
            $payment->hs_code = $request->input('hs_code');
            $payment->net_weight = $request->input('net_weight');
            $payment->real_weight = $request->input('real_weight');
            $payment->description = $request->input('description');
            $payment->package_type = $request->input('package_type');
            $payment->package_count = $request->input('package_count');
            $payment->measure_unit = 'Kg';
            $payment->save();

            return redirect()->route('payments.index')
                ->with('success', 'Payment updated successfully');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $payment = Payment::find($id);
            if ($payment) {
                if ($payment->mode == 'ACCEPTED') {
                    if ($payment->mode == 'CREDIT')
                        $payment->Enterprise->update(['balance' => $payment->Enterprise->balance - $payment->amount]);
                    else
                        $payment->Enterprise->update(['balance' => $payment->Enterprise->balance + $payment->amount]);
                }
                $payment->delete();
                return response()->json([
                    'message' => 'Payment deleted successfully'
                ], 200);
            }

            return response()->json([
                'message' => 'Payment not found'
            ], 404);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
        // return redirect()->route('payments.index')->with('success','Payment deleted successfully');
    }

    public function getPayments()
    {
        //

        try {
            $data = [];
            $payments = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->payments : Payment::all();
            // $query = users::where('id', 1)->get();// Let's Map the results from [$query]
            $payments = $payments->map(function ($items) {
                $data['value'] = $items->id;
                $data['text'] = $items->name . ' ' . $items->brand;
                return $data;
            });

            return response()->json(['payments' => $payments]); //->select('id AS value', 'name AS text')]);//->pluck('id' as 'value', 'name' . ' '. 'brand' as 'text')], 404);
            // return redirect()->route('payments.index')->with('success','Payment deleted successfully');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function createBalancePoste()
    {
        //
        try {
            $settings = Setting::all();
            // $offers_list = $settings->where('name', 'Offers List');
            return view('payments.create-balance-poste', compact('settings'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function storeBalancePoste(Request $request)
    {
        try {
            $settings = Setting::all();
            $unit_price = $settings->where('name', 'Unit Price')->first();
            $username_poste = $settings->where('name', 'Username Poste')->first();
            $password_poste = $settings->where('name', 'Password Poste')->first();
            $order_registration_url_poste = $settings->where('name', 'Order Registration Url Poste')->first();

            $amount = ($request->offer != 0 ? $request->offer : $request->other_offer) * $unit_price->value;
            $payment = new Payment([
                'amount' => $amount,
                "current_balance" => Auth::User()->Enterprise->balance,
                'date' => date('Y-m-d H:m:s'),
                'mode' => 'CREDIT',
                'type' => 'DHAHABIA',
                'status' => 'DRAFT',
                'document' => '',
                'order_id' => '',
                'description' => '',
                'enterprise_id' => Auth::user()->enterprise->id
            ]);

            $payment->save();

            // event(new NewPaymentEvent($payment));

            $client = new Client(['base_uri' => $order_registration_url_poste->value]);
            $params['form_params'] = [
                "amount" => $amount * 100,
                "currency" => "012",
                "language" => "en",
                'orderNumber' => $payment->id . $payment->date,
                "userName" => $username_poste->value,
                "password" => $password_poste->value,
                "returnUrl" => route('payments.return', $payment->id),
            ];
            $response = $client->post($order_registration_url_poste->value, $params);
            $params = json_decode((string)$response->getBody(), true);
            $payment->update(['order_id' => $params['orderId']]);

            return redirect()->to($params['formUrl']);


            return view('payments.create-balance-poste', compact('settings'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function returnBalancePoste($id)
    {
        try {
            $payment = Payment::find($id);
            if ($payment) {
                $settings = Setting::all();
                $unit_price = $settings->where('name', 'Unit Price')->first();
                $username_poste = $settings->where('name', 'Username Poste')->first();
                $password_poste = $settings->where('name', 'Password Poste')->first();
                $order_status_url_poste = $settings->where('name', 'Order Status Extended Url Poste')->first();

                $client = new Client(['base_uri' => $order_status_url_poste->value]);
                $params['form_params'] = [
                    "userName" => $username_poste->value,
                    "password" => $password_poste->value,
                    "language" => "en",
                    'orderId' => $payment->order_id,
                ];
                $response = $client->post($order_status_url_poste->value, $params);
                $params = json_decode((string)$response->getBody(), true);
                // dd($params);
                if ($params['orderStatus'] == 2) {
                    $payment->update(['status' => 'ACCEPTED']);
                    Auth::User()->Enterprise->update(['balance' => Auth::User()->Enterprise->balance + ($payment->amount / $unit_price->value)]);
                }
                else if ($params['paymentAmountInfo']['paymentState'] == 'DECLINED'){
                    $payment->update(['status' => 'REJECTED']);
                }
                return view('payments.payment-receipt-balance-poste', compact(['payment', 'params', 'unit_price']));
            }

            $current_balance = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->balance : '';
            $payments = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->payments : Payment::all();
            return view('payments.index', compact(['payments', 'current_balance']));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function download($id)
    {
        try {
            $payment = Payment::find($id);
            if ($payment) {
                $settings = Setting::all();
                $unit_price = $settings->where('name', 'Unit Price')->first();
                $username_poste = $settings->where('name', 'Username Poste')->first();
                $password_poste = $settings->where('name', 'Password Poste')->first();
                $order_status_url_poste = $settings->where('name', 'Order Status Url Poste')->first();

                $client = new Client(['base_uri' => $order_status_url_poste->value]);
                $params['form_params'] = [
                    "userName" => $username_poste->value,
                    "password" => $password_poste->value,
                    "language" => "en",
                    'orderId' => $payment->order_id,
                ];
                $response = $client->post($order_status_url_poste->value, $params);
                $params = json_decode((string)$response->getBody(), true);
                if ($params['ErrorMessage'] == 'Success' && $payment->status == 'ACCEPTED') {
                    $payment->params = $params;
                    $payment->unit_price = $unit_price->value;
                    $pdf = PDF::loadView('pdfs.payment-receipt-poste', $payment, [], [
                        'title' => 'Another Title',
                        'margin_left' => 0,
                        'margin_right' => 0,
                        'margin_top' => 0,
                        'margin_bottom' => 0,
                        'display_mode' => 'fullpage',
                    ]);
                    $pdf->showImageErrors = true;
                    return $pdf->stream('payment-receipt-poste-'.$id.'.pdf');
                }

            }
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    public function print($id)
    {
        try {
            $payment = Payment::find($id);
            if ($payment) {
                $settings = Setting::all();
                $unit_price = $settings->where('name', 'Unit Price')->first();
                $username_poste = $settings->where('name', 'Username Poste')->first();
                $password_poste = $settings->where('name', 'Password Poste')->first();
                $order_status_url_poste = $settings->where('name', 'Order Status Url Poste')->first();

                $client = new Client(['base_uri' => $order_status_url_poste->value]);
                $params['form_params'] = [
                    "userName" => $username_poste->value,
                    "password" => $password_poste->value,
                    "language" => "en",
                    'orderId' => $payment->order_id,
                ];
                $response = $client->post($order_status_url_poste->value, $params);
                $params = json_decode((string)$response->getBody(), true);
                if ($params['ErrorMessage'] == 'Success' && $payment->status == 'ACCEPTED') {
                    $payment->params = $params;
                    $payment->unit_price = $unit_price->value;
                    $pdf = PDF::loadView('pdfs.payment-receipt-poste', $payment, [], [
                        'title' => 'Another Title',
                        'margin_left' => 0,
                        'margin_right' => 0,
                        'margin_top' => 0,
                        'margin_bottom' => 0,
                        'display_mode' => 'fullpage',
                    ]);
                    $pdf->showImageErrors = true;
                    return $pdf->Output();
                }

            }
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }
}
