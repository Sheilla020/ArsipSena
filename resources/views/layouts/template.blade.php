<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DMS SENA</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('sky/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('sky/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('sky/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    @yield('Plugin')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('sky/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('sky/images/logo-sena.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                @yield('main')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-center d-block d-sm-inline-block">Dokumen Management system v.1.0.1 © 2021. <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('sky/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @yield('script')
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('sky/js/off-canvas.js') }}"></script>
    <script src="{{ asset('sky/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('sky/js/template.js') }}"></script>
    <script src="{{ asset('sky/js/settings.js') }}"></script>
    <script src="{{ asset('sky/js/todolist.js') }}"></script>
    <!-- endinject --
</body>

</html>