<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>
    <style>
        html {
            /* margin: 0px */
        }

        page {
            size: A4;
            /* margin-top:-1cm;
            margin-bottom:-1cm;
            margin-left:-1cm;
            margin-right:-1cm; */
            /* margin: 0px;
            padding: 0px; */
        }

        body {
            font-family: helvetica !important;
            font-size: 10pt;
            position: relative;
            /* margin: 0px;
            padding: 0px; */
            /* margin-top: -1cm;
            margin-left: -1cm; */
        }

        /* #page1 {
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
        } */

        /* 
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
        } */

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
            /* margin: 0cm;
            margin-left: 1cm;
            margin-top: 0.00cm;
            margin-bottom: 1.00cm;
            font-size: 10pt; */
        }

        #date {
            font-weight: bold;
        }

        #tables {
            padding-left: 41px;
            padding-right: 31px;
            padding-top: 20px !important;
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
            /* border: 1px solid rgb(29, 95, 59); */
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
        .parent {
            position: relative;
            top: 0;
            left: 0;
        }
        .file-image-round-stamp {
            position: absolute;
            height: 160px;
            margin-top: -500px;
            margin-bottom: 300px;
        }
        .file-image-signature   {
            position: absolute;
            height: 180px;
            margin-top: -500px;
            margin-bottom: 300px;
        }
        .file-image-square-stamp {
            position: absolute;
            height: 90px;
            margin-top: -500px;
            margin-bottom: 300px;
        }
        .file-image-qrcode {
            position: absolute;
            margin-left: 260px;
            margin-top: 100px;
            height: 63px;
            width: 63px;
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
            {{-- <div id="code">
                <label>{{$code}}</label>
            </div> --}}
            <div id="tables">
                <table style="width:100%;padding-top:200px!important;">
                    <tr>
                        <td width="48.5%"
                            style="height: 23px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                        </td>
                        <td width="51.5%" style="font-weight: bold;text-align:center">
                            @if ($template != '0')
                                <label>{{ '№ ' . $code }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="48.5%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 70px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ $exporter_name }}<br />
                            {{ $exporter_address }}
                        </td>
                        <td width="51.5%" style="font-weight: bold;{{ $rtl ? 'text-align:right;' : '' }}" class="parent">
                            @if ($template == '0' && ($status == 'PENDING' || $status == 'SIGNED'))
                                <img class="file-image-qrcode" src="{{ $qrcode_url }}" alt="your image" />
                            @endif
                        </td>
                    </tr>
                </table>
                <table style="width:100%;padding-top:20px;">
                    <tr>
                        <td width="48.5%" style="font-weight: bold;{{ $rtl ? 'text-align:right;' : '' }}">
                            {{ $importer_name }}<br />
                            {{ $importer_address }}
                        </td>
                        <td width="51.5%" style="height: 73px;">
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:22px;">
                    <tr>
                        <td width="48.3%" style="text-align:center;font-weight: bold;">
                            {{ Lang::get($shipment_type, [], 'fr') }}</td>
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
                        <td width="60.5%" style="padding:5px;{{ $rtl ? 'text-align:right;' : '' }}">
                            <table width="100%" id="products" style="" {{ $rtl ? 'dir=rtl' : '' }}
                                style="font-size: 12px;">
                                <tr>
                                    <th>{{ Lang::get('Number', [], 'fr') }}</th>
                                    <th>{{ Lang::get('Mark', [], 'fr') }}</th>
                                    <th>{{ Lang::get('Pkg Type', [], 'fr') }}</th>
                                    <th>{{ Lang::get('Pkg Qty', [], 'fr') }}</th>
                                    <th>{{ Lang::get('Pkg Count', [], 'fr') }}</th>
                                    {{-- <th>Description</th> --}}
                                </tr>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->number }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->package_type }}</td>
                                        <td>{{ $product->package_quantity }}</td>
                                        <td>{{ $product->package_count }}</td>
                                        {{-- <td>{{ $product->description }}</td> --}}
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td width="12%"
                            style="font-size:11px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                        </td>
                        <td width="12%"
                            style="font-size:11px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ Lang::get('Net Weight', [], 'fr') }}<br /> {{ $net_weight . 'KG' }}<br />
                            {{ Lang::get('Real Weight', [], 'fr') }}<br /> {{ $real_weight . 'KG' }}<br />
                        </td>
                        <td width="12%"
                            style="font-size:11px;height: 385px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ Lang::get('Invoice Number', [], 'fr') }}<br /> {{ $invoice_number }}<br />
                            {{ Lang::get('Invoice Date', [], 'fr') }}<br /> {{ $invoice_date }}
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
                        <td width="2%"></td>
                        <td width="48.5%" style="height: 10px;"></td>
                        <td width="49.5%" style="height: 10px;text-align: center"><strong>
                                {{ Lang::get($original_country, [], 'fr') }}</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="height: 75px;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="2%"></td>
                        <td width="48.5%" style="height: 10px;"></td>
                        <td width="49.5%" style="height: 10px;text-align: center"><strong>
                            {{ Lang::get($destination_country, [], 'fr') }}</strong></td>
                        {{-- destination_country --}}
                    </tr>
                    <tr>
                        <td></td>
                        <td style="height: 18px;"></td>
                        <td style="height: 18px;">
                            @if ($template == 0 && ($status == 'PENDING' || $status == 'SIGNED'))
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
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="2%"></td>
                        <td width="48.5%" style="height: 10px;">
                            @if ($status == 'SIGNED')
                                <strong>{{ 'Algiers ' . $dri_signature_date }}</strong>

                            @endif
                        </td>
                        <td width="49.5%" style="height: 10px;">
                            @if ($status == 'PENDING' || $status == 'SIGNED')
                                <strong>{{ 'Algiers ' . $signature_date }}</strong>
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
                {{-- invoice {{$invoice.'   '.$invoice_path --}}
            </div>
        @endif
    </div>
    {{-- <div style="position: fixed; left: 1pt; top: 1pt; right: 0px; bottom: 0px; text-align: center;z-index: -1000;">
        <img src="img/documents/page1.jpg" style="height: 841.89pt;">
      </div> --}}
    {{-- <div id="page2" style="position: fixed; left: 1pt; top: 1pt; right: 0px; bottom: 0px; text-align: center;z-index: -1000;page-break-before: always;">
        <img src="img/documents/page2.jpg">
      </div> --}}
    {{-- <div id="page3" style="position: fixed; left: 1pt; top: 1pt; right: 0px; bottom: 0px; text-align: center;z-index: -1000;page-break-before: always;">
        <img src="img/documents/page3.jpg" style="height: 841.89pt;">
      </div> --}}
    {{-- <div id="page1">
        <img src="url(documents/gzal.jpg)" style="display: inline;">
        <p class="producer_name">{{ $producer_name }}</p>
        <p class="producer_address">{{ $producer_address }}</p>
        <p class="exporter_address">exporter_address</p>
        <p class="exporter_name">exporter_name</p>
        <p class="accumulation">{{ $accumulation }}</p>
        <p class="accumulation_country">{{ $accumulation_country }}</p>
        <p class="shipment_type">{{ $shipment_type }}</p>
        <p class="notes">{{ $notes }}</p>
    </div> --}}
    {{-- <div id="page2">
    </div>
    <div id="page3">
    </div> --}}
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
</body>

</html>
