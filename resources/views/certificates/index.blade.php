@extends('layouts.mainlayout')
@Push('css')
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table-filter.css') }}" />
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-editable.css') }}" /> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/modals.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('select2/css/select2.min.css') }}">
    <style>
        #InformationproModalhdbgcl .modal-dialog {
            width: 90% !important;
            height: 90% !important;
            margin: auto;
            margin-top: 20px;
            padding: auto;
        }

        #InformationproModalhdbgcl .modal-body {
            text-align: center;
            padding: 0;
            width: 100% !important;
            height: 100% !important;
        }

        #InformationproModalhdbgcl .modal-content {
            height: auto;
            min-height: 100% !important;
        }

        .not-active {
            /* pointer-events: none !important; */
            cursor: default !important;
            text-decoration: none !important;
            background-color: gray !important;
        }

        table .datatable-ct {
            width: 310px;
            overflow: hidden;
            /* display: inline-block; */
            white-space: nowrap;
        }

        a.disabled {
            pointer-events: none;
            cursor: default;
        }

        table .bs-bars {
            width: 70%
        }



        .dropbtn {
            background-color: #3498DB;
            color: white;
            /* padding: 5px; */
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #2980B9;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 4px 16px;
            text-decoration: none;
            display: block;
            line-height: 26px;
        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }

    </style>
@endpush

@section('content')

    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>{{ __('Certificates List') }}</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <div class="{{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        @if (Auth::User()->role->name == 'user')
                                            {{-- <button id="new" class="btn btn-success" style="background-color: #2C7744;" title="{{ __('Preview') }}" disabled>
                                                <img style="height:20px" src="{{ URL::asset('') }}img/icons/icons8-add-file-64.png"/>
                                            </button> --}}
                                            <div class="dropdown">
                                                <button onclick="myFunction()" type="button"
                                                    style="background-color: #2C7744;"
                                                    class="dropbtn btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <img style="height:20px"
                                                        src="{{ URL::asset('') }}img/icons/icons8-add-file-64.png" />
                                                </button>
                                                <div id="myDropdown" class="dropdown-content">
                                                    <a class="{{ (Auth::User()->role->name == 'user' && Auth::User()->enterprise->status == "PENDING") ? 'not-active' : '' }}"
                                                        href="{{ route('certificates.create-type', 'gzale') }}">{{ __('Arab Certificate of Origin') }}</a>
                                                    <a class="{{ (Auth::User()->role->name == 'user' && Auth::User()->enterprise->status == "PENDING") ? 'not-active' : '' }}"
                                                        href="{{ route('certificates.create-type', 'acp-tunisie') }}">{{ __('Tunisia Certificate of Origin') }}</a>
                                                    <a class="{{ (Auth::User()->role->name == 'user' && Auth::User()->enterprise->status == "PENDING") ? 'not-active' : '' }}"
                                                        href="{{ route('certificates.create-type', 'form-a-en') }}">{{ __('English Certificate of Origin') }}</a>
                                                    <a class="{{ (Auth::User()->role->name == 'user' && Auth::User()->enterprise->status == "PENDING") ? 'not-active' : '' }}"
                                                        href="{{ route('certificates.create-type', 'formule-a-fr') }}">{{ __('French Certificate of Origin') }}</a>
                                                    {{-- <a href="#">{{ __('ZLECAF') }}</a>
                                                    <a href="#">{{ __('PAN-EUROMED') }}</a>
                                                    <a href="#">{{ __('Certificate of common rights') }}</a> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <button id="preview" class="btn btn-info" title="{{ __('Preview') }}" disabled>
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        {{-- <button id="details" class="btn btn-success" title="{{ __('Detail') }}" disabled>
                                        <i class="fa fa-eye"></i>
                                    </button> --}}
                                        <button id="edit" rel="tooltip" class="btn btn-primary" title="{{ __('Edit') }}"
                                            disabled>
                                            <i class="fa fa-pencil-square-o"></i>
                                        </button>
                                        <button id="duplicate" class="btn btn-warning" title="{{ __('Duplicate') }}"
                                            data-toggle="modal" data-target="#DuplicateModalhdbgcl" disabled>
                                            <i class="fa fa-clone"></i>
                                        </button>
                                        <button id="retroactive" class="btn btn-info" title="{{ __('Retroactive') }}"
                                            data-toggle="modal" data-target="#RetroactiveModalhdbgcl" disabled>
                                            <i class="fa fa-exchange"></i>
                                        </button>
                                        <button id="remove" class="btn btn-danger" title="{{ __('Delete') }}"
                                            data-toggle="modal" data-target="#DangerModalhdbgcl"
                                            style="background-color: #d80027!important;" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                    {{-- <button id="remove" class="btn btn-danger" disabled>
                                        <i class="fa fa-trash"></i>
                                    </button> --}}
                                    {{-- @if (Auth::User()->role->name == 'user')
                                        <div class="col-lg-3 add-product {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}"
                                            style="line-height:none">
                                            <a class="{{ Auth::User()->role->name == 'user' && Auth::User()->enterprise->status == 'PENDING' ? 'not-active' : '' }}"
                                                href="{{ route('certificates.create') }}"
                                                style="padding: 0px 10px;top: auto;right:auto;left:auto;float: inherit;position:inherit;{{ App()->currentLocale() == 'ar' ? '' : '' }}">{{ __('Add New Certificate') }}</a>
                                        </div>
                                    @endif --}}
                                    <div class="col-lg-4 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <select id="certificatesSelecor" name="certificatesSelecor" class="form-control">
                                            <option value="ALL" selected>ALL</option>
                                            <option value="GZALE">GZALE</option>
                                            <option value="FORMULE-A-FR">FORM A SGP FR</option>
                                            <option value="FORM-A-EN">FORM A SGP EN</option>
                                            <option value="ACP-TUNISIE">ACP ALGERIA TUNISIA</option>
                                            <option value="ZLECAF">ZLECAF</option>
                                            <option value="PAN-EUROMED">PAN-EUROMED</option>
                                            <option value="DROITS-COMMUNS">CERTIFICAT DE DROITS COMMUNS</option>
                                        </select>
                                    </div>
                                    {{-- <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select> --}}
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-buttons="buttons()" data-key-events="true" data-show-toggle="true"
                                    data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                    data-show-export="true" data-click-to-select="true"
                                    data-buttons-align="{{ App()->currentLocale() == 'ar' ? 'left' : 'right' }}"
                                    data-search-align="{{ App()->currentLocale() == 'ar' ? 'left' : 'right' }}"
                                    data-toolbar-align="{{ App()->currentLocale() == 'ar' ? 'right' : 'left' }}"
                                    data-toolbar="#toolbar" data-filter-control="true"
                                    data-locale="{{ App()->currentLocale() == 'en' ? 'en-US' : (App()->currentLocale() == 'ar' ? 'ar-SA' : 'fr-FR') }}">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">{{ __('Code') }}</th>
                                            <th data-field="importer">{{ __('Importer') }}</th>
                                            <!-- <th data-field="producer" data-editable="true">{{ __('Producer') }}</th> -->
                                            <th data-field="status">{{ __('Status') }}</th>
                                            <!-- <th data-field="shipment_type" data-editable="true">{{ __('Shipment By') }}</th> -->
                                            <th data-field="type" data-filter-control="input">{{ __('Type') }}</th>
                                            <th data-field="type_hidden" data-visible="false" data-filter-control="input">
                                                {{ __('Type') }}</th>
                                            <th data-field="signature_date" data-editable="true">{{ __('Signed Date') }}
                                            </th>
                                            <th data-field="dri_signature_date" data-editable="true">
                                                {{ __('DRI Signed Date') }}</th>
                                            <!-- <th data-field="signed_document" data-editable="true">{{ __('Document') }}</th> -->
                                            <!-- <th data-field="accumulation" data-editable="true">{{ __('Accumulation') }}</th> -->
                                            <th data-field="net_weight" data-editable="true">{{ __('Net Weight') }}</th>
                                            <th data-field="real_weight" data-editable="true">{{ __('Real Weight') }}
                                            </th>
                                            <th data-field="invoice" data-editable="true">{{ __('Invoice') }}</th>
                                            {{-- <th data-field="invoice_date" data-editable="true">Invoice Date</th>
                                            <th data-field="invoice_number" data data-editable="true">Invoice Number</th> --}}
                                            {{-- <th data-field="action">{{ __('Action') }}</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certificates as $certificate)
                                            <tr id="{{ $certificate->id }}">
                                                <td></td>
                                                <td>{{ $certificate->code }}</td>
                                                <td>{{ $certificate->Importer->name }}</td>
                                                <td><button
                                                        class="btn {{ $certificate->status == 'DRAFT' ? 'btn-warning' : ($certificate->status == 'PENDING' ? 'btn-info' : ($certificate->status == 'SIGNED' ? 'btn-success' : 'btn-danger')) }}"
                                                        style="font-size: 14px;padding:0px;">{{ __($certificate->status) }}</button>
                                                </td>
                                                <td><button class="btn btn-warning"
                                                        style="font-size: 14px;padding:0px;">{{ $certificate->type }}</button>
                                                </td>
                                                <td>{{ $certificate->type }}</td>
                                                <td>{{ $certificate->signature_date }}</td>
                                                <td>{{ $certificate->dri_signature_date }}</td>
                                                <!-- <td>{{ $certificate->signed_document }}</td> -->
                                                <!-- <td>{{ $certificate->accumulation }}</td> -->
                                                <td>{{ $certificate->net_weight }}</td>
                                                <td>{{ $certificate->real_weight }}</td>
                                                <td>{{ $certificate->invoice }}</td>
                                                {{-- <td>{{ $certificate->invoice_date }}</td>
                                        <td>{{ $certificate->invoice_number }}</td> --}}
                                                {{-- <td class="datatable-ct">
                                                    <div class="input-group"> --}}
                                                {{-- <a rel="tooltip" class="btn btn-info" id="preview"
                                                            href="{{ route('certificates.preview', $certificate->id) }}"
                                                            data-url="{{ route('certificates.sign-gzal', [$certificate->id, 'null']) }}"
                                                            data-reject-gzal-url="{{ route('certificates.reject-gzal', [$certificate->id, '']) }}"
                                                            data-original-title="" title="{{ __('Detail') }}">
                                                            <i class="fa fa-file fa-lg" aria-hidden="true"></i>
                                                            <div class="ripple-container"></div>
                                                        </a> --}}
                                                {{-- <a rel="tooltip" class="btn btn-success"
                                                            style="margin-left: 3px;margin-right: 3px;"
                                                            href="{{ route('certificates.show', $certificate->id) }}"
                                                            data-original-title="" title="{{ __('View') }}">
                                                            <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                            <div class="ripple-container"></div>
                                                        </a> --}}
                                                {{-- @if ($certificate->status == 'SIGNED' && $certificate->copy_type == 'NONE') --}}
                                                {{-- <a rel="tooltip" class="btn btn-warning" href="#"
                                                            data-code="{{ $certificate->code }}" data-toggle="modal"
                                                            data-target="#DuplicateModalhdbgcl"
                                                            data-url="{{ route('certificates.duplicate-gzale', [$certificate->id, 'D', '']) }}"
                                                            data-original-title="" title="{{ __('Duplicate') }}"
                                                            class="{{ $certificate->status == 'SIGNED' && $certificate->copy_type == 'NONE' ? 'not-active' : '' }}">
                                                            <i class="fa fa-clone fa-lg" aria-hidden="true"></i>
                                                            <div class="ripple-container"></div>
                                                        </a> --}}
                                                {{-- <a rel="tooltip" class="btn btn-info"
                                                            data-code="{{ $certificate->code }}" data-toggle="modal"
                                                            data-target="#RetroactiveModalhdbgcl"
                                                            class="{{ $certificate->status == 'SIGNED' && $certificate->copy_type == 'NONE' ? 'not-active' : '' }}"
                                                            data-url="{{ route('certificates.create-retroactive-copy', [$certificate->id, '']) }}"
                                                            data-original-title="" title="{{ __('Retroactive') }}">
                                                            <i class="fa fa-exchange fa-lg" aria-hidden="true"></i>
                                                            <div class="ripple-container"></div>
                                                        </a> --}}
                                                {{-- @endif --}}
                                                {{-- <a rel="tooltip" class="btn btn-success"
                                                    href="{{ route('certificates.show', $certificate->id) }}"
                                                    data-original-title="" title="{{ __('View') }}">
                                                    <i class="fa fa-list fa-lg" aria-hidden="true"></i>
                                                    <div class="ripple-container"></div>
                                                </a> --}}
                                                {{-- @if (Auth::user()->Role->name == 'user' && $certificate->status != 'SIGNED' && $certificate->status != 'REJECTED') --}}
                                                {{-- <a rel="tooltip" class="btn btn-primary"
                                                                style="margin-left: 3px;margin-right: 3px;"
                                                                href="{{ route('certificates.edit', $certificate->id) }}"
                                                                data-original-title="" title="{{ __('Edit') }}">
                                                                <i class="fa fa-pencil-square-o fa-lg"
                                                                    aria-hidden="true"></i>
                                                                <div class="ripple-container"></div>
                                                            </a> --}}
                                                {{-- <a rel="tooltip" class="btn btn-danger pd-setting-ed" href="#"
                                                                data-url="{{ route('certificates.destroy', $certificate->id) }}"
                                                                data-certificate_name="{{ $certificate->name }}"
                                                                data-original-title="" title="{{ __('Delete') }}"
                                                                data-toggle="modal" data-target="#DangerModalhdbgcl"
                                                                style="background-color: #d80027!important;">
                                                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                                                <div class="ripple-container"></div>
                                                            </a> --}}
                                                {{-- @endif
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="DangerModalhdbgcl" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-4">
                    <h4 class="modal-title">{{ __('Delete the certificate') }}</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                    <h2>{{ __('Remove Permanently !') }}</h2>
                    <p>{{ __('Do you want to delete the certificate') }} <strong id="CertificateName"
                            style="color: #d80027!important;"></strong> {{ __('forever ?') }}</p>
                </div>
                <div class="modal-footer danger-md">
                    <a data-dismiss="modal" href="#" style="background-color: #d80027!important;">{{ __('No') }}</a>
                    <a id="Delete" href="#" style="background-color: #d80027!important;">{{ __('Yes') }}</a>
                </div>
            </div>
        </div>
    </div>

    <div id="DuplicateModalhdbgcl" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                {{-- <div class="modal-header header-color-modal bg-color-3">
                <h4 class="modal-title">Duplicate the certificate</h4>
            </div> --}}
                <div class="modal-body">
                    <span class="educate-icon educate-warning modal-check-pro information-icon-pro"></span>
                    <h2>{{ __('Duplication Request') }} !</h2>
                    <p>{{ __('Would you like to duplicate the certificate No :code ?', ['code' => '%code%']) }}</p>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea id="reason" name="reason" cols="50" class="form-control"
                            placeholder="{{ __('The reason of the request') }}" style="height: 40px"></textarea>
                    </div>
                </div>
                <div class="modal-footer footer-modal-admin warning-md">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a data-dismiss="modal" style="background-color: #65b12d" href="#">{{ __('No') }}</a>
                        <a id="Duplicate" style="background-color: #65b12d" href="#">{{ __('Yes') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="RetroactiveModalhdbgcl" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                {{-- <div class="modal-header header-color-modal bg-color-3">
                <h4 class="modal-title">Duplicate the certificate</h4>
            </div> --}}
                <div class="modal-body">
                    <span class="educate-icon educate-warning modal-check-pro information-icon-pro"></span>
                    <h2>{{ __('Retroactive Copy Request') }} !</h2>
                    <p>{{ __('Would you like to create retroactive certificate from the certificate No :code ?', ['code' => '%code%']) }}
                    </p>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea id="notes" name="notes" cols="50" class="form-control"
                            placeholder="{{ __('The reason of the request') }}" style="height: 40px"></textarea>
                    </div>
                </div>
                <div class="modal-footer footer-modal-admin warning-md">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a data-dismiss="modal" style="background-color: #65b12d" href="#">{{ __('No') }}</a>
                        <a id="Retroactive" style="background-color: #65b12d" href="#">{{ __('Yes') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="InformationproModalhdbgcl" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-6">
                    <h4 class="modal-title">CACI E-Certification</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body" id="modal-body">
                    <object style="width:100%;" id="object" data="" type="application/pdf">
                        <embed id="embed" src="" type="application/pdf" />
                    </object>
                    {{-- <object style="width:100%;" id="object" data="{{ asset('data/enterprises/' . Auth::User()->Enterprise->id . '/certificates/gzal-draft.pdf') }}"
                type="application/pdf">
                <embed id="embed"
                    src="{{ asset('data/enterprises/' . Auth::User()->Enterprise->id . '/certificates/gzal-draft.pdf') }}"
                    type="application/pdf" />
                </object> --}}
                    {{-- <iframe id="iframe" src="#"
                        type="application/pdf" width="100%" height="600px;"></iframe> --}}
                    {{-- <iframe id="iframe" src="{{ asset('data/enterprises/'.Auth::User()->Enterprise->id.'/certificates/gzal-draft.pdf')}}"
                type="application/pdf" width="100%" height="900px;"></iframe> --}}
                </div>
                <div class="modal-footer danger-md" style="background-color: #65b12d">
                    @if (Auth::User()->role->name == 'dri_user')
                        <div class="col-sm-3 pull-right notes">
                            <textarea id="notes" name="notes" rows="4" cols="50" class="form-control"></textarea>
                        </div>
                    @endif
                    <a id="SignGZAL" href="#" style="btn btn-info">{{ __('Sign') }}</a>
                    <a id="RejectGZAL" href="#" style="btn btn-info">{{ __('Reject') }}</a>
                    <a data-dismiss="modal" href="#" style="btn btn-danger">{{ __('Close') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="loadingDiv" class="spinner-border text-success" role="status"
        style="width: 100%; height: 100%;position: absolute">
        <div class="inner" style="width: 200px; height: 200px;text-align:center"><svg xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                style="margin: auto; display: block; /*! shape-rendering: auto; */" width="200px" height="200px"
                viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <g transform="translate(50,50)">
                    <circle cx="0" cy="0" r="10" fill="none" stroke="#d74946" stroke-width="4"
                        stroke-dasharray="31.41592653589793 31.41592653589793">
                        <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1"
                            dur="0.48076923076923084s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="0"
                            repeatCount="indefinite"></animateTransform>
                    </circle>
                    <circle cx="0" cy="0" r="20" fill="none" stroke="#0069ce" stroke-width="4"
                        stroke-dasharray="62.83185307179586 62.83185307179586">
                        <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1"
                            dur="0.48076923076923084s" calcMode="spline" keySplines="0.2 0 0.8 1"
                            begin="-0.12019230769230771" repeatCount="indefinite"></animateTransform>
                    </circle>
                    <circle cx="0" cy="0" r="30" fill="none" stroke="#f0af31" stroke-width="4"
                        stroke-dasharray="94.24777960769379 94.24777960769379">
                        <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1"
                            dur="0.48076923076923084s" calcMode="spline" keySplines="0.2 0 0.8 1"
                            begin="-0.24038461538461542" repeatCount="indefinite"></animateTransform>
                    </circle>
                    <circle cx="0" cy="0" r="40" fill="none" stroke="#94b224" stroke-width="4"
                        stroke-dasharray="125.66370614359172 125.66370614359172">
                        <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1"
                            dur="0.48076923076923084s" calcMode="spline" keySplines="0.2 0 0.8 1"
                            begin="-0.36057692307692313" repeatCount="indefinite"></animateTransform>
                    </circle>
                </g>
                <!-- [ldio] generated by https://loading.io/ -->
            </svg>
            <span class="sr-only">{{ __('Loading...') }}</span>
        </div>
    </div> --}}
@endsection

@Push('js') // this is for internal js
    <!-- data table JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/tableExport.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/data-table-active.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-editable.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-editable.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-resizable.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/colResizable-1.5.source.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-export.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-ar-SA.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-en-US.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-fr-FR.js') }}"></script>
    <script src="{{ URL::asset('select2/js/select2.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('js/a076d05399.js') }}"></script> --}}
    {{-- <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-filter.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-filter-control.min.js') }}"> --}}
    <script type="text/javascript">
        // var $loading = $('#loadingDiv').hide();
        // $(document)
        //     .ajaxStart(function() {
        //         var curr = $('body').height();
        //         $('.spinner-border').height(curr);
        //         $loading.show();
        //     })
        //     .ajaxStop(function() {
        //         $loading.hide();
        //     });

        var $table = $('#table')
        var $new = $('#new')
        var $preview = $('#preview')
        var $duplicate = $('#duplicate')
        var $retroactive = $('#retroactive')
        var $details = $('#details')
        var $edit = $('#edit')
        var $remove = $('#remove')
        var selections = []

        $new.prop('disabled', false)
        $remove.prop('disabled', true)
        $preview.prop('disabled', true)
        $duplicate.prop('disabled', true)
        $retroactive.prop('disabled', true)
        $details.prop('disabled', true)
        $edit.prop('disabled', true)

        function getIdSelections() {
            return $.map($table.bootstrapTable('getSelections'), function(row) {
                return row.id
            })
        }
        $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table',
            function() {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)
                $preview.prop('disabled', !($table.bootstrapTable('getSelections').length == 1))
                $duplicate.prop('disabled', !($table.bootstrapTable('getSelections').length == 1))
                $retroactive.prop('disabled', !($table.bootstrapTable('getSelections').length == 1))
                $details.prop('disabled', !($table.bootstrapTable('getSelections').length == 1))
                $edit.prop('disabled', !($table.bootstrapTable('getSelections').length == 1))
                // console.log($table.bootstrapTable('getSelections'));
                // save your data, here just save the current page
                selections = getIdSelections()
                // console.log(selections);
                // push or splice the selections if you want to save all data selections
            })

        $(document).ready(function() {
            $('#DangerModalhdbgcl').on('shown.bs.modal', function(e) {
                e.preventDefault();
                selections = getIdSelections()
                if (selections.length == 1) {
                    selections = selections[0];
                } else {
                    selections = selections.join(",");
                }
                console.log(selections);
                var url = "{{ route('certificates.destroy', 'id') }}".replace('id', selections);
                $("#Delete").attr("href", url);
                $("#CertificateName").text(selections);
            });
            $('#DuplicateModalhdbgcl').on('shown.bs.modal', function(e) {
                e.preventDefault();
                selections = getIdSelections()
                var url = "{{ route('certificates.duplicate-gzale', ['id', 'D', '']) }}".replace('id',
                    selections[0]);
                $("#Duplicate").attr("href", url);
                var text = $("#DuplicateModalhdbgcl p").text();
                $("#DuplicateModalhdbgcl p").text(text.replace('%code%', selections[0]));
            });

            $('#RetroactiveModalhdbgcl').on('shown.bs.modal', function(e) {
                e.preventDefault();
                selections = getIdSelections()
                var url = "{{ route('certificates.create-retroactive-copy', ['id', '']) }}".replace('id',
                    selections[0]);
                $("#Retroactive").attr("href", url);
                var text = $("#RetroactiveModalhdbgcl p").text();
                $("#RetroactiveModalhdbgcl p").text(text.replace('%code%', selections[0]));
            });

            $("#InformationproModalhdbgcl").on('shown.bs.modal', function() {
                selections = getIdSelections()
                if (selections.length == 1) {
                    selections = selections[0];
                } else {
                    selections = selections.join(",");
                }
                // console.log('hi '+selections);
                var url = "{{ route('certificates.sign', ['id', '']) }}".replace('id', selections);
                $("#SignGZAL").attr("href", url);
                $(this).data('bs.modal', null);
            });

            $("#InformationproModalhdbgcl").on('hidden.bs.modal', function() {
                $(this).data('bs.modal', null);
            });
            $("#Delete").click(function(e) {
                e.preventDefault();
                var url = $("#Delete").attr("href");
                // var id = url.substring(url.lastIndexOf('/') + 1);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        e.preventDefault();
                        selections = getIdSelections();
                        $table.bootstrapTable('remove', {
                            field: 'id',
                            values: selections
                        });
                        $('#DangerModalhdbgcl').modal('toggle');
                    }
                });
            });


            $("#Duplicate").click(function(e) {
                e.preventDefault();
                var url = $("#Duplicate").attr("href") + '/' + $("#DuplicateModalhdbgcl textarea").val();
                // var id = url.substring(url.lastIndexOf('/') + 1);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        $('#DuplicateModalhdbgcl').modal('toggle');
                        window.location.href = "{{ route('certificates.index') }}";
                    }
                });
            });

            $("#Retroactive").click(function(e) {
                e.preventDefault();
                var url = $("#Retroactive").attr("href") + '/' + $("#RetroactiveModalhdbgcl textarea")
                    .val();
                $('#RetroactiveModalhdbgcl').modal('toggle');
                window.location.href = url;
            });

            $("#new").click(function(e) {
                e.preventDefault();
                window.location.href = "{{ route('certificates.create') }}";
            });

            $(document).on("click", "#edit", function(e) {
                e.preventDefault();
                selections = getIdSelections()
                var url = "{{ route('certificates.edit', 'id') }}".replace('id', selections[0]);
                window.location.href = url;
            });
            $(document).on("click", "#preview", function(e) {
                // $("#preview").click(function(e) {
                e.preventDefault();
                selections = getIdSelections()
                var url = "{{ route('certificates.preview', 'id') }}".replace('id', selections[0]);
                // //
                // $("#SignGZAL").attr("href", $(this).attr("data-url"));
                // $("#RejectGZAL").attr("href", $(this).attr("data-reject-gzal-url"));
                // var id = url.substring(url.lastIndexOf('/') + 1);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var w = window,
                            d = document,
                            e = d.documentElement,
                            g = d.getElementsByTagName('body')[0],
                            y = w.innerHeight || e.clientHeight || g.clientHeight;

                        var object = document.getElementById("object");
                        object.height = y * 8 / 10;
                        object.data = response.url;
                        var embed = document.getElementById("embed");
                        embed.src = response.url;
                        $('#InformationproModalhdbgcl').modal('show');

                        role = '{{ Auth::User()->role->name }}';
                        if (role == 'user') {
                            if (response.status == 'DRAFT') {
                                $("#RejectGZAL").hide();
                                $("#SignGZAL").show();
                            } else if (response.status == 'PENDING') {
                                $("#SignGZAL").hide();
                                $("#RejectGZAL").hide();
                            } else if (response.status == 'SIGNED') {
                                $("#RejectGZAL").hide();
                                $("#SignGZAL").hide();
                                $(".notes").hide();
                            } else if (response.status == 'REJECTED') {
                                $("#RejectGZAL").hide();
                                $("#SignGZAL").hide();
                                $(".notes").hide();
                            }
                        } else { //if (role == 'dri_user') {
                            if (response.status == 'PENDING') {
                                $("#SignGZAL").show();
                                $("#RejectGZAL").show();
                            } else if (response.status == 'SIGNED') {
                                $("#RejectGZAL").hide();
                                $("#SignGZAL").hide();
                                $(".notes").hide();
                            } else if (response.status == 'REJECTED') {
                                $("#RejectGZAL").hide();
                                $("#SignGZAL").hide();
                                $(".notes").hide();
                            }
                        }
                        if (response.copy_type != "NONE") $(".notes").hide();
                    }
                });

            });

            $("#SignGZAL").click(function(e) {
                e.preventDefault();
                var url = $("#SignGZAL").attr("href") + '/' + ($("#notes").val() == '' ? 'null' : $(
                    "#notes").val());
                // alert('hire hi : '+url);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        

                        var w = window,
                            d = document,
                            e = d.documentElement,
                            g = d.getElementsByTagName('body')[0],
                            y = w.innerHeight || e.clientHeight || g.clientHeight;

                        var object = document.getElementById("object");
                        object.height = y * 8 / 10;
                        object.data = response.url;
                        var embed = document.getElementById("embed");
                        embed.src = response.url;

                        if (response.status == "PENDING") {
                            $("#" + response.certificate_id + " td:nth-child(4)").html(
                                '<button class="btn btn-info" style="font-size: 14px;padding:0px;">{{__('PENDING')}}</button>'
                            );
                        } else if (response.status == "SIGNED") {
                            $("#" + response.certificate_id + " td:nth-child(4)").html(
                                '<button class="btn btn-success" style="font-size: 14px;padding:0px;">{{__('SIGNED')}}</button>'
                            );
                        }
                        $("#SignGZAL").hide();
                        $("#RejectGZAL").hide();
                        $(".notes").hide();
                    }
                });
            });

            $("#RejectGZAL").click(function(e) {
                e.preventDefault();
                var url = $("#RejectGZAL").attr("href") + '/' + 'reason'; //$("#notes").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        // console.log(response.message);
                        // console.log(response);
                        // var object = document.getElementById("object");
                        // object.height = $(document).height() * 8 / 10;
                        // object.data = response.url;
                        // var embed = document.getElementById("embed");
                        // embed.src = response.url;
                        if (response.status == "PENDIG") {
                            $("#" + response.certificate_id + " td:nth-child(4)").html(
                                '<button class="btn btn-info" style="font-size: 14px;padding:0px;">PENDIG</button>'
                            );
                        } else if (response.status == "SIGNED") {
                            $("#" + response.certificate_id + " td:nth-child(4)").html(
                                '<button class="btn btn-success" style="font-size: 14px;padding:0px;">SIGNED</button>'
                            );
                        } else if (response.status == "REJECTED") {
                            $("#" + response.certificate_id + " td:nth-child(4)").html(
                                '<button class="btn btn-danger" style="font-size: 14px;padding:0px;">REJECTED</button>'
                            );
                        }
                        $("#SignGZAL").hide();
                        $("#RejectGZAL").hide();
                        $(".notes").hide();
                        $('#InformationproModalhdbgcl').modal('toggle');
                    }
                });
            });

        });


        $(document).on("change", "#certificatesSelecor", function() {
            var selectedCertificateType = $('#certificatesSelecor').find(":selected").val();
            console.log('<button class="btn btn-warning" style="font-size: 14px;padding:0px;">' +
                selectedCertificateType + '</button>');
            if (selectedCertificateType != 'ALL') {
                $table.bootstrapTable('filterBy', {
                    type_hidden: [selectedCertificateType, selectedCertificateType + '-D',
                        selectedCertificateType + '-R'
                    ]
                })
            }
        });


        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

    </script>
@endpush
