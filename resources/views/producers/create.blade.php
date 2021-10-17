@extends('layouts.mainlayout')


@Push('css')
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
                                <h4 class="card-title">{{ __('Add New Producer') }}</h4>
                                <br />
                                <p class="card-description"> {{ __('Producer') }} </p>
                                <form class="form-sample" method="post" action="{{ route('producers.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Producer Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Legal Form') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="legal_form" id="legal_form"
                                                        class="form-control" required />
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Activity') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="category_id" id="category_id" class="form-control"
                                                        required>
                                                        <option value="02" disabled selected>
                                                            {{ __('Select The Type Of Activity') }}</option>
                                                        @if (isset($categories))
                                                            @foreach ($categories as $category){
                                                                <option value="{{ $category->id }}">
                                                                    {{ App()->currentLocale() == 'ar' ? $category->name_ar : (App()->currentLocale() == 'en' ? $category->name : $category->name_fr) }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            @can('view-enterprises',  App\Models\Producer::class)
                                            <div class="form-group row">
                                                <label
                                                    class="required col-md-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Enterprise') }}</label>
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
                                            @endcan
                                        </div>
                                    </div>

                                    <p class="card-description"> {{ __('Contact Information') }} </p>

                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Country') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="country_id" id="country_id" class="form-control" required>
                                                        <option value="" selected disabled>{{ __('Select The Country') }}
                                                        </option>
                                                        @if (isset($countries))
                                                            @foreach ($countries as $country){
                                                                <option value="{{ $country->id }}">
                                                                    {{ $country->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('State') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="state_id" id="state_id" class="form-control" required>
                                                        <option value="" selected disabled>{{ __('Select The State') }}
                                                        </option>
                                                        @if (isset($states))
                                                            @foreach ($states as $state){
                                                                <option value="{{ $state->id }}">
                                                                    {{ $state->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="email" id="email" type="text" class="form-control"
                                                        style="direction:LTR" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="mobile" id="mobile" type="text" class="form-control"
                                                        style="direction:LTR" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="address" id="address" type="text" class="form-control"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Tel') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="tel" id="tel" type="text" class="form-control"
                                                        style="direction:LTR" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Website') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="website" id="website" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Fax') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="fax" id="fax" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}"
                                                    style="text-align: center">
                                                    <div class="login-horizental cancel-wp form-bc-ele">
                                                        <button type="button" class="btn btn-white">
                                                            <a href="{{ route('producers.index') }}"
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
    <script type="text/javascript" src="{{ URL::asset('js/lang/messages_' . App()->currentLocale() . '.js') }}"></script>
    <script src="{{ URL::asset('js/input-mask/jquery.inputmask.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.activity_type_name').hide();
            $('#activity_type').on('change', function() {
                if (this.value == 'OTHER') {
                    $('.activity_type_name').show();
                } else {
                    $('.activity_type_name').hide();
                }
            });

            $('#country_id').on('change', function() {
                var selectedState = $('#country_id').find(":selected").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/getstates/" + selectedState,
                    type: "GET",
                    success: function(data) {
                        $('#state_id').empty();
                        $('#state_id').append(
                            '<option value="0" disabled selected>{{ __('Select The State') }}</option>'
                        );
                        $.each(data.states, function(index, state) {
                            $('#state_id').append('<option value="' + state.value +
                                '">' + state.text + '</option>');
                        })

                        var phoneCode = data.country.phonecode;
                        if (phoneCode.indexOf('+') == -1) phoneCode = '(+' + phoneCode + ')';
                        if (phoneCode.indexOf('9')) phoneCode = phoneCode.replace('9', '\\9');
                        var mask = "phoneCode 99[-99]{2,6}";
                        mask = mask.replace('phoneCode', phoneCode);
                        $('#mobile').inputmask(mask, {
                            rightAlign: false
                        });
                        $('#tel').inputmask(mask, {
                            rightAlign: false
                        });
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

            var account_validator = $(".form-sample").validate({
                rules: {
                    email: {
                        email: true,
                        emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                    },
                },
                messages: {
                    email: {
                        emailcheck: "{{ __('The email address format is invalid.') }}",
                    },
                },
            });

            $('#email').inputmask({
                alias: "email",
                rightAlign: false
            });

            $('#mobile').inputmask("(+9{1,3}) 99[-99]{2,6}");
            $('#tel').inputmask("(+9{1,3}) 99[-99]{2,6}");

        });
    </script>
@endpush
