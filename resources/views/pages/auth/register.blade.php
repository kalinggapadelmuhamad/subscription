<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Register Page</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/logo.jpeg') }}" type="image/x-icon">

    </head>

    <body>
        <div id="app" class="">
            <section class="section">
                <div class="d-flex align-items-stretch flex-wrap m-0">
                    <div
                        class="col-lg-4 col-12 order-lg-2 min-vh-100 order-2 bg-white d-flex align-items-center justify-content-center">
                        <div class="p-4 m-3">
                            <h1 class="text-dark font-weight-bold">Register
                            </h1>
                            <p class="text-muted">Please fill in the following data correctly.</p>
                            <form method="POST" action="">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="username">Username</label>
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            required>
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="password">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="phone">Phone</label>
                                        <input id="phone" type="text" class="form-control" name="phone">
                                    </div>
                                </div>

                                <div class="form-group text-left">
                                    Already have an account ?
                                    <a href="{{ route('login') }}" class="text-dark font-weight-bold">
                                        Sign In
                                    </a>
                                </div>


                                <div class="d-block">
                                    <button class="btn btn-primary btn-lg btn-block">Sign Up</button>
                                </div>

                            </form>

                            <div class="text-small mt-5 text-center">
                                Copyright &copy; 2024 <br> Register Page
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-8 col-12 order-lg-1 min-vh-100  position-relative overlay-gradient-bottom  d-none d-lg-block">

                    </div>
                </div>
            </section>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
        <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
        <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('js/stisla.js') }}"></script>

        <!-- JS Libraies -->

        <!-- Page Specific JS File -->

        <!-- Template JS File -->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>

</html>
