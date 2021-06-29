@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('wizard/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('select2/css/select2.min.css') }}">
    <style>
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
    </style>
@endpush

@section('content')

    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline7-list mt-b-30">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('General Settings') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Payments --}}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="sparkline7-list mt-b-30">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Language') }}</h4>
                                <form method="post" action="{{ route('settings.update', 'payments') }}"
                                    class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-12 {{ App()->currentLocale() == 'ar' ? 'pull-left' : 'pull-right' }}" style="width: auto">
                                                        <button type="submit"
                                                            class="btn btn-primary login-submit-cs">{{ __('Save Change') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> {{ __('Payments Information') }} </p>
                                    <div class="row">
                                        <div class="col-md-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Offers List') }}</label>
                                                <div class="col-sm-10">
                                                    {{-- <select id="activitiesTest" class="activitiesTest select2 form-control"
                                                    name="activitiesTest[]" multiple="multiple"> --}}
                                                    <select id="offers_list" name="offers_list[]"
                                                        class="form-control select2" multiple="multiple">
                                                        @foreach (explode(',', $settings->where('name', 'Offers List')->first()->value) as $offer)
                                                            <option selected value="{{ $offer }}">
                                                                {{ $offer }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-6 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Unit Price') }}</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="unit_price" id="unit_price"
                                                        class="form-control" placeholder="{{ __('Unit Price') }}"
                                                        value="{{ $settings->where('name', 'Unit Price')->first()->value }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-6 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Username Poste') }}</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="username_poste" id="username_poste"
                                                        class="form-control" placeholder="{{ __('Username Poste') }}"
                                                        value="{{ $settings->where('name', 'Username Poste')->first()->value }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-5 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Password Poste') }}</label>
                                                <div class="col-sm-7">
                                                    <input type="password" name="password_poste" id="password_poste"
                                                        class="form-control" placeholder="{{ __('Password Poste') }}"
                                                        value="{{ $settings->where('name', 'Password Poste')->first()->value }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Registration Url Poste') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="order_registration_url_poste" id="order_registration_url_poste"
                                                        class="form-control" placeholder="{{ __('Registration Url Poste') }}" style="text-align: left"
                                                        value="{{ $settings->where('name', 'Order Registration Url Poste')->first()->value }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Status Url Poste') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="order_status_url_poste" id="order_status_url_poste"
                                                        class="form-control" placeholder="{{ __('Status Url Poste') }}" style="text-align: left"
                                                        value="{{ $settings->where('name', 'Order Status Url Poste')->first()->value }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Stamps --}}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="sparkline7-list mt-b-30">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Theme') }}</h4>
                                <br />
                                <form method="post" action="{{ route('settings.update', 'stamps') }}"
                                    class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    
                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-12 {{ App()->currentLocale() == 'ar' ? 'pull-left' : 'pull-right' }}" style="width: auto">
                                                        <button type="submit"
                                                            class="btn btn-primary login-submit-cs">{{ __('Save Change') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="card-description">
                                        {{ __('Stamp Information') }} </p>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-row">
                                                <div class="form-holder signature_center">
                                                    <div class="file-upload">
                                                        <button class="file-upload-btn" type="button"
                                                            onclick="$('.file-upload-input-square-stamp').trigger( 'click' )">
                                                            {{ __('Add Arabic Stamp Image') }}
                                                        </button>

                                                        <div class="image-upload-wrap-square-stamp">
                                                            <input class="file-upload-input-square-stamp"
                                                                name="round_stamp_ar" id="round_stamp_ar" type='file'
                                                                onchange="readURLSquareStamp(this);" accept="image/*" />
                                                            <div class="drag-text">
                                                                <h3>{{ __('Drag and drop an image or select add Image') }}
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="file-upload-content-square-stamp">
                                                            <img class="file-upload-image-square-stamp"
                                                                src="{{ config('settings.ROUND_STAMP_AR_FILE_PATH') }}"
                                                                alt="your image" />
                                                            <div class="image-title-wrap">
                                                                <button type="button" onclick="removeUploadSquareStamp()"
                                                                    class="remove-image">
                                                                    {{ __('Remove') }} <span
                                                                        class="image-title-square-stamp">{{ __('Uploaded Image') }}</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-row">
                                                <div class="form-holder signature_center">
                                                    <div class="file-upload">
                                                        <button class="file-upload-btn" type="button"
                                                            onclick="$('.file-upload-input-round-stamp').trigger( 'click' )">{{ __('Add English Stamp Image') }}</button>

                                                        <div class="image-upload-wrap-round-stamp">
                                                            <input class="file-upload-input-round-stamp"
                                                                name="round_stamp_en" id="round_stamp_en" type='file'
                                                                onchange="readURLRoundStamp(this);" accept="image/*" />
                                                            <div class="drag-text">
                                                                <h3>{{ __('Drag and drop an image or select add Image') }}
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="file-upload-content-round-stamp">
                                                            <img class="file-upload-image-round-stamp"
                                                                src="{{ config('settings.ROUND_STAMP_EN_FILE_PATH') }}"
                                                                alt="your image" />
                                                            <div class="image-title-wrap">
                                                                <button type="button" onclick="removeUploadRoundStamp()"
                                                                    class="remove-image">
                                                                    {{ __('Remove') }} <span
                                                                        class="image-title-round-stamp">{{ __('Uploaded Image') }}</span>
                                                                </button>
                                                            </div>
                                                        </div>
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
                {{-- AGCE --}}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('AGCE') }}</h4>
                                <br />
                                <form method="post" action="{{ route('settings.update', 'agce') }}"
                                    class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-12 {{ App()->currentLocale() == 'ar' ? 'pull-left' : 'pull-right' }}" style="width: auto">
                                                        <button type="submit"
                                                            class="btn btn-primary login-submit-cs">{{ __('Save Change') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> {{ __('AGCE Information') }} </p>

                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Activate Digital Signature') }}</label>
                                                <div class="col-sm-8">
                                                    <label class="switch switch-lg">
                                                        <input type="checkbox" name="digital_signature_activation" id="digital_signature_activation" 
                                                        {{ $settings->where('name', 'Activate Digital Signature')->first()->value == 'Yes' ? 'checked' : ''}}>
                                                        <span class="slider slider-lg round"></span>
                                                      </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('ORIGINATOR ID') }}</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="originator_id" id="originator_id"
                                                        class="form-control" placeholder="{{ __('ORIGINATOR ID') }}"
                                                        value="{{ $settings->where('name', 'AGCE ORIGINATOR ID')->first()->value }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('AGCE SSL Certificate File') }}</label>
                                                <div class="col-sm-8">

                                                    <div class="box">
                                                        <input type="file" name="agce_ssl_cert_file" id="agce_ssl_cert_file"
                                                            class="inputfile inputfile-2"
                                                            data-multiple-caption="{count} files selected" multiple />
                                                        <label for="invoice"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="10" viewBox="0 0 20 17">
                                                                <path
                                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                            </svg>
                                                            <span>{{ __('Choose the SSL Certificate file') }}&hellip;</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('AGCE SSL Key File') }}</label>
                                                <div class="col-sm-8">

                                                    <div class="box">
                                                        <input type="file" name="agce_ssl_key_file" id="agce_ssl_key_file"
                                                            class="inputfile inputfile-2"
                                                            data-multiple-caption="{count} files selected" multiple />
                                                        <label for="invoice"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="10" viewBox="0 0 20 17">
                                                                <path
                                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                            </svg>
                                                            <span>{{ __('Choose the SSL Key file') }}&hellip;</span>
                                                        </label>
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
    <input type="text" value="{{ file_exists(config('settings.ROUND_STAMP_EN_FILE_PATH')) }}" id="roundStampEnIsExist"
        hidden>
    <input type="text" value="{{ file_exists(config('settings.ROUND_STAMP_AR_FILE_PATH')) }}" id="roundStampArIsExist"
        hidden>

@endsection
@Push('js')
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script src="{{ URL::asset('select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            roundStampArIsExist = $('#roundStampArIsExist')
        .val(); //"{{ empty(Auth::User()->profile()->square_stamp) }}"
            if (roundStampArIsExist) {
                $('.file-upload-content-round-stamp').show();
                $('.image-upload-wrap-round-stamp').hide();
            }

            roundStampEnIsExist = $('#roundStampEnIsExist')
        .val(); //"{{ empty(Auth::User()->profile()->square_stamp) }}"
            if (roundStampEnIsExist) {
                $('.file-upload-content-square-stamp').show();
                $('.image-upload-wrap-square-stamp').hide();
            }


            var lang = "{{ App()->currentLocale() }}";
            var dir = '';
            if (lang == 'ar') dir = 'rtl';
            else dir = 'ltr';
            
            $('#offers_list').select2({
                // width: 'resolve',
                dir: dir,
                placeholder: 'Select an option',
                allowClear: true,
                tokenSeparators: [","],
                tags: true
                // ajax: {
                //     url: 'getactivities',
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function(data) {
                //         return {
                //             results: $.map(data, function(item) {
                //                 return {
                //                     text: item.code + ' ' + item.name_ar,
                //                     id: item.id
                //                 }
                //             })
                //         };
                //     },
                //     cache: true
                // },
                // templateSelection: function(data, container) {
                //     // Add custom attributes to the <option> tag for the selected option
                //     $(data.element).attr('data-custom-attribute', data.code);
                //     return data.text.substr(0, data.text.indexOf(' '));
                // }
            });

            // $(document).on('change', '#offers_list', function() {
            //     alert($('#offers_list').val());
            // });
        });


        function readURLRoundStamp(input) {
            if (input.files && input.files[0]) {

                var readerRoundStamp = new FileReader();

                readerRoundStamp.onload = function(e) {
                    $('.image-upload-wrap-round-stamp').hide();

                    $('.file-upload-image-round-stamp').attr('src', e.target.result);
                    $('.file-upload-content-round-stamp').show();

                    $('.image-title-round-stamp').html(input.files[0].name);
                };

                readerRoundStamp.readAsDataURL(input.files[0]);

            } else {
                removeUploadRoundStamp();
            }
        }

        function removeUploadRoundStamp() {
            $('.file-upload-input-round-stamp').replaceWith($('.file-upload-input-round-stamp').clone());
            $('.file-upload-content-round-stamp').hide();
            $('.image-upload-wrap-round-stamp').show();
        }
        $('.image-upload-wrap-round-stamp').bind('dragover', function() {
            $('.image-upload-wrap-round-stamp').addClass('image-dropping');
        });
        $('.image-upload-wrap-round-stamp').bind('dragleave', function() {
            $('.image-upload-wrap-round-stamp').removeClass('image-dropping');
        });



        function readURLSquareStamp(input) {
            if (input.files && input.files[0]) {

                var readerSquareStamp = new FileReader();

                readerSquareStamp.onload = function(e) {
                    $('.image-upload-wrap-square-stamp').hide();

                    $('.file-upload-image-square-stamp').attr('src', e.target.result);
                    $('.file-upload-content-square-stamp').show();

                    $('.image-title-square-stamp').html(input.files[0].name);
                };

                readerSquareStamp.readAsDataURL(input.files[0]);

            } else {
                removeUploadSquareStamp();
            }
        }

        function removeUploadSquareStamp() {
            $('.file-upload-input-square-stamp').replaceWith($('.file-upload-input-square-stamp').clone());
            $('.file-upload-content-square-stamp').hide();
            $('.image-upload-wrap-square-stamp').show();
        }
        $('.image-upload-wrap-square-stamp').bind('dragover', function() {
            $('.image-upload-wrap-square-stamp').addClass('image-dropping');
        });
        $('.image-upload-wrap-square-stamp').bind('dragleave', function() {
            $('.image-upload-wrap-square-stamp').removeClass('image-dropping');
        });

    </script>
@endpush
