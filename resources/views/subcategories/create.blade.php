@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('wizard/css/custom.css') }}" />
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
                    <div class="sparkline12-list">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Add New Category') }}</h4>
                                <br />
                                <form class="form-sample" method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name_ar" id="name_ar" class="form-control"
                                                        placeholder="{{ __('Name') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('English Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="{{ __('English Name') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('French Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name_fr" id="name_fr" class="form-control" placeholder="{{ __('French Name') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Description') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="description" id="description" class="form-control" placeholder="{{ __('Description') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-9">
                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                        <button type="submit" class="btn btn-white">
                                                            <a href="{{ route('products.index') }}"
                                                                style="color: inherit;">{{ __('Cancel') }}</a>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary login-submit-cs">{{ __('Save Change') }}</button>
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

@endsection
@Push('js')
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#state_id').on('change', function() {
                var selectedState = $('#state_id').find(":selected").val().split(" ")[0];
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/getcities/" + selectedState,
                    type: "GET",
                    success: function(data) {
                        $('#city_id').empty();
                        $('#city_id').append(
                            '<option value="0" disabled selected>{{__('Select The City')}}</option>'
                        );
                        $.each(data.cities, function(index, city) {
                            $('#city_id').append('<option value="' + city.value +
                                '">' + city.text + '</option>');
                        })
                    }
                })
            });

            $.validator.addMethod("emailcheck", function(value, element, regexp) {
                /* Check if the value is truthy (avoid null.constructor) & if it's not a RegEx. (Edited: regex --> regexp)*/
                if (regexp && regexp.constructor != RegExp) {
                    /* Create a new regular expression using the regex argument. */
                    regexp = new RegExp(regexp);
                }
                /* Check whether the argument is global and, if so set its last index to 0. */
                else if (regexp.global) regexp.lastIndex = 0;
                /* Return whether the element is optional or the result of the validation. */
                return this.optional(element) || regexp.test(value);
            });
            $.validator.addMethod("passwordcheck", function(value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    &&
                    /[a-z]/.test(value) // has a lowercase letter
                    &&
                    /\d/.test(value) // has a digit
            });

            var user_validator = $(".form-sample").validate({

                rules: {
                    username: {
                        required: true,
                        maxlength: 50
                    },
                    role_id: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true,
                        emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                    },
                    email_confirmation: {
                        required: true,
                        email: true,
                        emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                    },
                    password: {
                        required: true,
                        passwordcheck: true
                    },
                    password_confirmation: {
                        required: true,
                        passwordcheck: true
                    },
                    firstname: {
                        required: true
                    },
                    lastname: {
                        required: true
                    },
                    mobile: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    birthday: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    state_id: {
                        required: true
                    },
                    city_id: {
                        required: true
                    },
                    signature: {
                        required: true
                    },
                    round_stamp: {
                        required: true
                    },
                    square_stamp: {
                        required: true
                    },
                    agce_user_id: {
                        required: true
                    },
                },
                messages: {

                    username: {
                        required: "{{ __('Username is required') }}",
                    },
                    role_id: {
                        required: "{{ __('Role is required') }}",
                    },
                    email: {
                        required: "{{ __('Email Address is required') }}",
                        emailcheck: "{{ __('Email Address is invalid') }}",
                    },
                    email_confirmation: {
                        required: "{{ __('Email Address Confirmation is required') }}",
                        emailcheck: "{{ __('Email Address Confirmation is invalid') }}",
                    },
                    password: {
                        required: "{{ __('Password is required') }}",
                        passwordcheck: "{{ __('Password is invalid') }}"
                    },
                    password_confirmation: {
                        required: "{{ __('Password Confirmation is required') }}",
                        passwordcheck: "{{ __('Password Confirmation is invalid') }}"
                    },
                    firstname: {
                        required: "{{ __('Firstname is required') }}",
                    },
                    lastname: {
                        required: "{{ __('Lastname is required') }}",
                    },
                    mobile: {
                        required: "{{ __('Mobile is required') }}",
                    },
                    gender: {
                        required: "{{ __('Gender is required') }}",
                    },
                    birthday: {
                        required: "{{ __('Birthday is required') }}",
                    },
                    address: {
                        required: "{{ __('Address is required') }}",
                    },
                    state_id: {
                        required: "{{ __('State is required') }}",
                    },
                    city_id: {
                        required: "{{ __('City is required') }}",
                    },
                    signature: {
                        required: "{{ __('Signature is required') }}",
                    },
                    round_stamp: {
                        required: "{{ __('Round Stamp is required') }}",
                    },
                    square_stamp: {
                        required: "{{ __('Square Stamp is required') }}",
                    },
                    agce_user_id: {
                        required: "{{ __('AGCE User Id is required') }}",
                    },
                },
            });

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

        function readURLSignature(input) {
            if (input.files && input.files[0]) {

                var readerSignature = new FileReader();

                readerSignature.onload = function(e) {
                    $('.image-upload-wrap-signature').hide();

                    $('.file-upload-image-signature').attr('src', e.target.result);
                    $('.file-upload-content-signature').show();

                    $('.image-title-signature').html(input.files[0].name);
                };

                readerSignature.readAsDataURL(input.files[0]);

            } else {
                removeUploadSignature();
            }
        }

        function removeUploadSignature() {
            $('.file-upload-input-signature').replaceWith($('.file-upload-input-signature').clone());
            $('.file-upload-content-signature').hide();
            $('.image-upload-wrap-signature').show();
        }
        $('.image-upload-wrap-signature').bind('dragover', function() {
            $('.image-upload-wrap-signature').addClass('image-dropping');
        });
        $('.image-upload-wrap-signature').bind('dragleave', function() {
            $('.image-upload-wrap-signature').removeClass('image-dropping');
        });

    </script>
@endpush
