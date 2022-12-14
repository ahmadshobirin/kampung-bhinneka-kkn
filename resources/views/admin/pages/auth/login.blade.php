<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/pages/auth.css') }}" />
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo/favicon.png') }}" type="image/png" />

</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="#"><img src="{{ URL::asset('assets/images/logo/logo.svg') }}" alt="Logo" /></a>
                    </div>

                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">
                        Log in untuk akses panel dashboard
                    </p>

                    @if ($message = Session::get('success'))    
                        <div class="alert alert-success msg">
                            <h4 class="alert-heading">Berhasil mengubah password</h4>
                            <p>{{ $message }}</p>
                        </div>
                    @endif

					@if(Session::has('message'))
                        <p class="alert alert-danger">{!! Session::get('message') !!}</p>
                    @endif

                    <form action="{{ route('login-post') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="Email"
                                name="email" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Log in
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>

</html>


