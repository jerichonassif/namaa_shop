<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('customer.layout.head')
</head>

<body>
<!-- Start Top Nav -->
@include('customer.layout.topNav')
<!-- Close Top Nav -->

<!-- Header -->
@include('customer.layout.header')
<!-- Close Header -->

@yield('content')

<!-- Start Footer -->
@include('customer.layout.footer')
<!-- End Footer -->

<!-- Start Script -->
@include('customer.layout.script')
<!-- End Script -->
</body>

</html>
