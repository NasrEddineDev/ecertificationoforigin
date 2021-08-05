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
                                        {{-- <select id="activitiesTest" class="activitiesTest select2 form-control"
                                    name="activitiesTest[]" multiple="multiple"> --}}
                                        <select id="theme" name="theme" class="form-control">
                                            <option selected disabled>{{ __('Select The Default Template') }}</option>
                                            <option {{ $certificate_template == '0' ? 'selected' : '' }} value="1">
                                                {{ __('Background Without Image') }}</option>
                                            <option {{ $certificate_template == '1' ? 'selected' : '' }} value="2">
                                                {{ __('Background With White Image') }}</option>
                                            <option {{ $certificate_template == '2' ? 'selected' : '' }} value="3">
                                                {{ __('Background With Colorized Image') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <button type="submit"
                                            class="btn btn-primary login-submit-cs">{{ __('Save') }}</button>
                                        {{-- <button type="submit"
                                            class="btn btn-danger login-submit-cs">{{ __('Delete') }}</button> --}}
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
                                            <input id="gzale_white" name="gzale_white[]" type="file" multiple>
                                        </td>
                                        <td>
                                            <input id="gzale_colorized" name="gzale_colorized[]" type="file" multiple>
                                        </td>
                                    </tr>
                                    <tr id="">
                                        <td>
                                            {{ __('Tunisia Certificate of Origin') }}
                                        </td>
                                        <td>
                                            <input id="acp_white" name="acp_white[]" type="file" multiple>
                                        </td>
                                        <td>
                                            <input id="acp_colorized" name="acp_colorized[]" type="file" multiple>
                                        </td>
                                    </tr>
                                    <tr id="">
                                        <td>
                                            {{ __('English Certificate of Origin') }}
                                        </td>
                                        <td>
                                            <input id="form_a_en_white" name="form_a_en_white[]" type="file" multiple>
                                        </td>
                                        <td>
                                            <input id="form_a_en_colorized" name="form_a_en_colorized[]" type="file"
                                                multiple>
                                        </td>
                                    </tr>
                                    <tr id="">
                                        <td>
                                            {{ __('French Certificate of Origin') }}
                                        </td>
                                        <td>
                                            <input id="formule_a_en_white" name="formule_a_en_white[]" type="file" multiple>
                                        </td>
                                        <td>
                                            <input id="formule_a_en_colorized" name="formule_a_en_colorized[]" type="file"
                                                multiple>
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
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/sortable.min.js"
        type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/locales/LANG.js"></script>
    <script type="text/javascript"
        src="{{ URL::asset('bootstrap-fileinput/js/locales/' . App()->currentLocale() . '.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var $table = $('#table')
        var $new = $('#new')
        var $preview = $('#preview')
        var $details = $('#details')
        var $edit = $('#edit')
        var $remove = $('#remove')
        var selections = []

        $new.prop('disabled', false)
        $preview.prop('disabled', true)
        $details.prop('disabled', true)
        $edit.prop('disabled', true)
        $remove.prop('disabled', true)

        function getIdSelections() {
            return $.map($table.bootstrapTable('getSelections'), function(row) {
                return row.id
            })
        }

        $table.on('check.bs.table uncheck.bs.table ' + 'check-all.bs.table uncheck-all.bs.table',
            function() {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)
                $preview.prop('disabled', !($table.bootstrapTable('getSelections').length == 1))
                $details.prop('disabled', !($table.bootstrapTable('getSelections').length == 1))
                $edit.prop('disabled', !($table.bootstrapTable('getSelections').length == 1))
                selections = getIdSelections()
            })


        $(document).on("click", "#details", function() {
            // $(this).find(".detail-icon").trigger("click");
            $tr = $('#1');
            console.log($tr);
            $table.bootstrapTable('expandRow', $tr);

        });

        $table.on('expand-row.bs.table', function(e, index, row, $detail) {
            $detail.html('Loading from ajax request...');
            var txt = []
            $.get('/getimporter/' + row['id'], function(res) {
                txt.push('<table>')
                // $.each(res.importer, function(key, value) {                    
                // var str = '<p><b>' + key + ': </b> ' + value + '</p>';
                var str = '<tr><td><b>{{ __('Name') }} : </b> ' + res.importer.name + '</td>';
                txt.push(str);
                var str = '<td><b>{{ __('Email') }} : </b> ' + res.importer.email + '</td>';
                txt.push(str);
                var str = '<td><b>{{ __('Country') }} : </b> ' + res.country.name + '</td>';
                txt.push(str);
                var str = '<td><b>{{ __('Tel') }} : </b> ' + res.importer.tel + '</td></tr>';
                txt.push(str);
                var str = '<tr><td><b>{{ __('Legal Form') }} : </b> ' + res.importer.legal_form +
                    '</td>';
                txt.push(str);
                var str = '<td><b>{{ __('Mobile') }} : </b> ' + res.importer.mobile + '</td>';
                txt.push(str);
                var str = '<td><b>{{ __('State') }} : </b> ' + res.state.name + '</td>';
                txt.push(str);
                var str = '<td><b>{{ __('Fax') }} : </b> ' + res.importer.fax + '</td></tr>';
                txt.push(str);
                var str = '<tr><td><b>{{ __('Activity Type') }} : </b> ' + res.category.name_ar +
                    '</td>';
                txt.push(str);
                var str = '<td></td>';
                txt.push(str);
                var str = '<td><b>{{ __('Address') }} : </b> ' + res.importer.address + '</td>';
                txt.push(str);
                var str = '<td><b>{{ __('Website') }} : </b> ' + res.importer.website + '</td></tr>';
                txt.push(str);
                // });
                $detail.html(txt.join("")); //res.toString().replace(/\n/g, '<br>'));
            });
        });

        function detailFormatter(index, row) {
            // $.ajax({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     url: '/getimporter/'+row['id'],
            //     type: 'GET',
            //     success: function(result) {
            //         console.log('row : '+row['id']);
            //         console.log('result : '+result.importer.id);
            //         // txt.push('<p><b>' + result.importer.id + ': </b> ' + result.importer.name + '</p>')
            //         // txt.push('<p><b>address: </b> ' + result.importer.address + '</p>')
            //         // txt.push('<p><b>address: </b> ' + result.importer.address + '</p>')
            //         // txt.push('<p><b>address: </b> ' + result.importer.address + '</p>')
            //         $.each(result.importer, function(key,value) {                    
            //             var str = '<p><b>' + key + ': </b> ' + value + '</p>';
            //             txt.push(str);
            //             });
            //             return false;
            //     }
            // });
            // var txt = []
            //         console.log(txt.join(", "));
            // console.log(txt);
            // console.log(txt.join(''));

            //                 $.each(row, function (key, value) {
            //                 html.push('<p><b>' + key + ': </b> ' + value + '</p>')
            //                 })
            // console.log(html);
            // console.log(html.join(''));
            // return txt.join('')
        }

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

            $(document).on("click", "#new", function() {
                if (this.className.indexOf("not-active") == -1) {
                    window.location.href = "{{ route('importers.create') }}";
                }
            });

            var gzale_white1 =
                'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
                gzale_white2 =
                'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg',
                gzale_white3 =
                'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg';

            $("#gzale_colorized").fileinput({
                language: '{{ App()->currentLocale() }}',
                rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                initialPreview: [gzale_white1, gzale_white2, gzale_white3],
                initialPreviewAsData: true,
                previewFileType: 'any',
                allowedFileTypes: ["image"],
                uploadExtraData: function() {
                    return {
                        _token: $("input[name='_token']").val(),
                    };
                },
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
                uploadUrl: "/file-upload-batch/1",
                overwriteInitial: false,
                uploadAsync: false,
                minFileCount: 3,
                maxFileCount: 3,
            });
            $("#gzale_white").fileinput({
                language: '{{ App()->currentLocale() }}',
                rtl: '{{ App()->currentLocale() == 'ar' ? true : false }}',
                uploadUrl: "/file-upload-batch/1",
                uploadAsync: false,
                minFileCount: 3,
                maxFileCount: 3,
                overwriteInitial: false,
                initialPreview: [
                    // IMAGE DATA
                    "https://kartik-v.github.io/bootstrap-fileinput-samples/samples/Desert.jpg",
                    // IMAGE DATA
                    "https://kartik-v.github.io/bootstrap-fileinput-samples/samples/Lighthouse.jpg",
                    // IMAGE DATA
                    "https://kartik-v.github.io/bootstrap-fileinput-samples/samples/Lighthouse.jpg",
                ],
                initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                initialPreviewDownloadUrl: 'https://kartik-v.github.io/bootstrap-fileinput-samples/samples/{filename}', // includes the dynamic `filename` tag to be replaced for each config
                initialPreviewConfig: [{
                        caption: "Desert.jpg",
                        description: "This is a representative placeholder description for this image.",
                        size: 827000,
                        width: "120px",
                        url: "/file-upload-batch/2",
                        key: 1
                    },
                    {
                        caption: "Lighthouse.jpg",
                        description: "This is a representative placeholder description for this image.",
                        size: 549000,
                        width: "120px",
                        url: "/file-upload-batch/2",
                        key: 2
                    },
                    {
                        caption: "Lighthouse.jpg",
                        fileActionSettings: {
                            showRemove: false,
                            showUpload: false
                        },
                        description: "This is a representative placeholder description for this image.",
                        size: 549000,
                        width: "120px",
                        url: "/file-upload-batch/2",
                        key: 2
                    },
                ],
                uploadExtraData: {
                    img_key: "1000",
                    img_keywords: "happy, places"
                }
            }).on('filesorted', function(e, params) {
                console.log('File sorted params', params);
            }).on('fileuploaded', function(e, params) {
                console.log('File uploaded params', params);
            });
            $("#acp_white, #acp_colorized").fileinput({
                language: '{{App()->currentLocale()}}',
                rtl: '{{App()->currentLocale() == 'ar' ? true : false}}',
                previewFileType: 'any',
                allowedFileTypes: ["image"],
                uploadExtraData: function() {
                    return {
                        _token: $("input[name='_token']").val(),
                    };
                },
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
                uploadUrl: "/file-upload-batch/1",
                uploadAsync: false,
                minFileCount: 3,
                maxFileCount: 3,
            });

            $("#form_a_en_white, #form_a_en_colorized").fileinput({
                language: '{{App()->currentLocale()}}',
                rtl: '{{App()->currentLocale() == 'ar' ? true : false}}',
                previewFileType: 'any',
                allowedFileTypes: ["image"],
                uploadExtraData: function() {
                    return {
                        _token: $("input[name='_token']").val(),
                    };
                },
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
                uploadUrl: "/file-upload-batch/1",
                uploadAsync: false,
                minFileCount: 2,
                maxFileCount: 2,
            });

            $("#formule_a_en_white, #formule_a_en_colorized").fileinput({
                language: '{{App()->currentLocale()}}',
                rtl: '{{App()->currentLocale() == 'ar' ? true : false}}',
                previewFileType: 'any',
                allowedFileTypes: ["image"],
                uploadExtraData: function() {
                    return {
                        _token: $("input[name='_token']").val(),
                    };
                },
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
                uploadUrl: "/file-upload-batch/1",
                uploadAsync: false,
                minFileCount: 2,
                maxFileCount: 2,
            });
        });
    </script>
@endpush
