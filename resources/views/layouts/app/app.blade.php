<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('partials._head')
</head>
<body>
    @include('partials._header')

    @yield('content')

    @include('partials._footer')

    <!--back to top-->
    <a href="#" class="scrollToTop"><i class="ion-android-arrow-up"></i></a>
    <!--back to top end-->
</body>
</html>