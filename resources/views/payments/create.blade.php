@extends('layouts.mainlayout')


@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
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
                                <h4 class="card-title">{{ __('Add New Payment') }}</h4>
                                <br />
                                <form class="form-sample" method="post" action="{{ route('payments.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-md-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                    {{ __('Amount') }}
                                                </label>
                                                <div class="col-md-9">
                                                    <input name="amount" id="amount" type="text" class="form-control"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-md-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                    {{ __('Payment Document') }}
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="form-holder">
                                                        <div class="box">
                                                            <input type="file" name="document" id="document"
                                                                class="inputfile inputfile-2"
                                                                data-multiple-caption="{count} files selected" multiple
                                                                required />
                                                            <label for="document"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="20" height="17" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                </svg>
                                                                <span>{{ __('Choose the document file') }}&hellip;</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-md-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type') }}</label>
                                                <div class="col-md-9">

                                                    <select class="form-control" name="type" id="type" required>
                                                        <option value="" disabled>{{ __('Select the payment type') }}
                                                        </option>
                                                        <option value="CASH">{{ __('CASH') }}</option>
                                                        <option value="INSTALLMENT">{{ __('INSTALLMENT') }}</option>
                                                        <option value="DHAHABIA">{{ __('DHAHABIA') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-md-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mode') }}</label>
                                                <div class="col-md-9">

                                                    <select class="form-control" name="mode" id="mode" required>
                                                        <option value="" disabled>{{ __('Select the payment mode') }}
                                                        </option>
                                                        <option value="CREDIT">{{ __('CREDIT') }}</option>
                                                        <option value="DEBIT">{{ __('DEBIT') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-md-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Description') }}</label>
                                                <div class="col-md-9">
                                                    <input name="description" id="description" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-md-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Enterprise') }}</label>
                                                <div class="col-md-9">
                                                    <select name="enterprise_id" id="enterprise_id" class="form-control"
                                                        required>
                                                        <option selected disabled>{{ __('Select The Enterprise') }}
                                                        </option>
                                                        @foreach ($enterprises as $enterprise){
                                                            <option value="{{ $enterprise->id }}">
                                                                {{ __($enterprise->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                                            <a href="{{ route('payments.index') }}"
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

            $('#amount').val('');

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
