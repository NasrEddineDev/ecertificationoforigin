<div class="container-fluid container-fluid-logo-top">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="logo-pro">
                <a href="{{ route('home') }}" class="">
                    <img class="second-logo" src="{{ URL::asset('') }}img/logo/caci.png"  style="width:50px;" alt="" /></a>
            </div>
        </div>
    </div>
</div>
<div class="header-advance-area">
    <div class="header-top-area {{$locale == 'ar' ? 'header-top-area-rtl' : ''}}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-top-wraper">
                        <div class="row float-right">
                            <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12 {{$locale == 'ar' ? 'text-right pull-right' : 'text-left'}}">
                                <div class="menu-switcher-pro">
                                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                        <i class="educate-icon educate-nav"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12 {{$locale == 'ar' ? 'text-right pull-right' : 'text-left'}}">
                                <!-- <div class="header-top-menu tabl-d-n">
                                    <ul class="nav navbar-nav mai-top-nav {{$locale == 'ar' ? 'navbar-right' : ''}}">
                                        <li class="nav-item {{$locale == 'ar' ? 'pull-right' : ''}}"><a href="#" class="nav-link">{{__('Home')}} </a></li>
                                        <li class="nav-item dropdown res-dis-nn {{$locale == 'ar' ? 'pull-right' : ''}}">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">{{__('Services')}} <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                            <div role="menu" class="dropdown-menu animated zoomIn">
                                                <a href="#" class="dropdown-item">{{__('Documentation')}}</a>
                                                <a href="#" class="dropdown-item">{{__('Expert Backend')}}</a>
                                                <a href="#" class="dropdown-item">{{__('Expert FrontEnd')}}</a>
                                                <a href="#" class="dropdown-item">{{__('Contact Support')}}</a>
                                            </div>
                                        </li>
                                        <li class="nav-item {{$locale == 'ar' ? 'pull-right' : ''}}"><a href="#" class="nav-link">{{__('Support')}}</a></li>
                                        <li class="nav-item {{$locale == 'ar' ? 'pull-right' : ''}}"><a href="#" class="nav-link">{{__('About')}}</a></li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu {{$locale == 'ar' ? 'pull-left' : ''}}">

                                        <li class="nav-item {{$locale == 'ar' ? 'pull-right' : ''}}">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <img class="flag-icon" src="{{ URL::asset('') }}img/flag/{{$locale == 'en' ? 'united-states' : ($locale == 'ar' ? 'algeria' : 'france')}}.png" alt="" />
                                                <span class="profile-text font-weight-medium d-none d-md-block"> {{$locale == 'en' ? 'English' : ($locale == 'ar' ? 'العربية' : 'Français')}} </span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                            style="{{$locale == 'ar' ? 'text-align:right' : ''}}">
                                                <li><a href="{{ route('lang1', 'ar') }}" class="nav-link">
                                                    <span class="edu-icon edu-home-admin author-log-ic">
                                                        <img class="flag-icon" src="{{ URL::asset('') }}img/flag/algeria.png" alt="" />
                                                    </span>العربية</a>
                                                </li>
                                                <li><a href="{{ route('lang1', 'en') }}" class="nav-link dropdown-toggle">
                                                    <img class="flag-icon" src="{{ URL::asset('') }}img/flag/united-states.png" alt="" />
                                                    <span class="edu-icon edu-user-rounded author-log-ic lang-image">
                                                        </span>English</a>
                                                </li>
                                                <li><a href="{{ route('lang1', 'fr') }}" class="nav-link dropdown-toggle">
                                                    <img class="flag-icon" src="{{ URL::asset('') }}img/flag/france.png" alt="" />
                                                    <span class="edu-icon edu-money author-log-ic">
                                                        </span>Français</a>
                                                </li>
                                            </ul>
                                        </li>

                                        {{-- <li class="nav-item dropdown {{$locale == 'ar' ? 'pull-right' : ''}}">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                            <div role="menu" class="author-message-top dropdown-menu animated zoomIn"
                                            style="{{$locale == 'ar' ? 'right: -380%!important;' : ''}}">
                                                <div class="message-single-top">
                                                    <h1>{{__('Messages')}}</h1>
                                                </div>
                                                <ul class="message-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="{{ URL::asset('') }}img/contact/1.jpg" alt="">
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
                                                                <img src="{{ URL::asset('') }}img/contact/4.jpg" alt="">
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
                                                                <img src="{{ URL::asset('') }}img/contact/3.jpg" alt="">
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
                                                                <img src="{{ URL::asset('') }}img/contact/2.jpg" alt="">
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
                                        </li>
                                        <li class="nav-item {{$locale == 'ar' ? 'pull-right' : ''}}"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                            <div role="menu" class="notification-author dropdown-menu animated zoomIn"
                                            style="{{$locale == 'ar' ? 'right: -350%!important;' : ''}}">
                                                <div class="notification-single-top">
                                                    <h1>{{ __('Notifications')}}</h1>
                                                </div>
                                                <ul class="notification-menu">
                                                    <li>
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
                                                    </li>
                                                </ul>
                                                <div class="notification-view">
                                                    <a href="#">View All Notification</a>
                                                </div>
                                            </div>
                                        </li> --}}
                                        <li class="nav-item {{$locale == 'ar' ? 'pull-right' : ''}}">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle profile-picture-header">
                                                <img src='{{ URL::asset("").(Auth::user()->Profile->picture ? ((Auth::user()->Role->name == "user") ? 
                                                "data/enterprises/" . Auth::user()->Enterprise->id."/"."documents/" : "data/dri/" . Auth::User()->id . "/").Auth::user()->Profile->picture 
                                                : "data/documents/pro4.jpg") }}' alt="" />
                                                <span class="admin-name d-none">{{ Auth::user()->username}}</span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                            style="{{$locale == 'ar' ? 'text-align:right' : ''}}">
                                                <li><a href="{{ route('account.edit') }}"><span class="edu-icon edu-home-admin author-log-ic"></span>{{ __('My Account')}}</a>
                                                </li>
                                                <!-- <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                </li>
                                                <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                </li> -->
                                                <li><a href="{{ route('users.settings') }}"><span class="edu-icon edu-settings author-log-ic"></span>{{ __('Settings')}}</a>
                                                </li>
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <span class="edu-icon edu-locked author-log-ic"></span>{{ __('Log Out') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                                </li>
                                            </ul>
                                        </li>
                                        {{-- <li class="nav-item nav-setting-open {{$locale == 'ar' ? 'pull-right' : ''}}t"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>

                                            <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn"
                                            style="{{$locale == 'ar' ? 'right: -900%!important;' : ''}}">
                                                <ul class="nav nav-tabs custon-set-tab">
                                                    <li class="active"><a data-toggle="tab" href="#Notes">{{ __('Notes') }}</a>
                                                    </li>
                                                    <li><a data-toggle="tab" href="#Projects">{{ __('Projects') }}</a>
                                                    </li>
                                                    <li><a data-toggle="tab" href="#Settings">{{ __('Settings') }}</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content custom-bdr-nt">
                                                    <div id="Notes" class="tab-pane fade in active">
                                                        <div class="notes-area-wrap">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-comments-o"></i> Latest Notes</h2>
                                                                <p>You have 10 new message.</p>
                                                            </div>
                                                            <div class="notes-list-area notes-menu-scrollbar">
                                                                <ul class="notes-menu-list">
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/4.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/1.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/2.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/3.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/4.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/1.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/2.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/1.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/2.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="notes-list-flow">
                                                                                <div class="notes-img">
                                                                                    <img src="{{ URL::asset('') }}img/contact/3.jpg" alt="" />
                                                                                </div>
                                                                                <div class="notes-content">
                                                                                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                    <span>Yesterday 2:45 pm</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Projects" class="tab-pane fade">
                                                        <div class="projects-settings-wrap">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-cube"></i> Latest projects</h2>
                                                                <p> You have 20 projects. 5 not completed.</p>
                                                            </div>
                                                            <div class="project-st-list-area project-st-menu-scrollbar">
                                                                <ul class="projects-st-menu-list">
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Web Development</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">1 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content">
                                                                                    <p>Completion with: 28%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-1"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Software Development</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">2 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content project-rating-cl">
                                                                                    <p>Completion with: 68%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 68%;" class="progress-bar hd-tp-2"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Graphic Design</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">3 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content">
                                                                                    <p>Completion with: 78%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 78%;" class="progress-bar hd-tp-3"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Web Design</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">4 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content project-rating-cl2">
                                                                                    <p>Completion with: 38%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 38%;" class="progress-bar progress-bar-danger hd-tp-4"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Business Card</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">5 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content">
                                                                                    <p>Completion with: 28%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-5"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Ecommerce Business</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">6 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content project-rating-cl">
                                                                                    <p>Completion with: 68%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 68%;" class="progress-bar hd-tp-6"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Woocommerce Plugin</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">7 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content">
                                                                                    <p>Completion with: 78%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 78%;" class="progress-bar"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="project-list-flow">
                                                                                <div class="projects-st-heading">
                                                                                    <h2>Wordpress Theme</h2>
                                                                                    <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                    <span class="project-st-time">9 hours ago</span>
                                                                                </div>
                                                                                <div class="projects-st-content project-rating-cl2">
                                                                                    <p>Completion with: 38%</p>
                                                                                    <div class="progress progress-mini">
                                                                                        <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                                                                    </div>
                                                                                    <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Settings" class="tab-pane fade">
                                                        <div class="setting-panel-area">
                                                            <div class="note-heading-indicate">
                                                                <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                <p> You have 20 Settings. 5 not completed.</p>
                                                            </div>
                                                            <ul class="setting-panel-list">
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Default language</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                    <label class="onoffswitch-label" for="example">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Show notifications</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                    <label class="onoffswitch-label" for="example">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Disable Chat</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                                                                    <label class="onoffswitch-label" for="example3">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Enable history</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                                                                    <label class="onoffswitch-label" for="example4">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Show charts</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                                                                    <label class="onoffswitch-label" for="example7">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Update everyday</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">
                                                                                    <label class="onoffswitch-label" for="example2">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Global search</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example6">
                                                                                    <label class="onoffswitch-label" for="example6">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2>Offline users</h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">
                                                                                    <label class="onoffswitch-label" for="example5">
                                                                                        <span class="onoffswitch-inner"></span>
                                                                                        <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> --}}
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
                            {{-- <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard v.1</a></li>
                                        <li><a href="index-1.html">Dashboard v.2</a></li>
                                        <li><a href="index-3.html">Dashboard v.3</a></li>
                                        <li><a href="analytics.html">Analytics</a></li>
                                        <li><a href="widgets.html">Widgets</a></li>
                                    </ul>
                                </li>
                                <li><a href="events.html">Event</a></li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="all-professors.html">All Professors</a>
                                        </li>
                                        <li><a href="add-professor.html">Add Professor</a>
                                        </li>
                                        <li><a href="edit-professor.html">Edit Professor</a>
                                        </li>
                                        <li><a href="professor-profile.html">Professor Profile</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="demopro" class="collapse dropdown-header-top">
                                        <li><a href="all-students.html">All Students</a>
                                        </li>
                                        <li><a href="add-student.html">Add Student</a>
                                        </li>
                                        <li><a href="edit-student.html">Edit Student</a>
                                        </li>
                                        <li><a href="student-profile.html">Student Profile</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="all-courses.html">All Courses</a>
                                        </li>
                                        <li><a href="add-course.html">Add Course</a>
                                        </li>
                                        <li><a href="edit-course.html">Edit Course</a>
                                        </li>
                                        <li><a href="course-profile.html">Courses Info</a>
                                        </li>
                                        <li><a href="course-payment.html">Courses Payment</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Library <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="library-assets.html">Library Assets</a>
                                        </li>
                                        <li><a href="add-library-assets.html">Add Library Asset</a>
                                        </li>
                                        <li><a href="edit-library-assets.html">Edit Library Asset</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Departments <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="departments.html">Departments List</a>
                                        </li>
                                        <li><a href="add-department.html">Add Departments</a>
                                        </li>
                                        <li><a href="edit-department.html">Edit Departments</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="mailbox.html">Inbox</a>
                                        </li>
                                        <li><a href="mailbox-view.html">View Mail</a>
                                        </li>
                                        <li><a href="mailbox-compose.html">Compose Mail</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                        <li><a href="google-map.html">Google Map</a>
                                        </li>
                                        <li><a href="data-maps.html">Data Maps</a>
                                        </li>
                                        <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                        </li>
                                        <li><a href="x-editable.html">X-Editable</a>
                                        </li>
                                        <li><a href="code-editor.html">Code Editor</a>
                                        </li>
                                        <li><a href="tree-view.html">Tree View</a>
                                        </li>
                                        <li><a href="preloader.html">Preloader</a>
                                        </li>
                                        <li><a href="images-cropper.html">Images Cropper</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="Chartsmob" class="collapse dropdown-header-top">
                                        <li><a href="bar-charts.html">Bar Charts</a>
                                        </li>
                                        <li><a href="line-charts.html">Line Charts</a>
                                        </li>
                                        <li><a href="area-charts.html">Area Charts</a>
                                        </li>
                                        <li><a href="rounded-chart.html">Rounded Charts</a>
                                        </li>
                                        <li><a href="c3.html">C3 Charts</a>
                                        </li>
                                        <li><a href="sparkline.html">Sparkline Charts</a>
                                        </li>
                                        <li><a href="peity.html">Peity Charts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="Tablesmob" class="collapse dropdown-header-top">
                                        <li><a href="static-table.html">Static Table</a>
                                        </li>
                                        <li><a href="data-table.html">Data Table</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="formsmob" class="collapse dropdown-header-top">
                                        <li><a href="basic-form-element.html">Basic Form Elements</a>
                                        </li>
                                        <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                        </li>
                                        <li><a href="password-meter.html">Password Meter</a>
                                        </li>
                                        <li><a href="multi-upload.html">Multi Upload</a>
                                        </li>
                                        <li><a href="tinymc.html">Text Editor</a>
                                        </li>
                                        <li><a href="dual-list-box.html">Dual List Box</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                        <li><a href="basic-form-element.html">Basic Form Elements</a>
                                        </li>
                                        <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                        </li>
                                        <li><a href="password-meter.html">Password Meter</a>
                                        </li>
                                        <li><a href="multi-upload.html">Multi Upload</a>
                                        </li>
                                        <li><a href="tinymc.html">Text Editor</a>
                                        </li>
                                        <li><a href="dual-list-box.html">Dual List Box</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="login.html">Login</a>
                                        </li>
                                        <li><a href="register.html">Register</a>
                                        </li>
                                        <li><a href="lock.html">Lock</a>
                                        </li>
                                        <li><a href="password-recovery.html">Password Recovery</a>
                                        </li>
                                        <li><a href="404.html">404 Page</a></li>
                                        <li><a href="500.html">500 Page</a></li>
                                    </ul>
                                </li>
                            </ul> --}}
                            
                    <ul class="mobile-menu-nav">
                        <li class="active">
                            <a title="Landing Page" href="{{ route('home') }}" aria-expanded="false"  style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-dashboard" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('certificates.index') }}" aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-wpforms" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Certificates') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('requests.index') }}" aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-list" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Requests') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('products.index') }}" aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-dropbox" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Products') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('importers.index') }}" aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-download" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Importers') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('producers.index') }}" aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-inbox" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Producers') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('payments.index') }}" aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-money" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Balance') }}</span>
                            </a>
                        </li>
                        @if (Auth::user()->can('list-user'))
                            <li>
                                <a title="Landing Page" href="{{ route('enterprises.index') }}"
                                    aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-building" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Enterprises') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->can('list-user'))
                            <li>
                                <a title="Landing Page" href="{{ route('managers.index') }}"
                                    aria-expanded="false" style="{{ App()->currentLocale() == 'ar' ? 'text-align:right' : '' }}">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-user" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Managers') }}</span>
                                </a>
                            </li>
                        @endif
                        {{-- @if (Auth::user()->can('list-user'))
                        <li>
                            <a title="Landing Page" href="{{ route('users.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i class="fa fa-user-circle" style="font-size:19px;"></i></span> 
                               <span class="mini-click-non">{{__('Users')}}</span>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->can('list-user'))
                        <li>
                            <a title="Landing Page" href="{{ route('roles.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i class="fa fa-check-square" style="font-size:19px;"></i></span> 
                               <span class="mini-click-non">{{__('Roles')}}</span>
                            </a>
                        </li>
                        @endif --}}
                        {{-- @if (Auth::user()->can('list-user')) --}}
                        @if (Auth::user()->Role->name != "user" && Auth::user()->Role->name != "dri_user") 
                            {{-- <li>
                            <a title="Landing Page" href="{{ route('settings.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i class="fa fa-cogs" style="font-size:19px;"></i></span> 
                               <span class="mini-click-non">{{__('Settings')}}</span>
                            </a>
                        </li> --}}
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
                        @endif
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
                                <div class="breadcome-heading" style="{{$locale == 'ar' ? 'float: left;' : ''}}">
                                    <form role="search" class="sr-input-func">
                                        <input type="text" placeholder="{{__('Search...')}}" class="search-int form-control">
                                        <a href="#" style="{{$locale == 'ar' ? 'margin-right: 90%;' : ''}}"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="#">{{__('Home')}}</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">{{__('Dashboard')}}</span>
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