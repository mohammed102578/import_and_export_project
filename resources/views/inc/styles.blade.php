

<link rel="icon" type="image/x-icon" href="{{ $url}}/{{app()->getLocale()}}/assets/img/favicon.ico"/>
<link href="{{ $url}}/{{app()->getLocale()}}/assets/css/loader.css" rel="stylesheet" type="text/css" />
<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/loader.js"></script>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{ $url}}/{{app()->getLocale()}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ $url}}/{{app()->getLocale()}}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href="{{ $url}}/{{app()->getLocale()}}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="{{ $url}}/{{app()->getLocale()}}/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
<link href="{{ $url}}/{{app()->getLocale()}}/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/sweetalerts/promise-polyfill.js"></script>
<link href="{{ $url}}/{{app()->getLocale()}}/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ $url}}/{{app()->getLocale()}}/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
<link href="{{ $url}}/{{app()->getLocale()}}/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
<link href="{{ $url}}/{{app()->getLocale()}}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ $url}}/{{app()->getLocale()}}/assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
<link href="{{ $url}}/{{app()->getLocale()}}/assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ $url}}/{{app()->getLocale()}}/assets/css/forms/switches.css">
<link rel="stylesheet" type="text/css" href="{{ $url}}/en/plugins/select2/select2.min.css">
<link rel="stylesheet" href="{{ $url}}/en/plugins/font-icons/fontawesome/css/regular.css">
<link rel="stylesheet" href="{{ $url}}/en/plugins/font-icons/fontawesome/css/fontawesome.css">
<link href="{{ $url}}/{{app()->getLocale()}}/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
<link href="{{ $url}}/{{app()->getLocale()}}/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
@if(app()->getLocale()=='ar')
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }

    </style>
@endif
{{--<style>--}}
{{--    .navbar  ,.header-container .navbar-nav.theme-brand {--}}
{{--        background:#fff!important;--}}
{{--        color:{{$newColor}} !important;--}}
{{--    }--}}
{{--    .header-container .navbar-nav.theme-brand {--}}

{{--        border-right: 1px solid #fff !important;--}}
{{--        border-left: 1px solid #fff !important;--}}
{{--        border-bottom: #e8e8e8 solid 2px;--}}
{{--        box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);--}}
{{--    }--}}
{{--    .header-container .navbar-nav .theme-text a,.header-container .sidebarCollapse svg, .navbar .navbar-item .nav-item.dropdown.notification-dropdown .nav-link svg,.navbar .navbar-item .nav-item.dropdown.message-dropdown .nav-link svg,--}}
{{--    .navbar .navbar-item .nav-item.user-profile-dropdown .nav-link svg,.navbar .apps-dropdown .custom-dropdown-icon a.dropdown-toggle svg:not(.feather-chevron-down){--}}
{{--        color:{{$newColor}} !important;--}}

{{--    }--}}
{{--    .navbar .apps-dropdown .custom-dropdown-icon a.dropdown-toggle, .navbar-item .nav-item .form-inline.search .search-form-control,nav-item dropdown language-dropdown more-dropdown,.navbar .apps-dropdown .custom-dropdown-icon a.dropdown-toggle svg.feather-chevron-down {--}}
{{--        background:#fff!important;--}}
{{--        color:#000 !important;--}}
{{--        border: 1px solid #f1f2f3 !important;--}}
{{--    }--}}
{{--    .navbar .language-dropdown .custom-dropdown-icon a.dropdown-toggle{--}}
{{--        background:#fff!important;--}}
{{--        color:{{$newColor}} !important;--}}
{{--        border: 1px solid #f1f2f3 !important;--}}
{{--    }--}}
{{--    .breadcrumb-two .breadcrumb li a:active{--}}
{{--        background:{{$newColor}};--}}

{{--    }--}}
{{--    .widget-account-invoice-three .widget-heading,breadcrumb-item .active{--}}
{{--        background: #192433;--}}
{{--        border-color:#192433  !important;--}}

{{--    }--}}

{{--    .breadcrumb-two .breadcrumb li.active a, .breadcrumb-item .breadcrumb li.active a {--}}
{{--        background-color: #1b330f !important;--}}
{{--        border-color: #19331f;--}}
{{--        color: #fff;--}}
{{--    }--}}
{{--    .breadcrumb-two .breadcrumb li.active a:after {--}}
{{--        border-left-color: #192433;--}}
{{--    }--}}


{{--    #complete_orders svg g path, #pending_orders svg g path , #preparing_orders svg g path , #reject_orders svg g path  {--}}
{{--        fill: #ab182d;--}}
{{--        stroke: #f32476--}}
{{--    }--}}
{{--    .breadcrumb-two .breadcrumb li a{--}}
{{--        color:#192433 ;--}}
{{--    }--}}

{{--    ::selection {--}}
{{--        color: {{$newColor}};--}}
{{--        background: transparent;--}}
{{--    }--}}
{{--</style>--}}
