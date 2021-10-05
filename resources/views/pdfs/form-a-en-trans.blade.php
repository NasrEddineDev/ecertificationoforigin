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


        /* #stamp {
            position: absolute;
            top: 0;
            left: 0;
            height: 100px!important;;
            width: 100px!important;
            background-image: url('img/logo/caci-logosn.png');
            background-position: center top;
            background-repeat: no-repeat;
            background-size: 100%;
            z-index: -1;
        } */
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

            #tables {
                padding-left: 41px;
                padding-right: 31px;
                padding-top: 20px !important;
            }
        .parent {
                position: relative;
                top: 0;
                left: 0;
            }

            .file-image-round-stamp {
                position: absolute;
                height: 150px;
                margin-left: 58px;
                margin-right: -10px;
            }

            .file-image-signature {
                position: absolute;
                height: 170px;
                padding-top: -150px;
            }

            .file-image-square-stamp {
                position: absolute;
                height: 70px;
                padding-top: -100px;
                padding-bottom: 50px;
            }

            .file-image-qrcode {
                position: absolute;
                margin-left: 300px;
                margin-top: 100px;
                height: 63px;
                width: 63px;
            }

            .importer-table {
                width: 100%;
                margin-top: -50px !important;
            }


            .parent1 {
                position: relative;
                top: 0;
                left: 0;
            }

            .file-image-round-stamp1 {
                position: absolute;
                height: 150px;
            }

            .file-image-signature1 {
                position: absolute;
                height: 170px;
                padding-top: -150px;
            }

            .file-image-square-stamp1 {
                position: absolute;
                height: 70px;
                padding-top: -100px;
                padding-bottom: 50px;
            }
    </style>
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
                        <td width="51.5%"
                            style="font-weight: bold;text-align:center">
                        </td>
                    </tr>
                    <tr>
                        <td width="48.5%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 70px;{{ $rtl ? 'text-align:right;' : '' }}font-weight: bold;">
                            {{ $exporter_name }}<br />
                            {{ $exporter_address }}
                        </td>
                        <td width="51.5%" style="font-weight: bold;{{ $rtl ? 'text-align:right;' : '' }}" class="parent">
                            @if ($status == 'PENDING' || $status == 'SIGNED')
                                <img class="file-image-qrcode" src="{{ $qrcode_url }}" alt="your image" />
                            @endif
                        </td>
                    </tr>
                </table>
                <table class="importer-table" style="width:100%;padding-top:20px;">
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
                <table style="width:100%;margin-bottom:-400px;" class="images-table">
                    <tr>
                        <td></td>
                        <td style="height: 55px;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="2%"></td>
                        <td width="48.5%" style="height: 10px;"></td>
                        <td width="49.5%" style="height: 10px;text-align: center"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="height: 75px;">
                            @if ($status == 'SIGNED')
                                <div class="parent1">
                                    <img class="file-image-square-stamp1" src="{{ $dri_square_stamp }}" alt="your image" />
                                    <img class="file-image-round-stamp1" src="{{ $dri_round_stamp }}" alt="your image" />
                                    <img class="file-image-signature1" src="{{ $dri_signature }}" alt="your image" />
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($status == 'PENDING' || $status == 'SIGNED')
                                <div class="parent">
                                    <img class="file-image-square-stamp" src="{{ $square_stamp }}" alt="your image" />
                                    <img class="file-image-round-stamp" src="{{ $round_stamp }}" alt="your image" />
                                    <img class="file-image-signature" src="{{ $signature }}" alt="your image" />
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="2%"></td>
                        <td width="48.5%" style="height: 10px;"></td>
                        <td width="49.5%" style="height: 10px;text-align: center"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="height: 18px;"></td>
                        <td style="height: 18px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="2%"></td>
                        <td width="48.5%" style="height: 10px;">
                        </td>
                        <td width="49.5%" style="height: 10px;">
                        </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:16px;">
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
                            {{-- destination_country --}}
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
        {{-- <div id="page3">
            <div id="tables1">
                <table style="width:88%;padding-bottom:100px!important;margin-left:auto;margin-right:auto;">
                    <tr>
                        <td width="5%"></td>
                        <td width="90%"
                            style="padding-left:15px!important;padding-right:15px!important;height: 100px;{{ $rtl ? 'text-align:right;' : '' }}">
                            {{ $integrity_rate . ' ' .($rtl ? 'منتوج جزائري' : 'Algerian product') }}<br />
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
                <table style="width:88%;margin-top:-200px!important;margin-left:auto;margin-right:auto;">
                    <tr>
                        <td width="48%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 30px;{{ $rtl ? 'text-align:right;' : '' }}">

                        </td>
                        <td width="25%" style="margin-left:5px!important;margin-right:5px!important;text-align:center;">

                            @if ($status == 'PENDING' || $status == 'SIGNED')
                                <strong>{{ $signature_date }}</strong>
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
                            
                        </td>
                        <td width="5%"
                            style="margin-left:5px!important;margin-right:5px!important;height: 70px;{{ $rtl ? 'text-align:right;' : '' }}">

                        </td>
                    </tr>
                </table>
            </div>
        </div> --}}
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
