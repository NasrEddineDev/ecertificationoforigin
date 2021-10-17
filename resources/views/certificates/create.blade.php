@extends('layouts.mainlayout')

@Push('css')
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-editable.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/modals.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('wizard/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datapicker/datepicker3.css') }}" />
    <style>
        .pdfobject-container {
            height: 30rem;
            border: 1rem solid rgba(0, 0, 0, .1);
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

        .modal-dialog {
            width: 90% !important;
            height: 90% !important;
            margin: auto;
            margin-top: 20px;
            padding: auto;
        }

        .modal-edu-general .modal-body {
            text-align: center;
            padding: 0;
            width: 100%;
            height: 100% !important;
        }

        .modal-content {
            height: auto;
            min-height: 100%;
            border-radius: 0;
        }

        .not-active {
            cursor: default;
            text-decoration: none;
            background-color: gray !important;
        }

        html,
        body {
            height: 100%;
        }
        a.disable {
            pointer-events: none;
            background-color: gray !important;
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
@endpush

@section('content')
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Add New Certificate') }}</h4>
                                <br />
                                <form class="form-sample" method="post" action="{{ route('certificates.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="type" id="type" value="{{ $type }}">
                                    <p class="card-description"> {{ __('General Information') }} </p>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Certificate Number') }}</label>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <input type="text" name="certificate_number"
                                                        placeholder="{{ __('Certificate Number') }}" id="certificate_number"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Importer') }}</label>
                                                <div
                                                    class="col-lg-7 col-md-7 col-sm-7 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                    <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                        name="importer_id" id="importer_id" class="form-control" required>
                                                        <option value="06" disabled selected>
                                                            {{ __('Select The Importer') }}
                                                        </option>
                                                        @foreach ($importers as $importer){
                                                            <option value="{{ $importer->id }}">
                                                                {{ $importer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1">
                                                    <div class="toolbar add-product dt-tb">
                                                        <a class="{{ Auth::User()->role->name == 'user' && Auth::User()->enterprise->status == 'PENDING' ? 'not-active' : '' }}"
                                                            href="{{ route('importers.create') }}"
                                                            style="padding: 6px 12px;height: 40px;top:auto;{{ App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : '' }}">
                                                            <i class="fa fa-user-plus fa-lg"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($type == 'gzale')
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label
                                                        class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Accumulation application') }}</label>
                                                    <div
                                                        class="col-lg-3 col-md-3 col-sm-3 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                        <select name="accumulation" id="accumulation" class="form-control"
                                                            required>
                                                            <option value="No" selected>{{ __('No') }}</option>
                                                            <option value="Yes">{{ __('Yes') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-5 accumulation_country" style="display:none;">
                                                        <select name="accumulation_country" id="accumulation_country"
                                                            class="form-control">
                                                            @foreach ($countries as $country){
                                                                <option value="{{ $country->id }}">
                                                                    {{ $country->native }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Producer') }}</label>
                                                <div
                                                    class="col-lg-7 col-md-7 col-sm-7 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                    <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                        name="producer_id" id="producer_id" class="form-control">
                                                        <option value="" selected>
                                                            {{ __('Select The Producer If Exist') }}
                                                        </option>
                                                        @foreach ($producers as $producer){
                                                            <option value="{{ $producer->id }}">
                                                                {{ $producer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1">
                                                    <div class="toolbar add-product dt-tb">
                                                        <a class="{{ Auth::User()->role->name == 'user' && Auth::User()->enterprise->status == 'PENDING' ? 'not-active' : '' }}"
                                                            href="{{ route('producers.create') }}"
                                                            style="padding: 6px 12px;height: 40px;top:auto;{{ App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : '' }}">
                                                            <i class="fa fa-user-plus fa-lg"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Shipment') }}</label>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <select name="shipment_type" id="shipment_type" class="form-control"
                                                        required>
                                                        <option value="Land">{{ __('Land') }}</option>
                                                        <option value="Rail">{{ __('Rail') }}</option>
                                                        <option value="Air">{{ __('Air') }}</option>
                                                        <option value="Sea">{{ __('Sea') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <p class="card-description"> {{ __('Invoice') }} </p>
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Number And Date') }}</label>
                                                <div class="form-group col-lg-8 col-md-8 col-sm-8">
                                                    <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}"
                                                        style="{{ App()->currentLocale() == 'ar' ? 'padding-right: 0px!important;' : 'padding-left: 0px!important;' }}">
                                                        <input name="invoice_number" id="invoice_number"
                                                            placeholder="{{ __('Number') }}" type="text"
                                                            class="form-control" required />
                                                    </div>
                                                    <div class="col-md-6" style="padding-right: 0px!important;padding-left: 0px!important;">
                                                        <input name="invoice_date" id="invoice_date"
                                                            placeholder="{{ __('Date') }}" type="text"
                                                            class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <p class="card-description"><br \> </p>
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Invoice File') }}</label>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="box">
                                                        <input type="file" name="invoice" id="invoice"
                                                            class="inputfile inputfile-2" accept="image/*"
                                                            oninvalid="setCustomValidity('Please, blah, blah, blah ')"
                                                            data-msg-accept="{{ __('Only image file is accpeted') }}"
                                                            data-multiple-caption="{count} files selected" multiple
                                                            required />
                                                        <label for="invoice"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="10" viewBox="0 0 20 17">
                                                                <path
                                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                            </svg>
                                                            <span>{{ __('Choose the Invoice file') }}&hellip;</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <p class="card-description"> {{ __('Weight (KG)') }} </p>
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Weight (KG)') }}</label>
                                                <div class="form-group col-lg-8 col-md-8 col-sm-8">
                                                    <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}"
                                                        style="{{ App()->currentLocale() == 'ar' ? 'padding-right: 0px!important;' : 'padding-left: 0px!important;' }}">
                                                        <input name="net_weight" id="net_weight" required
                                                            placeholder="{{ __('Net Weight (KG)') }}" type="text"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="col-md-6"
                                                        style="padding-right: 0px!important;padding-left: 0px!important;">
                                                        <input name="real_weight" id="real_weight"
                                                            placeholder="{{ __('Real Weight (KG)') }}" type="text"
                                                            class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <p class="card-description"><br \> </p>
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Integrity Rate') }}</label>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <input type="text" name="integrity_rate"
                                                        placeholder="{{ __('Integrity Rate') }}" id="integrity_rate"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Description of Products') }}</label>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <textarea id="products_description" name="products_description"
                                                        cols="50" class="form-control" required
                                                        placeholder="{{ __('Description of Products') }}"
                                                        style="height: 40px"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-lg-4 col-md-4 col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Incoterms') }}</label>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <select name="incoterm" id="incoterm" class="form-control" required>
                                                        <option value="" selected disabled>
                                                            {{ __('Select The Incoterm') }}</option>
                                                        <option value="EXW">{{ __('EXW') }}</option>
                                                        <option value="CFR">{{ __('CFR') }}</option>
                                                        <option value="C&F">{{ __('C&F') }}</option>
                                                        <option value="CPT">{{ __('CPT') }}</option>
                                                        <option value="CIF">{{ __('CIF') }}</option>
                                                        <option value="FOB">{{ __('FOB') }}</option>
                                                        <option value="DAP">{{ __('DAP') }}</option>
                                                        <option value="FCA">{{ __('FCA') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="sparkline13-list">
                                                <div class="sparkline13-hd">
                                                    <div class="main-sparkline13-hd">
                                                        <p class="card-description"> {{ __('Products List') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="sparkline13-graph">
                                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                                        <div class="toolbar add-product dt-tb">
                                                            <a class="add-row dt-tb"
                                                                style="float:left;right:auto!important;position: unset;"
                                                                href="#">{{ __('Add New Product') }}</a>
                                                        </div>
                                                        <table id="table" data-toggle="table" data-show-refresh="true"
                                                            data-key-events="true" data-resizable="true" data-cookie="true"
                                                            data-cookie-id-table="saveId" data-toolbar="#toolbar">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th data-field="id">{{ __('ID') }}</th>
                                                                    <th data-field="name" data-editable="true">
                                                                        {{ __('Product Name') }}
                                                                    </th>
                                                                    <th data-field="unit_price" data-editable="true">
                                                                        {{ __('Unit Price') }}</th>
                                                                    <th data-field="currency" data-editable="true">
                                                                        {{ __('Currency') }}</th>
                                                                    <th data-field="package_type" data-editable="true">
                                                                        {{ __('Package Type') }}</th>
                                                                    <th data-field="package_count" data-editable="true">
                                                                        {{ __('Package Count') }}</th>
                                                                    <th data-field="package_quantity" data-editable="true">
                                                                        {{ __('Package Quantity') }}</th>
                                                                    <th data-field="description" data-editable="true">
                                                                        {{ __('Description') }}</th>
                                                                    <th data-field="action">{{ __('Action') }}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-12" style="text-align: center">
                                                    <div class="login-horizental cancel-wp form-bc-ele">
                                                        <button type="button" class="btn btn-white">
                                                            <a href="{{ route('certificates.index') }}"
                                                                style="color: inherit;">{{ __('Cancel') }}</a>
                                                        </button>
                                                        <button id="save" type="submit"
                                                            class="btn btn-primary login-submit-cs">{{ __('Save Change') }}</button>
                                                        <a rel="tooltip" id="previous" class="btn btn-success pd-setting-ed"
                                                            href="#"
                                                            data-url="{{ route('certificates.generate-gzal', 1) }}"
                                                            data-certificate_name="" data-original-title=""
                                                            data-toggle="modal" data-target="">
                                                            {{ __('Preview') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="InformationproModalhdbgcl" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-6">
                    <h4 class="modal-title">{{ __('CACI E-Certification') }}</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">

                    <object style="width:100%;" id="object"
                        data="{{ asset('data/enterprises/' . Auth::User()->Enterprise->id . '/certificates/gzal-draft.pdf') }}"
                        type="application/pdf">
                        <embed id="embed"
                            src="{{ asset('data/enterprises/' . Auth::User()->Enterprise->id . '/certificates/gzal-draft.pdf') }}"
                            type="application/pdf" />
                    </object>
                </div>
                <div class="modal-footer danger-md" style="background-color: #65b12d!important;">
                </div>
            </div>
        </div>
    </div>
@endsection

@Push('js')
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/data-table-active.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-editable.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-resizable.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/colResizable-1.5.source.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="{{ URL::asset('js/input-mask/jquery.inputmask.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/lang/messages_' . App()->currentLocale() . '.js') }}">
        <script type="text/javascript" src="{{ URL::asset('js/datapicker/bootstrap-datepicker.js') }}"></script>
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            var counter = 0;
            var products = [];

            $('#accumulation').on('change', function() {
                if (this.value == 'Yes') {
                    $('.accumulation_country').show();
                } else {
                    $('.accumulation_country').hide();
                }
            });
            $.fn.datepicker.dates['ar'] = {
                days: ["الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت"],
                daysShort: ["الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت"],
                daysMin: ["الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت"],
                months: ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر" ],
                monthsShort: ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                today: "اليوم",
                clear: "مسح",
                format: "dd/mm/yyyy",
                titleFormat: "MM yyyy",
                weekStart: 0
            };
            var lang = "{{ App()->currentLocale() }}";
            $('#invoice_date').datepicker({
                rtl: (lang == 'ar') ? true : false,
                format: 'dd-mm-yyyy',
                autoclose: true,
                language: '{{ App()->currentLocale()}}'
            });

            $.validator.addMethod("productcountcheck", function(value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    &&
                    /[a-z]/.test(value) // has a lowercase letter
                    &&
                    /\d/.test(value) // has a digit
            });


            var validator = $(".form-sample").validate({
                rules: {
                    invoice: {
                        required: true,
                        extension: "jpg|jpeg|gif|png"
                    },
                    invoice_date: {
                        required: true,
                    },
                    table: {
                        productcountcheck: $('#table tr').length
                    },

                },
                messages: {
                    invoice: {
                        required: "{{ __('This field is required.') }}",
                        extension: "select valid input file format"
                    },
                    invoice_date: {
                        required: "{{ __('This field is required.') }}",
                    },
                    table: {
                        productcountcheck: "{{ __('Add one product at least') }}"
                    },
                },
            });

            function downloadFile(response) {
                var blob = new Blob([response], {
                    type: 'application/pdf'
                })
                var url = URL.createObjectURL(blob);
                var win = window.open(url, '_blank');
                if (win) {
                    //Browser has allowed it to be opened
                    win.focus();
                } else {
                    //Browser has blocked it
                    location.assign(url);
                }
            }

            $("#previous").click(function(e) {
                e.preventDefault();

                var invoice = document.getElementById("invoice").files[0],
                    formdata = false;
                formdata = new FormData();
                formdata.append("certificate_number", $('#certificate_number').val());
                formdata.append("importer_id", $('#importer_id').find(":selected").val());
                formdata.append("producer_id", $('#producer_id').find(":selected").val());
                formdata.append("accumulation", $('#accumulation').find(":selected").val());
                formdata.append("accumulation_country", $('#accumulation_country').find(":selected").text());
                formdata.append("shipment_type", $('#shipment_type').val());
                formdata.append("notes", $('#notes').val());
                formdata.append("type", $('#type').val());
                formdata.append("net_weight", $('#net_weight').val());
                formdata.append("real_weight", $('#real_weight').val());
                formdata.append("invoice_date", $('#invoice_date').val());
                formdata.append("invoice_number", $('#invoice_number').val());
                formdata.append("integrity_rate", $('#integrity_rate').val());
                formdata.append("incoterm", $('#incoterm').val());
                formdata.append("products_description", $('#products_description').val());
                formdata.append("invoice", invoice);
                formdata.append("products", JSON.stringify(products));
                if ($(".form-sample").valid()) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{ route('certificates.generate-gzal') }}",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formdata,
                        success: function(response) {
                            var w = window,
                                d = document,
                                e = d.documentElement,
                                g = d.getElementsByTagName('body')[0],
                                y = w.innerHeight || e.clientHeight || g.clientHeight;

                            var object = document.getElementById("object");
                            object.height = y * 8.4 / 10;
                            object.data = response.url;
                            var embed = document.getElementById("embed");
                            embed.src = response.url;
                            $('#InformationproModalhdbgcl').modal('show');
                        }
                    });
                }
            });


            $("#save").click(function(e) {
                e.preventDefault();

                var invoice = document.getElementById("invoice").files[0],
                    formdata = false;
                formdata = new FormData();
                formdata.append("certificate_number", $('#certificate_number').val());
                formdata.append("importer_id", $('#importer_id').find(":selected").val());
                formdata.append("producer_id", $('#producer_id').find(":selected").val());
                formdata.append("accumulation", $('#accumulation').find(":selected").val());
                formdata.append("accumulation_country", $('#accumulation_country').find(":selected").text());
                formdata.append("shipment_type", $('#shipment_type').val());
                formdata.append("notes", $('#notes').val());
                formdata.append("type", $('#type').val());
                formdata.append("net_weight", $('#net_weight').val());
                formdata.append("real_weight", $('#real_weight').val());
                formdata.append("invoice_date", $('#invoice_date').val());
                formdata.append("invoice_number", $('#invoice_number').val());
                formdata.append("integrity_rate", $('#integrity_rate').val());
                formdata.append("incoterm", $('#incoterm').val());
                formdata.append("products_description", $('#products_description').val());
                formdata.append("invoice", invoice);
                formdata.append("products", JSON.stringify(products));
                console.log(typeof value === "undefined");
                if ($(".form-sample").valid()) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ route('certificates.store') }}',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formdata,
                        success: function(data) {
                            window.location.href = "{{ route('certificates.index') }}";
                        },
                        error: function(data) {
                            console.log('error');
                            return false;
                            if (data.errors) {}
                        }
                    });
                }
            });


            $(document).on('change', '#product_id', function() {
                // get product measure unit
                var selectedProductId = $('#product_id').find(":selected").val();
                var selectedProductMeasureUnit = $('#product_id').find(":selected").data('measure_unit');
                if (selectedProductMeasureUnit == 'KG')
                    $('#package_quantity').attr('placeholder', '{{ __('KG') }}');
                else if (selectedProductMeasureUnit == 'U')
                    $('#package_quantity').attr('placeholder', '{{ __('U') }}');
                else if (selectedProductMeasureUnit == 'T')
                    $('#package_quantity').attr('placeholder', '{{ __('T') }}');
                else if (selectedProductMeasureUnit == 'L')
                    $('#package_quantity').attr('placeholder', '{{ __('L') }}');
                else if (selectedProductMeasureUnit == 'M')
                    $('#package_quantity').attr('placeholder', '{{ __('M') }}');
                else if (selectedProductMeasureUnit == 'M²')
                    $('#package_quantity').attr('placeholder', '{{ __('M²') }}');
            });
            // add products
            $(".add-row").click(function(e) {
                e.preventDefault();
                counter++;
                var new_line =
                    '<tr><td></td><td>' + counter +
                    '</td><td><select name="product_id" id="product_id" class="form-control"></select></td><td><input ' +
                    'name="unit_price" id="unit_price" placeholder="{{ __('Unit Price') }}"  type="text" class="form-control" /></td>' +
                    '<td><select name="currency" id="currency" class="form-control"><option value="DZD">{{ __('DZD') }}' +
                    '</option><option value="SAR">{{ __('SAR') }} </option><option value="AED">{{ __('AED') }} </option>' +
                    '<option value="CNY">{{ __('CNY') }} </option><option value="EUR">{{ __('EUR') }} </option>' +
                    '<option value="USD">{{ __('USD') }}</option><option value="CAD">{{ __('CAD') }}</option></select></td>' +
                    '<td><select name="package_type" id="package_type" class="form-control"><option value="FIBREBOARD BOXES (CARDBOARD BOXES)">{{ __('FIBREBOARD BOXES (CARDBOARD BOXES)') }}' +
                    '</option><option value="CLEATED PLYWOOD BOXES">{{ __('CLEATED PLYWOOD BOXES') }} </option><option value="STEEL DRUMS">{{ __('STEEL DRUMS') }}</option><option value="BARRELS, CASKS OR KEGS">' +
                    '{{ __('BARRELS, CASKS OR KEGS') }}</option><option value="MULTI-WALL SHIPPING SACKS">{{ __('MULTI-WALL SHIPPING SACKS') }}</option><option value="BALES">{{ __('BALES') }}</option>' +
                    '<option value="PALLETIZING CARGO">{{ __('PALLETIZING CARGO') }}</option></select></td><td><input name="package_count" ' +
                    'id="package_count" placeholder="{{ __('Count') }}" type="text" class="form-control" /></td><td><input name="package_quantity" id="package_quantity" ' +
                    'placeholder="{{ __('Quantity (KG/T/L/U/M/M²)') }}" type="text" class="form-control" /></td><td><input ' +
                    'name="description" id="description" placeholder="{{ __('Description') }}"  type="text" class="form-control" /></td>' +
                    '<td><a class="btn btn-success" href="javascript:void(0)" id="checkRow" float-right><i class="fa fa-check"></i></a></td></tr>';
                if (counter == 1) {
                    $('table tbody').empty();
                }
                $("table tbody").append(new_line);

                $(".add-row").addClass('disable');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('products.getproducts') }}",
                    type: "GET",
                    success: function(data) {
                        $('#product_id').empty();
                        $('#product_id').append(
                            '<option value="0" disabled selected> {{ __('Select The Product') }}</option>'
                        );
                        $.each(data.products, function(index, product) {
                            $('#product_id').append('<option value="' + product.id +
                                '" data-measure_unit="' + product.measure_unit +
                                '">' + product.name + '</option>');
                        })
                    }
                })
            });

            $('table tbody').on('click', '#checkRow', function() {
                products.push({
                    number: counter,
                    product_id: $('#product_id').find('option:selected').val(),
                    product_name: $('#product_id').find('option:selected').text(),
                    unit_price: $('#unit_price').val(),
                    currency: $('#currency').find('option:selected').val(),
                    package_type: $('#package_type').find('option:selected').val(),
                    package_type_name: $('#package_type').find('option:selected').text(),
                    package_quantity: $('#package_quantity').val(),
                    package_count: $('#package_count').val(),
                    description: $('#description').val(),
                });

                var new_product = '<tr><td></td><td>' + counter + '</td><td>' + $('#product_id').find(
                        'option:selected').text() + '</td><td>' + $('#unit_price').val() + '</td>' +
                    '<td>' +
                    $('#currency').val() + '</td><td>' + $('#package_type').find('option:selected').text() +
                    '</td><td>' + $('#package_count').val() + '</td><td>' + $('#package_quantity').val() +
                    '</td><td>' + $('#description').val() + '</td>' +
                    '<td class="datatable-ct"><a rel="tooltip" class="btn btn-danger pd-setting-ed" href="javascript:void(0)" ' +
                    'id="removeRow" style="background-color: #d80027!important;"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>' +
                    '<div class="ripple-container"></div></a></td></tr>';

                $(this).parents('tr').remove();
                $("table tbody").append(new_product);

                $(".add-row").removeClass('disable');
            });

            $('table tbody').on('click', '#removeRow', function() {
                console.log($(this).parents('tr').find("td:eq(1)").text());
                products = products.filter(function(obj) {
                    return obj.product_name != $(this).parents('tr').find("td:eq(1)").text();
                });
                console.log(products);
                $(this).parents('tr').remove();
                if (products.length == 0) {
                    $("table tbody").append('<td colspan="7">No matching records found</td>');
                }
            });

            $('#invoice_date').inputmask({
                alias: "datetime",
                inputFormat: "dd/mm/yyyy",
                placeholder: (lang == 'en') ? 'dd/mm/yyyy' : (lang == 'fr' ? 'jj/mm/aaaa' : String.fromCharCode(parseInt('FEF1', 16), parseInt('FEF1', 16)) + '/' +
                    String.fromCharCode(parseInt('FEB5', 16), parseInt('FEB5', 16)) + '/' +
                    String.fromCharCode(parseInt('FEC9', 16), parseInt('FEC9', 16), parseInt('FEC9', 16),
                        parseInt('FEC9', 16)))
            });

            $('#integrity_rate').inputmask({ regex: "^% [0-9][0-9]?$|^% 100$", placeholder: "" });
            $(document).on('DOMNodeInserted', function(e) {
                if (e.target.id == 'invoice-error') {
                    $('#invoice-error').insertAfter($('#invoice-error').next());
                }
            });
        });
    </script>
@endpush
