<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>
    <style>
        html {
        }

        page {
            size: A4;
        }

        body {
            font-family: helvetica !important;
            font-size: 10pt;
            position: relative;
        }

        #page1 {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-position: center top;
            background-repeat: no-repeat;
            background-size: 100%;
            z-index: -1;
        }



        #postal-address {
        }

        #date {
            font-weight: bold;
        }

        #tables {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 0 !important;
        }

        #products td,
        #products th {
            text-align: center;
        }

        #products {
            border-collapse: collapse;
        }

        #code {
            font-weight: bold;
            position: absolute;
            padding-top: 120px;
            padding-left: 90px;
            height: 35px;
        }

        table th,
        table td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
        }

    </style>
    @if (App::currentLocale() == 'ar')
        <style>
            table th,
            table td {
                text-align: right;
            }

        </style>
    @endif
    <!-- Bootstrap CSS ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="css/normalize.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <div id="page-body">
        <div id="page1">
            <div id="code">
                <img src="img/logo/algerie-poste-logo-round.png"
                    style="width:100px;height:100px;border-radius: 50%;float:right;margin-right:114px;">
                <img src="img/logo/caci-logo-round.png" style="width:100px;height:100px;border-radius: 50%;float:left;">
            </div>
            <div id="tables">
                <div class="basic-form-area mg-b-15">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline12-list">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title text-center">
                                                {{ __('Payment Receipt Of The Operation') }}</h2>
                                            <h4 class="card-title text-center">{{ __('Operation Details') }}</h2>
                                                <table id="table" class="table table-bordered table-striped"
                                                    style="direction:rtl">
                                                    <tr>
                                                        <th colspan="2" style="background-color: #f9f9f9;">
                                                            {{ __('CACI') }}</th>
                                                        <th colspan="2" style="background-color: #f9f9f9;">
                                                            {{ __('POSTE') }}</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Payment ID') }}</td>
                                                        <td>{{ $id }}</td>
                                                        <td>{{ __('Order ID') }}</td>
                                                        <td>{{ $order_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: #f9f9f9;">
                                                            {{ __('Payment Type') }}</td>
                                                        <td style="background-color: #f9f9f9;">{{ __($type) }}</td>
                                                        <td style="background-color: #f9f9f9;">
                                                            {{ __('Cardholder Name') }}</td>
                                                        <td style="background-color: #f9f9f9;">
                                                            {{ $params['cardholderName'] ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Payment Status') }}</td>
                                                        <td>{{ __($status) }}</td>
                                                        <td>{{ __('PAN') }}</td>
                                                        <td>{{ $params['cardAuthInfo']['pan'] ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: #f9f9f9;">
                                                            {{ __('Payment Date') }}</td>
                                                        <td style="background-color: #f9f9f9;">{{ date('Y/m/d-H:m:s', strtotime($created_at)) }}</td>
                                                        <td style="background-color: #f9f9f9;">
                                                            {{ __('Order Status Description') }}</td>
                                                        <td style="background-color: #f9f9f9;">
                                                            {{ __($params['ErrorMessage'] ?? '') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Balance') }}</td>
                                                        <td>{{ $amount / $unit_price }}</td>
                                                        <td>{{ __('Amount') }}</td>
                                                        <td style="color: red">{{ $amount . __('DA') }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: #f9f9f9;">
                                                            {{ __('Old Balance') }}</td>
                                                        <td style="background-color: #f9f9f9;">
                                                            {{ Auth::User()->Enterprise->balance - $amount / $unit_price }}
                                                        </td>
                                                        <td style="background-color: #f9f9f9;"></td>
                                                        <td style="background-color: #f9f9f9;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('New Balance') }}</td>
                                                        <td style="color: red">
                                                            {{ Auth::User()->Enterprise->balance }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
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
</body>

</html>
