@extends('layouts.mainlayout')


@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('image-picker/image-picker.css') }}" />
    <style>
        .error {
            color: #FF0000;
        }

        .warning {
            color: red;
        }

        input.error {
            border: 1px solid red !important;
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

        .image_picker_image {
            max-width: 140px;
            max-height: 100px;
            background-color: #FF0000;
        }
        .all-content-wrapper, .data-table-area, .basic-form-area, .single-pro-review-area {
            height: 87%!important;
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
                                <div id="code">
                                    <img src="img/logo/algerie-poste-logo-round.png"
                                        style="width:100px;height:100px;border-radius: 50%;float:right;">
                                    <img src="img/logo/caci-logo-round.png"
                                        style="width:100px;height:100px;border-radius: 50%;float:left;">
                                </div>
                                <br />
                                <br />
                                <h2 class="card-title text-center">{{ __('Buy New Balance') }}</h2>
                                <br />
                                <br />
                                <form class="form-sample" method="post"
                                    action="{{ route('payments.store-balance-poste') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-8 col-md-6 col-mx-4" style="float: none;margin: 0 auto;">
                                            <select id="offer" name="offer" class="image-picker">
                                                @foreach (explode(',', $settings->where('name', 'Offers List')->first()->value) as $offer)
                                                    <option
                                                        data-img-src='{{ URL::asset('') . 'data/settings/offers/' . $offer . '.png' }}'
                                                        value="{{ $offer }}"></option>
                                                @endforeach
                                                <option
                                                    data-img-src='{{ URL::asset('') . 'data/settings/offers/others_en.png' }}'
                                                    value="0"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row others">
                                        <div class="col-md-1" style="float: none;margin: 0 auto;">
                                            <input name="other_offer" id="other_offer" type="text"
                                                class="form-control text-center"
                                                placeholder="{{ __('Number Of Points') }}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3" style="float: none;margin: 0 auto;">
                                            <input type="checkbox" name="conditions_is_checked" id="conditions_is_checked"
                                                style="margin-left: 20px; margin-right: 5px" value="FEMALE"
                                                required>{{ __('I accept the') }}
                                            <a href="{{ URL::asset('') . 'data/settings/الشروط الخاصة والعامة لإستعمال خدمة الدفع الإلكتروني.pdf' }}"
                                                target="_blank">{{ __('terms and conditions') }}</a>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-2" style="float: none;margin: 0 auto;">
                                                    <div class="login-horizental cancel-wp form-bc-ele">
                                                        <button type="button" class="btn btn-white">
                                                            <a href="{{ route('payments.index') }}"
                                                                style="color: inherit;">{{ __('Cancel') }}</a>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary login-submit-cs">{{ __('Buy Using DHAHABIA') }}</button>
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
    <script src="{{ URL::asset('image-picker/image-picker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {


            $('.others').hide();
            $("#offer").imagepicker({
                // hide_select: true,
                // show_label: true
            });

            $(document).on('change', '#offer', function() {
                // alert($('#offer').find(":selected").val());
                if ($('#offer').find(":selected").val() == '0') {
                    $('.others').show();
                } else {
                    $('.others').hide();
                }
            });
            var $container = $('.image_picker_selector');
            // initialize
            $container.imagesLoaded(function() {
                $container.masonry({
                    columnWidth: 30,
                    itemSelector: '.thumbnail'
                });
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

            var account_validator = $(".form-sample").validate({

                rules: {
                    amount: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    mode: {
                        required: true
                    },
                    document: {
                        required: true
                    },
                    enterprise_id: {
                        required: true
                    },
                },
                messages: {

                    amount: {
                        required: "Amount field is required",
                    },
                    type: {
                        required: "Type field is required",
                    },
                    mode: {
                        required: "mode field is required",
                    },
                    document: {
                        required: "document field is required",
                    },
                    enterprise_id: {
                        required: "Enterprise field is required",
                    },
                },
            });


        });
    </script>
@endpush
