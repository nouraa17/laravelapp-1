<!doctype html>
<html class="no-js" lang="zxx">
@include('includes.head')

<body>
    @include('includes.preloader')
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
    @include('includes.map')
    @include('includes.footerJs')
</body>

</html>