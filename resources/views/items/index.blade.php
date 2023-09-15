@extends('layouts.app')
@section('title')
    @php
        $request=\App\Models\Request::find($request_id);
    @endphp
{{--    {{$request->category->name}}--}}
@endsection
@section('style')
    <style>
        caption {

     caption-side: top;
    }

    @media print {
    caption{
    text-align: center;
    }
    }

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('items.index',$request_id)}}">@lang('site.items')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('items.create',$request_id) }}">
                    @lang('site.add')
                </a>
            </div>
        </div>
    </div>


    @include('flash::message')

    <div class="clearfix"></div>


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing layout-top-spacing">
        <div class="widget-content widget-content-area ">
    @if($request->category->id != 5)
    @include('items.table')
            @else
    @include('items.material')
        @endif


</div>

</div>

@endsection

@section('scripts')
{{--    <script>--}}
{{--        var myVar = "This is dynamic data";--}}
{{--        $('#html5-extension').append('<caption>'+myVar+'</caption>');--}}
{{--    </script>--}}
@include('inc.datatables_js')

<script>
var regexp = /[^a-zA-Z]/g;
$('#html5-extension2 tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" class="form-control" placeholder="'+title+'" />' );
} );

$('#html5-extension2').DataTable({
    "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    buttons: {
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: '{{$request->id ==1?__('site.project_name'):__('site.management_name') .' : '}} {{ $request->name }} - {{__('site.request_number') .' : '}}{{ $request->id }} - {{  __('site.request_date').' : '}}{{ date('d-m-Y',strtotime($request->created_at))}}'

            },
            {{--{--}}
            {{--    extend: 'pdf',--}}
            {{--    messageTop: '{{$request->id ==1?__('site.project_name'):__('site.management_name') .' : '}} {{ $request->name }} - {{__('site.request_number') .' : '}}{{ $request->id }} - {{  __('site.request_date').' : '}}{{ date('d-m-Y',strtotime($request->created_at))}}'--}}
            {{--},--}}
            {
                extend: 'print',
                messageTop: '   <div class="row">         <div class="col-md-2 mt-1 mb-1" >{{$request->id ==1?__('site.project_name'):__('site.management_name') .' : '}} </div>\n' +
                    '                        <div class="col-md-2 mt-1 mb-1" > {{ $request->name }}</div>\n' +
                    '                        <div class="col-md-2">{{__('site.request_number') .' : '}}</div>\n' +
                    '                        <div class="col-md-2"> {{ $request->id }}</div>\n' +
                    '                        <div class="col-md-2">{{  __('site.request_date').' : '}}</div>\n' +
                    '                        <div class="col-md-2">{{ date('d-m-Y',strtotime($request->created_at))}}</div>\n' +
                    '\n   </div>',
                messageBottom: '    <h2>{{__('site.Managing Director s signature').' : .....................'}}</h2>\n' +
                    '\n' +
                    '    <table  style="width:100%;text-align: center" border="1">\n' +
                    '        <tr>\n' +
                    '            <th >{{__('site.Manager Review')}}</th>\n' +
                    '            <th colspan="2"> {{__('site.Depend ON')}}</th>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td> <div class="row"><div class="col-md-3">{{__('site.Stock Manager')}}</div><div class="col-md-1">{{__('site.Or')}}</div><div class="col-md-3">{{__('site.asset Manager')}}</div><div class="col-md-1">{{__('site.Or')}}</div><div class="col-md-3">{{__('site.IT Manager')}}</div></div></td>\n' +
                    '            <td>{{__('site.Cost control Manager')}}</td>\n' +
                    '            <td>{{__('site.Commercial Sector Manager')}}</td>\n' +
                    '        </tr>\n' +
                    '        <tr>\n' +
                    '            <td> <div class="row"><div class="col-md-3">{{$request->stock_manager_name}}</div><div class="col-md-1">{{__('site.Or')}}</div><div class="col-md-3">{{$request->asset_manager_name}}</div><div class="col-md-1">{{__('site.Or')}}</div><div class="col-md-3">{{$request->it_manager_name}}</div></div></td>\n' +
                    '            <td>  {{$request->cost_control_manager_name}}</td>\n' +
                    '            <td>  {{$request->commercial_sector_manager_name}} </td>\n' +
                    '        </tr>\n' +
                    '    </table>',
            },

        ]
    },

    initComplete: function () {
        // Apply the search
        this.api().columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup  clear', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
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
    function addEvent(id,type,val,text){
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            padding: '2em'
        });
        div=$('#'+type+'_'+id)


            swal.mixin({

                input: 'textarea',
                inputAttributes: {
                    value:text
                },

                confirmButtonText: 'OK',
                showLoaderOnConfirm: true,
                showCancelButton: true,
                padding: '2em',
            }).queue(
                [
                    {

                        title: '{{__('site.add')}}',
                        text: val
                    },
                ]).then(function (result) {

                if (result.value[0] != '') {



                    $.ajax({
                        type: 'post',
                        url: "{{route('addNotes')}}",
                        data: {
                            'id': id,
                            'type': type,
                            'name': result.value[0],
                            _token: '{{csrf_token()}}'
                        },
                        success: function (data) {

                            if (data.msg == 'add') {
                                $('#'+type+id).text(result.value[0])
                                toast({
                                    type: 'success',
                                    title: '{{__('site.Operation Done successfully')}}',
                                    padding: '2em',
                                })
                            } else {
                                toast({
                                    type: 'error',
                                    title: '{{__('site.an Error Occur')}}',
                                    padding: '2em',
                                })
                            }
                        }, error: function (reject) {
                        }
                    });
                    // break;
                    return false
                }else{
                    toast({
                        type: 'error',
                        title: 'يرجي ادخال البيانات',
                        padding: '2em',
                    })
                    div.prop('checked', false);
                    div.val(0);


                }

            })
            // continue start

            // }
        }






</script>
@endsection
