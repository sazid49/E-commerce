<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
            background: skyblue;
        }

        .userName {
            padding: 30px;
        }

        .password {
            padding: 0 30px 30px;
        }

        .wrapper form {
            border: 1px solid #00000024;
            background: #fff;
            width: 600px;
            max-width: 100%;
            padding: 50px 0;
        }

        .wrapper h1 {
            text-align: center;
        }

        .userName label,
        .password label {
            display: block;
            padding-bottom: 10px;
        }

        .userName input,
        .password input {
            padding: 5px 10px;
        }

        .form-wrapper {
            max-width: 50%;
            display: block;
            margin: 0 auto;
        }

        .toggle-hide-show {
            position: relative;
            right: 30px;
        }

        /* input:invalid {
            border-color: red;
        } */
    </style>


</head>
<div class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}"><b class="h1">Admin</b>Form</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        <div class="input-group-text">
                            {{-- <span class="fas fa-lock"></span> --}}
                            <span id="icon_click" class="fas fa-eye text-info"></span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{--            <div class="social-auth-links text-center mt-2 mb-3"> --}}
                {{--                <a href="#" class="btn btn-block btn-primary"> --}}
                {{--                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook --}}
                {{--                </a> --}}
                {{--                <a href="#" class="btn btn-block btn-danger"> --}}
                {{--                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+ --}}
                {{--                </a> --}}
                {{--            </div> --}}
                <!-- /.social-auth-links -->

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif
    </script>
    <script>
        $("#icon_click").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</div>

</html>
