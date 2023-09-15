<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - Login Cover Page</title>
    <link rel="icon" type="image/x-icon" href="{{ $url}}/{{app()->getLocale()}}/assets/img/favicon.ico"/>
    <link href="{{ $url}}/{{app()->getLocale()}}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ $url}}/{{app()->getLocale()}}/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ $url}}/{{app()->getLocale()}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ $url}}/{{app()->getLocale()}}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ $url}}/{{app()->getLocale()}}/assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <link href="{{ $url}}/{{app()->getLocale()}}/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ $url}}/{{app()->getLocale()}}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ $url}}/{{app()->getLocale()}}/assets/css/forms/switches.css">
</head>
<body class="form">
<style>
    .bg-primary, .btn-primary {
        background: {{$newColor}} !important;
        border: solid #f1f2f3 1px;
    }
    .form-form .form-form-wrap h1 .brand-name{
        color:{{$newColor}} !important;
    }

    .form-form .form-form-wrap form .field-wrapper svg {
        position: absolute;
        top: 16px;
        color: {{$newColor}};
        fill: rgba(226, 169, 89, 0.24);
    }
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-container">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">Log In to <a href="{{route('admin.login')}}"><span class="brand-name">TDRA Virtual Academy</span></a></h1>
                    <form method="post" action="{{route('admin.login')}}">
                        @csrf
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <input id="username" name="email" type="email" class="form-control" placeholder="Username">
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper toggle-pass">
                                    <p class="d-inline-block">Show Password</p>
                                    <label class="switch s-primary">
                                        <input type="checkbox" id="toggle-password" class="d-none">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                                </div>

                            </div>

                            <div class="field-wrapper text-center keep-logged-in">
                                <div class="n-chk new-checkbox checkbox-outline-primary">
                                    <label class="new-control new-checkbox checkbox-outline-primary">
                                        <input type="checkbox" class="new-control-input">
                                        <span class="new-control-indicator"></span>Keep me logged in
                                    </label>
                                </div>
                            </div>

                            <div class="field-wrapper">
{{--                                <a href="auth_pass_recovery.html" class="forgot-pass-link">Forgot Password?</a>--}}
                            </div>

                        </div>
                    </form>
                    <p class="terms-conditions">© {{date('Y')}} All Rights Reserved. <a href="index.html">TDRA</a>  <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>

                </div>
            </div>
        </div>
    </div>
    <div class="form-image">
        <div class="l-image">
        </div>
    </div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/bootstrap/js/popper.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/bootstrap/js/bootstrap.min.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/authentication/form-1.js"></script>

</body>
</html>
