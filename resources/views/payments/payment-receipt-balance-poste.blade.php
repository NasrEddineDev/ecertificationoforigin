@extends('layouts.mainlayout')


@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('image-picker/image-picker.css') }}" />
    <style>
        .error {
            color: #FF0000;
        }

        .warning {
            color: red;
        }

        input.error {
            border: 1px solid red !important;
        }

        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile+label {
            max-width: 100% !important;
            width: 100% !important;
            height: 80%;
        }

        .invoice_date {
            padding-left: 5px;
            padding-right: 0px;
        }

        .invoice_number {
            padding-right: 0px;
        }

        #invoice+label {
            padding: 0.25rem 1rem;
        }

        .image_picker_image {
            max-width: 140px;
            max-height: 100px;
            background-color: #FF0000;
        }

    </style>
@endpush

@section('content')

    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-center">{{ __('Payment Receipt') }}</h2>
                                <h4 class="card-title text-center">{{ __('Your Payment Was Accepted') }}</h2>
                                <h4 class="card-title text-center">{{ __('Operation Details') }}</h2>
                                <table id="table" class="table table-bordered table-striped">
                                    <tr>
                                      <th colspan="2">{{__('CACI')}}</th>
                                      <th colspan="2">{{__('POSTE')}}</th>
                                    </tr>
                                    <tr>
                                      <td>{{__('Payment ID')}}</td>
                                      <td>{{$payment->id}}</td>
                                      <td>{{__('Order ID')}}</td>
                                      <td>{{$payment->order_id}}</td>
                                    </tr>
                                    <tr>
                                      <td>{{__('Payment Type')}}</td>
                                      <td>{{__($payment->type)}}</td>
                                      <td>{{__('Cardholder Name')}}</td>
                                      <td>{{$params['cardholderName']}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Payment Status')}}</td>
                                        <td>{{__($payment->status)}}</td>
                                      <td>{{__('Pan')}}</td>
                                      <td>{{$params['Pan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Payment Date')}}</td>
                                        <td>{{$payment->created_at}}</td>
                                      <td>{{__('Order Status Description')}}</td>
                                      <td>{{__($params['ErrorMessage'])}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Balance')}}</td>
                                        <td>{{$payment->amount/$unit_price->value}}</td>
                                      <td>{{__('Amount')}}</td>
                                      <td style="color: red">{{$payment->amount.__('DA')}} </td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Old Balance')}}</td>
                                        <td>{{Auth::User()->Enterprise->balance - ($payment->amount/$unit_price->value)}}</td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                        <td>{{__('New Balance')}}</td>
                                        <td style="color: red">{{Auth::User()->Enterprise->balance}}</td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                  </table>
                                  
                                  <div class="form-group-inner">
                                    <div class="login-btn-inner">
                                        <div class="row">
                                            <div class="col-lg-2" style="float: none;margin: 0 auto;">
                                                <div class="login-horizental cancel-wp form-bc-ele">
                                                    <button type="button" class="btn btn-white">
                                                        <a href="{{ route('payments.index') }}"
                                                            style="color: inherit;">{{ __('Go To Payments List') }}</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@Push('js')
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script src="{{ URL::asset('image-picker/image-picker.min.js') }}"></script>
@endpush
