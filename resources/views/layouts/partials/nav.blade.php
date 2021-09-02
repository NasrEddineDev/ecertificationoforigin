    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="___class_+?2___">
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
                        @can('view', App\Models\Dashboard::class)
                            <li
                                class="{{ preg_replace("/\.[^.]+$/", '', Route::currentRouteName()) == 'dashboard' ? 'active' : '' }}">
                                <a title="Landing Page" href="{{ route('home') }}" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-dashboard" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Dashboard') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('view-list', App\Models\Certificate::class)
                            <li
                                class="{{ preg_replace("/\.[^.]+$/", '', Route::currentRouteName()) == 'certificates' ? 'active' : '' }}">
                                <a title="Landing Page" href="{{ route('certificates.index') }}" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-wpforms" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Certificates') }}</span>
                                </a>
                            </li>
                        @endcan
                        {{-- <li>
                            <a title="Landing Page" href="{{ route('requests.index') }}" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-list" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Requests') }}</span>
                            </a>
                        </li> --}}
                        @can('view-list', App\Models\Product::class)
                            <li
                                class='{{ preg_replace("/\.[^.]+$/", '', Route::currentRouteName()) == 'products' ? 'active' : '' }}'>
                                <a title="Landing Page" href="{{ route('products.index') }}" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-dropbox" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Products') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('view-list', App\Models\Importer::class)
                            <li
                                class="{{ preg_replace("/\.[^.]+$/", '', Route::currentRouteName()) == 'importers' ? 'active' : '' }}">
                                <a title="Landing Page" href="{{ route('importers.index') }}" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-download" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Importers') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('view-list', App\Models\Producer::class)
                            <li
                                class="{{ preg_replace("/\.[^.]+$/", '', Route::currentRouteName()) == 'producers' ? 'active' : '' }}">
                                <a title="Landing Page" href="{{ route('producers.index') }}" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-inbox" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Producers') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('view-list', App\Models\Payment::class)
                            <li
                                class="{{ preg_replace("/\.[^.]+$/", '', Route::currentRouteName()) == 'payments' ? 'active' : '' }}">
                                <a title="Landing Page" href="{{ route('payments.index') }}" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-money" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Balance') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('view-list', App\Models\Enterprise::class)
                            <li
                                class="{{ preg_replace("/\.[^.]+$/", '', Route::currentRouteName()) == 'enterprises' ? 'active' : '' }}">
                                <a title="Landing Page" href="{{ route('enterprises.index') }}" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-building" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Enterprises') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('view-list', App\Models\Manager::class)
                            <li
                                class="{{ preg_replace("/\.[^.]+$/", '', Route::currentRouteName()) == 'managers' ? 'active' : '' }}">
                                <a title="Landing Page" href="{{ route('managers.index') }}" aria-expanded="false">
                                    <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                            class="fa fa-user" style="font-size:19px;"></i></span>
                                    <span class="mini-click-non">{{ __('Managers') }}</span>
                                </a>
                            </li>
                        @endcan
                        {{-- @if (Auth::user()->Role->name != 'user' && Auth::user()->Role->name != 'dri_user') 
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i
                                        class="fa fa-history" style="font-size:19px;"></i></span>
                                <span class="mini-click-non">{{ __('Logger') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
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
                        @endif --}}
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
