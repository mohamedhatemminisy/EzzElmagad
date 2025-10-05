<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">

        <!-- Header Left: Logo + Menu Toggle -->
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">

                <!-- Mobile Menu Toggle -->
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>

                <!-- Logo and Site Name -->
                <li class="nav-item d-flex align-items-center">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset($settings->site_logo) }}" alt="Logo" class="brand-logo mr-1"
                            style="height: 40px;">
                        <span class="brand-text text-white font-weight-bold ml-1" style="font-size: 18px;">
                            {{ $settings->name }}
                        </span>
                    </a>
                </li>

                <!-- Mobile Collapse Button -->
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                        <i class="la la-ellipsis-v"></i>
                    </a>
                </li>

            </ul>
        </div>

        <!-- Header Right: Actions -->
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">

                <!-- Left Actions -->
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="#" title="ملء الشاشة">
                            <i class="ficon ft-maximize"></i>
                        </a>
                    </li>
                </ul>

                <!-- Right Actions -->
                <ul class="nav navbar-nav float-right">

                    <!-- User Dropdown -->
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1 text-white">
                                {{ trans('admin.welcome') }},
                                <span class="user-name font-weight-bold">{{ auth()->user()->name }}</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <!-- Edit Profile -->
                            <a class="dropdown-item" href="{{ route('edit.profile') }}">
                                <i class="ft-user"></i> {{ trans('admin.edit_profile') }}
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- Logout -->
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i class="ft-power"></i> {{ trans('admin.logout') }}
                            </a>
                        </div>
                    </li>

                    <!-- Language Dropdown (Optional) -->
                    {{--
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1 text-white">
                                <span class="user-name font-weight-bold">{{ App::getLocale() }}</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                            @if (!$loop->last)
                            <div class="dropdown-divider"></div>
                            @endif
                            @endforeach
                        </div>
                    </li>
                    --}}

                </ul>
            </div>
        </div>
    </div>
</nav>