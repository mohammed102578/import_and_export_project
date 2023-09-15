@include('inc.datatables_css')

{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        App.init();--}}
{{--    });--}}
{{--</script>--}}
<!-- END GLOBAL MANDATORY SCRIPTS -->
<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/table/datatable/datatables.js"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/table/datatable/button-ext/jszip.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/table/datatable/button-ext/buttons.print.min.js"></script>

<script src="{{ $url}}/{{app()->getLocale()}}/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="{{ $url}}/{{app()->getLocale()}}/plugins/sweetalerts/custom-sweetalert.js"></script>

<script type="text/javascript" src="{{ $url}}/datatable/pdfMake/pdfmake.min.js"></script>
<script type="text/javascript" src="{{ $url}}/datatable/pdfMake/vfs_fonts.js"></script>
<script>
    $('#html5-extension').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [
                {extend: 'copy', className: 'btn btn-sm'},
                {extend: 'csv', className: 'btn btn-sm'},
                {extend: 'excel', className: 'btn btn-sm'},
                // {extend: 'pdf', className: 'btn btn-sm'},
                {
                    extend: 'print', 
                    className: 'btn btn-sm',
                    customize: function(win){
                        var last = null;
                        var current = null;
                        var bod = [];
         
                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');
         
                        style.type = 'text/css';
                        style.media = 'print';
         
                        if (style.styleSheet)
                        {
                          style.styleSheet.cssText = css;
                        }
                        else
                        {
                          style.appendChild(win.document.createTextNode(css));
                        }
         
                        head.appendChild(style);
                    }
                }
            ]
        },

        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup  clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    }
                } );
            } );
        },
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value="all">الكل</option></select>')
                    .appendTo( $(column.footer()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        if(val != '' && val !='all'){
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        }
                        if(val =='all'){
                        column
                            .search('')
                            .draw();
                        }
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    if(d != '' && d !='all'){
                        select.append( '<option value="'+d+'">'+d+'</option>' );
                    }
                } );
            } );
        },
        'aoColumnDefs': [{

            orderable: false, targets: [0, -1],

        }],
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [15, 10, 20, 50],
        "pageLength": 15,
        // "order": [1, 'asc']

    });
</script>
<script>
    pdfMake.fonts = {
        Roboto: {
            normal: 'Roboto-Regular.ttf',
            bold: 'Roboto-Regular.ttf',
            italics: 'Roboto-Regular.ttf',
            bolditalics: 'Roboto-Regular.ttf'
        },
        Amiri: {
            normal: 'Amiri-Regular.ttf',
            bold: 'Amiri-Regular.ttf',
            italics: 'Amiri-Regular.ttf',
            bolditalics: 'Amiri-Regular.ttf'
        }
    };
</script>

<script>


    function sweet_delete($url, $message, $row_id) {
        $("#row_" + $row_id).css('background-color', '#000000').css('color', 'white');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: $url
                });
                swal({
                    title: "{{ trans('alert') }}",
                    text: "{{ trans('site.deleted_successfully') }}",
                    icon: "success",
                    timer: 1000
                });
                $("#row_" + $row_id).hide(1000);

            } else {
                $("#row_" + $row_id).removeAttr('style');

            }
        })
    }
</script>

