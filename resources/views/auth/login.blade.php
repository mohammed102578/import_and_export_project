
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="برنامج المشتريات لادارة شركتك, مخيمات البصر العالمية, مخيمات برنامج المشتريات مخيمات البصر حول العالم السودان اليمن بنجلاديش نيجريا باكستان.">
    <meta name="keywords" content="برنامج المشتريات لادارة شركتك, مخيمات البصر العالمية, مخيمات برنامج المشتريات مخيمات البصر حول العالم السودان اليمن بنجلاديش نيجريا باكستان">
    <meta property="og:title" content="مؤسسة البصر العاليمة - العيون - لادارة شركتك">
    <meta property="og:description" content="برنامج المشتريات لادارة شركتك, مخيمات البصر العالمية, مخيمات برنامج المشتريات مخيمات البصر حول العالم السودان اليمن بنجلاديش نيجريا باكستان">
    <meta property="og:image" content="">
    <meta name="robots" content="index, follow">
    <title>برنامج المشتريات</title>
    <link rel="apple-touch-icon" href="/{{asset('app-assets')}}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets')}}/images/ico/favicon.ico">



    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/custom-rtl.css">


    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css-rtl/pages/authentication.css">


    <link href="{{asset('app-assets')}}/css/font-m.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css/style-rtl.css">
    <link href="{{ $url}}{{app()->getLocale()}}/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ $url}}{{app()->getLocale()}}/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="{{ $url}}{{app()->getLocale()}}/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />

</head>


<body class="horizontal-layout horizontal-menu navbar-static dark-layout 1-column   footer-static bg-full-screen-image  blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column" data-layout="dark-layout">

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <section id="auth-login" class="row flexbox-container">
                <div class="col-xl-8 col-11">
                    <div class="card bg-authentication mb-0">
                        <div class="row m-0">

                            <div class="col-md-6 d-md-block d-none text-center align-self-center p-3" style="max-height: 500px">
                                <img class="img-fluid" src="{{asset('app-assets')}}/images/pages/login.png" alt="branding logo" style="height: 70%">
                                <div class=" " style="height: 30%;">
                                    <a href="https://esnadbusiness.com" target="_blank" style="text-align: center"> <p class="text-muted " style="margin-top: 10px;bottom: -10px">صنع بشغف بواسطة منصة إسناد الأعمال ❤️  | © 1444 - 2022</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 px-0">
                                <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="text-center mb-2"> برنامج كونستك لإدارة المشتريات</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="divider">
                                            <div class="divider-text text-uppercase text-muted">
                                                <small>
                                                    إدارة المشتريات                                                </small>
                                            </div>
                                        </div>
{{--                                        <form action="javascript:void(0);">--}}
                                            <form method="post" action="{{route('login')}}">
                                                @csrf
                                            <div class="form-group mb-50">
                                                <label class="text-bold-600" for="txtUserName">المستخدم</label>
                                                <input type="text" class="form-control" id="txtUserName" autocomplete="off" name="email" maxlength="50" placeholder="المستخدم">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-bold-600" for="txtPassword">كلمة المرور</label>
                                                <input type="password" class="form-control" autocomplete="off" id="txtPassword"  name="password" maxlength="50" placeholder="كلمة المرور">
                                            </div>
                                            <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                                <div class="text-left">
                                                    <div class="checkbox checkbox-sm">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="checkboxsmall" for="exampleCheck1">
                                                            <small>
                                                                تذكر بياناتي
                                                            </small>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="text-right"><a href="auth-forgot-password.html" class="card-link"><small>نسيت كلمة المرور</small></a></div>
                                            </div>
                                            <button type="submit" id="btnLogin" class="btn btn-primary glow w-100 position-relative" >دخول<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                        </form>
                                        <hr>
{{--                                        <div class="text-center"><small class="mr-25">مستخدم جديد</small><a href="javascript:;"><small>تسجيل</small></a></div>--}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

<script src="{{ $url}}{{app()->getLocale()}}/plugins/sweetalerts/sweetalert2.min.js"></script>
{{--<script src="{{ $url}}{{app()->getLocale()}}/plugins/sweetalerts/custom-sweetalert.js"></script>--}}

@include('partials._errors')

</body>

</html>
