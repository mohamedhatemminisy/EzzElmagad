<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                        @can('admin.dashboard')
                        <li class=" nav-item"><a href="{{route('admin.dashboard')}}"><i class="la la-arrows-h"></i><span
                                                class="menu-title"
                                                data-i18n="nav.horz_nav.main">{{trans('admin.home')}}</span></a>
                        </li>
                        @endcan

                        <li class=" nav-item"><a href="#"><i class="la la-arrows-h"></i><span class="menu-title"
                                                data-i18n="nav.horz_nav.main">المدراء</span></a>
                                <ul class="menu-content">
                                        <li><a class="menu-item" href="{{route('admin.create')}}"
                                                        data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                                                        اضافه مدير</a>
                                        </li>
                                        <li><a class="menu-item" href="{{route('admin.index')}}"
                                                        data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                                                        عرض المدراء</a>

                                        </li>
                                </ul>
                        </li>

                        <li class=" nav-item"><a href="#"><i class="la la-arrows-h"></i><span class="menu-title"
                                                data-i18n="nav.horz_nav.main">بنود العقد</span></a>
                                <ul class="menu-content">
                                        <li><a class="menu-item" href="{{route('contract_terms.create')}}"
                                                        data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                                                        اضافه بند</a>
                                        </li>
                                        <li><a class="menu-item" href="{{route('contract_terms.index')}}"
                                                        data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                                                        عرض بنود العقد</a>

                                        </li>
                                </ul>
                        </li>

                        <li>
                                <a class="menu-item" href="{{ route('users') }}">
                                        <i class="la la-users"></i>
                                        <span class="menu-title">عرض المستخدمين</span>
                                </a>
                        </li>



                        <li>
                                <a class="menu-item" href="{{ route('settings.index') }}">
                                        <i class="la la-cogs"></i>
                                        <span class="menu-title">إعدادات الموقع</span>
                                </a>
                        </li>

                </ul>
        </div>
</div>