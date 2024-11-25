<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Buitenzorg Ourdoor">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Buitenzorg Outdoor - @yield('title')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/logo/logo.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('dba/assets/vendor/fonts/boxicons.css') }}" />

    <!-- BASE CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    @yield('css')
    <style>
        .modal-backdrop {
            z-index: 9999;
        }
    </style>
</head>

<body>

    <div id="page">

        @include('guest.layout.header')

        <main>
            @yield('content')
        </main>

        @include('guest.layout.footer')
    </div>

    @yield('outside-main', '')

    <div id="toTop"></div><!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('assets/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- SPECIFIC SCRIPTS -->
    @yield('script')

    <script>
        function updateCartCount() {
            let cart = localStorage.getItem('cart');
            let uniqueProductCount = 0;

            if (cart) {
                cart = JSON.parse(cart);
                uniqueProductCount = cart.length;
            }

            $('#count_cart').text(uniqueProductCount);

            if (uniqueProductCount > 0) {
                $('#count_cart').css('display', 'inline');
            } else {
                $('#count_cart').css('display', 'none');
            }
        }

        $(document).ready(function() {
            updateCartCount();
        });
    </script>

    <script>
        (function(){
            $(document).ready(function() {
                const catalogueURL = `{{ route('catalogue.index') }}`;

                function searchCatalogue() {
                    const query = $('.custom-search-input input').val().trim();
                    if (query) {
                        window.location.href = `${catalogueURL}?src=${encodeURIComponent(query)}`;
                    }
                }

                $('.custom-search-input input').on('keypress', function(e) {
                    if (e.which === 13) {
                        searchCatalogue();
                    }
                });

                $('.custom-search-input button').on('click', function() {
                    searchCatalogue();
                });
            });
        })();
    </script>
</body>

</html>