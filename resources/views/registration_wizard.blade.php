<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Wizard-v3</title>

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('select2/css/select2.min.css') }}">

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('') }}img/logo/caci-logo.ico" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('wizard/css/roboto-font.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('wizard/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <!-- datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('wizard/css/jquery-ui.min.css') }}">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ URL::asset('wizard/css/style.css') }}" />
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ URL::asset('wizard/css/custom.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datapicker/datepicker3.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .bootstrap-table {
            width: 100%;
        }

        .add-icon {
            width: 40px;
            height: 40px;
            background: #24c1e8;
            -webkit-border-radius: 50%;
            border: none;
        }

        .delete-icon {
            width: 40px;
            height: 40px;
            background: #fd1e00;
            -webkit-border-radius: 50%;
            border: none;
        }

        .spinner-border {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: block;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
            text-align: center;
        }

        .spinner-border .inner {
            position: absolute;
            top: 40%;
            left: 45%;
            z-index: 100;
        }

        .wizard-v3-content {
            margin: 50px 0;
        }

        .wizard-form .wizard-header {
            padding: 40px 0 0;
        }

        .select2-container {
            z-index: 999999;
        }

    </style>
    @if (App::currentLocale() == 'ar')
        <style>
            #form-total>.steps>ul {
                float: right;
                display: inline-block;
            }

            #form-total>.steps>ul>li {
                float: right;
                display: inline-block;
            }

            #form-total>.actions>ul {
                float: left;
                display: inline-block;
            }

            #form-total>.actions>ul>li {
                float: right;
                margin-left: 5px;
            }

            .inner {
                text-align: right;
            }

            .label {
                left: auto;
                right: 10px;
            }

            .wizard-v3-content {
                font-family: "Amiri", "serif", "Times New Roman" !important;
            }

            #form-total .steps li .step-icon::before {
                right: auto;
                left: 100%
            }

            #form-total .steps li:last-child .step-icon::after {
                left: auto;
                right: 100%
            }

            #username {
                text-align: right;
            }

            .actions ul li:first-child {
                margin-left: auto;
            }

            #form-total .steps li:nth-child(5) a .step-text {
                margin-left: 7px !important;
            }

            .form-row .form-holder:nth-child(0) {
                float: right;
            }

            table th,
            table td {
                text-align: right;
            }
            
            .select2 {
                z-index: 99999;
            }

            .select2-drop-active {
                margin-top: -25px;
            }

            .select2-dropdown {
                z-index: 99999 !important;
                position: absolute;
                cursor: default;
            }

            .selectRow {
                display: block;
                padding: 20px;
            }

            .select2-container {
                width: 200px;
            }

            .select2-drop-active {
                margin-top: -25px;
            }

        </style>
    @endif
</head>

<body>
    <div class="page-content" style="background-image: url('assets/images/shape-1.svg')">
        <div class="wizard-v3-content">
            <div class="wizard-form">
                <div class="wizard-header">
                    <h3 class="heading">{{ __('New Account In E-Certificate Of Origin Platform') }}</h3>
                    <p>{{ __('Fill all fields to go next step') }}</p>

                    @if (Auth::check())
                        <div class="form-holder" style="width: 100%;">
                            <form method="POST" action="{{ route('logout') }}" id="loginForm">
                                @csrf
                                <div style="right:5px;top:5px; margin:10px;position:absolute">
                                    <button id="logout" type="submit" title="{{ __('Logout') }}"
                                        class="btn btn-default">
                                        <span class="view-icon"><img width="30px;" src="{{ URL::asset('') }}assets/images/login-50-white.png" alt="" /></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
                <div id="form-total">
                    <!-- SECTION 1 -->
                    <h2>
                        <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
                        <span class="step-text">{{ __('Account') }}</span>
                    </h2>
                    <section>
                        <form class="account_form" action="#" method="post">
                            <div class="inner">
                                <h3>{{ __('Account Information') }}</h3>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="username" name="username"
                                                required>
                                            <span class="label">{{ __('Username') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    @if (App()->currentLocale() != 'ar')
                                        <div class="form-holder form-holder-2">
                                            <label class="form-row-inner">
                                                <input type="text" name="email" id="email" class="form-control"
                                                    required>
                                                <span class="label">{{ __('Email') }}</span>
                                                <span class="border"></span>
                                            </label>
                                        </div>
                                    @endif
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" name="email_confirmation" id="email_confirmation"
                                                class="form-control" required>
                                            <span class="label">{{ __('Email Confirmation') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    @if (App()->currentLocale() == 'ar')
                                        <div class="form-holder form-holder-2">
                                            <label class="form-row-inner">
                                                <input type="text" name="email" id="email" class="form-control"
                                                    required>
                                                <span class="label">{{ __('Email') }}</span>
                                                <span class="border"></span>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-row col-lg-6">
                                    @if (App()->currentLocale() != 'ar')
                                        <div class="form-holder form-holder-2">
                                            <label class="form-row-inner">
                                                <input type="password" name="password" id="password"
                                                    class="form-control" value="" required>
                                                <span class="label">{{ __('Password') }}</span>
                                                <span class="border"></span>
                                            </label>
                                        </div>
                                    @endif
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation" class="form-control" required>
                                            <span class="label">{{ __('Password Confirmation') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    @if (App()->currentLocale() == 'ar')
                                        <div class="form-holder form-holder-2">
                                            <label class="form-row-inner">
                                                <input type="password" name="password" id="password"
                                                    class="form-control" value="" required>
                                                <span class="label">{{ __('Password') }}</span>
                                                <span class="border"></span>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- SECTION 2 -->
                    <h2>
                        <span class="step-icon"><i class="zmdi zmdi-check-all"></i></span>
                        <span class="step-text">{{ __('Activation') }}</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <h3>{{ __('Account Verification') }}</h3>
                            <p>{{ __('Thank you for creating new account') }}</p>
                            <p>{{ __("Before getting started, you must verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another") }}
                            </p>
                            <div class="form-row">
                                <div class="form-holder" style="width: 100%;">
                                    <form method="POST" action="{{ route('verification.send') }}" id="loginForm">
                                        @csrf
                                        <div style="margin:auto;text-align:center">
                                            <button id="resend" type="submit"
                                                class="btn btn-success btn-block">{{ __('Resend Verification Message by Email') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- SECTION 3 -->
                    <h2>
                        <span class="step-icon"><i class="zmdi zmdi-balance"></i></span>
                        <span class="step-text">{{ __('Enterprise') }}</span>
                    </h2>
                    <section>
                        <form class="enterprise_form" action="#" method="post">
                            <div class="content clearfix inner two-sections">
                                <h3>{{ __('General Information') }}</h3>
                                <div class="form-row"
                                    style="{{ App::currentLocale() == 'ar' ? 'display: block ruby;' : '' }}">
                                    @if (App()->currentLocale() != 'ar')
                                        <div class="form-holder"
                                            style="{{ App::currentLocale() == 'ar' ? 'width: 45%;' : '' }}">
                                            <label class="form-row-inner">
                                                <input type="text" class="form-control" id="name" name="name" required>
                                                <span class="label">{{ __('Enterprise Name') }}</span>
                                                <span class="border"></span>
                                            </label>
                                        </div>
                                    @endif
                                    <div class="form-holder export_activity_code"
                                        style="{{ App::currentLocale() == 'ar' ? 'width: 45%;' : '' }}">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="export_activity_code"
                                                name="export_activity_code" value="" required>
                                            <span class="label">{{ __('Export Activity Code') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    @if (App()->currentLocale() == 'ar')
                                        <div class="form-holder"
                                            style="{{ App::currentLocale() == 'ar' ? 'width: 45%;' : '' }}">
                                            <label class="form-row-inner">
                                                <input type="text" class="form-control" id="name" name="name" required>
                                                <span class="label">{{ __('Enterprise Name') }}</span>
                                                <span class="border"></span>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-row"
                                    style="{{ App::currentLocale() == 'ar' ? 'display: block ruby;' : '' }}">
                                    <div class="form-holder"
                                        style="{{ App::currentLocale() == 'ar' ? 'width: 45%;' : '' }}">
                                        @if (App()->currentLocale() == 'ar')
                                            <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                name="exporter_type" id="exporter_type">
                                                <option value="" selected disabled>
                                                    {{ __('Select The Type Of Exporter') }}</option>
                                                <option value="TRADER">{{ __('Trader') }}</option>
                                                <option value="CRAFTSMAN">{{ __('Craftsman') }}</option>
                                                <option value="PRODUCER">{{ __('Producer') }}</option>
                                                <option value="FARMER">{{ __('Farmer') }} </option>
                                                <option value="OTHER">{{ __('Other') }}</option>
                                            </select>
                                        @endif
                                    </div>

                                    <div class="form-holder"
                                        style="{{ App::currentLocale() == 'ar' ? 'width: 45%;' : '' }}">
                                        <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }} name="legal_form"
                                            id="legal_form">
                                            <option value="06" disabled selected>{{ __('Select The Legal Form') }}
                                            </option>
                                            <option value="SPA">{{ __('SPA') }}</option>
                                            <option value="SARL">{{ __('SARL') }}</option>
                                            <option value="EURL">{{ __('EURL') }}</option>
                                            <option value="ETS">{{ __('ETS') }}</option>
                                            <option value="SNC">{{ __('SNC') }}</option>
                                            <option value="OTHER">{{ __('Other') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-holder"
                                        style="{{ App::currentLocale() == 'ar' ? 'width: 45%;' : '' }}">
                                        @if (App()->currentLocale() != 'ar')
                                            <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                name="exporter_type" id="exporter_type">
                                                <option value="" selected disabled>
                                                    {{ __('Select The Type Of Exporter') }}</option>
                                                <option value="TRADER">{{ __('Trader') }}</option>
                                                <option value="CRAFTSMAN">{{ __('Craftsman') }}</option>
                                                <option value="PRODUCER">{{ __('Producer') }}</option>
                                                <option value="FARMER">{{ __('Farmer') }} </option>
                                                <option value="OTHER">{{ __('Other') }}</option>
                                            </select>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="nis_number" name="nis_number"
                                                value="" required />
                                            <span class="label">{{ __('NIS Number') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="nif_number" name="nif_number"
                                                value="" required />
                                            <span class="label">{{ __('NIF Number') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder">
                                        <div class="box">
                                            <input type="file" name="nis" id="nis" class="inputfile inputfile-2"
                                                data-multiple-caption="{count} files selected" multiple />
                                            <label for="nis"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="17" viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                </svg>
                                                <span>{{ __('Choose the NIS file') }}&hellip;</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-holder">
                                        <div class="box">
                                            <input type="file" name="nif" id="nif" class="inputfile inputfile-2"
                                                data-multiple-caption="{count} files selected" multiple />
                                            <label for="nif"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="17" viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                </svg>
                                                <span>{{ __('Choose the NIF file') }}&hellip;</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="content clearfix inner two-sections">
                                <h3>{{ __('Commercial Registry Information') }}</h3>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <div class="box">
                                            <input type="file" name="rc" id="rc" class="inputfile inputfile-2"
                                                data-multiple-caption="{count} files selected" multiple />
                                            <label for="rc"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="17" viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                </svg>
                                                <span>{{ __('Choose the RC file') }}&hellip;</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="rc_number" name="rc_number"
                                                value="" required>
                                            <span class="label">{{ __('RC Number') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <select id="activities" class="activities select2 form-control" name="activities"
                                        multiple="multiple" required>
                                    </select>
                                </div>
                            </div>
                            <div class="content clearfix inner two-sections">
                                <h3>{{ __('Contact Information') }}</h3>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="mobile_enterprise"
                                                name="mobile_enterprise" value="" required>
                                            <span class="label">{{ __('Mobile') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="email_enterprise"
                                                name="email_enterprise" value="" required>
                                            <span class="label">{{ __('Email') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    @if (App()->currentLocale() == 'ar')
                                        <div class="form-holder">
                                            <select name="city_id" id="city_id" class="form-control"
                                                style="margin-top: 0;" dir="rtl">
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-holder">
                                        <select name="state_code" id="state_code" class="form-control"
                                            style="margin-top: 0;"
                                            {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}>
                                            <option value="0" disabled selected>{{ __('Select The State') }}</option>
                                        </select>
                                    </div>
                                    @if (App()->currentLocale() != 'ar')
                                        <div class="form-holder">
                                            <select name="city_id" id="city_id" class="form-control"
                                                style="margin-top: 0;">
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="address_enterprise"
                                                name="address_enterprise" value="" required>
                                            <span class="label">{{ __('Address') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="tel_enterprise"
                                                name="tel_enterprise" value="" required>
                                            <span class="label">{{ __('Tel') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="website" name="website" value=""
                                                required>
                                            <span class="label">{{ __('Website') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="fax_enterprise"
                                                name="fax_enterprise" value="" required>
                                            <span class="label">{{ __('Fax') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- SECTION 4 -->
                    <h2>
                        <span class="step-icon"><i class="zmdi zmdi-account-box"></i></span>
                        <span class="step-text">{{ __('Manager') }}</span>
                    </h2>
                    <section>
                        <form class="manager_form" action="#" method="post" enctype="multipart/form-data">
                            <div class="content clearfix inner two-sections">
                                <h3>{{ __('Personal Information') }}</h3>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="firstname_manager"
                                                name="firstname_manager" required>
                                            <span class="label">{{ __('First Name') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="lastname_manager"
                                                name="lastname_manager" required>
                                            <span class="label">{{ __('Last Name') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-holder"
                                        style="{{ App::currentLocale() == 'ar' ? 'width: 50%;' : '' }}">
                                        <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                            name="gender_manager" id="gender_manager">
                                            <option value="MALE" selected>{{ __('MALE') }}</option>
                                            <option value="FEMALE">{{ __('FEMALE') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-holder" style="width:50%">
                                        <label for="birthday_manager"
                                            style="width:35%;{{ App::currentLocale() == 'ar' ? 'float: right;padding-right: 0' : '' }}"
                                            class="special-label">{{ __('Birthday') }}</label>
                                        <input type="text" style="width:60%" id="birthday_manager"
                                            name="birthday_manager">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="address_manager"
                                                name="address_manager" required>
                                            <span class="label">{{ __('Address') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="email_manager"
                                                name="email_manager" required>
                                            <span class="label">{{ __('Email') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="mobile_manager"
                                                name="mobile_manager" required>
                                            <span class="label">{{ __('Mobile') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="tel_manager" name="tel_manager"
                                                required>
                                            <span class="label">{{ __('Tel') }}</span>
                                            <span class="border"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    @if (App()->currentLocale() == 'ar')
                                        <div class="form-holder">
                                            <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                name="city_id_manager" id="city_id_manager" class="form-control"
                                                style="margin-top: 0;">
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-holder">
                                        <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                            name="state_code_manager" id="state_code_manager" class="form-control"
                                            style="margin-top: 0;">
                                            <option value="0" disabled selected>{{ __('Select The State') }}
                                            </option>
                                            @if (isset($states))
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->iso2 }}">
                                                        {{ $state->iso2 . ' ' . __($state->name) }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @if (App()->currentLocale() != 'ar')
                                        <div class="form-holder">
                                            <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                name="city_id_manager" id="city_id_manager" class="form-control"
                                                style="margin-top: 0;">
                                            </select>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="content clearfix inner two-sections">
                                <h3>{{ __('Signature and Stamps') }}</h3>
                                <div class="form-row center">
                                    <div class="form-holder signature_center">
                                        <div class="file-upload">
                                            <button class="file-upload-btn" type="button"
                                                onclick="$('.file-upload-input-signature').trigger( 'click' )">{{ __('Add Signature Image') }}</button>

                                            <div class="image-upload-wrap-signature">
                                                <input class="file-upload-input-signature" name="signature"
                                                    id="signature" type='file' onchange="readURLSignature(this);"
                                                    accept="image/*" />
                                                <div class="drag-text">
                                                    <h3>{{ __('Drag and drop a file or select add Image') }}</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content-signature">
                                                <img class="file-upload-image-signature" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUploadSignature()"
                                                        class="remove-image">{{ __('Remove') }} <span
                                                            class="image-title-signature">{{ __('Uploaded Image') }}</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder signature_center">
                                        <div class="file-upload">
                                            <button class="file-upload-btn" type="button"
                                                onclick="$('.file-upload-input-round-stamp').trigger( 'click' )">{{ __('Add Round Stamp Image') }}</button>

                                            <div class="image-upload-wrap-round-stamp">
                                                <input class="file-upload-input-round-stamp" name="round_stamp"
                                                    id="round_stamp" type='file' onchange="readURLRoundStamp(this);"
                                                    accept="image/*" />
                                                <div class="drag-text">
                                                    <h3>{{ __('Drag and drop a file or select add Image') }}</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content-round-stamp">
                                                <img class="file-upload-image-round-stamp" src="#" alt="your image" />
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
                                <div class="form-row">
                                    <div class="form-holder signature_center">
                                        <div class="file-upload">
                                            <button class="file-upload-btn" type="button"
                                                onclick="$('.file-upload-input-square-stamp').trigger( 'click' )">
                                                {{ __('Add Square Stamp Image') }}
                                            </button>

                                            <div class="image-upload-wrap-square-stamp">
                                                <input class="file-upload-input-square-stamp" name="square_stamp"
                                                    id="square_stamp" type='file' onchange="readURLSquareStamp(this);"
                                                    accept="image/*" />
                                                <div class="drag-text">
                                                    <h3>{{ __('Drag and drop a file or select add Image') }}</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content-square-stamp">
                                                <img class="file-upload-image-square-stamp" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUploadSquareStamp()"
                                                        class="remove-image">
                                                        {{ __('Remove Uploaded Image') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- SECTION 5 -->
                    <h2>
                        <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
                        <span class="step-text">{{ __('Confirmation') }}</span>
                    </h2>
                    <section>
                        <div class="content clearfix inner two-sections">
                            <h3>{{ __('Account') }}</h3>
                            <div class="form-row table-responsive">
                                <table class="accountTable" {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                    width="100%">
                                    <tbody>
                                        <tr class="space-row">
                                            <th style="width: 15%;">{{ __('Username') }}</th>
                                            <td style="width: 15%;" id="username-val"></td>
                                            <th style="width: 20%;">{{ __('Email') }}</th>
                                            <td style="width: 50%;" id="email-val"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="content clearfix inner two-sections">
                            <h3>{{ __('Enterprise') }}</h3>
                            <div class="form-row table-responsive">
                                <table class="enterpriseTable" {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                    width="100%">
                                    <tbody>
                                        <tr class="space-row">
                                            <th>{{ __('Name') }}</th>
                                            <td id="name-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('Legal Form') }}</th>
                                            <td id="legal_form-val"></td>
                                            <th>{{ __('Type Of Exporter') }}</th>
                                            <td id="exporter_type-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('RC Number') }}</th>
                                            <td id="rc_number-val"></td>
                                            <th>{{ __('Activities Codes') }}</th>
                                            <td id="activities_codes-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('NIF Number') }}</th>
                                            <td id="nif_number-val"></td>
                                            <th>{{ __('NIS Number') }}</th>
                                            <td id="nis_number-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('Address') }}</th>
                                            <td id="address_enterprise-val"></td>
                                            <th>{{ __('Email') }}</th>
                                            <td id="email_enterprise-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('Mobile') }}</th>
                                            <td id="mobile_enterprise-val"></td>
                                            <th>{{ __('Tel') }}</th>
                                            <td id="tel_enterprise-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('Website') }}</th>
                                            <td id="website-val"></td>
                                            <th>{{ __('Fax') }}</th>
                                            <td id="fax_enterprise-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('State') }}</th>
                                            <td id="state_enterprise-val"></td>
                                            <th>{{ __('City') }}</th>
                                            <td id="city_enterprise-val"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="content clearfix inner two-sections">
                            <h3>{{ __('Manager') }}</h3>
                            <div class="form-row table-responsive">
                                <table class="managerTable" {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                    width="100%">
                                    <tbody>
                                        <tr class="space-row">
                                            <th>{{ __('Firstname') }}</th>
                                            <td id="firstname_manager-val"></td>
                                            <th>{{ __('Lastname') }}</th>
                                            <td id="lastname_manager-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('Gender') }}</th>
                                            <td id="gender_manager-val"></td>
                                            <th>{{ __('Birthday') }}</th>
                                            <td id="birthday_manager-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('Address') }}</th>
                                            <td id="address_manager-val"></td>
                                            <th>{{ __('Email') }}</th>
                                            <td id="email_manager-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('Mobile') }}</th>
                                            <td id="mobile_manager-val"></td>
                                            <th>{{ __('Tel') }}</th>
                                            <td id="tel_manager-val"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>{{ __('State') }}</th>
                                            <td id="state_manager-val"></td>
                                            <th>{{ __('City') }}</th>
                                            <td id="city_manager-val"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div id="loadingDiv" class="spinner-border text-success" role="status"
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
            </svg>
            <span class="sr-only">{{ __('Loading...') }}</span>
        </div>
    </div>
    <script src="{{ URL::asset('wizard/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('wizard/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/lang/messages_' . App()->currentLocale() . '.js') }}">
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('select2/js/select2.min.js') }}"></script>

    <script src="{{ URL::asset('wizard/js/jquery.steps.js') }}"></script>
    <script src="{{ URL::asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/datapicker/bootstrap-datepicker.js') }}"></script>
    <!-- Select2 -->

    <script type="text/javascript">
        var $loading = $('#loadingDiv').hide();
        $(document)
            .ajaxStart(function() {
                var curr = $('body').height()
                $('.spinner-border').height(curr);
                $loading.show();
            })
            .ajaxStop(function() {
                $loading.hide();
            });

        $(document).ready(function() {
            var lang = "{{ App()->currentLocale() }}";
            var dir = '';
            if (lang == 'ar') dir = 'rtl';
            else dir = 'ltr';

            var counter = 0;

            var step = "{{ $step }}";
            (function(e, t, n) {
                var r = e.querySelectorAll("html")[0];
                r.className = r.className.replace(/(^|s)no-js(s|$)/, "$1js$2")
            })(document, window, 0);

            $('.export_activity_code').hide();
            $(document).on('change', '#exporter_type', function() {
                if (this.value == 'TRADER') {
                    $('.export_activity_code').show();
                } else {
                    $('.export_activity_code').hide();
                }
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/getalgerianstates",
                type: "GET",
                success: function(data) {
                    $('#state_code').empty();
                    $('#state_code').append(
                        '<option value="0" disabled selected>{{ __('Select The State') }}</option>'
                    );
                    $.each(data.states, function(index, city) {
                        $('#state_code').append('<option value="' + city.value +
                            '">' + city.text + '</option>');
                    })


                    $('#state_code_manager').empty();
                    $('#state_code_manager').append(
                        '<option value="0" disabled selected>{{ __('Select The State') }}</option>'
                    );
                    $.each(data.states, function(index, city) {
                        $('#state_code_manager').append('<option value="' + city.value +
                            '">' + city.text + '</option>');
                    })
                }
            });

            $(document).on('change', '#state_code', function() {
                var selectedState = $('#state_code').find(":selected").val().split(" ")[0];
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/getcities/" + selectedState,
                    type: "GET",
                    success: function(data) {
                        $('#city_id').empty();
                        $('#city_id').append(
                            '<option value="0" disabled selected>{{ __('Select The City') }}</option>'
                        );
                        $.each(data.cities, function(index, city) {
                            $('#city_id').append('<option value="' + city.value +
                                '">' + city.text + '</option>');
                        })
                    }
                })
            });

            $(document).on('change', '#state_code_manager', function() {
                var selectedState = $('#state_code_manager').find(":selected").val().split(" ")[0];
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/getcities/" + selectedState,
                    type: "GET",
                    success: function(data) {
                        $('#city_id_manager').empty();
                        $('#city_id_manager').append(
                            '<option value="0" disabled selected>{{ __('Select The City') }}</option>'
                        );
                        $.each(data.cities, function(index, city) {
                            $('#city_id_manager').append('<option value="' + city
                                .value +
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
            $.validator.addMethod("checkifexist", function(value) {
                return false
            });

            var account_validator = $(".account_form").validate({
                rules: {
                    username: {
                        required: true,
                        maxlength: 50
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
                },
                messages: {

                    username: {
                        required: "{{ __('Username is required') }}",
                    },
                    email: {
                        required: "{{ __('Email Address is required') }}",
                        emailcheck: "{{ __('Email Address is invalid') }}",
                        remote: "{{ __('Email Address is exxiste') }}",
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
                },
            });

            var enterprise_validator = $(".enterprise_form").validate({
                lang: 'ar',
                rules: {
                    name: {
                        required: true,
                        maxlength: 200
                    },
                    legal_form: {
                        required: true
                    },
                    activity_type: {
                        required: true
                    },
                    activity_type_name: {
                        required: false
                    },
                    exporter_type: {
                        required: true
                    },
                    export_activity_code: {
                        required: false
                    },
                    rc_number: {
                        required: true
                    },
                    nif_number: {
                        required: true
                    },
                    nis_number: {
                        required: true
                    },
                    address_enterprise: {
                        required: true
                    },
                    email_enterprise: {
                        required: true,
                        email: true,
                        emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                    },
                    mobile_enterprise: {
                        required: true
                    },

                    fax_enterprise: {
                        required: false
                    },
                    website: {
                        required: false
                    },
                    tel_enterprise: {
                        required: false
                    },
                },
                messages: {

                    name: {
                        required: "Enterprise name is required",
                    },
                    legal_form: {
                        required: "Legal Form is required",
                    },
                    activity_type: {
                        required: "Acitivity Type is required",
                    },
                    exporter_type: {
                        required: "Exporter Type is required",
                    },
                    rc_number: {
                        required: "RC Number is required",
                    },
                    nif_number: {
                        required: "NIF Number is required",
                    },
                    nis_number: {
                        required: "NIS Number is required",
                    },
                    address_enterprise: {
                        required: "Address of your Enterprise is required",
                    },
                    email_enterprise: {
                        required: "Please enter email",
                        emailcheck: "Please enter valid email",
                    },
                    mobile_enterprise: {
                        required: "Mobile of your Enterprise is required",
                    },
                },
            });

            manager_validator = $(".manager_form").validate({
                lang: '{{ App::currentLocale() }}',
                rules: {
                    firstname_manager: {
                        required: true
                    },
                    lastname_manager: {
                        required: true
                    },
                    birthday_manager: {
                        required: true
                    },
                    address_manager: {
                        required: true,
                    },
                    email_manager: {
                        required: true,
                        email: true,
                        emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                    },
                    mobile_manager: {
                        required: true
                    },
                    tel_manager: {
                        required: false
                    },
                },
                messages: {
                    lastname_manager: {
                        required: "Lastname is required",
                    },
                    firstname_manager: {
                        required: "Firstname is required",
                    },
                    birthday_manager: {
                        required: "Birthday is required",
                    },
                    address_manager: {
                        required: "Address is required",
                    },
                    email_manager: {
                        required: "Please enter email",
                        emailcheck: "Please enter valid email",
                    },
                    mobile_manager: {
                        required: "Mobile number is required",
                    },
                },
            });

            wizard = $("#form-total").steps({
                headerTag: "h2",
                startIndex: $.isNumeric(parseInt(step)) ? parseInt(step) : 0,
                bodyTag: "section",
                transitionEffect: "fade",
                enableAllSteps: true,
                autoFocus: true,
                transitionEffectSpeed: 500,
                titleTemplate: '<div class="title">#title#</div>',
                labels: {
                    previous: '{{ __('Previous') }}',
                    next: '{{ __('Next') }}',
                    finish: '{{ __('Confirmation') }}',
                    current: ''
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    var move = true,
                        errors;
                    // Registration step
                    if (currentIndex == 0) {
                        console.log('Registration step');
                        if (!$(".account_form").valid()) {
                            move = false;
                        }

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            async: false,
                            url: "/registration",
                            data: {
                                step: '0',
                                username: $('#username').val(),
                                email: $('#email').val(),
                                email_confirmation: $('#email_confirmation').val(),
                                password: $('#password').val(),
                                password_confirmation: $('#password_confirmation').val()
                            },
                            success: function(data) {
                                move = true;
                                return true;
                            },
                            error: function(data) {
                                move = false;
                                errors = data.responseJSON.errors;
                                account_validator.showErrors(errors);
                                return true;
                            }
                        });
                    } else if (currentIndex == 1) {
                        console.log('Activation step');
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: "/registration",
                            data: {
                                step: '1'
                            },
                            success: function(data) {
                                console.log(data.message);
                                if (data.step == 1) {
                                    steps_api = steps.data('plugin_Steps');
                                    steps_api.prev();
                                    $("#form-total").steps("setStep",
                                        1);
                                    $("#form-total").steps("previous");
                                    return false;
                                } else {
                                    return true;
                                }
                            },
                            error: function(data) {
                                console.log('error');
                                move = false;
                                if (data.errors) {}
                            }
                        });
                    } else if (currentIndex == 2) {
                        console.log('Enterprise step ');
                        if (!$(".enterprise_form").valid()) {
                            move = false;
                        }
                        var rc = document.getElementById("rc").files[0],
                            nis = document.getElementById("nis").files[0],
                            nif = document.getElementById("nif").files[0],
                            formdata = false;
                        formdata = new FormData();
                        formdata.append("rc", rc);
                        formdata.append("rc_number", $('#rc_number').val());
                        formdata.append("nis", nis);
                        formdata.append("nis_number", $('#nis_number').val());
                        formdata.append("nif", nif);
                        formdata.append("nif_number", $('#nif_number').val());
                        formdata.append("step", "2");
                        formdata.append("name", $('#name').val());
                        formdata.append("legal_form", $('#legal_form').find(":selected").val());
                        formdata.append("exporter_type", $('#exporter_type').find(":selected").val());
                        formdata.append("activities", $('#activities').val());
                        formdata.append("address_enterprise", $('#address_enterprise').val());
                        formdata.append("email_enterprise", $('#email_enterprise').val());
                        formdata.append("mobile_enterprise", $('#mobile_enterprise').val());
                        formdata.append("tel_enterprise", $('#tel_enterprise').val());
                        formdata.append("fax_enterprise", $('#fax_enterprise').val());
                        formdata.append("city_id", $('#city_id').val());
                        formdata.append("website", $('#website').val());

                        $('#name-val').text($('#name').val());
                        $('#activity_type-val').text($('#activity_type').val());
                        $('#legal_form-val').text($('#legal_form').val());
                        $('#exporter_type-val').text($('#exporter_type').val());
                        $('#rc_number-val').text($('#rc_number').val());
                        $('#activities_codes-val').text($('#activities_codes').val());
                        $('#nif_number-val').text($('#nif_number').val());
                        $('#nis_number-val').text($('#nis_number').val());
                        $('#address_enterprise-val').text($('#address_enterprise').text());
                        $('#email_enterprise-val').text($('#email_enterprise').text());
                        $('#mobile_enterprise-val').text($('#mobile_enterprise').text());
                        $('#address_enterprise-val').text($('#address_enterprise').text());
                        $('#website-val').text($('#website').text());
                        $('#tel_enterprise-val').text($('#tel_enterprise').text());
                        $('#fax_enterprise-val').text($('#fax_enterprise').text());
                        $('#city_enterprise-val').text($('#city_id').find(":selected").text());
                        $('#state_enterprise-val').text($('#state_code').find(":selected").text());

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: "/registration",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formdata,
                            success: function(data) {
                                console.log(data.message);
                                if (data.step == 2) {
                                    $("#form-total").steps("previous");
                                    return false;
                                } else {
                                    return true;
                                }
                            },
                            error: function(data) {
                                console.log('error');
                                move = false;
                                if (data.errors) {}
                            }
                        });
                    } else if (currentIndex == 3) {
                        console.log('Manager step');
                        if (!$(".manager_form").valid()) {
                            move = false;
                        }

                        var round_stamp = document.getElementById("round_stamp").files[0],
                            square_stamp = document.getElementById("square_stamp").files[0],
                            signature = document.getElementById("signature").files[0],
                            formdata = false;
                        formdata = new FormData();
                        formdata.append("step", "3");
                        formdata.append("round_stamp", round_stamp);
                        formdata.append("square_stamp", square_stamp);
                        formdata.append("signature", signature);
                        formdata.append("firstname_manager", $('#firstname_manager').val());
                        formdata.append("lastname_manager", $('#lastname_manager').val());
                        formdata.append("birthday_manager", $('#birthday_manager').val());
                        formdata.append("gender_manager", $('#gender_manager').find(":selected")
                            .val());
                        formdata.append("address_manager", $('#address_manager').val());
                        formdata.append("email_manager", $('#email_manager').val());
                        formdata.append("mobile_manager", $('#mobile_manager').val());
                        formdata.append("tel_manager", $('#tel_manager').val());
                        formdata.append("city_id_manager", $('#city_id_manager').val());
                        $('#firstname_manager-val').text($('#firstname_manager').val());
                        $('#lastname_manager-val').text($('#lastname_manager').val());
                        $('#gender_manager-val').text($('#gender_manager').find(":selected").text());
                        $('#birthday_manager-val').text($('#birthday_manager').val());
                        $('#address_manager-val').text($('#address_manager').val());
                        $('#email_manager-val').text($('#email_manager').val());
                        $('#mobile_manager-val').text($('#mobile_manager').val());
                        $('#tel_manager-val').text($('#tel_manager').val());
                        $('#city_manager-val').text($('#city_id_manager').find(":selected").text());
                        $('#state_manager-val').text($('#state_code_manager').find(":selected")
                            .text());

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: "/registration",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formdata,
                            success: function(data) {
                                console.log(data.message);
                                if (data.step == 3) {
                                    move = false;
                                    $("#form-total").steps("previous");
                                    return false;
                                } else {
                                    return true;
                                }
                            },
                            error: function(data) {
                                console.log('error');
                                move = false;
                                return false;
                                if (data.errors) {}
                            }
                        });
                    } else if (currentIndex == 4) {
                        console.log('Confirmation step');
                    }
                    if (!move && Object.keys(errors).length !== 0) {
                        console.log(errors);
                    }
                    return move;
                },
                onFinished: function(event, currentIndex) {
                    console.log('Confirmation step');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "/registration",
                        data: {
                            step: '4',
                            confirmed: 'true'
                        },
                        success: function(data) {
                            if (data.step == 4) {
                                return false;
                            } else {
                                console.log(data.url);
                                window.location.href = data.url;
                            }
                        },
                        error: function(data) {
                            console.log('error');
                            return false;
                            if (data.errors) {}
                        }
                    });
                }
            });

            var data = [{
                    id: 0,
                    text: 'enhancement'
                },
                {
                    id: 1,
                    text: 'bug'
                },
                {
                    id: 2,
                    text: 'duplicate'
                },
                {
                    id: 3,
                    text: 'invalid'
                },
                {
                    id: 4,
                    text: 'wontfix'
                }
            ];

            $('#activities').select2({
                dir: dir,
                width: $('.content').width(),
                placeholder: '{{ __('Type Activities Codes') }}',
                allowClear: true,
                ajax: {
                    url: '/getactivities',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.code + ' ' + item.name_ar,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                },
                templateSelection: function(data, container) {
                    $(data.element).attr('data-custom-attribute', data.code);
                    return data.text.substr(0, data.text.indexOf(' '));
                },
                language: {
                    "noResults": function() {
                        return '{{ __('No Activities Found') }}';
                    }
                },
                escapeMarkup: function(markup) {
                    return markup;
                }
            });

            $.fn.datepicker.dates['ar'] = {
                days: ["الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت"],
                daysShort: ["الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت"],
                daysMin: ["الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت"],
                months: ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويلية", "أوت", "سبتمبر",
                    "أكتوبر", "نوفمبر", "ديسمبر"
                ],
                monthsShort: ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويلية", "أوت", "سبتمبر",
                    "أكتوبر", "نوفمبر", "ديسمبر"
                ],
                today: "اليوم",
                clear: "مسح",
                format: "dd/mm/yyyy",
                titleFormat: "MM yyyy",
                weekStart: 0
            };

            $('#birthday_manager').datepicker({
                rtl: true,
                format: 'dd-mm-yyyy',
                autoclose: true,
                language: 'ar'
            });

            $('#username-val').text('{{ Auth::user() ? Auth::user()->username : '' }}');
            $('#email-val').text('{{ Auth::user() ? Auth::user()->email : '' }}');
            $('#name-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->name : '' }}');
            $('#activity_type-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->activity_type : '' }}'
            );
            $('#legal_form-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->legal_form : '' }}'
            );
            $('#exporter_type-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->exporter_type : '' }}'
            );
            $('#rc_number-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->rc_number : '' }}');
            $('#activities_codes-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->activities()->pluck('code')->join(',') : '' }}');
            $('#nif_number-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->nif_number : '' }}');
            $('#nis_number-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->nis_number : '' }}');
            $('#address_enterprise-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->enterprise : '' }}');
            $('#email_enterprise-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->email : '' }}');
            $('#mobile_enterprise-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->mobile : '' }}');
            $('#address_enterprise-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->address : '' }}');
            $('#website-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->website : '' }}');
            $('#tel_enterprise-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->tel : '' }}');
            $('#fax_enterprise-val').text('{{ Auth::user() && Auth::user()->Enterprise ? Auth::user()->Enterprise->fax : '' }}');
            $('#city_enterprise-val').text('{{ Auth::user() && Auth::user()->Enterprise ? (App()->currentLocale() == 'ar' ? Auth::user()->Enterprise->city->daira_name : Auth::user()->Enterprise->city->daira_name_ascii) : '' }}');
            $('#state_enterprise-val').text('{{ Auth::user() && Auth::user()->enterprise ? (App()->currentLocale() == 'ar' ? Auth::user()->Enterprise->city->wilaya_name : Auth::user()->Enterprise->city->wilaya_name_ascii) : '' }}');
            $('#firstname_manager-val').text('{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? Auth::user()->Enterprise->Manager->firstname : '' }}');
            $('#lastname_manager-val').text('{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? Auth::user()->Enterprise->Manager->lastname : '' }}');
            $('#gender_manager-val').text('{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? __(Auth::user()->Enterprise->Manager->gender) : '' }}');
            $('#birthday_manager-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? Auth::user()->Enterprise->Manager->birthday : '' }}'
            );
            $('#address_manager-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? Auth::user()->Enterprise->Manager->address : '' }}'
            );
            $('#email_manager-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? Auth::user()->Enterprise->Manager->email : '' }}'
            );
            $('#mobile_manager-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? Auth::user()->Enterprise->Manager->mobile : '' }}'
            );
            $('#tel_manager-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? Auth::user()->Enterprise->Manager->tel : '' }}'
            );
            $('#city_manager-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? (App()->currentLocale() == 'ar' ? Auth::user()->Enterprise->manager->city->daira_name : Auth::user()->Enterprise->manager->city->daira_name_ascii) : '' }}'
            );
            $('#state_manager-val').text(
                '{{ Auth::user() && Auth::user()->Enterprise && Auth::user()->Enterprise->Manager ? (App()->currentLocale() == 'ar' ? Auth::user()->Enterprise->manager->city->wilaya_name : Auth::user()->Enterprise->manager->city->wilaya_name_ascii) : '' }}'
            );
        });
    </script>
    <script src="{{ URL::asset('wizard/js/main.js') }}"></script>

</body>

</html>
