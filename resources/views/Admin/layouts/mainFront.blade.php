@include('Admin.layouts.headerFront')
@include('Admin.layouts.sidebarFront')

@yield('content')


@include('Admin.layouts.footer')
@stack('scripts')
