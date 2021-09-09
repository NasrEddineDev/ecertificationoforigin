<!doctype html>
@php $locale = App()->currentLocale(); @endphp
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>CACI E-Certification</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('') }}img/logo/caci-logo.ico" />

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.4.5.2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--====== Custom CSS ======-->
    <link rel="stylesheet" href="assets/css/custom.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link id="theme-style" rel="stylesheet" href="assetsDoc/css/custom.css">


    <link rel="stylesheet" href="slicebox/css/demo.css">
    <link rel="stylesheet" href="slicebox/css/slicebox.css">
    <link rel="stylesheet" href="slicebox/css/custom.css">

    {{-- <link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" /> --}}
    <link href="https://vjs.zencdn.net/7.10.2/video-js.min.css" rel="stylesheet">

    <link rel='stylesheet' href='unitegallery/css/unite-gallery.css' type='text/css' />
    {{-- <link rel='stylesheet' href='unitegallery/themes/default/ug-theme-default.css' type='text/css' /> --}}
    <link  href='unitegallery/themes/video/skin-right-no-thumb.css' rel='stylesheet' type='text/css' />
    <link  href='unitegallery/themes/video/skin-right-thumb.css' rel='stylesheet' type='text/css' />
    <link  href='unitegallery/themes/video/skin-right-title-only.css' rel='stylesheet' type='text/css' />

    <script type="text/javascript" src="slicebox/js/modernizr.custom.46884.js"></script>
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

        a {
            text-decoration: none !important;
        }

        .section-header p {
            margin: 10px 0 0 0;
            padding: 0;
            font-size: 38px;
            line-height: 42px;
            font-weight: 700;
            color: #3A424E;
        }

        .section-header {
            text-align: center;
        }
        .ug-strip-panel{
            width:20%!important;
        }
    </style>
    @if ($locale == 'ar')
        <style>
            .faq .accordion-collapse {
                border: 0;
            }

            .faq .accordion-button {
                padding: 15px 15px 20px 0;
                font-weight: 600;
                border: 0;
                font-size: 18px;
                color: #444444;
                text-align: left;
            }

            .faq .accordion-button:focus {
                box-shadow: none;
            }

            .faq .accordion-button:not(.collapsed) {
                background: none;
                color: #2C7744;
                border-bottom: 0;
            }

            .faq .accordion-body {
                padding: 0 0 25px 0;
                border: 0;
            }

            .accordion-button {
                position: relative;
                display: flex;
                align-items: center;
                width: 100%;
                padding: 1rem 1.25rem;
                font-size: 1rem;
                color: #212529;
                text-align: left;
                background-color: #fff;
                border: 0;
                border-radius: 0;
                overflow-anchor: none;
                transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out, border-radius .15s ease;
            }

            .accordion-button,
            .accordion-body {
                text-align: right;
            }

            @media (min-width: 993px) {

                #login-form1,
                #login-form2 {
                    width: 360px;
                }

                .wow {
                    margin-bottom: 10px;
                    margin-top: 5px;
                }

                #recaptcha2 div {
                    transform: scale(1.01);
                    transform-origin: 0 0;
                }

                .navbar-expand-lg .navbar-collapse {
                    display: flow-root !important;
                }
            }

            @media (max-width: 992px) {

                #login-form1,
                #login-form2 {
                    width: 260px;
                }

                #recaptcha1 div {
                    transform: scale(0.83);
                    transform-origin: 0 0;
                }

                #loginForm1 div.col-md-3,
                #loginForm2 div.col-md-3 {
                    width: 45% !important;
                }

                #loginForm1 div.col-md-4,
                #loginForm2 div.col-md-4 {
                    width: 55% !important;
                }
            }

            .docs-nav .nav-item {
                margin-right: 2.5rem !important;
                margin-left: auto !important;
            }

            .docs-nav .nav-item.section-title {
                margin-left: auto !important;
                margin-right: 0 !important;
            }

            .docs-nav .nav-item.section-title span {
                margin-left: .5rem !important;
            }

            .docs-nav .nav-link::before {
                background-color: #f4fcf6;
                content: ' ';
                display: inline-block;
                height: inherit;
                left: auto;
                margin-top: -0.5rem;
                margin-right: -15px;
                position: absolute;
                width: 3px;
                height: 100%;
                border-radius: 1rem;
            }

            label.error {
                color: #FF0000;
            }

            input.error {
                border: 1px solid red;
            }

            .form-group,
            .form-group input {
                text-align: right !important;
            }

            #recaptcha1-error,
            #recaptcha2-error,
            .rc-anchor-alert {
                display: none;
                text-align: right;
            }

            .grecaptcha-badge {
                visibility: hidden;
            }

            .forgot-password {
                float: left;
                text-align: left;
            }

            .forgot-password a {
                font-size: 12px !important;
                color: #581CCB !important
            }

            .remember {
                float: right;
                text-align: right;
            }

            .remember label {
                margin-right: 25px;
                font-size: 12px !important;
                color: #581CCB !important;
                margin-left: 5px;
            }

            .disabled-element {
                opacity: 0.65;
                pointer-events: none;
            }

        </style>
    @else
        <style>
            @media (min-width: 993px) {

                #login-form1,
                #login-form2 {
                    width: 360px;
                }

                .wow {
                    margin-bottom: 10px;
                    margin-top: 5px;
                }

                .g-recaptcha div {
                    transform: scale(1.01);
                    transform-origin: 0 0;
                }

                .navbar-expand-lg .navbar-collapse {
                    display: flow-root !important;
                }
            }

            @media (max-width: 992px) {

                #login-form1,
                #login-form2 {
                    width: 260px;
                }

                .g-recaptcha div {
                    transform: scale(0.83);
                    transform-origin: 0 0;
                }

                #loginForm1 div.col-md-3,
                #loginForm2 div.col-md-3 {
                    width: 45% !important;
                }

                #loginForm1 div.col-md-4,
                #loginForm2 div.col-md-4 {
                    width: 55% !important;
                }
            }

            .docs-nav .nav-item {
                margin-right: auto !important;
                margin-left: 2.5rem !important;
            }

            .docs-nav .nav-item.section-title {
                margin-right: auto !important;
                margin-left: 2.5 !important;
            }

            .docs-nav .nav-link::before {
                background-color: #f4fcf6;
                content: ' ';
                display: inline-block;
                height: inherit;
                left: 0;
                margin-top: -0.5rem;
                position: absolute;
                width: 3px;
                height: 100%;
                border-radius: 1rem;
            }

            .docs-nav .nav-item.section-title {
                margin-right: auto !important;
                margin-left: 0 !important;
            }

            .docs-nav .nav-item.section-title span {
                margin-right: .5rem !important;
            }

            label.error {
                color: #FF0000;
            }

            input.error {
                border: 1px solid red;
            }

            .forgot-password {
                float: right;
                text-align: right;
            }

            .forgot-password a {
                font-size: 12px !important;
                color: #581CCB !important
            }

            .remember {
                float: left;
                text-align: left;
            }

            .remember label {
                margin-right: 25px;
                font-size: 12px !important;
                color: #581CCB !important;
                margin-left: 5px;
            }

            .disabled-element {
                opacity: 0.65;
                pointer-events: none;
            }

        </style>
    @endif

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <section class="header_area class-test">
        <div class="header_navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg"
                            style="{{ App()->currentLocale() != 'ar' ? 'flex-direction: row-reverse;' : '' }}">
                            <a class="navbar-brand ms-auto" href="/">
                                <img class="main-logo" style="width:350px"
                                    src="{{ URL::asset('') }}img/logo/logo1.png" alt="" />
                                <img class="second-logo" style="width:50px"
                                    src="{{ URL::asset('') }}img/logo/caci.png" alt="CACI E-Certification" />
                            </a>

                            {{-- Mobile language selector --}}
                            <div class="lang">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                    class="nav-link dropdown-toggle">
                                    <img class="flag-icon"
                                        src="{{ URL::asset('') }}img/flag/{{ $locale == 'en' ? 'united-states' : ($locale == 'ar' ? 'algeria' : 'france') }}.png"
                                        alt="" />
                                    <span
                                        class="view-text">{{ $locale == 'en' ? __('English') : ($locale == 'ar' ? __('Arabic') : __('French')) }}</span>
                                    <span class="profile-text font-weight-medium d-none d-md-block"></span>
                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                </a>
                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                    style="min-width: auto!important;">
                                    <li><a href="{{ route('lang', 'ar') }}" class="nav-link">
                                            <img class="flag-icon" src="{{ URL::asset('') }}img/flag/algeria.png"
                                                alt="" />
                                            <span class="view-text">العربية</span>
                                        </a>
                                    </li>
                                    <li><a href="{{ route('lang', 'en') }}" class="nav-link">
                                            <img class="flag-icon"
                                                src="{{ URL::asset('') }}img/flag/united-states.png" alt="" />
                                            <span class="view-text">English</span>
                                        </a>
                                    </li>
                                    <li><a href="{{ route('lang', 'fr') }}" class="nav-link">
                                            <img class="flag-icon" src="{{ URL::asset('') }}img/flag/france.png"
                                                alt="" />
                                            <span class="view-text">Français</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            {{-- Mobile login form --}}
                            <div class="login-link">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                    class="nav-link ">
                                    <span class="view-text">{{ __('Log In') }}</span>
                                    <span class="view-icon"><img width="30px;"
                                            src="{{ URL::asset('') }}assets/images/login-50-white.png"
                                            alt="" /></span>
                                </a>
                                <div id="login-form1" role="menu"
                                    class="notification-author dropdown-menu animated zoomIn">
                                    <form id="loginForm1" class="px-4 py-3" method="POST"
                                        action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                                style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}"
                                                placeholder="{{ __('Email') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="password"
                                                style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}"
                                                placeholder="{{ __('Password') }}">
                                        </div>
                                        <div id="recaptcha1"></div>
                                        <label id="recaptcha1-error" class="error" for="recaptcha1"></label>
                                        <button type="submit" class="wow fadeInUp btn btn-primary col-lg-12"
                                            data-callback='onSubmit' data-action='submit'>{{ __('Log In') }}</button>
                                        <div class="form-check col-lg-5 col-md-3 col-sm-2 remember">
                                            @if ($locale != 'ar')
                                                <input type="checkbox" class="form-check-input" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            @endif
                                            <label class="form-check-label" for="dropdownCheck">
                                                {{ __('Remember Me') }}
                                            </label>
                                            @if ($locale == 'ar')
                                                <input type="checkbox" class="form-check-input" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-4 col-sm-2 forgot-password">
                                            <a class="dropdown" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password ?') }}
                                            </a>
                                        </div>

                                        <a href="{{ route('register1') }}"
                                            class="wow fadeInUp btn btn-success col-lg-12"
                                            style="margin-bottom:10px;">{{ __('Create New Account') }}</a>
                                    </form>
                                    <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">New around here? Sign up</a>
                                        <a class="dropdown-item" href="#">Forgot password?</a> -->
                                </div>
                            </div>

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="nav"
                                    class="nav navbar-nav {{ App()->currentLocale() == 'ar' ? 'navbar-nav-rtl' : '' }}"
                                    style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">{{ __('Home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">{{ __('Features') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll"
                                            href="#video">{{ __('About This System') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">{{ __('About') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">{{ __('Contact') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle">{{ __('Log In') }}
                                        </a>
                                        <div id="login-form2" role="menu"
                                            class="notification-author dropdown-menu animated zoomIn"
                                            style="left:-300px;">
                                            <form id="loginForm2" class="px-4 py-3" method="POST"
                                                action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="{{ __('Email') }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="{{ __('Password') }}">
                                                </div>
                                                <div id="recaptcha2"></div>
                                                <label id="recaptcha2-error" class="error"
                                                    for="recaptcha2"></label>
                                                <button type="submit" class="wow fadeInUp btn btn-primary col-lg-12"
                                                    style="margin-bottom:10px;">{{ __('Log In') }}</button>
                                                <div class="form-check col-lg-5 col-md-3 col-sm-2 remember">
                                                    @if ($locale != 'ar')
                                                        <input type="checkbox" class="form-check-input" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    @endif
                                                    <label class="form-check-label" for="dropdownCheck">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                    @if ($locale == 'ar')
                                                        <input type="checkbox" class="form-check-input" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 col-md-4 col-sm-2 forgot-password">
                                                    <a class="dropdown" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Password ?') }}
                                                    </a>
                                                </div>
                                                <a href="{{ route('register1') }}"
                                                    class="wow fadeInUp btn btn-success col-lg-12"
                                                    style="margin-bottom:10px;">{{ __('Create New Account') }}</a>
                                            </form>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">New around here? Sign up</a>
                                            <a class="dropdown-item" href="#">Forgot password?</a> -->
                                        </div>
                                    </li>
                                    <li class="nav-item lang">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link dropdown-toggle">
                                            <img class="flag-icon"
                                                src="{{ URL::asset('') }}img/flag/{{ $locale == 'en' ? 'united-states' : ($locale == 'ar' ? 'algeria' : 'france') }}.png"
                                                alt="" />
                                            <span
                                                class="view-text">{{ $locale == 'en' ? __('English') : ($locale == 'ar' ? __('Arabic') : __('French')) }}</span>
                                            {{-- <span class="profile-text font-weight-medium d-none d-md-block"></span> --}}
                                            {{-- <i class="fa fa-angle-down edu-icon edu-down-arrow"></i> --}}
                                        </a>
                                        <ul role="menu"
                                            class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                            style="min-width: auto!important;">
                                            <li><a href="{{ route('lang', 'ar') }}" class="nav-link">
                                                    <img class="flag-icon"
                                                        src="{{ URL::asset('') }}img/flag/algeria.png" alt="" />
                                                    <span class="view-text">العربية</span>
                                                </a>
                                            </li>
                                            <li><a href="{{ route('lang', 'en') }}" class="nav-link">
                                                    <img class="flag-icon"
                                                        src="{{ URL::asset('') }}img/flag/united-states.png"
                                                        alt="" />
                                                    <span class="view-text">English</span>
                                                </a>
                                            </li>
                                            <li><a href="{{ route('lang', 'fr') }}" class="nav-link">
                                                    <img class="flag-icon"
                                                        src="{{ URL::asset('') }}img/flag/france.png" alt="" />
                                                    <span class="view-text">Français</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header navbar -->

        <div id="home" class="header_hero d-lg-flex align-items-center">
            <img class="shape shape-1" src="assets/images/shape-1.svg" alt="shape">
            <img class="shape shape-2" src="assets/images/shape-2.svg" alt="shape">
            <img class="shape shape-3" src="assets/images/shape-3.svg" alt="shape">

            <div class="container home-container">
                <div class="row align-items-center"
                    style="{{ App()->currentLocale() == 'ar' ? 'flex-direction: row-reverse;text-align:right' : '' }}">
                    <div class="col-lg-7">
                        <div class="header_hero_content">
                            <h3 class="header_title wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                {{ __('Electronic Certificate of Origin') }}</h3>
                            <p class="wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.6s">
                                {{ __('Do you have any troubles to create your certificates ?') }} <br \>
                                {{ __('Are you living away from algiers ?') }} <br \>
                                {{ __("Do you've made mistakes when writing your certificate of origin manually ?") }}
                                <br \>
                                {{ __("Don't worry !?") }}<br \>
                                {{ __('CACI developed a new system that allow you to create and manage your certificate more easily and without any kind of diffuclties such as traveling to algiers, making errors, ...etc.') }}
                            </p>
                            <ul>
                                <li><a class="main-btn wow fadeInUp page-scroll" data-wow-duration="1.3s"
                                        data-wow-delay="1s" href="#user_guide">{{ __('Discover More') }}</a></li>
                                <li><a class="main-btn main-btn-2 wow fadeInUp" data-wow-duration="1.3s"
                                        data-wow-delay="1.4s"
                                        href="{{ route('register1') }}">{{ __('Register') }}</a>
                                </li>
                            </ul>
                        </div> <!-- header hero content -->
                    </div>
                    <div class="col-lg-5">
                        <div class="header_image align-items-end">
                            <div class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="1.8s">
                                {{-- <img src="assets/images/header_app1.png" alt="header App"> --}}
                                <img src="assets/images/dots.svg" alt="dots" class="dots">
                            </div> <!-- image -->
                        </div> <!-- header image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header hero -->
    </section>

    <!--====== HEADER PART ENDS ======-->

    <!--====== FEATURES PART START ======-->

    <section id="features" class="features_area pt-35 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_1 text-center wow fadeInUp" data-wow-duration="1.3s"
                        data-wow-delay="0.2s">
                        <div class="features_icon">
                            <i class="lni lni-ux"></i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">{{ __('Easy to use') }}</h4>
                            <p>{{ __('Designed to be easy to use as much as possible, the application requires a little user input, just fill the documents.') }}
                            </p>
                        </div>
                    </div> <!-- single featuresow -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_2 text-center wow fadeInUp" data-wow-duration="1.3s"
                        data-wow-delay="0.5s">
                        <div class="features_icon">
                            <i class="lni"><img src="assets/images/law.png" height="40px"></i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">{{ __('Legal value') }} </h4>
                            <p>{{ __('Due to electronic certification, were adopted AGCE documents to a third party, which was created from this Statute and is therefore applicable in court.') }}
                            </p>
                        </div>
                    </div> <!-- single featuresow -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_3 text-center wow fadeInUp" data-wow-duration="1.3s"
                        data-wow-delay="0.9s">
                        <div class="features_icon">
                            <i class="lni lni-timer"></i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">{{ __('Save time and distance') }}</h4>
                            <p>{{ __('Due to saving time is the main concern, the whole goal is to avoid travel and time expenses. This platform will allow to edit online all your documents.') }}
                            </p>
                        </div>
                    </div> <!-- single featuresow -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FEATURES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="user_guide" class="about_area pt-45 pb-80">
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== APP FEATURES PART START ======-->

    <section id="app_features">

    </section>

    <!--====== APP FEATURES PART ENDS ======-->

    <!--====== VIDEO PART START ======-->

    <section id="video" class="video_area pb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_title text-center">
                        <h4 class="title">{{ __('User Guide') }}</h4>
                        <h4 class="title">{{ __('Videos') }}</h4>
                        {{-- <p>Please, purchase full version of the template to get all sections, features and permission to
                            remove footer credits.</p></br> --}}

                    </div> <!-- section title --> 

                    <div id="gallery" style="display:none;">

                        <img alt="{{ __('Home Page') }}" src="slicebox/images/1.png" data-type="html5video"
                            data-image="slicebox/images/1.png" data-videomp4="data/videos/001 استكشاف الواجهة الرئيسية.mp4"
                            data-description="{{ __('Home Page') }}">
        
                        <img alt="{{ __('Registration Wizard') }}" src="slicebox/images/6.png" data-type="html5video"
                            data-image="slicebox/images/6.png" data-videomp4="data/videos/001 استكشاف الواجهة الرئيسية.mp4"
                            data-description="{{ __('Registration Wizard') }}">
        
                        <img alt="{{ __('Dashboard') }}" src="slicebox/images/1.png" data-type="html5video"
                            data-image="slicebox/images/1.png" data-videomp4="data/videos/001 استكشاف الواجهة الرئيسية.mp4"
                            data-title="{{ __('Dashboard') }}" data-description="{{ __('Dashboard') }}">
        
                        <img alt="{{ __('Certificates Managment') }}" src="slicebox/images/2.png" data-type="html5video"
                            data-image="slicebox/images/2.png"
                            data-videomp4="data/videos/003 إدارة الشهادات (إنشاء، حذف، تعديل، إمضاء) من قبل المصدر.mp4"
                            data-description="{{ __('Certificates Managment') }}">
        
                        <img alt="{{ __('Payments Managment') }}" src="slicebox/images/3.png" data-type="html5video"
                            data-image="slicebox/images/3.png" data-videomp4="data/videos/002 إدارة الحساب من قبل المصدر.mp4"
                            data-description="{{ __('Payments Managment') }}">
        
                        <img alt="{{ __('Importers Managment') }}" src="slicebox/images/1.png" data-type="html5video"
                            data-image="slicebox/images/1.png"
                            data-videomp4="data/videos/005 إدارة المستوردين (إنشاء، حذف، تعديل) من قبل المصدر.mp4"
                            data-description="{{ __('Importers Managment') }}">
        
                        <img alt="{{ __('Products Managment') }}" src="slicebox/images/5.png" data-type="html5video"
                            data-image="slicebox/images/5.png"
                            data-videomp4="data/videos/004 إدارة المنتوجات (إنشاء، حذف، تعديل) من قبل المصدر.mp4"
                            data-description="{{ __('Products Managment') }}">
    
                        <img alt="{{ __('Producers Managment') }}" src="slicebox/images/1.png" data-type="html5video"
                            data-image="slicebox/images/1.png"
                            data-videomp4="data/videos/006 إدارة المنتجين (إنشاء، حذف، تعديل) من قبل المصدر.mp4"
                            data-description="{{ __('Producers Managment') }}">
        
                        <img alt="{{ __('Profile Managment') }}" src="slicebox/images/4.png" data-type="html5video"
                            data-image="slicebox/images/4.png" data-videomp4="data/videos/002 إدارة الحساب من قبل المصدر.mp4"
                            data-description="{{ __('Profile Managment') }}">
        
                            <img alt="{{ __('Settings') }}" src="slicebox/images/4.png" data-type="html5video"
                            data-image="slicebox/images/4.png" data-videomp4="data/videos/002 إدارة الحساب من قبل المصدر.mp4"
                            data-description="{{ __('Settings') }}">

                        <img alt="{{ __('Mobile Version') }}" src="slicebox/images/1.png" data-type="html5video"
                            data-image="slicebox/images/1.png"
                            data-videomp4="data/videos/004 إدارة المنتوجات (إنشاء، حذف، تعديل) من قبل المصدر.mp4"
                            data-description="{{ __('Mobile Version') }}">

                    </div> 
                    {{-- <video id="my-video" class="video-js" controls preload="auto" width="850" height="600"
                        poster="slicebox/images/1.png" data-setup="{}">
                        <source src="data/videos/003 إدارة الشهادات (إنشاء، حذف، تعديل، إمضاء) من قبل المصدر.mp4"
                            type="video/mp4" />
                        <source src="data/videos/001 استكشاف الواجهة الرئيسية.mp4" type="video/mp4" />
                        <source src="data/videos/002 إدارة الحساب من قبل المصدر.mp4" type="video/mp4" />
                        <source src="data/videos/004 إدارة المنتوجات (إنشاء، حذف، تعديل) من قبل المصدر.mp4"
                            type="video/mp4" />
                        <source src="data/videos/005 إدارة المستوردين (إنشاء، حذف، تعديل) من قبل المصدر.mp4"
                            type="video/mp4" />
                        <source src="data/videos/006 إدارة المنتجين (إنشاء، حذف، تعديل) من قبل المصدر.mp4"
                            type="video/mp4" />
                    </video> --}}
                </div>

                {{-- <video
                        id="my-player"
                        class="video-js"
                        controls
                        preload="auto"
                        poster="//vjs.zencdn.net/v/oceans.png"
                        data-setup='{}'>
                        <source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4"></source>
                        <source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm"></source>
                        <source src="//vjs.zencdn.net/v/oceans.ogv" type="video/ogg"></source>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">
                            supports HTML5 video
                            </a>
                        </p>
                    </video> --}}

            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="screenshot" class="pt-40 pb-40">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>{{ __('Web Application Screenshots') }}</p>
            </header>

            <div class="row mt-30">

                <div class="wrapper">

                    <ul id="sb-slider" class="sb-slider">
                        <li>
                            <a href="#"><img src="slicebox/images/1.png" alt="image1" /></a>
                            <div class="sb-description">
                                <h3>{{ __('Dashboard page') }}</h3>
                            </div>
                        </li>
                        <li>
                            <a href="#"><img src="slicebox/images/2.png" alt="image2" /></a>
                            <div class="sb-description">
                                <h3>{{ __('Certificates Managment') }}</h3>
                            </div>
                        </li>
                        <li>
                            <a href="#"><img src="slicebox/images/3.png" alt="image1" /></a>
                            <div class="sb-description">
                                <h3>{{ __('Balance using DHAHABIA') }}</h3>
                            </div>
                        </li>
                        <li>
                            <a href="#"><img src="slicebox/images/4.png" alt="image1" /></a>
                            <div class="sb-description">
                                <h3>{{ __('Profile page') }}</h3>
                            </div>
                        </li>
                        <li>
                            <a href="#" style="  display: block;margin: 0 auto;"><img src="slicebox/images/5.png"
                                    alt="image1" style="display: block;margin: 0 auto;" /></a>
                            <div class="sb-description">
                                <h3>{{ __('Mobile Version') }}</h3>
                            </div>
                        </li>
                        <li>
                            <a href="#" target="_blank"><img src="slicebox/images/6.png" alt="image1" /></a>
                            <div class="sb-description">
                                <h3>{{ __('Registration Wizard') }}</h3>
                            </div>
                        </li>
                    </ul>

                    <div id="shadow" class="shadow"></div>

                    <div id="nav-arrows" class="nav-arrows">
                        <a href="#">Next</a>
                        <a href="#">Previous</a>
                    </div>

                </div><!-- /wrapper -->
            </div>
        </div>
    </section>

    <!-- ======= Verify Section ======= -->
    <section id="verify" class="verify">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>{{ __('Verify your Certificate') }}</p>
            </header>

            <div class="row mt-30">
                <form class="form-inline" id="searching" method="POST"
                    action="{{ route('verifiy-certificate-home') }}">
                    @csrf
                    {{-- <form class="form-inline" id="searching" action="{{ route('verifiy-certificate') }}"> --}}
                    <input class="form-control mr-sm-2" type="search"
                        placeholder="{{ __('Please type your code of certificate') }}" aria-label="Search"
                        id="certificate_id" name="certificate_id">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('Verify') }}</button>
                </form>
            </div>

        </div>

    </section><!-- End Verify Section -->



    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>{{ __('Frequently Asked Questions') }}</p>
                <h2>F.A.Q</h2>
            </header>

            <div class="row mt-30">
                <div class="col-lg-6">
                    <!-- F.A.Q List 1-->
                    <div class="accordion accordion-flush" id="faqlist1">
                        @foreach ($faq as $key => $value)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-{{ $loop->iteration }}">
                                        {{ $key }}
                                    </button>
                                </h2>
                                <div id="faq-content-{{ $loop->iteration }}" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist{{ $loop->iteration * 2 >= count($faq) ? '1' : '2' }}">
                                    <div class="accordion-body">
                                        {{ $value }}
                                    </div>
                                </div>
                            </div>
                            @if (($faq & 1 && 1 + $loop->iteration * 2 == count($faq)) || ($faq & 0 && $loop->iteration * 2 == count($faq)))
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- F.A.Q List 2-->
                    <div class="accordion accordion-flush" id="faqlist2">
                        @endif
                        @endforeach

                    </div>
                </div>

            </div>

        </div>

    </section><!-- End F.A.Q Section -->

    <!--====== PRICNG PART START ======-->

    {{-- <section id="pricing" class="pricing_area mt-80 pt-75 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h4 class="title">Choose a Plan</h4>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod tempor invidunt
                            ut labore et dolore.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single_pricing text-center pricing_color_1 mt-30 wow fadeInUp" data-wow-duration="1.3s"
                        data-wow-delay="0.2s">
                        <div class="pricing_top_bar">
                            <h5 class="pricing_title">Startup</h5>
                            <i class="lni lni-coffee-cup"></i>
                            <span class="price">$9.00</span>
                        </div>
                        <div class="pricing_list">
                            <ul>
                                <li>24/7 Support</li>
                                <li>Free Update</li>
                                <li>unimited download</li>
                            </ul>
                        </div>
                        <div class="pricing_btn">
                            <a href="#" class="main-btn main-btn-2">Get Started</a>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single_pricing text-center pricing_active pricing_color_2 mt-30 wow fadeInUp"
                        data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="pricing_top_bar">
                            <h5 class="pricing_title">Standard</h5>
                            <i class="lni lni-crown"></i>
                            <span class="price">$15.00</span>
                        </div>
                        <div class="pricing_list">
                            <ul>
                                <li>24/7 Support</li>
                                <li>Free Update</li>
                                <li>unimited download</li>
                            </ul>
                        </div>
                        <div class="pricing_btn">
                            <a href="#" class="main-btn">Get Started</a>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single_pricing text-center pricing_color_3 mt-30 wow fadeInUp" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <div class="pricing_top_bar">
                            <h5 class="pricing_title">Premium</h5>
                            <i class="lni lni-diamond-alt"></i>
                            <span class="price">$20.00</span>
                        </div>
                        <div class="pricing_list">
                            <ul>
                                <li>24/7 Support</li>
                                <li>Free Update</li>
                                <li>unimited download</li>
                            </ul>
                        </div>
                        <div class="pricing_btn">
                            <a href="#" class="main-btn main-btn-2">Get Started</a>
                        </div>
                    </div> <!-- single pricing -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section> --}}

    <!--====== PRICNG PART ENDS ======-->

    <!--====== DOWNLOAD APP PART START ======-->

    {{-- <section id="download" class="download_app_area pt-80 mb-80">
        <div class="container">
            <div class="download_app">
                <div class="download_shape">
                    <img src="assets/images/shape-5.svg" alt="shape">
                </div>
                <div class="download_shape_2">
                    <img src="assets/images/shape-6.png" alt="shape">
                </div>
                <div class="download_app_content">
                    <h3 class="download_title">Download The App</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod.</p>
                    <ul>
                        <li>
                            <a class="d-flex align-items-center" href="#">
                                <span class="icon">
                                    <i class="lni lni-play-store"></i>
                                </span>
                                <span class="content media-body">
                                    <h6 class="title">Play Store</h6>
                                    <p>Download Now</p>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex align-items-center" href="#">
                                <span class="icon">
                                    <i class="lni lni-apple"></i>
                                </span>
                                <span class="content">
                                    <h6 class="title">App Store</h6>
                                    <p>Download Now</p>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div> <!-- download app content -->
            </div> <!-- download app -->
        </div> <!-- container -->
        <div class="download_app_image d-none d-lg-flex align-items-end">
            <div class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                <img src="assets/images/download.png" alt="download">
            </div> <!-- image -->
        </div> <!-- download app image -->
    </section> --}}

    <!--====== DOWNLOAD APP PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    {{-- <section id="blog" class="blog_area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h4 class="title">From The Blog</h4>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod tempor invidunt
                            ut labore et dolore.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="single_blog blog_1 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="blog_image">
                            <img src="assets/images/blog-1.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <div class="blog_meta d-flex justify-content-between">
                                <div class="meta_date">
                                    <span>20 December, 2023</span>
                                </div>
                                <div class="meta_like">
                                    <ul>
                                        <li><a href="#"><i class="lni lni-comments-alt"></i> 20</a></li>
                                        <li><a href="#"><i class="lni lni-heart"></i> 15</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="blog_title"><a href="#">Unlimited featrues with free updates.</a></h4>
                            <a href="#" class="main-btn">Read More</a>
                        </div>
                    </div> <!-- single blog -->
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="single_blog blog_2 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="blog_image">
                            <img src="assets/images/blog-2.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <div class="blog_meta d-flex justify-content-between">
                                <div class="meta_date">
                                    <span>20 December, 2023</span>
                                </div>
                                <div class="meta_like">
                                    <ul>
                                        <li><a href="#"><i class="lni lni-comments-alt"></i> 20</a></li>
                                        <li><a href="#"><i class="lni lni-heart"></i> 15</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="blog_title"><a href="#">Easy to use and customize the App.</a></h4>
                            <a href="#" class="main-btn">Read More</a>
                        </div>
                    </div> <!-- single blog -->
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="single_blog blog_3 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="blog_image">
                            <img src="assets/images/blog-3.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <div class="blog_meta d-flex justify-content-between">
                                <div class="meta_date">
                                    <span>20 December, 2023</span>
                                </div>
                                <div class="meta_like">
                                    <ul>
                                        <li><a href="#"><i class="lni lni-comments-alt"></i> 20</a></li>
                                        <li><a href="#"><i class="lni lni-heart"></i> 15</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="blog_title"><a href="#">Super fast and strong security.</a></h4>
                            <a href="#" class="main-btn">Read More</a>
                        </div>
                    </div> <!-- single blog -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section> --}}

    <!--====== BLOG PART ENDS ======-->

    <!--====== SIGNUP PART START ======-->

    {{-- <section id="signup" class="blog_area pt-20 pb-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center">
                        <h4 class="title">Registration</h4>
                        <p>This is the best app ever!
                            Register and activate your account using your email address.</p>
                    </div> <!-- section title -->
                    <div id="section_activation" style="display:none" class="section_title text-center">
                        <p style="color:red!important">You are registered successfully ,
                            To activate your account, go to your email and click on verify your email!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="error-pagewrap  col-lg-8">
                    <div class="error-page-int">
                        <!-- <div class="text-center custom-login">
                            <h3>Registration</h3>
                            <p>This is the best app ever!</p>
                        </div> -->
                        <div class="content-error">
                            <div class="hpanel">
                                <div class="panel-body download_app"
                                    style="padding-top:20px;margin-top:20px;padding-bottom:20px;">
                                    <form method="POST" action="{{ route('register') }}" id="loginForm">
                                        <div class="row">
                                            <div class="subscribe_form col-lg-12">
                                                <input id="username" name="username" type="text"
                                                    placeholder="Username..." required>
                                                <button style="margin-right:15px;" class="main-btn">Sign Up</button>
                                            </div>
                                            <div class="subscribe_form form-group col-lg-6">
                                                <!-- <label style="color:white">Password</label> -->
                                                <input id="password" name="password" type="password"
                                                    class="form-control" placeholder="Password" required>
                                            </div>
                                            <div class="subscribe_form form-group col-lg-6">
                                                <!-- <label style="color:white">Repeat Password</label> -->
                                                <input id="password_confirmation" name="password_confirmation"
                                                    type="password" class="form-control" placeholder="Repeat Password"
                                                    required>
                                            </div>
                                            <div class="subscribe_form form-group col-lg-6">
                                                <!-- <label style="color:white">Email Address</label> -->
                                                <input id="email" name="email" class="form-control"
                                                    placeholder="Email Address" required>
                                            </div>
                                            <div class="subscribe_form form-group col-lg-6">
                                                <!-- <label style="color:white">Repeat Email Address</label> -->
                                                <input id="email_confirmation" name="email_confirmation"
                                                    class="form-control" placeholder="Repeat Email Address" required>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section> --}}

    <!--====== SIGNUP PART ENDS ======-->

    <section id="about" class="video_area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h4 class="title">{{ __('About ?') }}</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center">

                        <div class="stepper-description">
                            <div class="inlogo">
                                <a href="https://caci.dz"><img id="lg" style="width: 120px;margin-inline: 50px;"
                                        src="assetsHakim/images/caci.png" alt=""></a>
                                {{-- <a href="https://agce.dz"><img id="lg" style="width: 120px;margin-inline: 50px;"
                                        src="assetsHakim/images/agce.png" alt=""></a> --}}
                            </div>
                            <div class="infocaci pt-20">
                                <h4>{{ __('Algerian Chamber of Commerce and Industry') }}</h4>
                                <ul class="pcaci">

                                    <li>{{ __('About1') }}</li>
                                    <li>{{ __('About2') }}</li>

                                </ul>

                                {{-- <h4>السلطة الحكومية للتصديق الالكتروني</h4>
                                <ul class="pcaci">
                                    <li> تم إنشاؤه بموجب القانون رقم 15-04 المؤرخ في 11 ربيع الإيثاني 1436 الموافق 1
                                        فبراير 2015 الذي يحدد القواعد العامة المتعلقة بالتوقيع الإلكتروني والتصديق.</li>
                                    <li> وضع سياسة التصديق الإلكتروني الخاصة بها وتقديمها للهيئة الوطنية للمصادقة
                                        الإلكترونية للموافقة عليها والتأكد من تطبيقها.</li>
                                    <li>الموافقة على سياسات الشهادات الصادرة عن جهات خارجية موثوق بها والتأكد من
                                        تطبيقاتها.</li>

                                </ul> --}}
                            </div>
                        </div>

                    </div> <!-- section title -->


                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="contact" class="blog_area pt-20 pb-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h4 class="title">{{ __('Contact') }}</h4>
                        <p>{{ __('Get in touch with our team. Tell us about your needs and a specialist will guide you throughout the process.') }}
                        </p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-map mt-30">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2637.263625509341!2d3.065151089873451!3d36.7841072692536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6750a9b4bd187b36!2sChambre%20du%20Commerce!5e1!3m2!1sar!2sdz!4v1614761581263!5m2!1sar!2sdz"
                            width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        {{-- <iframe id="gmap_canvas"
                            src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> --}}
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
            <!-- <div class="row justify-content-center"> -->
            <div class="contact-info pt-30">
                <div class="row">
                    {{-- <div class="row"  style="{{ App()->currentLocale() == 'ar' ? 'flex-direction: row-reverse;text-align:right' : '' }}"> --}}
                    <div class="col-lg-6 col-md-6">
                        <div class="single-contact-info contact-color-1 mt-30 d-flex">
                            <div class="contact-info-icon">
                                <i class="lni lni-map-marker"></i>
                            </div>
                            <div class="contact-info-content media-body" style="text-align: center">
                                <p class="text">
                                    {{ __('Consular palace 6, BD AMILCAR CABRAL. CP 16003 Algiers. BP 100 Algiers November 1st. Place des Martyrs. Algiers') }}
                                </p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-contact-info contact-color-2 mt-30 d-flex ">
                            <div class="contact-info-icon">
                                <i class="lni lni-envelope"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">infos@caci.dz</p>
                                <p class="text">e.certification@caci.dz</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex ">
                            <div class="contact-info-icon">
                                <i class="lni lni-phone"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">(+213/0) 21.96.77.77</p>
                                <p class="text">(+213/0) 21.96.66.66</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="panel-body download_app" style="padding-top:20px;margin-top:20px;padding-bottom:20px;">
                        <h4 class="contact-title  pt-15 pb-10"
                            style="color:#fff;{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}"><i
                                class="lni lni-envelope"></i>{{ __('Leave A Message') }}</h4>
                        <form method="POST" action="{{ route('leave-message') }}" id="leaveMessageForm">
                            @csrf
                            <div class="row">
                                <div class="subscribe_form col-lg-12">
                                    <input type="text" id="name" name="name"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}"
                                        placeholder="{{ __('Your Name...') }}" required>
                                    <button type="submit" class="main-btn pull-left"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right;left: 20px;' : 'margin-right:15px;' }}">{{ __('Send') }}</button>
                                </div>
                                <div class="subscribe_form form-group col-lg-12">
                                    <!-- <label style="color:white">Password</label> -->
                                    <textarea id="message" name="message" rows="7" class="col-lg-12"
                                        placeholder="{{ __('Type Your Message...') }}"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}"
                                        required></textarea>
                                </div>
                                <div class="subscribe_form form-group col-lg-12">
                                    <!-- <label style="color:white">Email Address</label> -->
                                    <input class="form-control" placeholder="{{ __('Your Email Address...') }}"
                                        required id="anonymous_email" name="anonymous_email"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- row -->
            <!--  </div>  row -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART START ======-->

    <section id="footer" class="footer_area pt-75 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="footer_subscribe text-center">
                        <h3 class="subscribe_title">{{ __('Subscribe our newsletter') }}</h3>
                        <p>{{ __('Join thousands of users who believe this is the one app.') }}</p>

                        <div class="subscribe_form">
                            <form action="#">
                                <input type="text" placeholder="{{ __('Enter Your Email...') }}"
                                    style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                <button
                                    style="{{ App()->currentLocale() == 'ar' ? 'text-align:right;left: 5px;' : '' }}"
                                    class="main-btn">{{ __('Subscribe') }}</button>
                            </form>
                        </div> <!-- subscribe form -->
                    </div> <!-- footer subscribe -->
                    <div class="footer_social text-center mt-60">
                        <ul>
                            <li><a href="https://www.facebook.com/caci.dz/"
                                    title="{{ __('CACI - Algerian Chamber of Commerce and Industry In Facebook') }}"><span
                                        class="lni lni-facebook-filled"></span></a></li>
                            <li><a href="https://twitter.com/cacidz?lang=en"
                                    title="{{ __('CACI - Algerian Chamber of Commerce and Industry In Twitter') }}"><span
                                        class="lni lni-twitter-original"></span></a></li>
                            <li><a href="#"><span class="lni lni-instagram-filled"></span></a></li>
                            <li><a href="https://www.linkedin.com/company/algerian-chamber-of-commerce-and-industry/"
                                    title="{{ __('CACI - Algerian Chamber of Commerce and Industry In LinkedIn') }}"><span
                                        class="lni lni-linkedin-original"></span></a></li>
                        </ul>
                    </div> <!-- footer social -->
                    <div class="footer_copyright text-center mt-55">
                        <p>{{ __('Copyright © 2021. All rights reserved. Algerian Chamber of Commerce and Industry') }}
                        </p> <a href="https://caci.dz">CACI</a>
                        {{-- <p>Copyright &copy; 2023. Designed and Developed by <a href="https://uideck.com"
                                rel="nofollow">UIdeck</a></p> --}}
                    </div> <!-- footer copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <div class="Ntooltip">
        <label for="nombre" generated="true" class="error"></label>
        <div class="errorImage"></div>
    </div>
    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="___class_+?250___">
        <div class="container">
            <div class="row">
                <div class="col-lg-">

                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->





    <!--====== Jquery js ======-->

    <script src="{{ URL::asset('wizard/js/jquery-3.3.1.min.js') }}"></script>

    <script src="slicebox/js/jquery.slicebox.js"></script>

    <script src="{{ URL::asset('wizard/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/lang/messages_' . App()->currentLocale() . '.js') }}">
    </script>
    <script src="{{ URL::asset('js/input-mask/jquery.inputmask.min.js') }}"></script>

    <script src="assetsDoc/plugins/jquery.scrollTo.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.4.5.2.min.js"></script>


    <!--====== Scrolling Nav js ======-->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>

    <!--====== wow js ======-->
    <script src="assets/js/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
    <script src="assetsDoc/js/highlight-custom.js"></script>
    <script src="assetsDoc/js/docs.js"></script>

    <!--====== Main js ======-->
    {{-- <script src="assetsDoc/js/all.js"></script> --}}
    <script src="assets/js/main.js"></script>

    {{-- <script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script> --}}
    <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>

    <script type='text/javascript' src='unitegallery/js/unitegallery.min.js'></script>
	<script type='text/javascript' src='unitegallery/themes/video/ug-theme-video.js'></script>
    {{-- <script type='text/javascript' src='unitegallery/themes/default/ug-theme-default.js'></script> --}}

    <script
        src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit&hl={{ App()->currentLocale() }}"
        async defer>
    </script>
    <script>
        var is_mobile = false;
        if ($('.navbar > .login-link').css('display') == 'block!important' ||
            $('.navbar > .login-link').css('display') == 'block') {
            is_mobile = true;
        }
        var recaptchaCallback = function() {
            if (is_mobile == true) {
                console.log('recaptcha mobile is ready'); // showing
                console.log($('.navbar > .login-link').css('display'));
                grecaptcha.render('recaptcha1', {
                    sitekey: '{{ env('GOOGLE_CAPTCHA_SITEKEY') }}'
                });
            } else {
                console.log('recaptcha desktop is ready'); // showing
                console.log($('.navbar > .login-link').css('display'));
                grecaptcha.render('recaptcha2', {
                    sitekey: '{{ env('GOOGLE_CAPTCHA_SITEKEY') }}'
                });
            }
        };

        $(document).ready(function() {
            $(".rc-anchor-light.rc-anchor-normal").attr("style", "width:99%");
            $(".nav .nav-link").on("click", function() {
                $(".nav").find(".active").removeClass("active");
                $(this).addClass("active");
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

            // {{-- Mobile login form --}}
            $('#loginForm1').submit(function(e) {
                e.preventDefault();
                // $("#loginForm2 #g-recaptcha").addClass("disabled-element");

                var rcres = grecaptcha.getResponse();
                if (rcres.length) {
                    grecaptcha.reset();
                    // alert("Form Submitted!", "success");
                } else {
                    // alert("Please verify reCAPTCHA", "error");
                }

                var account_validator1 = $("#loginForm1").validate({

                    rules: {
                        email: {
                            required: true,
                            email: true,
                            emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i,
                        },
                        password: {
                            required: true,
                        },
                    },
                    messages: {

                        email: {
                            required: "{{ __('Email Address is required') }}",
                            emailcheck: "{{ __('Email Address is invalid') }}",
                        },
                        password: {
                            required: "{{ __('Password is required') }}",
                        },
                    },
                });

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize() + '&recaptchaIsChecked=' + (rcres.length ? true :
                        false),
                    success: function(data) {
                        if (data.result == 'success') {
                            window.location.href = data.url;
                        } else if (data.result == 'failed') {

                        }
                    },
                    error: function(data) {
                        var errors;
                        $(".login-link").addClass("show");
                        $(".login-link .nav-link").attr("aria-expanded", "true");
                        $("#login-form1").addClass("show");
                        if (data.result == 'failed') {
                            errors = data.errors;
                        } else {
                            errors = data.responseJSON.errors;
                        }

                        if (!$("#g-recaptcha-response").val()) {
                            $("#recaptcha1-error").text(
                                "{{ __('Captcha must be checked') }}");
                            $("#recaptcha1-error").attr("style", "display:block");
                        }

                        account_validator1.showErrors(errors);
                    }
                });
            });

            // {{-- Desktop login form --}}
            $('#loginForm2').submit(function(e) {
                e.preventDefault();
                // $("#loginForm1 #g-recaptcha").addClass("disabled-element");


                var rcres = grecaptcha.getResponse();
                if (rcres.length) {
                    grecaptcha.reset();
                    // alert("Form Submitted!", "success");
                } else {
                    // alert("Please verify reCAPTCHA", "error");
                }

                var account_validator2 = $("#loginForm2").validate({

                    rules: {
                        email: {
                            required: true,
                            email: true,
                            emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i,
                        },
                        password: {
                            required: true,
                        },
                    },
                    messages: {

                        email: {
                            required: "{{ __('Email Address is required') }}",
                            emailcheck: "{{ __('Email Address is invalid') }}",
                        },
                        password: {
                            required: "{{ __('Password is required') }}",
                        },
                    },
                });

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize() + '&recaptchaIsChecked=' + (rcres.length ? true :
                        false),
                    success: function(data) {
                        if (data.result == 'success') {
                            window.location.href = data.url;
                        } else if (data.result == 'failed') {

                        }
                    },
                    error: function(data) {
                        var errors;
                        $(".login-link").addClass("show");
                        $(".login-link .nav-link").attr("aria-expanded", "true");
                        $("#login-form2").addClass("show");
                        if (data.result == 'failed') {
                            errors = data.errors;
                        } else {
                            errors = data.responseJSON.errors;
                        }

                        if (!$("#g-recaptcha-response").val()) {
                            $("#recaptcha2-error").text(
                                "{{ __('Captcha must be checked') }}");
                            $("#recaptcha2-error").attr("style", "display:block");
                        }

                        account_validator2.showErrors(errors);
                    }
                });
            });


            // {{-- leave message form --}}
            $('#leaveMessageForm').submit(function(e) {
                e.preventDefault();
                // $("#loginForm1 #g-recaptcha").addClass("disabled-element");

                var leave_message_validator = $("#leaveMessageForm").validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        anonymous_email: {
                            required: true,
                            email: true,
                            emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i,
                        },
                        message: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "{{ __('Field is required') }}",
                        },
                        anonymous_email: {
                            required: "{{ __('Email Address is required') }}",
                            emailcheck: "{{ __('Email Address is invalid') }}",
                        },
                        message: {
                            required: "{{ __('Message is required') }}",
                        },
                    },
                });

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data.result) {
                            $("#name").val("");
                            $("#anonymous_email").val("");
                            $("#message").val("");
                        } else {

                        }
                    },
                    error: function(data) {}
                });
            });

            $('#anonymous_email').inputmask({
                alias: "email",
                rightAlign: false
            });

            jQuery("#gallery").unitegallery({
                gallery_theme: "video",
                gallery_width:1600,
	            gallery_height:700,
                theme_skin: "right-thumb",	 
            });
        });

        $(function() {

            var Page = (function() {

                var $navArrows = $('#nav-arrows').hide(),
                    $shadow = $('#shadow').hide(),
                    slicebox = $('#sb-slider').slicebox({
                        onReady: function() {
                            $navArrows.show();
                            $shadow.show();
                        },
                        orientation: 'r',
                        cuboidsRandom: true,
                        disperseFactor: 30
                    }),

                    init = function() {

                        initEvents();

                    },
                    initEvents = function() {

                        // add navigation events
                        $navArrows.children(':first').on('click', function() {

                            slicebox.next();
                            return false;

                        });

                        $navArrows.children(':last').on('click', function() {

                            slicebox.previous();
                            return false;

                        });

                    };

                return {
                    init: init
                };

            })();

            Page.init();

        });
    </script>

</body>

</html>
