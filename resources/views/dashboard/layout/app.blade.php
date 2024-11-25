<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/logo/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('dba/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dba/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dba/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dba/assets/css/demo.css') }}" />

    <!-- Vendors & Page CSS -->
    @yield('vendor.css')

    <!-- Page CSS -->
    @yield('page.css')
    <style>
        .navbar {
            flex-wrap: nowrap;
        }

        .swal2-container {
            z-index: 20000 !important;
        }
    </style>

    <!-- Helpers -->
    <script src="{{ asset('dba/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dba/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.layout.aside')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('dashboard.layout.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('dashboard.layout.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- <div class="buy-now">
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank"
      class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
  </div> -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('dba/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dba/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dba/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dba/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('dba/assets/vendor/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('dba/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    @yield('vendor.script')

    <!-- Main JS -->
    <script src="{{ asset('dba/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script>
        const sa2confirm = ({ title, html = '', confirmButtonText, cancelButtonText }, doIt) => {
            Swal.fire({
                title,
                html,
                showCancelButton: true,
                confirmButtonText,
                cancelButtonText,
            }).then((result) => {
                if (result.isConfirmed) {
                    doIt();
                }
            });
        }
    </script>
    @yield('page.script')
    <script>
        $(document).ready(function () {
            var currentPath = window.location.pathname;

            $('.menu-link').each(function () {
                var linkURL = $(this).attr('href');

                var linkPath = (linkURL.startsWith('http://') || linkURL.startsWith('https://')) ? new URL(linkURL).pathname : linkURL;

                if (currentPath === linkPath) {
                    $(this).closest('.menu-item').addClass('active');
                    var parentDropdown = $(this).closest('.menu-sub').closest('.menu-item');
                    if (parentDropdown.length) {
                        parentDropdown.addClass('active open');
                    }
                }
            });
        });
    </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>