<div class="container-fluid container-fluid-logo-top">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="logo-pro">
                <a href="{{ route('home') }}" class="___class_+?4___">
                    <img class="second-logo" src="{{ URL::asset('') }}img/logo/caci.png" style="width:50px;"
                        alt="" /></a>
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
                        <div class="float-right">
                            <div
                                class="col-lg-1 col-md-0 col-sm-1 col-xs-12 {{ $locale == 'ar' ? 'text-right pull-right' : 'text-left' }}">
                                <div class="menu-switcher-pro">
                                    <button type="button" id="sidebarCollapse"
                                        class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                        <i class="educate-icon educate-nav"></i>
                                    </button>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 col-md-7 col-sm-6 col-xs-4 {{ $locale == 'ar' ? 'text-right pull-right' : 'text-left' }} header-right-info">
                                <ul
                                    class="nav navbar-nav mai-top-nav header-right-menu {{ $locale == 'ar' ? 'pull-right' : 'pull-left' }}">

                                    @if (Auth::user()->Role->name != 'user' && Auth::user()->Role->name != 'dri_user')
                                        <li class="nav-item {{ $locale == 'ar' ? 'pull-right' : 'pull-left' }}">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                class="nav-link dropdown-toggle profile-picture-header">
                                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                        class="fa fa-cogs" style="font-size:19px;"></i></span>
                                                <span class="mini-click-non">{{ __('Settings') }}</span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu"
                                                class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                                style="{{ $locale == 'ar' ? 'text-align:right' : '' }}">
                                                <li>
                                                    <a title="Landing Page" href="{{ route('settings.index') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-cog" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('General Settings') }}</span></a>
                                                </li>
                                                <li>
                                                    <a title="Landing Page" href="{{ route('settings.images') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-cog" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('Images') }}</span></a>
                                                </li>
                                                <li>
                                                    <a title="Landing Page" href="{{ route('users.index') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-user-circle" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('Users') }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="Landing Page" href="{{ route('roles.index') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-check-square" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('Roles') }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="Landing Page" href="{{ route('permissions.index') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-lock" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('Permissions') }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="Landing Page" href="{{ route('categories.index') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-list-alt" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('Categories') }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="Landing Page" href="{{ route('subcategories.index') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-braille fa-rotate-90" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('Subcategories') }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                    
                                    @if (Auth::user()->Role->name != 'user' && Auth::user()->Role->name != 'dri_user')
                                        <li class="nav-item {{ $locale == 'ar' ? 'pull-right' : 'pull-left' }}">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                class="nav-link dropdown-toggle profile-picture-header">
                                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-history" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Logger') }}</span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu"
                                                class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                                style="{{ $locale == 'ar' ? 'text-align:right' : '' }}">
                                                <li>
                                                    <a title="Landing Page" href="{{ route('logger.settings') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-cog" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('Settings') }}</span></a>
                                                </li>
                                                <li>
                                                    <a title="Landing Page" href="{{ route('logger.users-activities') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-group" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('Users Activities') }}</span></a>
                                                </li>
                                                <li>
                                                    <a title="Landing Page" href="{{ route('logger.system-log') }}"
                                                        aria-expanded="false">
                                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                class="fa fa-file-text" style="font-size:19px;"></i></span>
                                                        <span class="mini-click-non">{{ __('System Log') }}</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-8">
                                <div class="header-right-info">
                                    <ul
                                        class="nav navbar-nav mai-top-nav header-right-menu {{ $locale == 'ar' ? 'pull-left' : '' }}">
                                        {{-- <li class="nav-item dropdown">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                            <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                <div class="message-single-top">
                                                    <h1>Message</h1>
                                                </div>
                                                <ul class="message-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="img/contact/1.jpg" alt="">
                                                            </div>
                                                            <div class="message-content">
                                                                <span class="message-date">16 Sept</span>
                                                                <h2>Advanda Cro</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="img/contact/4.jpg" alt="">
                                                            </div>
                                                            <div class="message-content">
                                                                <span class="message-date">16 Sept</span>
                                                                <h2>Sulaiman din</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="img/contact/3.jpg" alt="">
                                                            </div>
                                                            <div class="message-content">
                                                                <span class="message-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="img/contact/2.jpg" alt="">
                                                            </div>
                                                            <div class="message-content">
                                                                <span class="message-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="message-view">
                                                    <a href="#">View All Messages</a>
                                                </div>
                                            </div>
                                        </li> --}}
                                        <li class="nav-item {{ $locale == 'ar' ? 'pull-right' : 'pull-left' }}">
                                            <a href="#" data-toggle="dropdown" role="button" id="markAsReadNotifications" aria-expanded="false" 
                                                class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i>
                                            <span class="indicator-nt">{{Auth::Check() ? Auth::user()->unreadNotifications->count() : ''}}</span>
                                            </a>
                                            <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                <div class="notification-single-top">
                                                    <h1>{{__('Notifications')}}</h1>
                                                </div>
                                                <ul class="notification-menu">
                                                    @if (Auth::Check())
                                                    @foreach (Auth::user()->notifications as $notification)
                                                    <li>
                                                        <a href="{{ route('certificates.index')}}">
                                                            <div class="notification-icon">
                                                                @if($notification->type == "App\\Notifications\\CertificatePendingNotification")
                                                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                    class="fa fa-wpforms" style="font-size:19px;"></i></span>
                                                                @elseif($notification->type == "App\\Notifications\\NewRegistration")
                                                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                                        class="fa fa-building" style="font-size:19px;"></i></span>
                                                                @else
                                                                <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                @endif
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">{{date('d-M', strtotime($notification->created_at))}}</span>
                                                                <h2>{{__($notification->type)}}</h2>
                                                                <p>{{App()->currentLocale() == 'ar' ? ($notification->data["enterprise_name_ar"] ?? '') 
                                                                    : (App()->currentLocale() == 'en' ? ($notification->data["enterprise_name"] ?? '')
                                                                    : ($notification->data["enterprise_name_fr"] ?? ''))}}</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    {{-- <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Advanda Cro</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Sulaiman din</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li> --}}
                                                </ul>
                                                <div class="notification-view">
                                                    <a>{{__('All Your Notifications')}}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item {{ $locale == 'ar' ? 'pull-right' : '' }}">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <img class="flag-icon"
                                                    src="{{ URL::asset('') }}img/flag/{{ $locale == 'en' ? 'united-states' : ($locale == 'ar' ? 'algeria' : 'france') }}.png"
                                                    alt="" />
                                                <span class="profile-text font-weight-medium d-none d-md-block">
                                                    {{ $locale == 'en' ? 'English' : ($locale == 'ar' ? 'العربية' : 'Français') }}
                                                </span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu"
                                                class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                                style="{{ $locale == 'ar' ? 'text-align:right' : '' }}">
                                                <li><a href="{{ route('lang1', 'ar') }}" class="nav-link">
                                                        <span class="edu-icon edu-home-admin author-log-ic">
                                                            <img class="flag-icon"
                                                                src="{{ URL::asset('') }}img/flag/algeria.png"
                                                                alt="" />
                                                        </span>العربية</a>
                                                </li>
                                                <li><a href="{{ route('lang1', 'en') }}"
                                                        class="nav-link dropdown-toggle">
                                                        <img class="flag-icon"
                                                            src="{{ URL::asset('') }}img/flag/united-states.png"
                                                            alt="" />
                                                        <span
                                                            class="edu-icon edu-user-rounded author-log-ic lang-image">
                                                        </span>English</a>
                                                </li>
                                                <li><a href="{{ route('lang1', 'fr') }}"
                                                        class="nav-link dropdown-toggle">
                                                        <img class="flag-icon"
                                                            src="{{ URL::asset('') }}img/flag/france.png" alt="" />
                                                        <span class="edu-icon edu-money author-log-ic">
                                                        </span>Français</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item {{ $locale == 'ar' ? 'pull-right' : '' }}">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                class="nav-link dropdown-toggle profile-picture-header">
                                                <img src='{{ URL::asset('') . (Auth::user()->Profile->picture ? (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . Auth::user()->Profile->picture : 'data/documents/pro4.jpg') }}'
                                                    alt="" />
                                                <span class="admin-name d-none">{{ Auth::user()->username }}</span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu"
                                                class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                                style="{{ $locale == 'ar' ? 'text-align:right' : '' }}">
                                                <li><a href="{{ route('account.edit') }}"><span
                                                            class="edu-icon edu-home-admin author-log-ic"></span>{{ __('My Account') }}</a>
                                                </li>
                                                <li><a href="{{ route('users.settings') }}"><span
                                                            class="edu-icon edu-settings author-log-ic"></span>{{ __('Settings') }}</a>
                                                </li>
                                                <li><a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        <span
                                                            class="edu-icon edu-locked author-log-ic"></span>{{ __('Log Out') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
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
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                @can('view', App\Models\Dashboard::class)
                                <li class="active">
                                    <a title="Landing Page" href="{{ route('home') }}" aria-expanded="false"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                class="fa fa-dashboard" style="font-size:19px;"></i></span>
                                        <span class="mini-click-non">{{ __('Dashboard') }}</span>
                                    </a>
                                </li>
                                @endcan
                                @can('view-list', App\Models\Certificate::class)
                                <li>
                                    <a title="Landing Page" href="{{ route('certificates.index') }}"
                                        aria-expanded="false"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                class="fa fa-wpforms" style="font-size:19px;"></i></span>
                                        <span class="mini-click-non">{{ __('Certificates') }}</span>
                                    </a>
                                </li>
                                @endcan
                                @can('view-list', App\Models\Product::class)
                                <li>
                                    <a title="Landing Page" href="{{ route('products.index') }}"
                                        aria-expanded="false"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                class="fa fa-dropbox" style="font-size:19px;"></i></span>
                                        <span class="mini-click-non">{{ __('Products') }}</span>
                                    </a>
                                </li>
                                @endcan
                                @can('view-list', App\Models\Importer::class)
                                <li>
                                    <a title="Landing Page" href="{{ route('importers.index') }}"
                                        aria-expanded="false"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                class="fa fa-download" style="font-size:19px;"></i></span>
                                        <span class="mini-click-non">{{ __('Importers') }}</span>
                                    </a>
                                </li>
                                @endcan
                                @can('view-list', App\Models\Producer::class)
                                <li>
                                    <a title="Landing Page" href="{{ route('producers.index') }}"
                                        aria-expanded="false"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                class="fa fa-inbox" style="font-size:19px;"></i></span>
                                        <span class="mini-click-non">{{ __('Producers') }}</span>
                                    </a>
                                </li>
                                @endcan
                                @can('view-list', App\Models\Payment::class)
                                <li>
                                    <a title="Landing Page" href="{{ route('payments.index') }}"
                                        aria-expanded="false"
                                        style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                        <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                class="fa fa-money" style="font-size:19px;"></i></span>
                                        <span class="mini-click-non">{{ __('Balance') }}</span>
                                    </a>
                                </li>
                                @endcan
                                @can('view-list', App\Models\Enterprise::class)
                                    <li>
                                        <a title="Landing Page" href="{{ route('enterprises.index') }}"
                                            aria-expanded="false"
                                            style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-building" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Enterprises') }}</span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('view-list', App\Models\Manager::class)
                                    <li>
                                        <a title="Landing Page" href="{{ route('managers.index') }}"
                                            aria-expanded="false"
                                            style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-user" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Managers') }}</span>
                                        </a>
                                    </li>
                                    @endcan
                                {{-- @if (Auth::user()->Role->name != 'user' && Auth::user()->Role->name != 'dri_user') 
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-cogs" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Settings') }}</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li>
                                        <a title="Landing Page" href="{{ route('settings.index') }}"
                                            aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-cog" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('General Settings') }}</span></a>
                                    </li>
                                    <li>
                                        <a title="Landing Page" href="{{ route('settings.images') }}"
                                            aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-cog" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Images') }}</span></a>
                                    </li>
                                    <li>
                                        <a title="Landing Page" href="{{ route('users.index') }}"
                                            aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-user-circle" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Users') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Landing Page" href="{{ route('roles.index') }}"
                                            aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-check-square" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Roles') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Landing Page" href="{{ route('permissions.index') }}"
                                            aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-lock" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Permissions') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Landing Page" href="{{ route('categories.index') }}"
                                            aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-lock" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Categories') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Landing Page" href="{{ route('subcategories.index') }}"
                                            aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                            <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                                    class="fa fa-lock" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Subcategories') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading" style="{{ $locale == 'ar' ? 'float: left;' : '' }}">
                                    <form role="search" class="sr-input-func">
                                        <input type="text" placeholder="{{ __('Search...') }}"
                                            class="search-int form-control">
                                        <a href="#" style="{{ $locale == 'ar' ? 'margin-right: 90%;' : '' }}"><i
                                                class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="#">{{ __('Home') }}</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">{{ __(ucfirst(explode('.', \Request::route()->getName())[0])) }}</span>
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
