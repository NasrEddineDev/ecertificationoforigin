<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>
    <style>
        html {
            margin: 0px
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

        #gzal1 {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-image: url('img/documents/gzal1.jpg');
            background-position: center top;
            background-repeat: no-repeat;
            background-size: 100%;
            z-index: -1;
        }

        #gzal2 {
            page-break-before: always;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-image: url('img/documents/gzal2.jpg');
            background-position: center top;
            background-repeat: no-repeat;
            background-size: 100%;
            z-index: -1;
        }

        #gzal3 {
            page-break-before: always;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-image: url('img/documents/gzal3.jpg');
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
            margin: 60px;
        }

    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
    <div id="page-body">
        <div id="gzal1">

            <div id="tables">
                <table style="width:100%;margin-top:200px;">
                    <tr>
                        <td width="50%" style="padding-left:5px!important;padding-right:5px!important;height: 55px;{{($rtl) ? "text-align:right;font-family: 'XB Riyaz';":""}}">
                            {{ $producer_name }}<br />
                            {{ $producer_address }}
                        </td>
                        <td width="50%" style="{{($rtl) ? "text-align:right;":""}}">
                            {{ $exporter_name }}<br />
                            {{ $exporter_address }}
                          </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:22px;">
                    <tr>
                        <td width="28%" style="background-color:red;{{($rtl) ? "text-align:right;font-family: 'Amiri', serif;":""}};height: 70px;">
                            {{ $importer_name }}<br />
                            {{ $importer_address }}
                          </td>
                        <td width="22%" style="background-color:green;{{($rtl) ? "text-align:right;":""}}">Algeria</td>
                        <td width="51%" style="background-color:red;{{($rtl) ? "text-align:right;":""}}">
                            {{ $importer_name }}<br />
                            {{ $importer_address }}
                          </td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:14px;">
                    <tr>
                        <td width="55%" style="background-color:red;text-align:right;height: 73px;"></td>
                        <td width="45%" style="background-color:green;text-align:right;"></td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:17px;">
                    <tr>
                        <td width="11%" style="background-color:red;text-align:right;height: 384px;"></td>
                        <td width="14%" style="background-color:green;text-align:right;"></td>
                        <td width="75%" style="background-color:red;text-align:right;"></td>
                    </tr>
                </table>
                <table style="width:100%;margin-top:18px;">
                    <tr>
                        <td width="33.5%" style="background-color:red;text-align:right;height: 200px;"></td>
                        <td width="34.5%" style="background-color:green;text-align:right;"></td>
                        <td width="32%" style="background-color:red;text-align:right;"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="gzal2">
        </div>
        <div id="gzal3">
        </div>
    </div>
    {{-- <div style="position: fixed; left: 1pt; top: 1pt; right: 0px; bottom: 0px; text-align: center;z-index: -1000;">
        <img src="img/documents/gzal1.jpg" style="height: 841.89pt;">
      </div> --}}
    {{-- <div id="gzal2" style="position: fixed; left: 1pt; top: 1pt; right: 0px; bottom: 0px; text-align: center;z-index: -1000;page-break-before: always;">
        <img src="img/documents/gzal2.jpg">
      </div> --}}
    {{-- <div id="gzal3" style="position: fixed; left: 1pt; top: 1pt; right: 0px; bottom: 0px; text-align: center;z-index: -1000;page-break-before: always;">
        <img src="img/documents/gzal3.jpg" style="height: 841.89pt;">
      </div> --}}
    {{-- <div id="gzal1">
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
    {{-- <div id="gzal2">
    </div>
    <div id="gzal3">
    </div> --}}
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
</body>

</html>
