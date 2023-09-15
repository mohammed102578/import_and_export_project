<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/bootstrap/js/popper.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/app.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/scrollspyNav.js"></script>

<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/custom.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/forms/bootstrap_validation/bs_validation_script.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/apex/apexcharts.min.js"></script>
{{--<script src="{{ $url}}/{{app()->getLocale()}}/assets/js/dashboard/dash_1.js"></script>--}}
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/apex/custom-apexcharts.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/flatpickr/flatpickr.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/flatpickr/custom-flatpickr.js"></script>
<script>

    $(document).ready(function() {
        App.init();
    });
</script>


<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@yield('scripts')
{{--@stack('scripts')--}}

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#html5-extension tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/select2/select2.min.js"></script>

<script>
    var ss = $(".basic").select2({
        tags: true,
    });
    $("select").addClass('basic')
</script>

{{--<style>--}}
{{--    .bg-primary, .btn-primary , .dt-buttons .dt-button,#sidebar ul.menu-categories li.menu:not(.active) > .dropdown-toggle[aria-expanded="true"] {--}}
{{--        background: {{$newColor}} !important;--}}
{{--        background-image: linear-gradient(to top, #ab1c1b -227%, #ab182d 100%) !important;--}}
{{--        border-color:#fff  !important;--}}

{{--    }--}}
{{--    .page-item.active .page-link {--}}
{{--        z-index: 3;--}}
{{--        color: #fff;--}}
{{--        background-color: #192433;--}}
{{--        border-color: #192433;--}}
{{--    }--}}
{{--    div.dataTables_wrapper div.dataTables_info{--}}
{{--        color: #192433;--}}
{{--    }--}}
{{--</style>--}}
<script>
function myFunction_created_at() {
	var x = document.getElementById("created_at_ViewBy").value;
	if(x != 0){
		window.location = "?id=" + x;
	}
}

function myFunction() {
	var x = document.getElementById("ddlViewBy").value;
	if(x != 0){
		window.location = "?id=" + x;
	}
}

function myFunction_new() {
	var x = document.getElementById("idcount").value;
	if(x != 0){
		window.location = "?id_t=" + x;
	}
}
function myFunctionidid() {
	var x = document.getElementById("idid").value;
	if(x != 0){
		window.location = "?type=" + x;
	}
}
</script>
