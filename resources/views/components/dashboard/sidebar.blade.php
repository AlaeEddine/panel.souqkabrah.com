<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion text-center" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center rtl justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-gauge @if(Route::is('dashboard')) text-info @endif"></i>
        </div>
        <div class="sidebar-brand-text mx-3 @if(Route::is('dashboard')) text-info @endif">{{ __('لوحة التحكم') }}</div>
    </a>
    @can('view-settings')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('settings')) text-info @endif" href="{{route('settings')}}">
            <i class="fas fa-fw fa-cogs @if(Route::is('settings')) text-info @endif"></i>
            <span>{{__('إعدادات الموقع')}}</span>
        </a>
    </li>
    @endcan
    @can('view-contact')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('contact')) text-info @endif" href="{{route('contact')}}">
            <i class="fas fa-fw fa-envelope @if(Route::is('contact')) text-info @endif"></i>
            <span>{{__('رسائل إتصل بنا')}}</span>
        </a>
    </li>
    @endcan
    @can('view-roles')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('roles')) text-info @endif" href="{{route('roles')}}">
            <i class="fas fa-fw fa-user-tie @if(Route::is('roles')) text-info @endif"></i>
            <span>{{__('صلاحيات المدير')}}</span>
        </a>
    </li>
    @endcan
    @can('view-categories')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('categories')) text-info @endif" href="{{route('categories')}}">
            <i class="fas fa-fw fa-list @if(Route::is('categories')) text-info @endif"></i>
            <span>{{__('أقسام الإعلانات')}}</span>
        </a>
    </li>
    @endcan
    @can('view-cities')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('cities')) text-info @endif" href="{{route('cities')}}">
            <i class="fas fa-fw fa-globe @if(Route::is('cities')) text-info @endif"></i>
            <span>{{__('المدن')}}</span>
        </a>
    </li>
    @endcan
    @can('view-users')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('users')) text-info @endif" href="{{route('users')}}">
            <i class="fas fa-fw fa-users @if(Route::is('users')) text-info @endif"></i>
            <span>{{__('الأعضاء')}}</span>
        </a>
    </li>
    @endcan
    @can('view-private-messages')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('privatemessages')) text-info @endif" href="{{route('privatemessages')}}">
            <i class="fas fa-fw fa-comment @if(Route::is('privatemessages')) text-info @endif"></i>
            <span>{{__('الرسائل الخاصة')}}</span>
        </a>
    </li>
    @endcan
    @can('view-ratings')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('ratings')) text-info @endif" href="{{route('ratings')}}">
            <i class="fas fa-fw fa-star @if(Route::is('ratings')) text-info @endif"></i>
            <span>{{__('التقييمات')}}</span>
        </a>
    </li>
    @endcan
    @can('view-likes')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('likes')) text-info @endif" href="{{route('likes')}}">
            <i class="fas fa-fw fa-heart @if(Route::is('likes')) text-info @endif"></i>
            <span>{{__('قائمة المفضلة')}}</span>
        </a>
    </li>
    @endif
    @can('view-likers')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('likers')) text-info @endif" href="{{route('likers')}}">
            <i class="fas fa-fw fa-user-plus @if(Route::is('likers')) text-info @endif"></i>
            <span>{{__('قائمة المتابعين')}}</span>
        </a>
    </li>
    @endcan
    @can('view-categories-liked')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('categories.liked')) text-info @endif" href="{{route('categories.liked')}}">
            <i class="fas fa-fw fa-circle-check @if(Route::is('categories.liked')) text-info @endif"></i>
            <span>{{__('الأقسام المتابعة')}}</span>
        </a>
    </li>
    @endcan
    @can('view-ads')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('ads')) text-info @endif" href="{{route('ads')}}">
            <i class="fas fa-fw fa-bullhorn @if(Route::is('ads')) text-info @endif"></i>
            <span>{{__('الإعلانات')}}</span>
        </a>
    </li>
    @endcan
    @can('view-banned-ads')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('bannedads')) text-info @endif" href="{{route('bannedads')}}">
            <i class="fas fa-fw fa-bug @if(Route::is('bannedads')) text-info @endif"></i>
            <span>{{__('الإعلانات المخالفة')}}</span>
        </a>
    </li>
    @endcan
    @can('view-filter-ads')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('filterads')) text-info @endif" href="{{route('filterads')}}">
            <i class="fas fa-fw fa-filter @if(Route::is('filterads')) text-info @endif"></i>
            <span>{{__('فلترة الإعلانات')}}</span>
        </a>
    </li>
    @endcan
    @can('view-comments')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('comments')) text-info @endif" href="{{route('comments')}}">
            <i class="fas fa-fw fa-comments @if(Route::is('comments')) text-info @endif"></i>
            <span>{{__('التعليقات')}}</span>
        </a>
    </li>
    @endcan
    @can('view-banned-comments')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('bannedcomments')) text-info @endif" href="{{route('bannedcomments')}}">
            <i class="fas fa-fw fa-comments @if(Route::is('bannedcomments')) text-info @endif"></i>
            <span>{{__('التعليقات المخالفة')}}</span>
        </a>
    </li>
    @endcan
    @can('view-stores')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('stores')) text-info @endif" href="{{route('stores')}}">
            <i class="fas fa-fw fa-store @if(Route::is('stores')) text-info @endif"></i>
            <span>{{__('المتاجر')}}</span>
        </a>
    </li>
    @endcan
    @can('view-payment-gateways')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('paymentgateways')) text-info @endif" href="{{route('paymentgateways')}}">
            <i class="fab fa-fw fa-paypal @if(Route::is('paymentgateways')) text-info @endif"></i>
            <span>{{__('بوابات الدفع')}}</span>
        </a>
    </li>
    @endcan
    @can('view-money-transferts')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('moneytransferts')) text-info @endif" href="{{route('moneytransferts')}}">
            <i class="fas fa-fw fa-money-bill-transfer @if(Route::is('moneytransferts')) text-info @endif"></i>
            <span>{{__('التحويلات المالية')}}</span>
        </a>
    </li>
    @endcan
    @can('view-banks')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('banks')) text-info @endif" href="{{ route('banks') }}">
            <i class="fas fa-fw fa-bank @if(Route::is('banks')) text-info @endif"></i>
            <span>{{__('الحسابات البنكية')}}</span>
        </a>
    </li>
    @endcan
    @can('view-bank-transferts')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('banktransferts')) text-info @endif" href="{{ route('banktransferts') }}">
            <i class="fas fa-fw fa-credit-card @if(Route::is('banktransferts')) text-info @endif"></i>
            <span>{{__('التحويلات البنكية')}}</span>
        </a>
    </li>
    @endcan
    @can('view-blacklist')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('blacklist')) text-info @endif" href="{{ route('blacklist') }}">
            <i class="fas fa-fw fa-warning  @if(Route::is('blacklist')) text-info @endif"></i>
            <span>{{__('القائمة السوداء')}}</span>
        </a>
    </li>
    @endcan
    @can('view-banners')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('banners')) text-info @endif" href="{{ route('banners') }}">
            <i class="fas fa-fw fa-tv @if(Route::is('banners')) text-info @endif"></i>
            <span>{{__('إعلانات البنارات')}}</span>
        </a>
    </li>
    @endcan
    @can('view-google-ads')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('googleads')) text-info @endif" href="{{ route('googleads') }}">
            <i class="fab fa-fw fa-google @if(Route::is('googleads')) text-info @endif"></i>
            <span>{{__('إعلانات جوجل')}}</span>
        </a>
    </li>
    @endcan
    @can('view-pages')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('pages')) text-info @endif" href="{{ route('pages') }}">
            <i class="fas fa-fw fa-file-lines @if(Route::is('pages')) text-info @endif"></i>
            <span>{{__('الصفحات')}}</span>
        </a>
    </li>
    @endcan
    @can('view-mobile-data')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('mobiledata')) text-info @endif" href="{{ route('mobiledata') }}">
            <i class="fas fa-fw fa-cubes @if(Route::is('mobiledata')) text-info @endif"></i>
            <span>{{__('باقات رسائل الجوال')}}</span>
        </a>
    </li>
    @endcan
    @can('view-sms-groups')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('smsgroups')) text-info @endif" href="{{ route('smsgroups') }}">
            <i class="fas fa-fw fa-cubes @if(Route::is('smsgroups')) text-info @endif"></i>
            <span>{{__('مجموعات رسائل الجوال')}}</span>
        </a>
    </li>
    @endcan
    @can('view-sms')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('sms')) text-info @endif" href="{{ route('sms') }}">
            <i class="fas fa-fw fa-mobile @if(Route::is('sms')) text-info @endif"></i>
            <span>{{__('رسائل الجوال')}}</span>
        </a>
    </li>
    @endcan
    @can('view-contact-users')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('contactusers')) text-info @endif" href="{{ route('contactusers') }}">
            <i class="fas fa-fw fa-comment @if(Route::is('contactusers')) text-info @endif"></i>
            <span>{{__('مراسلة الأعضاء')}}</span>
        </a>
    </li>
    @endcan
    @can('view-plans')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('plans')) text-info @endif" href="{{ route('plans') }}">
            <i class="fas fa-fw fa-cubes @if(Route::is('plans')) text-info @endif"></i>
            <span>{{__('باقات العضوية')}}</span>
        </a>
    </li>
    @endcan
    @can('view-social-media')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('socialmedia')) text-info @endif" href="{{ route('socialmedia') }}">
            <i class="fab fa-fw fa-facebook @if(Route::is('socialmedia')) text-info @endif"></i>
            <span>{{__('مواقع التواصل')}}</span>
        </a>
    </li>
    @endcan
    @can('view-html')
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('html')) text-info @endif" href="{{ route('html') }}">
            <i class="fas fa-fw fa-code @if(Route::is('html')) text-info @endif"></i>
            <span>{{__('كود الهيدر و الفوتر')}}</span>
        </a>
    </li>
    @endcan
    <hr class="sidebar-divider m-0">
    <li class="nav-item rtl">
        <a class="nav-link rtl @if(Route::is('logout')) text-info @endif" href="{{ route('logout') }}">
            <i class="fas fa-fw fa-door-open @if(Route::is('logout')) text-info @endif"></i>
            <span>{{__('الخروج')}}</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
