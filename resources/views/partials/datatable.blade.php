{{--<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>--}}
{{--<script type="text/javascript" src="{{ asset('assets')}}/datatable/jquery.dataTables.min.js"></script>--}}

{{--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>--}}
{{--<script type="text/javascript" src="{{ asset('public/datatable')}}/javascript/jquery.dataTables.min.js"></script>--}}
<script type="text/javascript" src="{{ asset('public/datatable')}}/javascript/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{ asset('public/datatable')}}/javascript/dataTables.buttons.min.js"></script>
{{--@if(app()->getLocale()!='ar')--}}
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
{{--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>--}}
<script type="text/javascript" src="{{ asset('public/datatable')}}/javascript/buttons.html5.min.js"></script>
<script type="text/javascript" src="{{ asset('public/datatable')}}/javascript/buttons.print.min.js"></script>

<script type="text/javascript"
        src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>

<script type="text/javascript" src="{{ asset('public/datatable')}}/javascript/jszip.min.js"></script>
<script type="text/javascript" src="{{ asset('public/datatable')}}/javascript/buttons.html5.min.js"></script>
<script type="text/javascript" src="{{ asset('public/datatable')}}/javascript/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{{ asset('public/datatable')}}/pdfMake/pdfmake.min.js"></script>
<script type="text/javascript" src="{{ asset('public/datatable')}}/pdfMake/vfs_fonts.js"></script>
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
    $(document).ready(function () {
        var url = 0;
        $('#example').DataTable({

            'aoColumnDefs': [{

                orderable: false, targets: [0, -1]
            }],

            exportOptions: {
                stripHtml: false
            },
            dom: 'Bfrtip', className: 'btn btn-info ',

            buttons: [
                {

                    extend: 'print',
                    exportOptions: {
                        stripHtml: false
                    },
                    // exportOptions: {
                    //     columns: ':visible'
                    // },
                    customize: function (win) {
                        $(win.document.body).find('table').find('td:last-child, th:last-child').remove();
                    },

                },

                {


                    extend: 'pdf',
                    // title: 'Test',
                    text: 'PDF',
                    pageSize: 'A4',
                    titleAttr: 'PDF',
                    orientation: 'landscape',

                    exportOptions: {
                        // columns: [0, ':visible'],

                        columns: ':visible:not(.not-export-col)',
                        orthogonal: 'export',
                        // format: {
                        //     body: function(data, row, column, node) {
                        //         if (column === 5) {
                        //             data = $(node).children().data("checked");
                        //         }
                        //         return data;
                        //     }
                        // }
                    },
                    customize: function (doc) {
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        doc.styles.tableFooter.alignment = 'right';
                        doc.styles.tableHeader.alignment = 'right';
                        doc.styles.tableBodyEven.alignment = 'right';
                        doc.styles.tableBodyOdd.alignment = 'right';
                        doc.defaultStyle.font = 'Amiri';
                        doc.border = '1';
                    }
                },
                'copy', 'csv', 'print', 'excel',


            ],

            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
    });
</script>

