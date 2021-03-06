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
            padding-left: 62px;
            padding-right: 65px;
            padding-top: 105px !important;
        }

        #tables1 {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 300px !important;
        }

        #tables2 {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 60px !important;
        }

        #tables3 {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 244px !important;
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
            padding-top: 77px;
            padding-left: 90px;
            height: 35px;
        }

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

        .parent {
            position: relative;
            top: 0;
            left: 0;
        }

        .file-image-round-stamp {
            position: absolute;
            height: 184px;
            width: 184px;
            padding-top: -25px;
        }

        .file-image-signature {
            position: absolute;
            height: 190px;
            margin-top: -140px;
            padding-bottom: -45px;
        }

        .file-image-square-stamp {
            position: absolute;
            height: 100px;
            margin-top: -40px;
            padding-bottom: -45px;
        }

        .file-image-qrcode {
            position: absolute;
            margin-top: -145px;
            margin-bottom: 110px;
            margin-right: 10px;
            height: 63px;
            width: 63px;
        }

        .parent1 {
            position: relative;
            top: 0;
            left: 0;
        }

        .file-image-round-stamp1 {
            position: absolute;
            height: 188px;
            margin-top: -130px;
        }

        .file-image-signature1 {
            position: absolute;
            height: 190px;
            margin-top: -250px;
            margin-bottom: 100px;
        }

        .file-image-square-stamp1 {
            position: absolute;
            height: 100px;
            margin-top: -50px;
        }

        .sign-page3 {
            position: absolute;
            top: 0;
            left: 0;
        }

        .file-image-round-stamp3 {
            position: absolute;
            height: 160px;
            margin-top: -5px;
        }

        .file-image-signature3 {
            position: absolute;
            height: 180px;
            margin-top: -150px;
        }

        .file-image-square-stamp3 {
            position: absolute;
            height: 90px;
            margin-top: -50px;
        }

    </style>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <div id="page-body">
        <div id="page1">
            <div id="code">
                @if ($status == 'SIGNED' && !$is_digitally_signed)
                    <label>{{ $dri_signature_date }}</label>
                @endif
            </div>
            <div id="tables">
                <table style="width:100%;padding-top:150px!important;">
                    <tr>
                        <td width="50%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 60px;text-align:center;font-weight: bold;">
                            {{ $producer_name }}<br />
                            {{ $producer_address }}
                        </td>
                        <td width="50%" style="font-weight: bold;text-align:center;">
                            {{ $exporter_name }}<br />
                            {{ $exporter_address }} @if ($status == 'PENDING' || $status == 'SIGNED')
                                <img class="file-image-qrcode" src="{{ $qrcode_url }}" alt="your image" />
                            @endif
                        </td>
                    </tr>
                </table>
                <table style="width:100%;padding-top:20px;">
                    <tr>
                        <td width="28%" style="height: 70px;">
                            <table style="width:100%;padding-right:7px;">
                                <tr>
                                    <td width="90%" style="height:25px;">
                                    </td>
                                    <td width="10%">
                                        @if ($accumulation == 'Yes')
                                        <strong style="text-align:right;padding-right:5px;font-size:18px;">
                                                X
                                            </strong>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="90%" style="height:23px;">
                                        @if ($accumulation == 'Yes')
                                            <strong style="padding-right:10px;">
                                                {{ $accumulation_country.'Algeria' }}
                                            </strong>
                                        @endif
                                    </td>
                                    <td width="10%">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="90%" style="height:23px;">
                                    </td>
                                    <td width="10%" style="margin-right:2px;">
                                        @if ($accumulation == 'No')
                                            <strong style="text-align:right;padding-right:5px;font-size:18px;">
                                                X
                                            </strong>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="22%" style="text-align:center;">
                            <strong style="{{ $accumulation == 'Yes' ? 'top:10' : 'right:10' }}">
                                {{ $original_country }}
                            </strong>
                        </td>
                        <td width="50%" style="font-weight: bold;text-align:center;">
                            {{ $importer_name }}<br />
                            {{ $importer_address }}
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:13px;">
                    <tr>
                        <td width="55.5%"
                            style="height: 77px;text-align:center;font-weight: bold;">
                            {{ $copy_type == 'NONE' ? $notes : ($rtl ? $original_code . $notes : $notes . $original_code) }}
                        </td>
                        <td width="44.5%" style="text-align:center;font-weight: bold;font-size:18px;">
                            {{ __($shipment_type) }}</td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:16px;">
                    <tr>
                        <td width="10.4%"
                            style="font-size:11px;height: 389px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ $rtl ? '?????? ????????????????' : 'Invoice Number' }}<br />
                            {{ $invoice_number }}<br />
                            {{ $rtl ? '?????????? ????????????????' : 'Invoice Date' }}<br />
                            {{ $invoice_date }}
                        </td>
                        <td width="13.6%"
                            style="font-size:11px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ $rtl ? '?????????? ????????????' : 'Net Weight' }}<br />
                            {{ $rtl ? $net_weight . '????' : $net_weight . 'KG' }}<br />
                            {{ $rtl ? '?????????? ????????????' : 'Real Weight' }}<br />
                            {{ $rtl ? $real_weight . '????' : $real_weight . 'KG' }}<br />
                        </td>
                        <td width="76%" style="{{ $rtl ? 'text-align:right;' : '' }}">
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
                                        <td>{{ __($product->package_type_name) }}</td>
                                        <td>{{ $product->package_quantity }}</td>
                                        <td>{{ $product->package_count }}</td>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:10px;">
                    <tr>
                        <td width="33.5%" style="text-align:right;height: 205px;"></td>
                        <td width="34.5%" style="text-align:right;">
                            @if ($status == 'SIGNED')
                                <table style="width:100%;margin-top:70px;padding-left:63px;">
                                    <tr>
                                        <td width="70%" style="height: 60px;text-align:center">
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="70%" style="height: 65px;">
                                            <div class="parent1">
                                                <img class="file-image-round-stamp1" src="{{ $dri_round_stamp }}" alt="your image" />
                                                <img class="file-image-square-stamp1" src="{{ $dri_square_stamp }}" alt="your image" />
                                                <img class="file-image-signature1" src="{{ $dri_signature }}" alt="your image" />
                                            </div>
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="70%" style="font-size:18px;text-align:right;vertical-align:top;height: 10px;padding-top:-100px;padding-right:-30px;">
                                            @if (!$is_digitally_signed)
                                                <br /> <strong>{{ $dri_signature_date }}</strong>
                                            @endif
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                </table>
                            @endif
                        </td>
                        <td width="32%" style="text-align:right;">
                            @if ($status == 'PENDING' || $status == 'SIGNED')
                                <table style="width:100%;margin-top:14px;">
                                    <tr>
                                        <td width="70%" style="height: 28px;text-align:center">
                                                <img class="file-image-round-stamp" src="{{ $round_stamp }}" alt="your image" />
                                                <img class="file-image-square-stamp" src="{{ $square_stamp }}" alt="your image" />
                                                <img class="file-image-signature" src="{{ $signature }}" alt="your image" />
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="70%" style="height: 30px;font-size:18px;font-weight: bold;padding-top:-190px;padding-right:-30px;">
                                            <strong>{{ __('Algeria') }} </strong>
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="70%"
                                            style="text-align:right;vertical-align:top;height: 30px;padding-top:-90px;font-size:18px;padding-right:-30px;">
                                            <strong> {{ $signature_date }}</strong>
                                        </td>
                                        <td width="30%" style="{{ $rtl ? 'text-align:right;' : '' }}">
                                        </td>
                                    </tr>
                                </table>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="page2">
        </div>
        <div id="page3">
            <div id="tables1">
                <table style="width:88%;padding-bottom:100px!important;margin-left:auto;margin-right:auto;">
                    <tr>
                        <td width="5%"></td>
                        <td width="90%" style="padding-left:15px!important;padding-right:15px!important;height: 100px;{{ $rtl ? 'text-align:right;' : '' }}">
                            {{ $integrity_rate . ' ' . ($rtl ? '?????????? ????????????' : 'Algerian product') }}<br />
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
                            {{ $rtl ? '?????? ????????????????' : 'Invoice Number' }}
                            {{ $invoice_number }}<br />
                            {{ $rtl ? '?????????? ????????????????' : 'Invoice Date' }}
                            {{ $invoice_date }}
                        </td>
                        <td width="5%"></td>
                    </tr>
                </table>
            </div>
            <div id="tables3">
                <table style="width:88%;margin-top:-200px!important;margin-left:auto;margin-right:auto;">
                    <tr>
                        <td width="48%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 30px;{{ $rtl ? 'text-align:right;' : '' }}">

                        </td>
                        <td width="25%" style="margin-left:5px!important;margin-right:0px!important;text-align:right;">

                            @if ($status == 'PENDING' || $status == 'SIGNED')
                                <strong>{{ $signature_date }}</strong>&nbsp;&nbsp;&nbsp;
                                <strong>{{ __('Algeria') }}</strong>&nbsp;
                            @endif
                        </td>
                        <td width="27%"
                            style="margin-left:5px!important;margin-right:5px!important;{{ $rtl ? 'text-align:right;' : '' }}">

                        </td>
                    </tr>
                    <tr>
                        <td width="48%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 210px;{{ $rtl ? 'text-align:right;' : '' }}">

                        </td>
                        <td width="48%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 70px;text-align:center;">
                            @if ($status == 'PENDING' || $status == 'SIGNED')
                                <div class="sign-page3">
                                    <img class="file-image-round-stamp3" src="{{ $round_stamp }}" alt="your image" />
                                    <img class="file-image-square-stamp3" src="{{ $square_stamp }}"
                                        alt="your image" />
                                    <img class="file-image-signature3" src="{{ $signature }}" alt="your image" />
                                </div>
                            @endif
                        </td>
                        <td width="5%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 70px;{{ $rtl ? 'text-align:right;' : '' }}">

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
