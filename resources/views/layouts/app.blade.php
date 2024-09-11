<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>@yield('title') - App</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        @stack('style')

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/logo.jpeg') }}" type="image/x-icon">

        <!-- Start GA -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-94034622-3');
        </script>
        <!-- END GA -->
    </head>
    </head>

    <body class="sidebar-mini">
        @include('sweetalert::alert')
        <div id="app ">
            <div class="main-wrapper">
                <!-- Header -->
                @include('components.header')

                <!-- Sidebar -->
                @include('components.sidebar')

                <!-- Content -->
                @yield('main')

                <!-- Footer -->
                @include('components.footer')
            </div>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
        <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
        <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('js/stisla.js') }}"></script>

        @stack('scripts')

        <!-- Template JS File -->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script>
            $(document).ready(function() {
                var body = $('body');
                $(".main-sidebar .sidebar-menu > li").each(function() {
                    let me = $(this);

                    if (me.find('> .dropdown-menu').length) {
                        me.find('> .dropdown-menu').hide();
                        me.find('> .dropdown-menu').prepend('<li class="dropdown-title pt-3">' + me.find('> a')
                            .text() + '</li>');
                    } else {
                        me.find('> a').attr('data-toggle', 'tooltip');
                        me.find('> a').attr('data-original-title', me.find('> a').text());
                        $("[data-toggle='tooltip']").tooltip({
                            placement: 'right'
                        });
                    }
                });
            });
            $(document).ready(function() {
                // Automatically close the alert after 5 seconds
                window.setTimeout(function() {
                    $(".alert").alert('close');
                }, 2500);
            });
        </script>
    </body>

</html>
