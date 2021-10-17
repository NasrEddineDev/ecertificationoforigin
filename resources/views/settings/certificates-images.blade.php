@extends('layouts.mainlayout')
@Push('css')
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-editable.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/modals.css') }}" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/css/fileinput-rtl.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <style>
        .not-active {
            /* pointer-events: none; */
            cursor: default;
            text-decoration: none;
            background-color: gray !important;
        }

        table tr td,
        table tr th {
            vertical-align: middle !important;
            text-align: center !important;
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
                                <h1>{{ __('Importers List') }}</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                <div class="form-group row">
                                    <label
                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Template') }}</label>
                                    <div class="col-sm-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <select id="template" name="template" class="form-control">
                                            <option selected disabled>{{ __('Select The Default Template') }}</option>
                                            <option {{ $certificate_template == '0' ? 'selected' : '' }} value="0">
                                                {{ __('Background Without Image') }}</option>
                                            <option {{ $certificate_template == '1' ? 'selected' : '' }} value="1">
                                                {{ __('Background With White Image') }}</option>
                                            <option {{ $certificate_template == '2' ? 'selected' : '' }} value="2">
                                                {{ __('Background With Colorized Image') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <button type="submit" id="save" name="save"
                                            class="btn btn-primary login-submit-cs">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label
                                    class="col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('For each certificate, Upload Images in the order : page 1, page 2, ...') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <table id="table" data-toggle="table">
                                <thead>
                                    <tr>
                                        <th data-field="type" data-editable="true">{{ __('Type') }}</th>
                                        <th data-field="white_background" data-editable="true">
                                            {{ __('White Background') }}</th>
                                        <th data-field="colorized_background" data-editable="true">
                                            {{ __('Colorized Background') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="">
                                        <td>
                                            {{ __('Arab Certificate of Origin') }}
                                        </td>
                                        <td>
                                            <input id="1gzale" name="1gzale[]" type="file" multiple>
                                        </td>
                                        <td>
                                            <input id="2gzale" name="2gzale[]" type="file" multiple>
                                        </td>
                                    </tr>
                                    <tr id="">
                                        <td>
                                            {{ __('Tunisia Certificate of Origin') }}
                                        </td>
                                        <td>
                                            <input id="1acp-tunisie" name="1acp-tunisie[]" type="file" multiple>
                                        </td>
                                        <td>
                                            <input id="2acp-tunisie" name="2acp-tunisie[]" type="file" multiple>
                                        </td>
                                    </tr>
                                    <tr id="">
                                        <td>
                                            {{ __('English Certificate of Origin') }}
                                        </td>
                                        <td>
                                            <input id="1form-a-en" name="1form-a-en[]" type="file" multiple>
                                        </td>
                                        <td>
                                            <input id="2form-a-en" name="2form-a-en[]" type="file" multiple>
                                        </td>
                                    </tr>
                                    <tr id="">
                                        <td>
                                            {{ __('French Certificate of Origin') }}
                                        </td>
                                        <td>
                                            <input id="1formule-a-fr" name="1formule-a-fr[]" type="file" multiple>
                                        </td>
                                        <td>
                                            <input id="2formule-a-fr" name="2formule-a-fr[]" type="file" multiple>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    <h4 class="modal-title">{{ __('Delete the importer') }}</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                    <h2>{{ __('Remove Permanently!') }}</h2>
                    <p>{{ __('Do you want to delete the importers') }} <strong id="ImporterName"
                            style="color: #d80027!important;"></strong> {{ __('forever') }} ?</p>
                </div>
                <div class="modal-footer danger-md">
                    <a data-dismiss="modal" href="#" style="background-color: #d80027!important;">{{ __('No') }}</a>
                    <a id="delete" href="#" style="background-color: #d80027!important;">{{ __('Yes') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@Push('js')
    <!-- data table JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="bootstrap-fileinput/js/locales/LANG.js"></script>
    <script type="text/javascript"
        src="{{ URL::asset('bootstrap-fileinput/js/locales/' . App()->currentLocale() . '.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on("click", "#edit", function(e) {
                e.preventDefault();
                selections = getIdSelections()
                var url = "{{ route('importers.edit', 'id') }}".replace('id', selections[0]);
                window.location.href = url;
            });

            $('#DangerModalhdbgcl').on('shown.bs.modal', function(e) {
                e.preventDefault();
                selections = getIdSelections()
                if (selections.length == 1) {
                    selections = selections[0];
                } else {
                    selections = selections.join(",");
                }
                var url = "{{ route('importers.destroy', 'id') }}".replace('id', selections);
                $("#delete").attr("href", url);
                $("#ImporterName").text(selections);
            });

            $("#delete").click(function(e) {
                e.preventDefault();
                var url = $("#delete").attr("href");
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

            $(document).on("click", "#save", function() {
                var url = '/template/' + $('#template').find('option:selected').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'GET',
                    success: function(result) {
                    }
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'getcertificatesimages',
                type: 'GET',
                success: function(data) {
                    // GZALE
                    $("#1gzale").fileinput({
                        language: '{{ App()->currentLocale() }}',
                        rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                        uploadUrl: "/uploadcertificatesimages/1/gzale",
                        uploadAsync: false,
                        minFileCount: 3,
                        maxFileCount: 3,
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false,
                        },
                        initialPreview: [data.gzale1[0].url, data.gzale1[1].url, data.gzale1[2]
                            .url
                        ],
                        initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                        initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                        initialPreviewConfig: [{
                                caption: data.gzale1[0].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.gzale1[1].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.gzale1[2].caption,
                                showRemove: false,
                            },
                        ],
                    }).on('filesorted', function(e, params) {
                        console.log('File sorted params', params);
                    }).on('fileuploaded', function(e, params) {
                        console.log('File uploaded params', params);
                    });

                    $("#2gzale").fileinput({
                        language: '{{ App()->currentLocale() }}',
                        rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                        initialPreview: [data.gzale2[0].url, data.gzale2[1].url, data.gzale2[2]
                            .url
                        ],
                        initialPreviewConfig: [{
                                caption: data.gzale2[0].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.gzale2[1].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.gzale2[2].caption,
                                showRemove: false,
                            },
                        ],
                        initialPreviewAsData: true,
                        previewFileType: 'any',
                        allowedFileTypes: ["image"],
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false,
                        },
                        previewSettings: {
                            image: {
                                width: "auto",
                                height: "auto",
                                'max-width': "100%",
                                'max-height': "100%"
                            },
                        },
                        uploadUrl: "/uploadcertificatesimages/2/gzale",
                        // overwriteInitial: false,
                        uploadAsync: true,
                        minFileCount: 3,
                        maxFileCount: 3,
                    }).on('filesorted', function(e, params) {
                        console.log('File sorted params', params);
                    }).on('fileuploaded', function(e, params) {
                        console.log('File uploaded params', params);
                    });

                    // ACP
                    $("#1acp-tunisie").fileinput({
                        language: '{{ App()->currentLocale() }}',
                        rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                        uploadUrl: "/uploadcertificatesimages/1/acp-tunisie",
                        uploadAsync: false,
                        minFileCount: 3,
                        maxFileCount: 3,
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false,
                        },
                        initialPreview: [data.acpTunisie1[0].url, data.acpTunisie1[1].url, data
                            .acpTunisie1[2].url
                        ],
                        initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                        initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                        initialPreviewConfig: [{
                                caption: data.acpTunisie1[0].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.acpTunisie1[1].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.acpTunisie1[2].caption,
                                showRemove: false,
                            },
                        ],
                    }).on('filesorted', function(e, params) {
                        console.log('File sorted params', params);
                    }).on('fileuploaded', function(e, params) {
                        console.log('File uploaded params', params);
                    });

                    $("#2acp-tunisie").fileinput({
                        language: '{{ App()->currentLocale() }}',
                        rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                        initialPreview: [data.acpTunisie2[0].url, data.acpTunisie2[1].url, data
                            .acpTunisie2[2].url
                        ],
                        initialPreviewConfig: [{
                                caption: data.acpTunisie2[0].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.acpTunisie2[1].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.acpTunisie2[2].caption,
                                showRemove: false,
                            },
                        ],
                        initialPreviewAsData: true,
                        previewFileType: 'any',
                        allowedFileTypes: ["image"],
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false,
                        },
                        previewSettings: {
                            image: {
                                width: "auto",
                                height: "auto",
                                'max-width': "100%",
                                'max-height': "100%"
                            },
                        },
                        uploadUrl: "/uploadcertificatesimages/2/acp-tunisie",
                        // overwriteInitial: false,
                        uploadAsync: true,
                        minFileCount: 3,
                        maxFileCount: 3,
                    }).on('filesorted', function(e, params) {
                        console.log('File sorted params', params);
                    }).on('fileuploaded', function(e, params) {
                        console.log('File uploaded params', params);
                    });

                    // Form A En
                    $("#1form-a-en").fileinput({
                        language: '{{ App()->currentLocale() }}',
                        rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                        uploadUrl: "/uploadcertificatesimages/1/form-a-en",
                        uploadAsync: false,
                        minFileCount: 2,
                        maxFileCount: 2,
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false,
                        },
                        initialPreview: [data.formAEn1[0].url, data.formAEn1[1].url],
                        initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                        initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                        initialPreviewConfig: [{
                                caption: data.formAEn1[0].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.formAEn1[1].caption,
                                showRemove: false,
                            }
                        ],
                    }).on('filesorted', function(e, params) {
                        console.log('File sorted params', params);
                    }).on('fileuploaded', function(e, params) {
                        console.log('File uploaded params', params);
                    });

                    $("#2form-a-en").fileinput({
                        language: '{{ App()->currentLocale() }}',
                        rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                        initialPreview: [data.formAEn2[0].url, data.formAEn2[1].url],
                        initialPreviewConfig: [{
                                caption: data.formAEn2[0].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.formAEn2[1].caption,
                                showRemove: false,
                            }
                        ],
                        initialPreviewAsData: true,
                        previewFileType: 'any',
                        allowedFileTypes: ["image"],
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false,
                        },
                        previewSettings: {
                            image: {
                                width: "auto",
                                height: "auto",
                                'max-width': "100%",
                                'max-height': "100%"
                            },
                        },
                        uploadUrl: "/uploadcertificatesimages/2/form-a-en",
                        // overwriteInitial: false,
                        uploadAsync: false,
                        minFileCount: 2,
                        maxFileCount: 2,
                    }).on('filesorted', function(e, params) {
                        console.log('File sorted params', params);
                    }).on('fileuploaded', function(e, params) {
                        console.log('File uploaded params', params);
                    });

                    // Formule A Fr
                    $("#1formule-a-fr").fileinput({
                        language: '{{ App()->currentLocale() }}',
                        rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                        uploadUrl: "/uploadcertificatesimages/1/formule-a-fr",
                        uploadAsync: false,
                        minFileCount: 2,
                        maxFileCount: 2,
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false,
                        },
                        initialPreview: [data.formuleAFr1[0].url, data.formuleAFr1[1].url],
                        initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                        initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                        initialPreviewConfig: [{
                                caption: data.formuleAFr1[0].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.formuleAFr1[1].caption,
                                showRemove: false,
                            }
                        ],
                    }).on('filesorted', function(e, params) {
                        console.log('File sorted params', params);
                    }).on('fileuploaded', function(e, params) {
                        console.log('File uploaded params', params);
                    });

                    $("#2formule-a-fr").fileinput({
                        language: '{{ App()->currentLocale() }}',
                        rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                        initialPreview: [data.formuleAFr2[0].url, data.formuleAFr2[1].url],
                        initialPreviewConfig: [{
                                caption: data.formuleAFr2[0].caption,
                                showRemove: false,
                            },
                            {
                                caption: data.formuleAFr2[1].caption,
                                showRemove: false,
                            }
                        ],
                        initialPreviewAsData: true,
                        previewFileType: 'any',
                        allowedFileTypes: ["image"],
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false,
                        },
                        previewSettings: {
                            image: {
                                width: "auto",
                                height: "auto",
                                'max-width': "100%",
                                'max-height': "100%"
                            },
                        },
                        uploadUrl: "/uploadcertificatesimages/2/formule-a-fr",
                        // overwriteInitial: false,
                        uploadAsync: true,
                        minFileCount: 2,
                        maxFileCount: 2,
                    }).on('filesorted', function(e, params) {
                        console.log('File sorted params', params);
                    }).on('fileuploaded', function(e, params) {
                        console.log('File uploaded params', params);
                    });
                }
            });
        });
    </script>
@endpush
