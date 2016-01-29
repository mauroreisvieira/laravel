<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="not-ie" lang="en" ng-app="appExame">

<head>
 @include('layout.head')
</head>
<body>
    @if (Route::currentRouteName()!="login")
    <header class="header">
        @include('layout.header')
    </header>
    @endif
    @yield('content')
    @include('layout.footer')
</body>
</html>

