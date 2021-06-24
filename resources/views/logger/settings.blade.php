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
                                <h4 class="card-title">{{ __('Log Settings') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- AGCE --}}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list mt-b-30">
                        <div class="card">
                            <div class="card-body">
                                {{-- <h4 class="card-title">{{ __('AGCE') }}</h4> --}}
                                <br />
                                <form method="post" action="{{ route('logger.update.settings') }}"
                                    class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                    @csrf

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
                                    <p class="card-description"> {{ __('Log Information') }} </p>

                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-6 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Enable Activity Logger') }}</label>
                                                <div class="col-sm-6">
                                                    <label class="switch switch-lg">
                                                        <input type="checkbox" name="activity_logger_enabled" id="activity_logger_enabled" 
                                                        {{ ($enabled ?? '') ? 'checked' : ''}}>
                                                        <span class="slider slider-lg round"></span>
                                                      </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-6 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Delete Records Older Than (Days)') }}</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="delete_records_older_than_days" id="delete_records_older_than_days"
                                                        class="form-control" placeholder="{{ __('Days') }}"
                                                        value="{{ $delete_records_older_than_days ?? '' }}" />
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
