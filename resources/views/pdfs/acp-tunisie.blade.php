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

        #invoice {
            page-break-before: always;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-image: url({{ $invoice_path }});
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
            padding-left: 55px;
            padding-right: 55px;
            padding-top: 207px !important;
        }

        #tables1 {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 220px !important;
        }

        #tables2 {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 60px !important;
        }

        #tables3 {
            padding-left: 55px;
            padding-right: 55px;
            padding-top: 130px !important;
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
            padding-top: 52px;
            padding-left: 120px;
        }
        .parent {
            position: relative;
            top: 0;
            left: 0;
        }
        .file-image-round-stamp {
            position: absolute;
            height: 160px;
            margin-top: -150px;
        }
        .file-image-signature   {
            position: absolute;
            height: 180px;
            margin-top: -150px;
        }
        .file-image-square-stamp {
            position: absolute;
            height: 90px;
            margin-top: -50px;
        }
        .file-image-qrcode {
            position: absolute;
            margin-top: -151px;
            margin-bottom: 89px;
            margin-right: -320px;
            height: 63px;
            width: 63px;
        }

        .sign-page3 {
            position: absolute;
            top: 0;
            left: 0;
        }
        .file-image-round-stamp1 {
            position: absolute;
            height: 160px;
            margin-top: 150px;
        }
        .file-image-signature1   {
            position: absolute;
            height: 180px;
            margin-top: -150px;
        }
        .file-image-square-stamp1 {
            position: absolute;
            height: 90px;
            margin-top: -50px;
        }
    </style>

    @if ($template == 0)
        <style>
            #page1 {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                z-index: -1;
            }

            #page2 {
                page-break-before: always;
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                z-index: -1;
            }

            #page3 {
                page-break-before: always;
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                z-index: -1;
            }

        </style>
    @else
        <style>
            #page1 {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background-image: url({{ $page1 }});
                background-position: center top;
                background-repeat: no-repeat;
                background-size: 100%;
                z-index: -1;
            }

            #page2 {
                page-break-before: always;
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background-image: url({{ $page2 }});
                background-position: center top;
                background-repeat: no-repeat;
                background-size: 100%;
                z-index: -1;
            }

            #page3 {
                page-break-before: always;
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background-image: url({{ $page3 }});
                background-position: center top;
                background-repeat: no-repeat;
                background-size: 100%;
                z-index: -1;
            }

        </style>
    @endif

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <div id="page-body">
        <div id="page1">
            <div id="tables">
                <table style="width:100%;padding-top:200px!important;">
                    <tr>
                        <td width="50%"
                            style="height: 38px;margin-left:5px!important;margin-right:5px!important;text-align:center;font-weight: bold;">
                            @if($template != '0')
                            {{ '№ '. $code }}
                            @endif
                        </td>
                        <td rowspan="2" width="50%" style="font-weight: bold;text-align:center;">
                            {{ $exporter_name }}<br />
                            {{ $exporter_address }}
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="height: 38px;font-weight: bold;{{ $rtl ? 'text-align:right;' : '' }}">
                            @if($template == '0' && ($status == 'PENDING' || $status == 'SIGNED'))
                            <img class="file-image-qrcode" src="{{ $qrcode_url }}" alt="your image" />
                            @endif
                        </td>
                    </tr>
                </table>
                <table style="width:100%;padding-top:22px;">
                    <tr>
                        <td width="24%" style="height: 20px;">
                        </td>
                        <td width="26%" style="{{ $rtl ? 'text-align:right;' : '' }}">
                        </td>
                        <td rowspan="2" width="50%" style="font-weight: bold;text-align:center;">
                            {{ $importer_name }}<br />
                            {{ $importer_address }}
                        </td>
                    </tr>
                    <tr>
                        <td width="24%" style="height: 38px;font-weight: bold;text-align:left;padding-right:10px;">
                            <strong>{{ Lang::get($original_country, [], 'ar') }}</strong>
                        </td>
                        <td width="26%"
                            style="margin-left:10px;height: 38px;font-weight: bold;text-align:left;padding-right:10px;">
                            <strong>{{ Lang::get($destination_country, [], 'ar') }}</strong>
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:19px;">
                    <tr>
                        <td width="50%" style="height: 38px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ $copy_type == 'NONE' ? $notes : ($rtl ? $original_code . $notes : $notes . $original_code) }}
                        </td>
                        <td width="50%"
                            style="{{ $rtl ? 'text-align:right;text-align:center;' : '' }}font-weight: bold;">
                            {{ __($shipment_type) }}</td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:21px;">
                    <tr>
                        <td width="19%"
                            style="font-size:11px;height: 360px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ $rtl ? 'رقم الفاتورة' : 'Invoice Number' }}<br />
                            {{ $invoice_number }}<br />
                            {{ $rtl ? 'تاريخ الفاتورة' : 'Invoice Date' }}<br />
                            {{ $invoice_date }}
                        </td>
                        <td width="17%"
                            style="font-size:11px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ $rtl ? 'الوزن الصافي' : 'Net Weight' }}<br />
                            {{ $rtl ? $net_weight . 'كغ' : $net_weight . 'KG' }}<br />
                            {{ $rtl ? 'الوزن القائم' : 'Real Weight' }}<br />
                            {{ $rtl ? $real_weight . 'كغ' : $real_weight . 'KG' }}<br />
                        </td>
                        <td width="64%" style="padding:5px;{{ $rtl ? 'text-align:right;' : '' }}">
                            <table width="100%" id="products" style="" {{ $rtl ? 'dir=rtl' : '' }}
                                style="font-size: 12px;">
                                <tr>
                                    <th>{{ __('Number') }}</th>
                                    <th>{{ __('Product Name') }}</th>
                                    <th>{{ __('Package Type') }}</th>
                                    <th>{{ __('Package Weight (KG)') }}</th>
                                    <th>{{ __('Package Count') }}</th>
                                    <th>{{ __('Description') }}</th>
                                </tr>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->number }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->package_type_name }}</td>
                                        <td>{{ $product->package_quantity }}</td>
                                        <td>{{ $product->package_count }}</td>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:18px;">
                    <tr>
                        <td width="33.5%" style="text-align:right;height: 233px;"></td>
                        <td width="34%" style="text-align:right;">
                            @if ($status == 'SIGNED')
                                <table style="width:100%;margin-top:4px;">
                                    <tr>
                                        <td width="70%" style="height: 55px;margin-top:-10px;text-align:center">
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="70%" style="height: 60px;">
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="70%" style="text-align:left;height: 20px;">

                                            <strong></strong>
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                </table>
                            @endif
                        </td>
                        <td width="32.5%" style="text-align:right;">
                            @if ($status == 'PENDING' || $status == 'SIGNED')
                            @if ($template != 0)
                                <table style="width:100%;margin-top:30px;">
                                    <tr>
                                        <td width="35%" style="height: 55px;text-align:center;">
                                            <strong>{{ $signature_date }}</strong>
                                        </td>
                                        <td width="65%" style="{{ $rtl ? 'text-align:center;' : '' }}">
                                            <strong>{{ 'الجزائر' }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="height: 60px;font-weight: bold;"></td>
                                        <td width="65%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="100%" colspan="2" style="text-align:center;height: 20px;">
                                        </td>
                                    </tr>
                                </table>
                                @else
                                <table style="width:100%;margin-top:30px;">
                                    <tr>
                                        <td width="35%" style="height: 55px;text-align:center;">
                                            <strong>{{ $signature_date }}</strong>
                                        </td>
                                        <td width="65%" style="{{ $rtl ? 'text-align:center;' : '' }}">
                                            <strong>{{ 'الجزائر' }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="height: 60px;font-weight: bold;"></td>
                                        <td width="65%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="100%" colspan="2" style="text-align:center;height: 20px;">
                                            <div class="parent">
                                                <img class="file-image-round-stamp" src="{{ (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . 
                                                Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . 
                                                Auth::user()->Profile->round_stamp }}" alt="your image" />
                                                <img class="file-image-square-stamp" src="{{ (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . 
                                                Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . 
                                                Auth::user()->Profile->square_stamp }}" alt="your image" />
                                                <img class="file-image-signature" src="{{ (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . 
                                                Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . 
                                                Auth::user()->Profile->signature }}" alt="your image"/>
                                              </div>
                                        </td>
                                    </tr>
                                </table>
                                @endif
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="page2">
        </div>
        <div id="page3">
            <div id="code">
                @if($template != '0')
                <label>{{ '№ '. $code }}</label>
                @endif
            </div>
            <div id="tables1">
                <table style="width:88%;padding-bottom:100px!important;margin-left:auto;margin-right:auto;">
                    <tr>
                        <td width="5%"></td>
                        <td width="90%"
                            style="padding-left:15px!important;padding-right:15px!important;height: 100px;{{ $rtl ? 'text-align:right;' : '' }}">
                            {{ $integrity_rate . ' ' . ($rtl ? 'منتوج جزائري' : 'Algerian product') }}<br />
                        </td>
                        <td width="5%"></td>
                    </tr>
                </table>
            </div>
            <div id="tables2">
                <table style="width:88%;margin-top:-200px!important;margin-left:auto;margin-right:auto;">
                    <tr>
                        <td width="5%"></td>
                        <td width="90%"
                            style="padding-left:15px!important;padding-right:15px!important;height: 70px;{{ $rtl ? 'text-align:right;' : '' }}">
                            {{ $rtl ? 'رقم الفاتورة' : 'Invoice Number' }}
                            {{ $invoice_number }}<br />
                            {{ $rtl ? 'تاريخ الفاتورة' : 'Invoice Date' }}
                            {{ $invoice_date }}
                        </td>
                        <td width="5%"></td>
                    </tr>
                </table>
            </div>
            <div id="tables3">
                <table style="width:88%;margin-left:auto;margin-right:auto;">
                    <tr>
                        <td width="25%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 30px;{{ $rtl ? 'text-align:right;' : '' }}">
                            @if ($template == 0 && ($status == 'PENDING' || $status == 'SIGNED'))
                            <div class="sign-page3">
                                <img class="file-image-round-stamp1" src="{{ (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . 
                                Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . 
                                Auth::user()->Profile->round_stamp }}" alt="your image" />
                                <img class="file-image-square-stamp1" src="{{ (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . 
                                Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . 
                                Auth::user()->Profile->square_stamp }}" alt="your image" />
                                <img class="file-image-signature1" src="{{ (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . 
                                Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . 
                                Auth::user()->Profile->signature }}" alt="your image"/>
                              </div>
                            @endif
                        </td>
                        <td width="27%" style="margin-left:5px!important;margin-right:5px!important;text-align:center;">

                            @if ($status == 'PENDING' || $status == 'SIGNED')
                                <strong>{{ $signature_date }}</strong>
                            @endif
                        </td>
                        <td width="5%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 30px;{{ $rtl ? 'text-align:center;' : '' }}">

                        </td>
                        <td width="40%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 30px;{{ $rtl ? 'text-align:center;' : '' }}">
                            <strong>{{ 'الجزائر' }}</strong>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @if ($invoice)
            <div id="invoice">
            </div>
        @endif
    </div>
</body>

</html>
