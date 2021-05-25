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

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--====== Custom CSS ======-->
    <link rel="stylesheet" href="assets/css/custom.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link id="theme-style" rel="stylesheet" href="assetsDoc/css/custom.css">
    @if ($locale == 'ar')
        <style>
            .docs-nav .nav-item {
                margin-right: 2.5rem!important;
                margin-left: auto !important;
            }

            .docs-nav .nav-item.section-title {
                margin-left: auto !important;
                margin-right:0!important;
            }
            .docs-nav .nav-item.section-title span{
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
        </style>
    @else
        <style>
                .docs-nav .nav-item {
                    margin-right: auto!important;
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
            .docs-nav .nav-item.section-title span{
            margin-right: .5rem !important;
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

    <section class="header_area">
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
                                <!-- <img src="assets/images/logo.svg" alt="Logo"> -->
                                {{-- <h4 style="color:#fff" alt="Logo">CACI E-Certification 
                                </h4> --}}
                            </a>

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

                            <div class="login-link">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                    class="nav-link ">
                                    <span class="view-text">{{ __('Log In') }}</span>
                                    <span class="view-icon"><img width="30px;"
                                            src="{{ URL::asset('') }}assets/images/login-50-white.png"
                                            alt="" /></span>
                                </a>
                                <div id="login-form" role="menu"
                                    class="notification-author dropdown-menu animated zoomIn">
                                    <form class="px-4 py-3" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="{{ __('Email') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="{{ __('Password') }}">
                                        </div>
                                        <button type="submit" class="wow fadeInUp btn btn-primary col-lg-12"
                                            style="margin-bottom:10px;">{{ __('Log In') }}</button>
                                        <div class="form-check col-lg-5 col-md-5 col-sm-5" style="float:left">
                                            <input type="checkbox" class="form-check-input" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label style="font-size:12px!important;color:#581CCB;margin-left:5px;"
                                                class="form-check-label" for="dropdownCheck">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="float:right;text-align:right">
                                            <a class="dropdown" style="font-size:12px!important;color:#581CCB"
                                                href="{{ route('password.request') }}">{{ __('Forgot Password ?') }}
                                            </a>
                                        </div>
                                        <a href="{{ route('registration_wizard') }}"
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
                            {{-- </li>
                            </ul>
                        </div> --}}

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav"
                                    class="navbar-nav {{ App()->currentLocale() == 'ar' ? 'navbar-nav-rtl' : '' }}"
                                    style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">{{ __('Home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">{{ __('Features') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#user_guide">{{ __('User Guide') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">{{ __('About') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">{{ __('Contact') }}</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link ">{{ __('Log In') }}
                                        </a>
                                        <div role="menu" class="notification-author dropdown-menu animated zoomIn"
                                            style="left:-300px;">
                                            <form class="px-4 py-3" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="{{ __('Email') }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="{{ __('Password') }}">
                                                </div>
                                                <button type="submit" class="wow fadeInUp btn btn-primary col-lg-12"
                                                    style="margin-bottom:10px;">{{ __('Log In') }}</button>
                                                <div class="form-check col-lg-5" style="float:left">
                                                    <input type="checkbox" class="form-check-input" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label
                                                        style="font-size:12px!important;color:#581CCB;margin-left:5px;"
                                                        class="form-check-label" for="dropdownCheck">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                                <div class="col-lg-6" style="float:right">
                                                    <a class="dropdown" style="font-size:12px!important;color:#581CCB"
                                                        href="{{ route('password.request') }}">{{ __('Forgot Password') }}
                                                        ?</a>
                                                </div>
                                                <a href="{{ route('registration_wizard') }}"
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
                                            <span class="profile-text font-weight-medium d-none d-md-block"></span>
                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                        </a>
                                        <ul role="menu"
                                            class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                            style="min-width: auto!important;">
                                            <li><a href="{{ route('lang', 'ar') }}" class="nav-link">
                                                    <img class="flag-icon" src="{{ URL::asset('') }}img/flag/algeria.png" alt="" />
                                                </a>
                                            </li>
                                            <li><a href="{{ route('lang', 'en') }}" class="nav-link">
                                                    <img class="flag-icon" src="{{ URL::asset('') }}img/flag/united-states.png" alt="" />
                                                </a>
                                            </li>
                                            <li><a href="{{ route('lang', 'fr') }}" class="nav-link">
                                                    <img class="flag-icon" src="{{ URL::asset('') }}img/flag/france.png" alt="" />
                                                </a>
                                            </li>
                                        </ul>
                                    </li> --}}
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
                                        href="{{ route('registration_wizard') }}">{{ __('Register') }}</a>
                                </li>
                            </ul>
                        </div> <!-- header hero content -->
                    </div>
                    <div class="col-lg-5">
                        <div class="header_image align-items-end">
                            <div class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="1.8s">
                                <img src="assets/images/header_app1.png" alt="header App">
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
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center pb-25">
                    <h4 class="title">{{__('User Guide')}}</h4>
                    <p>{{__('The User Manual contains all...')}}</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="container single_features">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="docs-wrapper">
                        <div id="docs-sidebar" class="docs-sidebar"
                            style="{{ App()->currentLocale() == 'ar' ? 'float:right;direction: rtl;' : 'float:left;direction:ltr;' }}">
                            <div class="top-search-box d-lg-none p-3">
                                <form class="search-form">
                                    <input type="text" placeholder="Search the docs..." name="search"
                                        class="form-control search-input">
                                    <button type="submit" class="btn search-btn" value="Search"><i
                                            class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <nav id="docs-nav" class="docs-nav navbar"
                                style="{{ App()->currentLocale() != 'ar' ? 'flex-direction: row-reverse;text-align: left;' : '' }}">
                                <ul class="section-items list-unstyled nav flex-column pb-3">
                                    <li class="nav-item section-title"><a class="nav-link scrollto active"
                                            href="#section-1"><span class="theme-icon-holder mr-2"><i
                                                    class="lni lni-ux"></i></span>{{__('Introduction')}}</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-1">{{__('الهدف من هذا النظام')}}</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-2">Section Item
                                            1.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-3">Section Item
                                            1.3</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-4">Section Item
                                            1.4</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-5">Section Item
                                            1.5</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-6">Section Item
                                            1.6</a></li>
                                    <li class="nav-item section-title mt-3"><a class="nav-link scrollto"
                                            href="#section-2"><span class="theme-icon-holder mr-2"><i
                                                    class="lni lni-timer"></i></span>Installation</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-2-1">Section Item
                                            2.1</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-2-2">Section Item
                                            2.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-2-3">Section Item
                                            2.3</a></li>
                                    <li class="nav-item section-title mt-3"><a class="nav-link scrollto"
                                            href="#section-3"><span class="theme-icon-holder mr-2"><i
                                                    class="lni lni-box"></i></span>APIs</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-3-1">Section Item
                                            3.1</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-3-2">Section Item
                                            3.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-3-3">Section Item
                                            3.3</a></li>
                                    <li class="nav-item section-title mt-3"><a class="nav-link scrollto"
                                            href="#section-4"><span class="theme-icon-holder mr-2"><i
                                                    class="lni lni-ux"></i></span>Integrations</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-4-1">Section Item
                                            4.1</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-4-2">Section Item
                                            4.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-4-3">Section Item
                                            4.3</a></li>
                                    <li class="nav-item section-title mt-3"><a class="nav-link scrollto"
                                            href="#section-5"><span class="theme-icon-holder mr-2"><i
                                                    class="fas fa-tools"></i></span>Utilities</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-5-1">Section Item
                                            5.1</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-5-2">Section Item
                                            5.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-5-3">Section Item
                                            5.3</a></li>
                                    <li class="nav-item section-title mt-3"><a class="nav-link scrollto"
                                            href="#section-6"><span class="theme-icon-holder mr-2"><i
                                                    class="fas fa-laptop-code"></i></span>Web</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-6-1">Section Item
                                            6.1</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-6-2">Section Item
                                            6.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-6-3">Section Item
                                            6.3</a></li>
                                    <li class="nav-item section-title mt-3"><a class="nav-link scrollto"
                                            href="#section-7"><span class="theme-icon-holder mr-2"><i
                                                    class="fas fa-tablet-alt"></i></span>Mobile</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-7-1">Section Item
                                            7.1</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-7-2">Section Item
                                            7.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-7-3">Section Item
                                            7.3</a></li>
                                    <li class="nav-item section-title mt-3"><a class="nav-link scrollto"
                                            href="#section-8"><span class="theme-icon-holder mr-2"><i
                                                    class="fas fa-book-reader"></i></span>Resources</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-8-1">Section Item
                                            8.1</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-8-2">Section Item
                                            8.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-8-3">Section Item
                                            8.3</a></li>
                                    <li class="nav-item section-title mt-3"><a class="nav-link scrollto"
                                            href="#section-9"><span class="theme-icon-holder mr-2"><i
                                                    class="fas fa-lightbulb"></i></span>FAQs</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-9-1">Section Item
                                            9.1</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-9-2">Section Item
                                            9.2</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#item-9-3">Section Item
                                            9.3</a></li>
                                </ul>

                            </nav>
                            <!--//docs-nav-->
                        </div>
                        <!--//docs-sidebar-->
                        <div class="docs-content"
                            style="{{ App()->currentLocale() == 'ar' ? 'direction: rtl;text-align: right;' : 'direction: ltr;text-align: left;' }}">
                            <div class="container">
                                <article class="docs-article" id="section-1">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">{{__('Introduction')}}</h1>
                                        <section class="docs-intro">
                                            <p>{{__('The User Manual contains all...')}}</p>
                                        </section>
                                        <!--//docs-intro-->

                                        <h5>Github Code Example:</h5>
                                        <p>You can <a class="theme-link" href="https://gist.github.com/"
                                                target="_blank">embed your
                                                code snippets using Github gists</a></p>
                                        <div class="docs-code-block">
                                            <!-- ** Embed github code starts ** -->
                                            <script
                                                src="https://gist.github.com/xriley/fce6cf71edfd2dadc7919eb9c98f3f17.js">
                                            </script>
                                            <!-- ** Embed github code ends ** -->
                                        </div>
                                        <!--//docs-code-block-->

                                        <h5>Highlight.js Example:</h5>
                                        <p>You can <a class="theme-link"
                                                href="https://github.com/highlightjs/highlight.js" target="_blank">embed
                                                your code snippets using highlight.js</a> It supports <a
                                                class="theme-link" href="https://highlightjs.org/static/demo/"
                                                target="_blank">185
                                                languages and 89 styles</a>.</p>
                                        <p>This template uses <a class="theme-link"
                                                href="https://highlightjs.org/static/demo/" target="_blank">Atom One
                                                Dark</a> style for the code blocks: <br><code>&#x3C;link
                                                rel=&#x22;stylesheet&#x22;
                                                href=&#x22;//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.2/styles/atom-one-dark.min.css&#x22;&#x3E;</code>
                                        </p>
                                        <div class="docs-code-block">
                                            <pre class="shadow-lg rounded">
                                    <code class="json hljs">[
                                        {
                                            <span class="hljs-attr">"title"</span>: <span class="hljs-string">"apples"</span>,
                                            <span class="hljs-attr">"count"</span>: [<span class="hljs-number">12000</span>, <span class="hljs-number">20000</span>],
                                            <span class="hljs-attr">"description"</span>: {<span class="hljs-attr">"text"</span>: <span class="hljs-string">"..."</span>, <span class="hljs-attr">"sensitive"</span>: <span class="hljs-literal">false</span>}
                                        },
                                        {
                                            <span class="hljs-attr">"title"</span>: <span class="hljs-string">"oranges"</span>,
                                            <span class="hljs-attr">"count"</span>: [<span class="hljs-number">17500</span>, <span class="hljs-literal">null</span>],
                                            <span class="hljs-attr">"description"</span>: {<span class="hljs-attr">"text"</span>: <span class="hljs-string">"..."</span>, <span class="hljs-attr">"sensitive"</span>: <span class="hljs-literal">false</span>}
                                        }
                                    ]</code>
                                </pre>
                                        </div>
                                        <!--//docs-code-block-->
                                    </header>
                                    <section class="docs-section" id="item-1-1">
                                        <h2 class="section-heading">Section Item 1.1</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                        </p>
                                        <p>Code Example: <code>npm install &lt;package&gt;</code></p>
                                        <h5>Unordered List Examples:</h5>
                                        <ul>
                                            <li><strong class="mr-1">HTML5:</strong> <code>&lt;div id="foo"&gt;</code>
                                            </li>
                                            <li><strong class="mr-1">CSS:</strong> <code>#foo { color: red }</code></li>
                                            <li><strong class="mr-1">JavaScript:</strong>
                                                <code>console.log(&#x27;#foo\bar&#x27;);</code>
                                            </li>
                                        </ul>
                                        <h5>Ordered List Examples:</h5>
                                        <ol>
                                            <li>Download lorem ipsum dolor sit amet.</li>
                                            <li>Click ipsum faucibus venenatis.</li>
                                            <li>Configure fermentum malesuada nunc.</li>
                                            <li>Deploy donec non ante libero.</li>
                                        </ol>
                                        <h5>Callout Examples:</h5>
                                        <div class="callout-block callout-block-info">

                                            <div class="content">
                                                <h4 class="callout-title">
                                                    <span class="callout-icon-holder mr-1">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <!--//icon-holder-->
                                                    Note
                                                </h4>
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium
                                                    <code>&lt;code&gt;</code> , Nemo enim ipsam voluptatem quia voluptas
                                                    <a href="#">link example</a> sit aspernatur aut odit aut fugit.
                                                </p>
                                            </div>
                                            <!--//content-->
                                        </div>
                                        <!--//callout-block-->

                                        <div class="callout-block callout-block-warning">
                                            <div class="content">
                                                <h4 class="callout-title">
                                                    <span class="callout-icon-holder mr-1">
                                                        <i class="fas fa-bullhorn"></i>
                                                    </span>
                                                    <!--//icon-holder-->
                                                    Warning
                                                </h4>
                                                <p>Nunc hendrerit odio quis dignissim efficitur. Proin ut finibus
                                                    libero. Morbi
                                                    posuere fringilla felis eget sagittis. Fusce sem orci, cursus in
                                                    tortor <a href="#">link example</a> tellus vel diam viverra
                                                    elementum.</p>
                                            </div>
                                            <!--//content-->
                                        </div>
                                        <!--//callout-block-->

                                        <div class="callout-block callout-block-success">
                                            <div class="content">
                                                <h4 class="callout-title">
                                                    <span class="callout-icon-holder mr-1">
                                                        <i class="fas fa-thumbs-up"></i>
                                                    </span>
                                                    <!--//icon-holder-->
                                                    Tip
                                                </h4>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <a
                                                        href="#">Link
                                                        example</a> aenean commodo ligula eget dolor.</p>
                                            </div>
                                            <!--//content-->
                                        </div>
                                        <!--//callout-block-->

                                        <div class="callout-block callout-block-danger mr-1">
                                            <div class="content">
                                                <h4 class="callout-title">
                                                    <span class="callout-icon-holder">
                                                        <i class="fas fa-exclamation-triangle"></i>
                                                    </span>
                                                    <!--//icon-holder-->
                                                    Danger
                                                </h4>
                                                <p>Morbi eget interdum sapien. Donec sed turpis sed nulla lacinia
                                                    accumsan vitae ut
                                                    tellus. Aenean vestibulum <a href="#">Link example</a> maximus ipsum
                                                    vel
                                                    dignissim. Morbi ornare elit sit amet massa feugiat, viverra dictum
                                                    ipsum
                                                    pellentesque. </p>
                                            </div>
                                            <!--//content-->
                                        </div>
                                        <!--//callout-block-->

                                        <h5 class="mt-5">Alert Examples:</h5>
                                        <div class="alert alert-primary" role="alert">
                                            This is a primary alert—check it out!
                                        </div>
                                        <div class="alert alert-secondary" role="alert">
                                            This is a secondary alert—check it out!
                                        </div>
                                        <div class="alert alert-success" role="alert">
                                            This is a success alert—check it out!
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            This is a danger alert—check it out!
                                        </div>
                                        <div class="alert alert-warning" role="alert">
                                            This is a warning alert—check it out!
                                        </div>
                                        <div class="alert alert-info" role="alert">
                                            This is a info alert—check it out!
                                        </div>
                                        <div class="alert alert-light" role="alert">
                                            This is a light alert—check it out!
                                        </div>
                                        <div class="alert alert-dark" role="alert">
                                            This is a dark alert—check it out!
                                        </div>


                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-1-2">
                                        <h2 class="section-heading">Section Item 1.2</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                        <h5>Image Lightbox Example:</h5>
                                        <figure class="figure docs-figure py-3">
                                            <a href="assets/images/features/appify-theme-projects-overview-lg.jpg"
                                                data-title="Image Lightbox Example" data-toggle="lightbox"><img
                                                    class="figure-img img-fluid shadow rounded"
                                                    src="assetsDoc/images/features/appify-add-members.gif" alt=""
                                                    style="width: 600px;"></a>
                                            <figcaption class="figure-caption mt-3"><i
                                                    class="fas fa-info-circle mr-2"></i>Credit:
                                                the above screencast is taken from <a class="theme-link"
                                                    href="https://themes.3rdwavemedia.com/bootstrap-templates/product/appify-bootstrap-4-admin-template-for-app-developers/"
                                                    target="_blank"><i class="fas fa-external-link-alt"></i>Appify
                                                    theme</a>.
                                            </figcaption>
                                        </figure>

                                        <h5>Custom Table:</h5>
                                        <div class="table-responsive my-4">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th class="theme-bg-light"><a class="theme-link" href="#">Option
                                                                1</a></th>
                                                        <td>Option 1 desc lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="theme-bg-light"><a class="theme-link" href="#">Option
                                                                2</a></th>
                                                        <td>Option 2 desc lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit.
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th class="theme-bg-light"><a class="theme-link" href="#">Option
                                                                3</a></th>
                                                        <td>Option 3 desc lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit.
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th class="theme-bg-light"><a class="theme-link" href="#">Option
                                                                4</a></th>
                                                        <td>Option 4 desc lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--//table-responsive-->
                                        <h5>Stripped Table:</h5>
                                        <div class="table-responsive my-4">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">First</th>
                                                        <th scope="col">Last</th>
                                                        <th scope="col">Handle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--//table-responsive-->
                                        <h5>Bordered Dark Table:</h5>
                                        <div class="table-responsive my-4">
                                            <table class="table table-bordered table-dark">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">First</th>
                                                        <th scope="col">Last</th>
                                                        <th scope="col">Handle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--//table-responsive-->


                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-1-3">
                                        <h2 class="section-heading">Section Item 1.3</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                        <h5>Badges Examples:</h5>
                                        <div class="my-4">
                                            <span class="badge badge-primary">Primary</span>
                                            <span class="badge badge-secondary">Secondary</span>
                                            <span class="badge badge-success">Success</span>
                                            <span class="badge badge-danger">Danger</span>
                                            <span class="badge badge-warning">Warning</span>
                                            <span class="badge badge-info">Info</span>
                                            <span class="badge badge-light">Light</span>
                                            <span class="badge badge-dark">Dark</span>
                                        </div>
                                        <h5>Button Examples:</h5>
                                        <div class="row my-3">
                                            <div class="col-md-6 col-12">
                                                <ul class="list list-unstyled pl-0">
                                                    <li><a href="#" class="btn btn-primary">Primary Button</a></li>
                                                    <li><a href="#" class="btn btn-secondary">Secondary Button</a></li>
                                                    <li><a href="#" class="btn btn-light">Light Button</a></li>
                                                    <li><a href="#" class="btn btn-success">Succcess Button</a></li>
                                                    <li><a href="#" class="btn btn-info">Info Button</a></li>
                                                    <li><a href="#" class="btn btn-warning">Warning Button</a></li>
                                                    <li><a href="#" class="btn btn-danger">Danger Button</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <ul class="list list-unstyled pl-0">
                                                    <li><a href="#" class="btn btn-primary"><i
                                                                class="fas fa-download mr-2"></i>
                                                            Download Now</a></li>
                                                    <li><a href="#" class="btn btn-secondary"><i
                                                                class="fas fa-book mr-2"></i> View
                                                            Docs</a></li>
                                                    <li><a href="#" class="btn btn-light"><i
                                                                class="fas fa-arrow-alt-circle-right mr-2"></i> View
                                                            Features</a>
                                                    </li>
                                                    <li><a href="#" class="btn btn-success"><i
                                                                class="fas fa-code-branch mr-2"></i>
                                                            Fork Now</a></li>
                                                    <li><a href="#" class="btn btn-info"><i
                                                                class="fas fa-play-circle mr-2"></i>
                                                            Find Out Now</a></li>
                                                    <li><a href="#" class="btn btn-warning"><i
                                                                class="fas fa-bug mr-2"></i> Report
                                                            Bugs</a></li>
                                                    <li><a href="#" class="btn btn-danger"><i
                                                                class="fas fa-exclamation-circle mr-2"></i> Submit
                                                            Issues</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--//row-->

                                        <h5>Progress Examples:</h5>
                                        <div class="my-4">
                                            <div class="progress my-4">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div class="progress my-4">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="progress my-4">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div class="progress my-4">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-1-4">
                                        <h2 class="section-heading">Section Item 1.4</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>


                                        <h5>Pagination Example:</h5>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pl-0">
                                                <li class="page-item disabled"><a class="page-link"
                                                        href="#">Previous</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                        </nav>

                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>

                                    </section>
                                    <!--//section-->
                                    <section class="docs-section" id="item-1-5">
                                        <h2 class="section-heading">Section Item 1.5</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->
                                    <section class="docs-section" id="item-1-6">
                                        <h2 class="section-heading">Section Item 1.6</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                </article>

                                <article class="docs-article" id="section-2">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">Installation</h1>
                                        <section class="docs-intro">
                                            <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius
                                                eros interdum
                                                suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis.
                                                Duis
                                                vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in
                                                malesuada odio.</p>
                                        </section>
                                        <!--//docs-intro-->
                                    </header>
                                    <section class="docs-section" id="item-2-1">
                                        <h2 class="section-heading">Section Item 2.1</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-2-2">
                                        <h2 class="section-heading">Section Item 2.2</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-2-3">
                                        <h2 class="section-heading">Section Item 2.3</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->
                                </article>
                                <!--//docs-article-->


                                <article class="docs-article" id="section-3">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">APIs</h1>
                                        <section class="docs-intro">
                                            <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius
                                                eros interdum
                                                suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis.
                                                Duis
                                                vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in
                                                malesuada odio.</p>
                                        </section>
                                        <!--//docs-intro-->
                                    </header>
                                    <section class="docs-section" id="item-3-1">
                                        <h2 class="section-heading">Section Item 3.1</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-3-2">
                                        <h2 class="section-heading">Section Item 3.2</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-3-3">
                                        <h2 class="section-heading">Section Item 3.3</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->
                                </article>
                                <!--//docs-article-->

                                <article class="docs-article" id="section-4">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">Intergrations</h1>
                                        <section class="docs-intro">
                                            <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius
                                                eros interdum
                                                suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis.
                                                Duis
                                                vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in
                                                malesuada odio.</p>
                                        </section>
                                        <!--//docs-intro-->
                                    </header>
                                    <section class="docs-section" id="item-4-1">
                                        <h2 class="section-heading">Section Item 4.1</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-4-2">
                                        <h2 class="section-heading">Section Item 4.2</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-4-3">
                                        <h2 class="section-heading">Section Item 4.3</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->
                                </article>
                                <!--//docs-article-->

                                <article class="docs-article" id="section-5">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">Utilities</h1>
                                        <section class="docs-intro">
                                            <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius
                                                eros interdum
                                                suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis.
                                                Duis
                                                vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in
                                                malesuada odio.</p>
                                        </section>
                                        <!--//docs-intro-->
                                    </header>
                                    <section class="docs-section" id="item-5-1">
                                        <h2 class="section-heading">Section Item 5.1</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-5-2">
                                        <h2 class="section-heading">Section Item 5.2</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-5-3">
                                        <h2 class="section-heading">Section Item 5.3</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->
                                </article>
                                <!--//docs-article-->


                                <article class="docs-article" id="section-6">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">Web</h1>
                                        <section class="docs-intro">
                                            <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius
                                                eros interdum
                                                suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis.
                                                Duis
                                                vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in
                                                malesuada odio.</p>
                                        </section>
                                        <!--//docs-intro-->
                                    </header>
                                    <section class="docs-section" id="item-6-1">
                                        <h2 class="section-heading">Section Item 6.1</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-6-2">
                                        <h2 class="section-heading">Section Item 6.2</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-6-3">
                                        <h2 class="section-heading">Section Item 6.3</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->
                                </article>
                                <!--//docs-article-->


                                <article class="docs-article" id="section-7">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">Mobile</h1>
                                        <section class="docs-intro">
                                            <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius
                                                eros interdum
                                                suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis.
                                                Duis
                                                vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in
                                                malesuada odio.</p>
                                        </section>
                                        <!--//docs-intro-->
                                    </header>
                                    <section class="docs-section" id="item-7-1">
                                        <h2 class="section-heading">Section Item 7.1</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-7-2">
                                        <h2 class="section-heading">Section Item 7.2</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-7-3">
                                        <h2 class="section-heading">Section Item 7.3</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->
                                </article>
                                <!--//docs-article-->


                                <article class="docs-article" id="section-8">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">Resources</h1>
                                        <section class="docs-intro">
                                            <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.
                                                Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius
                                                eros interdum
                                                suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis.
                                                Duis
                                                vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in
                                                malesuada odio.</p>
                                        </section>
                                        <!--//docs-intro-->
                                    </header>
                                    <section class="docs-section" id="item-8-1">
                                        <h2 class="section-heading">Section Item 8.1</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-8-2">
                                        <h2 class="section-heading">Section Item 8.2</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-8-3">
                                        <h2 class="section-heading">Section Item 8.3</h2>
                                        <p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris,
                                            vitae
                                            facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id.
                                            Sed interdum
                                            turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo
                                            gravida iaculis.
                                            In fringilla odio in felis ultricies porttitor. Donec at purus libero.
                                            Vestibulum libero
                                            orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum
                                            ultricies
                                            malesuada tempor.</p>
                                    </section>
                                    <!--//section-->
                                </article>
                                <!--//docs-article-->


                                <article class="docs-article" id="section-9">
                                    <header class="docs-header">
                                        <h1 class="docs-heading">FAQs</h1>
                                        <section class="docs-intro">
                                            <p>Section intro goes here. You can list all your FAQs using the format
                                                below.</p>
                                        </section>
                                        <!--//docs-intro-->
                                    </header>
                                    <section class="docs-section" id="item-9-1">
                                        <h2 class="section-heading">Section Item 9.1 <small>(FAQ Category One)</small>
                                        </h2>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>What's sit amet quam
                                            eget
                                            lacinia?</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                            ligula eget
                                            dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                            montes,
                                            nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu,
                                            pretium quis,
                                            sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel,
                                            aliquet nec,
                                            vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis
                                            vitae, justo.
                                            Nullam dictum felis eu pede mollis pretium.</p>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>How to ipsum dolor
                                            sit amet quam
                                            tortor?</h5>
                                        <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue
                                            velit
                                            cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend
                                            sapien. Vestibulum
                                            purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
                                            lorem in dui.
                                        </p>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>Can I bibendum
                                            sodales?</h5>
                                        <p>Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut,
                                            mollis sed,
                                            nonummy id, metus. Nullam accumsan lorem in dui. </p>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>Where arcu sed urna
                                            gravida?
                                        </h5>
                                        <p>Aenean et sodales nisi, vel efficitur sapien. Quisque molestie diam libero,
                                            et elementum
                                            diam mollis ac. In dignissim aliquam est eget ullamcorper. Sed id sodales
                                            tortor, eu
                                            finibus leo. Vivamus dapibus sollicitudin justo vel fermentum. Curabitur nec
                                            arcu sed
                                            urna gravida lobortis. Donec lectus est, imperdiet eu viverra viverra,
                                            ultricies nec
                                            urna. </p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-9-2">
                                        <h2 class="section-heading">Section Item 9.2 <small>(FAQ Category Two)</small>
                                        </h2>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>What's sit amet quam
                                            eget
                                            lacinia?</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                            ligula eget
                                            dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                            montes,
                                            nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu,
                                            pretium quis,
                                            sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel,
                                            aliquet nec,
                                            vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis
                                            vitae, justo.
                                            Nullam dictum felis eu pede mollis pretium.</p>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>How to ipsum dolor
                                            sit amet quam
                                            tortor?</h5>
                                        <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue
                                            velit
                                            cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend
                                            sapien. Vestibulum
                                            purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
                                            lorem in dui.
                                        </p>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>Can I bibendum
                                            sodales?</h5>
                                        <p>Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut,
                                            mollis sed,
                                            nonummy id, metus. Nullam accumsan lorem in dui. </p>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>Where arcu sed urna
                                            gravida?
                                        </h5>
                                        <p>Aenean et sodales nisi, vel efficitur sapien. Quisque molestie diam libero,
                                            et elementum
                                            diam mollis ac. In dignissim aliquam est eget ullamcorper. Sed id sodales
                                            tortor, eu
                                            finibus leo. Vivamus dapibus sollicitudin justo vel fermentum. Curabitur nec
                                            arcu sed
                                            urna gravida lobortis. Donec lectus est, imperdiet eu viverra viverra,
                                            ultricies nec
                                            urna. </p>
                                    </section>
                                    <!--//section-->

                                    <section class="docs-section" id="item-9-3">
                                        <h2 class="section-heading">Section Item 9.3 <small>(FAQ Category Three)</small>
                                        </h2>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>How to dapibus
                                            sollicitudin
                                            justo vel fermentum?</h5>
                                        <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue
                                            velit
                                            cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend
                                            sapien. Vestibulum
                                            purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
                                            lorem in dui.
                                        </p>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>How long bibendum
                                            sodales?</h5>
                                        <p>Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut,
                                            mollis sed,
                                            nonummy id, metus. Nullam accumsan lorem in dui. </p>
                                        <h5 class="pt-3"><i class="fas fa-question-circle mr-1"></i>Where dapibus
                                            sollicitudin?</h5>
                                        <p>Aenean et sodales nisi, vel efficitur sapien. Quisque molestie diam libero,
                                            et elementum
                                            diam mollis ac. In dignissim aliquam est eget ullamcorper. Sed id sodales
                                            tortor, eu
                                            finibus leo. Vivamus dapibus sollicitudin justo vel fermentum. Curabitur nec
                                            arcu sed
                                            urna gravida lobortis. Donec lectus est, imperdiet eu viverra viverra,
                                            ultricies nec
                                            urna. </p>
                                    </section>
                                    <!--//section-->
                                </article>
                                <!--//docs-article-->

                                <footer class="footer">
                                    <div class="container text-center py-5">
                                        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                                        <small class="copyright">Designed with <i class="fas fa-heart"
                                                style="color: #fb866a;"></i>
                                            by <a class="theme-link" href="http://themes.3rdwavemedia.com"
                                                target="_blank">Xiaoying
                                                Riley</a> for developers</small>
                                        <ul class="social-list list-unstyled pt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-github fa-fw"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-twitter fa-fw"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-slack fa-fw"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-product-hunt fa-fw"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-facebook-f fa-fw"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-instagram fa-fw"></i></a></li>
                                        </ul>
                                        <!--//social-list-->
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <!--//docs-wrapper-->

        {{-- <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-9">
                    <div class="about_image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <img class="image" src="assets/images/about.png" alt="about">
                        <img class="dots" src="assets/images/dots.svg" alt="dots">
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about_content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section_title">
                            <h4 class="title">Discover New Experience!</h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod tempor
                                invidunt ut labore et dolore malquyam erat, sed diam voluptua. At vero eos et accusam et
                                justo doloes et ea rebum. Stet clita kasd gubergren, nod sea takmaa santus est Lorem
                                ipsum dolor sit amet. Lorem ipsum dolor sitdse ametr consetetur sadipscing elitr, sed
                                diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                        </div>
                        <a class="main-btn" href="#">Discover</a>

                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container --> --}}
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== APP FEATURES PART START ======-->

    <section id="app_features">

    </section>

    <!--====== APP FEATURES PART ENDS ======-->

    <!--====== VIDEO PART START ======-->

    {{-- <section id="video" class="video_area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center">
                        <h4 class="title">You are using free lite version</h4>
                        <p>Please, purchase full version of the template to get all sections, features and permission to
                            remove footer credits.</p></br>

                        <a href="https://rebrand.ly/advanced-ud" rel="nofollow" class="main-btn">Purchase Now</a>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="screenshot">

    </section> --}}

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
                        <h4 class="title">{{__('About ?')}}</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center">
                        
                    <div class="stepper-description">
                        <div class="inlogo">
                        <a href="https://caci.dz"><img id="lg" style="width: 120px;margin-inline: 50px;" src="assetsHakim/images/caci.png" alt="" ></a>
                        <a href="https://agce.dz"><img id="lg" style="width: 120px;margin-inline: 50px;" src="assetsHakim/images/agce.png" alt=""></a>
                    </div>
                    <div class="infocaci pt-20">
                    <h4>الغرفة الجزائرية للتجارة والصناعة</h4>
                        <ul class="pcaci">

                            <li> تمثل المصالح العامة لقطاعات التجارة والصناعة والخدمات مع الحكومات، بينما تضطلع بأنشطة تعليمية وتكوينية وتطويرية وإعادة تدريب للأعمال التجارية.</li>
                            <li>تأسست بموجب المرسوم التنفيذي 94-96 الصادر في 03/03/1996 المعدل والمكمل بالمرسوم التنفيذي 2000-312 ، وهي مؤسسة صناعية وتجارية عامة (EPIC).</li>

                        </ul>
                        
                        <h4>السلطة الحكومية للتصديق الالكتروني</h4>
                        <ul class="pcaci">
                            <li> تم إنشاؤه بموجب القانون رقم 15-04 المؤرخ في 11 ربيع الإيثاني 1436 الموافق 1 فبراير 2015 الذي يحدد القواعد العامة المتعلقة بالتوقيع الإلكتروني والتصديق.</li> 
                            <li> وضع سياسة التصديق الإلكتروني الخاصة بها وتقديمها للهيئة الوطنية للمصادقة الإلكترونية للموافقة عليها والتأكد من تطبيقها.</li>
                            <li>الموافقة على سياسات الشهادات الصادرة عن جهات خارجية موثوق بها والتأكد من تطبيقاتها.</li>

                        </ul>
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
                        <h4 class="title">{{__('Contact')}}</h4>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod tempor invidunt
                            ut labore et dolore.</p>
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
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-1 mt-30 d-flex">
                            <div class="contact-info-icon">
                                <i class="lni lni-map-marker"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text"> Elizabeth St, Melbourne<br>1202 Australia.</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-2 mt-30 d-flex ">
                            <div class="contact-info-icon">
                                <i class="lni lni-envelope"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">hello@ayroui.com</p>
                                <p class="text">support@uideck.com</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex ">
                            <div class="contact-info-icon">
                                <i class="lni lni-phone"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">+333 789-321-654</p>
                                <p class="text">+333 985-458-609</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="panel-body download_app" style="padding-top:20px;margin-top:20px;padding-bottom:20px;">
                        <h4 class="contact-title  pt-15 pb-10" style="color:#fff"><i class="lni lni-envelope"></i> Leave
                            <span>A
                                Message.</span>
                        </h4>
                        <form method="POST" action="{{ route('register') }}" id="leavMessageForm">
                            @csrf
                            <div class="row">
                                <div class="subscribe_form col-lg-12">
                                    <input type="text" placeholder="Name..." required>
                                    <button style="margin-right:15px;" class="main-btn">Send</button>
                                </div>
                                <div class="subscribe_form form-group col-lg-12">
                                    <!-- <label style="color:white">Password</label> -->
                                    <textarea rows="7" class="col-lg-12" name="massage" placeholder="Massage"
                                        required></textarea>
                                </div>
                                <div class="subscribe_form form-group col-lg-12">
                                    <!-- <label style="color:white">Email Address</label> -->
                                    <input class="form-control" placeholder="Email Address" required>
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
                        <h3 class="subscribe_title">Subscribe our newsletter</h3>
                        <p>Join thousands of users who believe this is the one app.</p>

                        <div class="subscribe_form">
                            <form action="#">
                                <input type="text" placeholder="Enter Email...">
                                <button class="main-btn">Subscribe</button>
                            </form>
                        </div> <!-- subscribe form -->
                    </div> <!-- footer subscribe -->
                    <div class="footer_social text-center mt-60">
                        <ul>
                            <li><a href="#"><span class="lni lni-facebook-filled"></span></a></li>
                            <li><a href="#"><span class="lni lni-twitter-original"></span></a></li>
                            <li><a href="#"><span class="lni lni-instagram-filled"></span></a></li>
                            <li><a href="#"><span class="lni lni-linkedin-original"></span></a></li>
                        </ul>
                    </div> <!-- footer social -->
                    <div class="footer_copyright text-center mt-55">
                        <p>Copyright &copy; 2023. Designed and Developed by <a href="https://uideck.com"
                                rel="nofollow">UIdeck</a></p>
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
    <section class="">
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
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
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


    <script>
        $(".nav .nav-link").on("click", function() {
            $(".nav").find(".active").removeClass("active");
            $(this).addClass("active");
        });
        $('#loginForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(data) {
                    $("#section_activation").css("display", "block");
                    // alert(data.message);
                },
                error: function(data) {
                    // if (data.indexOf("Verify your email")){
                    //    $("#section_activation").css("display", "block");
                    // }
                    // else if(data.indexOf("Your email address is not verified") > -1){
                    //    $("#section_activation").css("display", "block");
                    // }
                    if (data.errors) {
                        // $.each(response, function (index, value) {
                        //     console.log(response.firstname);
                        //     console.log(JSON.stringify(response));
                        //     console.log(response.GetDataResult.lastname);
                        // })
                    }
                    // indexOf("The email has already been taken") > -1){
                    //    $("#section_activation").css("display", "block");
                    // }
                    // if ((data.message) && 
                    // (data.message == "Your email address is not verified"))
                    // alert(data.message);
                }
            });
        });

    </script>
</body>

</html>
