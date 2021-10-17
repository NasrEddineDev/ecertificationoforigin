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
            padding-left: 41px;
            padding-right: 31px;
            padding-top: 65px !important;
        }

        #tables1 {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 280px !important;
        }

        #tables2 {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 60px !important;
        }

        #tables3 {
            padding-left: 62px;
            padding-right: 62px;
            padding-top: 254px !important;
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
            padding-top: 42px;
            padding-left: 90px;
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
                        <td width="48.5%"
                            style="height: 23px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                        </td>
                        <td width="51.5%"
                            style="font-weight: bold;text-align:center">
                            @if($template != '0')
                            <label>{{'№ '.  $code }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="48.5%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 70px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ $exporter_name }}<br />
                            {{ $exporter_address }}
                        </td>
                        <td width="51.5%" style="font-weight: bold;{{ $rtl ? 'text-align:right;' : '' }}">
                        </td>
                    </tr>
                </table>
                <table style="width:100%;padding-top:20px;">
                    <tr>
                        <td width="48.5%"
                            style="font-weight: bold;{{ $rtl ? 'text-align:right;' : '' }}">
                            {{ $importer_name }}<br />
                            {{ $importer_address }}
                        </td>
                        <td width="51.5%" style="height: 73px;">
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:22px;">
                    <tr>
                        <td width="48.3%"
                            style="text-align:center;font-weight: bold;">
                            {{ $shipment_type }}</td>
                        <td width="51.7%"
                            style="height: 130px;{{ $rtl ? 'text-align:center;' : '' }}font-weight: bold;">
                            {{ $copy_type == 'NONE' ? $notes : ($rtl ? $original_code . $notes : $notes . $original_code) }}
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:41.5px;">
                    <tr>
                        <td width="6.5%"
                            style="font-size:11px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                        </td>
                        <td width="60.5%"
                            style="padding:5px;{{ $rtl ? 'text-align:right;' : '' }}">
                            <table width="100%" id="products" style="" {{ $rtl ? 'dir=rtl' : '' }}
                                style="font-size: 12px;">
                                <tr>
                                    <th>Number</th>
                                    <th>Mark</th>
                                    <th>Pkg Type</th>
                                    <th>Pkg Weight (KG)</th>
                                    <th>Pkg Count</th>
                                </tr>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->number }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->package_type }}</td>
                                        <td>{{ $product->package_quantity }}</td>
                                        <td>{{ $product->package_count }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td width="12%"
                            style="font-size:11px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                        </td>
                        <td width="12%"
                            style="font-size:11px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            Net Weight<br /> {{ $net_weight . 'KG' }}<br />
                            Real Weight<br /> {{ $real_weight . 'KG' }}<br />
                        </td>
                        <td width="12%"
                            style="font-size:11px;height: 385px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            Invoice Number<br /> {{ $invoice_number }}<br />
                            Invoice Date<br /> {{ $invoice_date }}
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:12px;">
                    <tr>
                        <td></td>
                        <td style="height: 55px;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="2%" ></td>
                        <td width="48.5%" style="height: 10px;"></td>
                        <td width="49.5%" style="height: 10px;text-align: center"><strong>
                            {{ Lang::get($original_country, [], 'en') }}</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="height: 60px;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="2%" ></td>
                        <td width="48.5%" style="height: 10px;"></td>
                        <td width="49.5%" style="height: 10px;text-align: center"><strong>
                            {{ 'China' }}</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="height: 33px;"></td>
                        <td style="height: 33px;"></td>
                    </tr>
                    <tr>
                        <td width="2%" ></td>
                        <td width="48.5%" style="height: 10px;">
                            @if ($status == 'SIGNED')
                                                    <strong>{{ 'Algiers '.$dri_signature_date }}</strong>
                                                    
                                                    @endif
                        </td>
                        <td width="49.5%" style="height: 10px;">
                                                    @if ($status == 'PENDING' || $status == 'SIGNED')
                                                    <strong>{{ 'Algiers '.$signature_date }}</strong>
                                                    @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="page2">
        </div>
        @if ($invoice)
            <div id="invoice">
            </div>
        @endif
    </div>
</body>

</html>
