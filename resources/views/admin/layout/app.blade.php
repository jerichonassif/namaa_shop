<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('admin.layout.head')
</head>

<body>
<div class="wrapper">
    @include('admin.layout.sidebar')

    <div class="main">
        @include('admin.layout.navbar')
        @yield('content')
        @include('admin.layout.footer')
    </div>
</div>

<!-- Start Script -->
@include('admin.layout.script')
<!-- End Script -->
</body>

</html>
