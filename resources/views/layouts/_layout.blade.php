<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hikirion</title>
    <meta name="description" content="" />

    @include('layouts.layouts..styles')

</head>
<body>

<div id="wrapper">
    @include('layouts.layouts.header')

    @yield('content')

    @include('layouts.layouts.footer')
</div>

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
@include('layouts.layouts..scripts')

</body>
</html>