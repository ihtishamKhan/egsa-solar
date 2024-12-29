<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | EGS SOLAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    @include('layouts.head-css')

    {{-- css for required label --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <style>
        .required:after {
            content: " *";
            color: red;
        }

        .logo-text {
            font-size: 30px;
            font-weight: 600;
            color: #fff;
            margin-left: 10px;
            /* rounded bold font family from google fonts */
            font-family: 'Righteous', cursive;
            line-height: 2;
        }

        .logo-text .blue {
            color: #1a5ebd;
        }

        .logo-text .black {
            color: #000000;
        }

        .logo-text .red {
            color: #982a1d;
        }

        .logo {
            line-height: 35px;
        }

        .subtitle {
            line-height: 0;
        }
    </style>
</head>

@section('body')

    <body data-sidebar="dark">
    @show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                @include('layouts.alerts.messages')
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.right-sidebar')
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')
</body>

</html>
