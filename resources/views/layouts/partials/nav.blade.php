    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{ route('home') }}"><img class="main-logo"
                        src="{{ URL::asset('') }}img/logo/caci-logo.png" alt="" /></a>
                <strong><a href="{{ route('home') }}"><img src="{{ URL::asset('') }}img/logo/caci-logosn.png"
                            alt="" /></a></strong>
            </div>
            <br />
            <br />
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a title="Landing Page" href="{{ route('home') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-dashboard" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('certificates.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-wpforms" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Certificates') }}</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a title="Landing Page" href="{{ route('requests.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-list" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Requests') }}</span>
                            </a>
                        </li> --}}
                        <li>
                            <a title="Landing Page" href="{{ route('products.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-dropbox" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Products') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('importers.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-download" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Importers') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('producers.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-inbox" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Producers') }}</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="{{ route('payments.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-money" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Balance') }}</span>
                            </a>
                        </li>
                        @if (Auth::user()->can('list-user'))
                            <li>
                                <a title="Landing Page" href="{{ route('enterprises.index') }}"
                                    aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-building" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Enterprises') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->can('list-user'))
                            <li>
                                <a title="Landing Page" href="{{ route('managers.index') }}"
                                    aria-expanded="false">
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
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-cogs" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Settings') }}</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="false">
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
                                                    class="fa fa-lock" style="font-size:19px;"></i></span>
                                            <span class="mini-click-non">{{ __('Categories') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Landing Page" href="{{ route('subcategories.index') }}"
                                            aria-expanded="false">
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
        </nav>
    </div>