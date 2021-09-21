<!DOCTYPE html>

@php $locale = App()->currentLocale(); @endphp

<html lang="{{ $locale == 'en' ? 'English' : ($locale == 'ar' ? 'العربية' : 'Français') }}"
    dir="{{ $locale == 'ar' ? 'rtl' : 'ltr' }}">


<head>

    @include('layouts.partials.head')

    @stack('css')
    <style>
        .all-content-wrapper-rtl {
            margin-right: 0px;
            margin-left: 0px;
        }

        .header-top-area-rtl {
            right: 0px;
            left: 0px;
        }

        #object {
            margin-top: 56px !important;
        }

        @media (min-width: 993px) {
            #pdfViewer {
                display: block;
            }

            #pdfDownloader {
                display: none;
            }
        }

        @media (max-width: 992px) {
            #pdfViewer {
                display: none;
            }

            #pdfDownloader {
                display: block;
                margin-top: 56px !important;
                text-align: center;
            }
        .logo-pro{
            margin-top: -40px;
        }
        }


    </style>
</head>

<body>

    {{-- @include('layouts.partials.nav') --}}

    <!-- Start Welcome area -->
    <div class="all-content-wrapper {{ $locale == 'ar' ? 'all-content-wrapper-rtl' : '' }}">
        <div class="container-fluid container-fluid-logo-top">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{ route('home') }}" class="">
                            <img class="second-logo" src="{{ URL::asset('') }}img/logo/caci.png"
                                style="position: absolute;width:50px;z-index:9999" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area {{ $locale == 'ar' ? 'header-top-area-rtl' : '' }}">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row float-right">
                                    <div
                                        class="col-lg-1 col-md-0 col-sm-1 col-xs-12 {{ $locale == 'ar' ? 'text-right pull-right' : 'text-left' }}">
                                        <div class="menu-switcher-pro">
                                            {{-- <button type="button" id="sidebarCollapse"
                                                class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button> --}}
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-6 col-md-7 col-sm-6 col-xs-12 {{ $locale == 'ar' ? 'text-right pull-right' : 'text-left' }}">
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul
                                                class="nav navbar-nav mai-top-nav header-right-menu {{ $locale == 'ar' ? 'pull-left' : '' }}">

                                                <li class="nav-item {{ $locale == 'ar' ? 'pull-right' : '' }}">
                                                    <a href="{{ route('home') }}" role="button" class="nav-link">
                                                        <i class="fa fa-home"></i>
                                                        <span class="profile-text font-weight-medium d-none d-md-block">
                                                            {{ __('Home') }}
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="pdfViewer">
            <object style="width:100%;" id="object" data="{{ $url }}" type="application/pdf">
                {{-- <embed id="embed" src="{{$url}}" type="application/pdf" /> --}}

            </object>
        </div>
        <div id="pdfDownloader">
            <p>{{__("Your web browser doesn't have a PDF plugin.")}}<br /> 
                {{__("Instead you can")}} 
                <a href="{{ $url }}">
                {{__("click here to download the PDF file.")}}</a></p>
        </div>
        @include('layouts.partials.footer')
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
                <!-- [ldio] generated by https://loading.io/ -->
            </svg>
            <span class="sr-only">{{ __('Loading...') }}</span>
        </div>
    </div>

    @include('layouts.partials.footer-scripts')

    @stack('js')

    <script type="text/javascript">
        var object = document.getElementById("object");
        object.height = $(document).height() * 8.7 / 10;

    </script>
</body>

</html>
