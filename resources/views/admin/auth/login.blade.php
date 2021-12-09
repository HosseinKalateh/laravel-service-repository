<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@Lang('words.login')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><img class="logo-img" src="{{ asset('assets/images/logo.png') }}" alt="logo"><span class="splash-description">@Lang('sentences.please_enter_your_user_information')</span></div>
        <div class="card-body">
            <div class="mb-2">
                @error('loginError')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                @error('email')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                @error('password')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <form action="{{ route('admin.login.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-lg" name="email" id="email" type="text" placeholder="@Lang('words.email')" autocomplete="off" value="admin@cms.com">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" id="password" type="@Lang('words.password')" placeholder="Password" value="admin@123">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">@Lang('words.sign_in')</button>
            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
