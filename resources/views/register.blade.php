<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Wizard-v3</title>

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('') }}img/logo/caci-logo.ico" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
    <!-- datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('wizard/css/jquery-ui.min.css') }}" />

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('select2/css/select2.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datapicker/datepicker3.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        p {
            color: grey
        }

        #heading {
            text-transform: uppercase;
            color: #2C7744;
            font-weight: normal
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: left
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform input,
        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #2C7744;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: #2C7744;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #65b12d
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000
        }

        .card {
            z-index: 0;
            border: none;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C7744;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #2C7744;
            font-weight: normal
        }

        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #2C7744
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 14.28%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #activation:before {
            font-family: FontAwesome;
            content: "\f13e"
        }

        #progressbar #enterprise:before {
            font-family: FontAwesome;
            content: "\f0f7"
                /* content: "\f007" */
        }

        #progressbar #manager:before {
            font-family: FontAwesome;
            content: "\f183"
        }

        #progressbar #attachments:before {
            font-family: FontAwesome;
            content: "\f093"
                /* f0c6 */
        }

        /* content: "\f030" */
        #progressbar #summary:before {
            font-family: FontAwesome;
            content: "\f03a"
        }

        #progressbar #finish:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #2C7744
        }

        .progress {
            height: 14px
        }

        .progress-bar {
            background-color: #2C7744
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }



        .select2-selection.select2-selection--multiple {
            height: 38px;
        }

        .select2-search {
            /* width: 80%!important; */
        }

        .select2-search__field {
            background-color: rgba(0, 0, 0, 0) !important;
            padding: 0 !important;
            /* background: rgba(0,0,0,0.5); */
            border: 0px solid #fff !important;
            height: 30px !important;
            /* width: 80%!important; */

        }

        .select2-search__field:focus {
            border: none !important;
        }

        h6 {
            color: #ccc;
        }

        .select2 {
            width: 100% !important;
        }

        /*
                    .select2-container--default .select2-search--inline .select2-search__field{
                width:initial!important;
            } */

        .dropdown {
            text-align: left;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .dropdown #dropdownMenuButton {
            line-height: 1.75;
        }

        label.error {
            color: #FF0000;
        }

        .email-verification-message.error {
            color: #FF0000;
        }

        input.error {
            border: 1px solid red !important;
            margin-bottom: 0 !important;
        }

        select.error {
            border: 1px solid red !important;
            margin-bottom: 0 !important;
        }

        .select2-selection.error {
            border: 1px solid red !important;
            margin-bottom: 0 !important;
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
            -webkit-animation: none !important;
            border: none !important;
        }

        .spinner-border .inner {
            position: absolute;
            top: 40%;
            left: 45%;
            z-index: 100;
        }

        #logout {

            text-decoration: none;
            padding: auto;
            margin: auto;
            font-size: 16px;
            font-weight: 400;
            cursor: pointer;
            border-radius: 27px;
            border: none;
            color: #fff;
            text-decoration: none;
            padding: 3px 4px;
            justify-content: center;
            align-items: center;
            background: #e83124;
            /* margin-left: 30%; */
        }

        #logout img {
            padding-top: 1px;
        }

        .hide {
            display: none;
        }

    </style>
    {{-- @if (App::currentLocale() == 'ar')
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
                /* font-family: 'Amiri'!important, serif!important; */
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

            /* .dropdown-toggle{
                height: 40px;
                width: 400px !important;
            } */
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
    @endif --}}
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-11 col-sm-9 col-md-7 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">Sign Up Your User Account</h2>
                    <p>Fill all form field to go to next step</p>
                    @if (Auth::check())
                        <div class="form-holder" style="width: 100%;">
                            <form method="POST" action="{{ route('logout') }}" id="loginForm">
                                @csrf
                                <div style="right:5px;top:20px; margin:10px;position:absolute">
                                    <button id="logout" type="submit" title="{{ __('Logout') }}"
                                        class="btn btn-default">
                                        {{-- <span class="view-text">{{ __('Log In') }}</span> --}}
                                        <span class="view-icon"><img width="30px;"
                                                src="{{ URL::asset('') }}assets/images/login-50-white.png"
                                                alt="" /></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li id="account" class="active"><strong>Account</strong></li>
                            <li id="activation"><strong>Activation</strong></li>
                            <li id="enterprise"><strong>Enterprise</strong></li>
                            <li id="manager"><strong>Manager</strong></li>
                            <li id="attachments"><strong>Attachments</strong></li>
                            <li id="summary"><strong>Summary</strong></li>
                            <li id="finish"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->

                        <!-- Account -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Account Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1/7</h2>
                                    </div>
                                </div>

                                <form class="account-form" action="#" method="post">
                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="email" id="email" placeholder="Email"
                                                        class="form-control" value="{{ Auth::user()->email ?? '' }}"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="username" id="username"
                                                        value="{{ Auth::user()->username ?? '' }}"
                                                        placeholder="Username" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Password') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password" id="password"
                                                        value="{{ Auth::check() && Auth::user()->password ? 'Test1988*' : '' }}"
                                                        placeholder="password" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Confirm Password') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password_confirmation"
                                                        id="password_confirmation" placeholder="Confirm Password"
                                                        class="form-control" required
                                                        value="{{ Auth::check() && Auth::user()->password ? 'Test1988*' : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>

                        <!-- Activation -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Account Activation:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2/7</h2>
                                    </div>
                                </div>
                                <form class="activation-form" action="#" method="post">
                                    <div class="row">
                                        <div
                                            class="col-md-7 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <p>{{ __('Thank you for creating new account') }}</p>
                                                <p class='email-verification-message'>
                                                    {{ __("Before getting started, you must verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another") }}

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row"
                                                style="vertical-align: middle!important;margin-top:7%;margin-bottom:5%;">
                                                <div style="margin:auto;text-align:center;">
                                                    <button id="resend" type="submit"
                                                        class="btn btn-success btn-block 
                                                        {{ !Auth::check() || !Auth::user()->hasVerifiedEmail() ? '' : 'hide' }}">
                                                        {{ __('Resend Verification Message by Email') }}
                                                    </button>
                                                    <div
                                                        class="email-verified {{ Auth::check() && Auth::user()->hasVerifiedEmail() ? '' : 'hide' }}">
                                                        <img src="{{ URL::asset('') }}register/img/email-verified.png"
                                                            style="width: 100px;" class="fit-image">
                                                        {{ __('Email Verified Successfully') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>

                        <!-- Enterprise -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Enterprise Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3/7</h2>
                                    </div>
                                </div>

                                <h6>{{ __('General Information') }}</h6>

                                <form class="enterprise-form" action="#" method="post">
                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label class="col-sm-5 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                    {{ __('Enterprise Name') }}
                                                </label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="name_ar" id="name_ar"
                                                        placeholder="Enterprise Name In Arabic" class="form-control"
                                                        required
                                                        value="{{ Auth::user()->enterprise->name_ar ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="name" id="name"
                                                        placeholder="Enterprise Name In English" class="form-control"
                                                        required
                                                        value="{{ Auth::user()->enterprise->name ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="name_fr" id="name_fr"
                                                        placeholder="Enterprise Name In French" class="form-control"
                                                        required
                                                        value="{{ Auth::user()->enterprise->name_fr ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-5 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Number') }}</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="rc_number" id="rc_number"
                                                        placeholder="{{ __('RC Number') }}" class="form-control"
                                                        value="{{ Auth::user()->enterprise->rc_number ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="nis_number" id="nis_number"
                                                        placeholder="{{ __('NIS Number') }}" class="form-control"
                                                        value="{{ Auth::user()->enterprise->nis_number ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="nif_number" id="nif_number"
                                                        placeholder="{{ __('NIF Number') }}" class="form-control"
                                                        value="{{ Auth::user()->enterprise->nif_number ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-5 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Select Activities Codes') }}</label>
                                                <div class="col-sm-7 activities-size">
                                                    <select id="activities"
                                                        class="col-sm-7 activities select2 form-control"
                                                        name="activities[]" multiple="multiple">
                                                    </select>
                                                    <label id="activities-error" class="error hide"
                                                        for="legal_form">{{ __('This field is required.') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <select class="form-control"
                                                        value="{{ Auth::user()->enterprise->legal_form ?? '' }}"
                                                        {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                        name="legal_form" id="legal_form">
                                                        <option value="06" disabled selected>
                                                            {{ __('Select The Legal Form') }}
                                                        </option>
                                                        <option value="SPA">{{ __('SPA') }}</option>
                                                        <option value="SARL">{{ __('SARL') }}</option>
                                                        <option value="EURL">{{ __('EURL') }}</option>
                                                        <option value="ETS">{{ __('ETS') }}</option>
                                                        <option value="SNC">{{ __('SNC') }}</option>
                                                        <option value="OTHER">{{ __('Other') }}</option>
                                                    </select>
                                                    <label id="legal_form-error" class="error hide"
                                                        for="legal_form">{{ __('This field is required.') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 export-activity-select">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <select class="form-control"
                                                        value="{{ Auth::user()->enterprise->exporter_type ?? '' }}"
                                                        {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                        name="exporter_type" id="exporter_type">
                                                        <option value="" selected disabled>
                                                            {{ __('Select The Type Of Exporter') }}</option>
                                                        <option value="TRADER">{{ __('Trader') }}</option>
                                                        <option value="CRAFTSMAN">{{ __('Craftsman') }}</option>
                                                        <option value="PRODUCER">{{ __('Producer') }}</option>
                                                        <option value="FARMER">{{ __('Farmer') }} </option>
                                                        <option value="OTHER">{{ __('Other') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 export-activity-code">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <select class="form-control"
                                                        value="{{ Auth::user()->enterprise->exporter_type ?? '' }}"
                                                        {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                        name="exporter_type" id="exporter_type">
                                                        <option value="" disabled>
                                                            {{ __('Select The Type Of Exporter') }}</option>
                                                        <option value="TRADER" selected>{{ __('Trader') }}</option>
                                                        <option value="CRAFTSMAN">{{ __('Craftsman') }}</option>
                                                        <option value="PRODUCER">{{ __('Producer') }}</option>
                                                        <option value="FARMER">{{ __('Farmer') }} </option>
                                                        <option value="OTHER">{{ __('Other') }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="export_activity_code"
                                                        name="export_activity_code"
                                                        value="{{ Auth::user()->enterprise->export_activity_code ?? '' }}"
                                                        placeholder="{{ __('Export Activity Code') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h6>{{ __('Contact Information') }}</h6>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-5 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile/Email/Tel') }}</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="mobile" id="mobile"
                                                        placeholder="{{ __('Mobile') }}" class="form-control"
                                                        value="{{ Auth::user()->enterprise->mobile ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="email_enterprise" id="email_enterprise"
                                                        placeholder="{{ __('Email') }}" class="form-control"
                                                        value="{{ Auth::user()->enterprise->email ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="tel" id="tel"
                                                        placeholder="{{ __('Tel') }}" class="form-control"
                                                        value="{{ Auth::user()->enterprise->tel ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-5 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="address_ar" id="address_ar"
                                                        placeholder="Address In Arabic" class="form-control"
                                                        value="{{ Auth::user()->enterprise->address_ar ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="address" id="address"
                                                        placeholder="Address In English" class="form-control"
                                                        value="{{ Auth::user()->enterprise->address ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="address_fr" id="address_fr"
                                                        placeholder="Address In French" class="form-control"
                                                        value="{{ Auth::user()->enterprise->address_fr ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-5 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile/Email/Tel') }}</label>
                                                <div class="col-sm-7">
                                                    <select name="state_code" id="state_code" class="form-control"
                                                        style="margin-top: 0;"
                                                        value="{{ Auth::user()->enterprise->state_code ?? '' }}"
                                                        {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}>
                                                        <option value="0" disabled selected>
                                                            {{ __('Select The State') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <select name="city_id" id="city_id" class="form-control"
                                                        style="margin-top: 0;"
                                                        value="{{ Auth::user()->enterprise->city_id ?? '' }}">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                {{-- <label
                                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                                <div class="col-sm-12">
                                                    <input type="text" name="website" id="website"
                                                        placeholder="{{ __('Website') }}" class="form-control"
                                                        value="{{ Auth::user()->enterprise->website ?? '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" /> <input
                                type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>

                        <!-- Manager -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Manager Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4/7</h2>
                                    </div>
                                </div>

                                <form class="manager-form" action="#" method="post">
                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('First Name') }}</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="firstname_ar" id="firstname_ar"
                                                        placeholder="{{ __('Arabic First Name') }}"
                                                        class="form-control" />
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="firstname" id="firstname"
                                                        placeholder="{{ __('English/French First Name') }}"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Last Name') }}</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="lastname_ar" id="lastname_ar"
                                                        placeholder="{{ __('Arabic Last Name') }}"
                                                        class="form-control" />
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="lastname" id="lastname"
                                                        placeholder="{{ __('English/French Last Name') }}"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="email_manager" id="email_manager"
                                                        placeholder="{{ __('Email') }}" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile/Tel') }}</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="mobile_manager" id="mobile_manager"
                                                        placeholder="{{ __('Mobile') }}" class="form-control" />
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="tel_manager" id="tel_manager"
                                                        placeholder="{{ __('Tel') }}" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="address_ar_manager" id="address_ar_manager"
                                                        placeholder="Address In Arabic" class="form-control" />
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="address_manager" id="address_manager"
                                                        placeholder="Address In English/French" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('State/City') }}</label>
                                                <div class="col-sm-5">
                                                    <select name="state_code_manager" id="state_code_manager"
                                                        class="form-control" style="margin-top: 0;"
                                                        {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}>
                                                        <option value="0" disabled selected>
                                                            {{ __('Select The State') }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <select name="city_id_manager" id="city_id_manager"
                                                        class="form-control" style="margin-top: 0;">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Birthday') }}</label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="birthday_manager" name="birthday_manager">
                                                </div>
                                                <div class="col-sm-5">
                                                    {{-- <input type="text" name="address" id="address"
                                                                            placeholder="Address In English/French" class="form-control" /> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="row">
                                                <label
                                                    class="col-sm-2 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Gender') }}</label>
                                                <div class="col-sm-5">
                                                    <select {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                        class="form-control" name="gender_manager" id="gender_manager">
                                                        <option value="MALE" selected>{{ __('MALE') }}</option>
                                                        <option value="FEMALE">{{ __('FEMALE') }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>

                        <!-- Documents -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Documents:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 5/7</h2>
                                    </div>
                                </div>
                            </div>

                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />


                            <div class="dropdown col-lg-3">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ __('Add New Image Or Dowument') }}</button>
                                <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">{{ __('RC File') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('NIS File') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('NIF File') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Signature') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Round Stamp') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Square Stamp') }}</a>
                                </div>
                            </div>

                            <form class="attachments-form" action="#" method="post" enctype="multipart/form-data">
                                <input type="file" id="attachedFiles" name="attachedFiles[]"
                                    data-browse-on-zone-click="false" multiple />
                            </form>
                        </fieldset>

                        <!-- Resume -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Resume:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 6/7</h2>
                                    </div>
                                </div>

                            </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input
                                type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>

                        <!-- Finish -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 7/7</h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <img src="{{ URL::asset('') }}register/img/finish.gif" class="fit-image">
                                        {{-- <img src="{{ URL::asset('') }}register/img/GwStPmg.png" class="fit-image"> --}}
                                    </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="loadingDiv" class="spinner-border text-success" role="status"
        style="width: 100%; height: 100%;position: absolute">
        <div class="inner" style="width: 200px; height: 200px;text-align:center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="{{ URL::asset('wizard/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('wizard/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/lang/messages_' . App()->currentLocale() . '.js') }}">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/locales/LANG.js"></script>

    <script src="{{ URL::asset('select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/datapicker/bootstrap-datepicker.js') }}"></script>
    <script>
        var $loading = $('#loadingDiv').hide();
        $(document).ajaxStart(function() {
            var curr = $('body').height()
            $('.spinner-border').height(curr);
            $loading.show();
        }).ajaxStop(function() {
            $loading.hide();
        });

        // Validation
        var account_validator = $(".account-form").validate({});

        var enterprise_validator = $(".enterprise-form").validate({
            ignore: [],
            rules: {},
            messages: {}
        });

        var manager_validator = $(".manager-form").validate({});

        $(document).ready(function() {

            var lang = "{{ App()->currentLocale() }}";
            var dir = '';
            if (lang == 'ar') dir = 'rtl';
            else dir = 'ltr';

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = '{{ $step ? $step + 1 : 1 }}';
            var steps = $("fieldset").length;

            setProgressBar(current);
            for (i = 0; i < current; i++) {
                $("#progressbar li").eq(i).addClass("active");
            }
            $("fieldset").hide();
            $("fieldset").eq(current - 1).show();

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                move = true;
                if (current == 1) {
                    console.log('Step 01');
                    // if (!account_validator.form()) {
                    //     move = false;
                    // } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        async: false,
                        url: "/register1",
                        data: {
                            step: current - 1,
                            username: $('#username').val(),
                            email: $('#email').val(),
                            password: $('#password').val(),
                            password_confirmation: $('#password_confirmation').val()
                        },
                        success: function(data) {
                            if (data.hasVerifiedEmail) {
                                $('.email-verified').removeClass('hide');
                                $('#resend').addClass('hide');
                            } else {
                                $('.email-verified').addClass('hide');
                                $('#resend').removeClass('hide');
                            }
                            return true;
                        },
                        error: function(data) {
                            move = false;
                            errors = data.responseJSON.errors;
                            account_validator.showErrors(errors);
                            return true;
                        }
                    });
                    // }
                } else if (current == 2) {
                    console.log('Step 02');

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        async: false,
                        url: "/register1",
                        data: {
                            step: current - 1,
                        },
                        success: function(data) {
                            if (data.hasVerifiedEmail) {
                                $('.email-verification-message').removeClass('error');
                                $('.email-verified').removeClass('hide');
                                $('#resend').addClass('hide');
                            } else {
                                move = false;
                                $('.email-verification-message').addClass('error');
                                $('.email-verified').addClass('hide');
                                $('#resend').removeClass('hide');
                            }
                            return true;
                        },
                        error: function(data) {
                            move = false;
                            errors = data.responseJSON.errors;
                            account_validator.showErrors(errors);
                            return true;
                        }
                    });
                } else if (current == 3) {
                    console.log('Step 03');

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        async: false,
                        url: "/register1",
                        data: {
                            step: current - 1,
                            name_ar: $('#name_ar').val(),
                            name: $('#name').val(),
                            name_fr: $('#name_fr').val(),
                            rc_number: $('#rc_number').val(),
                            nis_number: $('#nis_number').val(),
                            nif_number: $('#nif_number').val(),
                            activities: $('#activities').val(),
                            legal_form: $('#legal_form').find(":selected").val(),
                            exporter_type: $('#exporter_type').find(":selected").val(),
                            export_activity_code: $('#export_activity_code').val(),
                            mobile: $('#mobile').val(),
                            email_enterprise: $('#email_enterprise').val(),
                            tel: $('#tel').val(),
                            address_ar: $('#address_ar').val(),
                            address: $('#address').val(),
                            address_fr: $('#address_fr').val(),
                            state_code: $('#state_code').find(":selected").val(),
                            city_id: $('#city_id').find(":selected").val(),
                            website: $('#website').val()
                        },
                        success: function(data) {
                            if (data.hasVerifiedEmail) {
                                $('.email-verified').removeClass('hide');
                                $('#resend').addClass('hide');
                            } else {
                                $('.email-verified').addClass('hide');
                                $('#resend').removeClass('hide');
                            }

                            $('#legal_form-error').addClass('hide');
                            $('.select2-selection').removeClass('error');
                            $('#activities-error').addClass('hide');
                            return true;
                        },
                        error: function(data) {
                            move = false;
                            errors = data.responseJSON.errors;
                            // if ($('#state_code').find(":selected").val()){
                            // alert($("#state_code").val() );
                            if (!$("#state_code").val()) {
                                errors.state_code = ["{{ __('This field is required.') }}"];
                            }
                            if (!$("#legal_form").val()) {
                                errors.legal_form = ["{{ __('This field is required.') }}"];
                                $('#legal_form-error').removeClass('hide');
                            }
                            if ($("#activities").val() == "") {
                                // errors.activities = ["{{ __('This field is required.') }}"];
                                $('.select2-selection').addClass('error');
                                $('#activities-error').removeClass('hide');
                            }
                            enterprise_validator.showErrors(errors);
                            return true;
                        }
                    });
                }

                if (move) {
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    next_fs.show();
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 500
                    });
                    setProgressBar(++current);
                }
            });

            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                previous_fs.show();
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })

            var width = parseInt($('.col-md-6').width()) * (parseInt($('.activities-size').css('max-width')) / 100);

            // select
            $('#activities').select2({
                dir: dir,
                width: width,
                placeholder: '{{ __('Type Activities Codes') }}',
                allowClear: true,
                ajax: {
                    url: '/getactivities',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        // console.log(data);
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
                    // Add custom attributes to the <option> tag for the selected option
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


            // export activity
            $('.export-activity-select').show();
            $('.export-activity-code').hide();
            $(document).on('change', '#exporter_type', function() {
                // console.log(this.value);
                if (this.value == 'TRADER') {
                    $('.export-activity-select').hide();
                    $('.export-activity-code').show();
                    // $('#exporter_type option[value="TRADER"]')
                    $('.export-activity-code #exporter_type option:eq(1)').prop('selected', true);
                    // console.log($('.export-activity-code #exporter_type').find(":selected").val());
                } else {
                    $('.export-activity-select').show();
                    $('.export-activity-code').hide();
                    $('.export-activity-select #exporter_type option[value="' + this.value + '"]').prop(
                        'selected', true);
                }
            });


            // states cities
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

            // Birthday Manager
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

            $("#attachedFiles").fileinput({
                rtl: true,
                previewFileType: 'any',
                allowedFileTypes: ["image", "pdf"],
                // allowedFileExtensions: ["txt", "md", "ini", "text"],
                // showDrag: false,
                dropZoneEnabled: false,
                overwriteInitial: false,
                autoReplace: false,
                fileActionSettings: {
                    showRemove: true,
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
                minFileCount: 6,
                maxFileCount: 6,
                overwriteInitial: false,
                // initialPreview: [
                //     "{{ URL::asset('') }}register/img/GwStPmg.png"
                // ],
                // initialPreviewAsData: true,
                // initialPreviewFileType: 'image',
                // initialPreviewConfig: [{
                //     caption: "GwStPmg.png",
                //     size: 827000,
                //     width: "120px",
                //     url: "/file-upload-batch/2",
                //     key: 1
                // }, ]
            });
            $(".file-caption").hide();

            $('#attachedFiles').on('change', function() {
                //get the file name
                var fileName = $(this).val();
                // alert($('#attachedFiles').get(0).files.length);
                //replace the "Choose a file" label

                // $(this).next('.custom-file-label').html(fileName);
                var files = document.getElementById("attachedFiles").files;
                // alert(files.length);
            })

            $(document).on('click', '#dropdown-menu a', function() {
                $('#attachedFiles').click();
            });
        });



        // $("#stepone").click(function() {

        //     current_fs = $(this).parent();
        //     next_fs = $(this).parent().next();

        //     if (v.form()) {

        //         $("input", "#step2").removeClass("ignore");

        //         $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        //         $('#step1').hide();
        //         $('#step2').show();
        //         window.scrollTo(0, 0);
        //     }

        // });

        // $("#previous1").click(function() {

        //     $("input", "#step2").addClass("ignore");

        //     current_fs = $(this).parent();
        //     previous_fs = $(this).parent().prev();

        //     $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //     $('#step2').hide();
        //     $('#step1').show();
        //     window.scrollTo(0, 0);
        // });
    </script>

</body>

</html>
