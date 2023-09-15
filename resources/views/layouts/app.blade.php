<!DOCTYPE html>
<html lang="en" class="sidebar-noneoverflow">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    @include('inc.styles')
    @yield('style')

</head>
<body class="sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="140"
      cz-shortcut-listen="true">
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

@include('inc.navbar')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

@include('inc.sidebar')

<!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content sidebar-closed sbar-open">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                @yield('content')
            </div>
        </div>
        @include('inc.footer')


    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->

@include('inc.scripts')
@include('partials._session')

</body>
</html>
