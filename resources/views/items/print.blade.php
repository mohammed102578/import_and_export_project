@php $datareq = \App\Models\Request::find($request_id); @endphp
@php $ID = $datareq['category_id']; @endphp
@php $data = \App\Models\Category::find($ID); @endphp
<html>

<head>
    <!--   External CSS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    </link>
</head>
<title>@lang('site.print') - {{ $data['name'] }} </title>
<script type="text/javascript">
    window.print();
</script>
<style>
    @import url(https://fonts.googleapis.com/css?family=Tajawal);

    body {
        direction: rtl;
        background: #DFE7E5 !important;
        font-family: 'tajawal' !important;
    }

    h3 {
        color: #32c19a;
    }

    .main-content {
        width: 100% !important;
        padding-left: 150px !important;
        padding-right: 150px !important;
        background: white;

    }

    .thead_dark {
        background: #42c2a1;
        color: white;
    }

    .btn-download {
        background: #42C2A1 !important;
        border-radius: 50% !important;
        padding-top: 0px;
        padding-bottom: 0px;
        vertical-align: top !important;
        padding: 5px;
        border: none;
        color: white;

    }

    div.dataTables_wrapper div.dataTables_info {
        padding-top: 0px !important;
        white-space: nowrap;
        color: #64b99c !important;
    }

    table.dataTable>tbody>tr.child ul.dtr-details {
        display: inline-block;
        list-style-type: none;
        margin: 0;
        padding: 0;
        text-align: left;
    }

    .table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
        top: 9px;
        left: 4px;
        height: 14px;
        width: 14px;
        display: block;
        position: absolute;
        color: white;
        border: 2px solid white;
        border-radius: 14px;
        box-shadow: 0 0 3px #444;
        box-sizing: content-box;
        text-align: center;
        text-indent: 0 !important;
        font-family: 'Courier New', Courier, monospace;
        line-height: 14px;
        content: '+';
        background-color: #60b6ab;
    }

    .table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before {
        content: '-';
        background-color: #d33333;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff !important;
        background-color: #42c2a1 !important;
        border-color: #42c2a1 !important;
        border-radius: 8px !important;
    }

    .page-link {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #42c2a1 !important;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .dataTables_info,
    .dataTables_length {
        float: right;
    }

    #files_list_paginate,
    .dataTables_filter {
        float: left;
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {}

    html,
    body {
        width: 110%;
        height: auto;
        margin: auto;
        padding: 0;
    }
</style>

<body>

    <div class="main-content">
        <div class="row">
            <div class="col-sm-4 pt-5">

                <img src="https://www.jobiano.com/uploads/jobs/46002/image/hr-admin-for-constec-construction-design-company-627f5e4eca9f1.jpg"
                    width="50%" style="float:right;">

            </div>
            <div class="col-sm-4 pt-5">
                @if ($ID != 1)
                    <h5 class="card-title pt-2">
                        <center>{{ $data['name'] }}</center>
                    </h5>
                @else
                    <h5 class="card-title pt-2">
                        <center>@lang('site.order_req')</center>
                    </h5>
                @endif

            </div>
            <div class="col-sm-4 pt-5">

                <h5 class="card-title pt-2">
                    @lang('site.ref') :
                    {{ $datareq->ref }}
                </h5>

            </div>
            @if ($ID != 1)
                <div class="col-sm-8">
                    <h5 style="float:right;display:none;" class="pt-2">
                        @lang('site.date') : {{ $datareq->created_at->toDateString() }}
                    </h5>
                </div>
                <div class="col-sm-4">
                    <h5 class="pt-2 pb-2" style="display:none;">
                        @lang('site.for_project') : المشروع<br>
                        @lang('site.project_location') : المكان
                    </h5>
                </div>
                <div class="col-sm-12">
                    <h5 style="float:right;display:none;">
                        @lang('site.to') : {{ $datareq->name_et }}
                    </h5>
                </div>
                <div class="col-sm-12">
                    <h5 style="float:right;display:none;" class="">
                        @lang('site.address') : {{ $datareq->title }}
                    </h5>
                </div>
                <div class="col-sm-12">
                    <h5 style="float:right;" class="pt-2">
                        @lang('site.text_full') :
                    </h5>
                </div>
            @endif
            <div class="col-sm-12">
                <table id="files_list" class="table table-striped dt-responsive  "style="width:100%">
                    <thead>
                        <tr>
                            <td class="table-success"><b>@lang('site.req_by')</b></td>
                            <td>
                                <center>{{ $datareq->name }}</center>
                            </td>
                            <td class="table-success"><b>@lang('site.id_req')</b></td>
                            <td>
                                <center>{{ $datareq->id }}</center>
                            </td>
                            <td class="table-success"><b>@lang('site.request_date')</b></td>
                            <td>
                                <center>{{ $datareq->created_at->toDateString() }}</center>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-success"><b>@lang('site.name_et')</b></td>
                            <td>
                                <center>{{ $datareq->name_et }}</center>
                            </td>
                            <td class="table-success"><b>@lang('site.code')</b></td>
                            <td>
                                <center>{{ $datareq->code }}</center>
                            </td>
                            <td class="table-success"><b>@lang('site.kind_h')</b></td>
                            <td>
                                <center>{{ $datareq->kind_h }}</center>
                            </td>

                        </tr>
                        @if ($ID == 1)
                            <tr>
                                <td class="table-success"><b>@lang('site.project_name')</b></td>
                                <td>
                                    <center>{{ $datareq->title }}</center>
                                </td>
                            </tr>
                        @endif
                    </thead>
                </table>
            </div>
            <table id="files_list" class="table table-striped dt-responsive  "style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('site.id') </th>
                        @if ($ID != 3 && $ID != 4)
                            <th>@lang('site.kind_of') </th>
                        @endif
                        @if ($ID == 1 || $ID == 5)
                            <th>@lang('site.category_code') </th>
                        @endif
                        @if ($ID == 4 || $ID == 1 || $ID == 5)
                            <th>@lang('site.terms_code')</th>
                        @endif
                        @if ($ID == 4)
                            <th>@lang('site.terms')</th>
                        @endif
                        @if ($ID != 4)
                            <th>{{ $ID == 3 ? __('site.business statement') : __('site.description') }}</th>
                        @endif
                        <th>@lang('site.unit')</th>
                        <th>@lang('site.qty')</th>
                        <th>@lang('site.contractual_qty')</th>
                        <th>@lang('site.price')</th>
                        <th>@lang('site.price_total')</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0;@endphp

                    @foreach ($items as $category)
                        @php $total += ($category->price*$category->qty); @endphp
                        <tr>
                            <td>{{ $category->id }} </td>
                            @if ($ID != 3 && $ID != 4)
                                <td>{{ $category->name }} </td>
                            @endif
                            @if ($ID == 1 || $ID == 5)
                                <td>{{ $category->category_code }} </td>
                            @endif
                            @if ($ID == 4 || $ID == 1 || $ID == 5)
                                <td> {{ $category->terms_code }}</td>
                            @endif
                            @if ($ID == 4)
                                <td>{{ $category->terms }}</td>
                            @endif
                            @if ($ID != 4)
                                <td>{!! $category->description !!}</td>
                            @endif
                            <td>{{ $category->unit }}</td>
                            <td>{{ number_format($category->qty, 2) }}</td>
                            <td>{{ number_format($category->contractual_qty, 2) }}</td>
                            <td>{{ number_format($category->price, 2) }}</td>
                            <td>{{ number_format($category->price * $category->qty, 2) }}</td>
                        </tr>
                    @endforeach
                    @if ($ID != 1)
                        <tr>
                            <td></td>
                            <td><b>@lang('site.price_total')</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>{{ number_format($total, 2) }}</b></td>
                        </tr>
                        <tr>
                            <td style="color:green;">يضاف</td>
                            <td>@lang('site.price_add')</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ number_format($total * 0.14, 2) }}</td>
                        </tr>
                        <tr>
                            <td style="color:red;">يخصم</td>
                            <td>@lang('site.price_del')</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ number_format($total * 0.01, 2) }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>@lang('site.price_total_end')</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>{{ number_format($total * 0.85, 2) }}</b></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            @if ($ID != 1)
                <div class="col-sm-12">
                    <h3 style="float:right;">@lang('site.terms')</h3>
                </div>
                <div class="col-sm-12">
                    <table id="files_list" class="table table-striped dt-responsive  "style="width:50%">
                        <thead>
                            <tr>
                                <td>@lang('site.time_req')</td>
                                <td>{{ $datareq->time_req }}</td>

                            </tr>
                            <tr>
                                <td>@lang('site.location_req')</td>
                                <td>{{ $datareq->location_req }}</td>

                            </tr>
                            <tr>
                                <td>@lang('site.type_l_req')</td>
                                <td>{{ $datareq->type_l_req }}</td>


                            </tr>

                        </thead>
                    </table>
                </div>

                @if ($ID = 4)
                    <div class="col-sm-4">
                        <h5 style="float:right;" class="pt-5 pb-5">
                            @lang('site.project_manager')<br>
                            @lang('site.signature')
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5 style="margin: auto;text-align: center" class="pt-5 pb-5">
                            @lang('site.projects_manager')<br>
                            @lang('site.signature')
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5 style="float:left;" class="pt-5 pb-5">
                            @lang('site.used')<br>
                            @lang('site.gchef')<br>
                            @lang('site.signature')
                        </h5>
                    </div>
                @else
                    <div class="col-sm-4">
                        <h5 style="float:right;" class="pt-5 pb-5">
                            @lang('site.chef')<br>
                            @lang('site.signature')
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5 style="margin: auto;text-align: center" class="pt-5 pb-5">
                            @lang('site.supplier')<br>
                            @lang('site.signature')
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5 style="float:left;" class="pt-5 pb-5">
                            @lang('site.used')<br>
                            @lang('site.gchef')<br>
                            @lang('site.signature')
                        </h5>
                    </div>
                @endif





                <div class="col-sm-12">
                    <h5 style="float:right;" class="pt-2">
                        @lang('site.text_full_2') 5454246
                    </h5>
                </div>
                <div class="col-sm-12">
                    <h5 style="float:right;" class="pt-2">
                        @lang('site.text_full_3')
                    </h5>
                </div>
                <div class="col-sm-12">
                    <h5 style="float:right;" class="pt-2">
                        @lang('site.name') :
                    </h5>
                </div>
                <div class="col-sm-12">
                    <h5 style="float:right;" class="pt-2">
                        @lang('site.signature') :
                    </h5>
                </div>
                <div class="col-sm-12">
                    <hr>
                </div>
                <div class="col-sm-12">
                    <h5 style="float:left;" class="pt-2">
                        Ref. No. : CD-FRM-PCT-006
                    </h5>
                </div>
            @else
                <div class="col-sm-12">
                    <h5 style="float:right;" class="pt-5 pb-5">
                        @lang('site.signature_pg')
                    </h5>
                </div>
                <div class="col-sm-12">
                    <table id="files_list" class="table table-striped dt-responsive  "style="width:100%">
                        <thead>
                            <tr class="table-success">
                                <th colspan="5">
                                    <center>@lang('site.revesion')</center>
                                </th>
                                <th colspan="2">
                                    <center>@lang('site.used')</center>
                                </th>
                            </tr>
                       
                            <tr>

                                <th>
                                   <center> <b> @lang('site.project_manager') :</b></center>
                                </th>


                                <th>
                                   <center> <b> @lang('site.HSE') :</b></center>
                                </th>

                                <th>
                                   <center> <b> @lang('site.Stock') :</b></center>
                                </th>


                                <th>
                                   <center> <b> @lang('site.Asset') :</b></center>
                                </th>

                                <th>
                                   <center> <b> @lang('site.IT') :</b></center>
                                </th>

                                <th>
                                   <center> <b> @lang('site.cost') :</b></center>
                                </th>

                                @if ($ID == 1)
                                    <th>
                                       <center> <b> @lang('site.cto_manager') :</b></center>
                                    </th>
                                @else
                                    <th>
                                       <center> <b> @lang('site.commerce') :</b></center>
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <center>

                                    @if ($datareq->project_manager == 0)
                                        {{ __('site.not_agree') }}
                                    @elseif($datareq->project_manager == 1)
                                        {{ __('site.agree') }}
                                    @elseif($datareq->project_manager == 2)
                                        {{ __('site.not_competent') }}
                                    @endif
                                </center>
                                </td>
                                <td>
                                <center>

                                    @if ($datareq->hse_manager == 0)
                                        {{ __('site.not_agree') }}
                                    @elseif($datareq->hse_manager == 1)
                                        {{ __('site.agree') }}
                                    @elseif($datareq->hse_manager == 2)
                                        {{ __('site.not_competent') }}
                                    @endif
                                </center>
                                </td>
                                <td>
                                <center>

                                    @if ($datareq->stock_manager == 0)
                                        {{ __('site.not_agree') }}
                                    @elseif($datareq->stock_manager == 1)
                                        {{ __('site.agree') }}
                                    @elseif($datareq->stock_manager == 2)
                                        {{ __('site.not_competent') }}
                                    @endif
                                </center>
                                </td>
                                <td>
                                <center>

                                    @if ($datareq->asset_manager == 0)
                                        {{ __('site.not_agree') }}
                                    @elseif($datareq->asset_manager == 1)
                                        {{ __('site.agree') }}
                                    @elseif($datareq->asset_manager == 2)
                                        {{ __('site.not_competent') }}
                                    @endif
                                </center>
                                </td>
                                <td>
                                <center>

                                    @if ($datareq->it_manager == 0)
                                        {{ __('site.not_agree') }}
                                    @elseif($datareq->it_manager == 1)
                                        {{ __('site.agree') }}
                                    @elseif($datareq->it_manager == 2)
                                        {{ __('site.not_competent') }}
                                    @endif
                                </center>
                                </td>
                                <td>
                                <center>

                                    @if ($datareq->cost_control_manager == 0)
                                        {{ __('site.not_agree') }}
                                    @elseif($datareq->cost_control_manager == 1)
                                        {{ __('site.agree') }}
                                    @elseif($datareq->cost_control_manager == 2)
                                        {{ __('site.not_competent') }}
                                    @endif
                                </center>
                                </td>


                                    @if ($ID == 1)
                                <td> 
                                    
                                    <center>
                                    @if ($datareq->cto_manager == 0)
                                        {{ __('site.not_agree') }}
                                    @elseif($datareq->cto_manager == 1)
                                        {{ __('site.agree') }}
                                    @elseif($datareq->cto_manager == 2)
                                        {{ __('site.not_competent') }}
                                    @endif


                                </center>
                                </td>
                            @else
                                <td>              <center>

                                    

                                    @if ($datareq->commercial_sector_manager == 0)
                                        {{ __('site.not_agree') }}
                                    @elseif($datareq->commercial_sector_manager == 1)
                                        {{ __('site.agree') }}
                                    @elseif($datareq->commercial_sector_manager == 2)
                                        {{ __('site.not_competent') }}
                                    @endif

                                </center>
                                </td>
            @endif

            </tr>
            <tr>
                <td>
                    <center>
                        {{ $datareq->project_manager_note }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->hse_manager_note }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->stock_manager_note }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->asset_manager_note }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->it_manager_note }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->cost_control_manager_note }}

                    </center>
                </td>

                @if($ID==1)
                <td>
                    <center>
                        {{ $datareq->cto_manager_note }}

                    </center>
                </td>
                @else

                <td>
                    <center>
                        {{ $datareq->commercial_sector_manager_note }}

                    </center>
                </td>

                @endif
            </tr>
            <tr>
                <td>
                    <center>
                        {{ $datareq->project_manager_date }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->hse_manager_date }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->stock_manager_date }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->asset_manager_date }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->it_manager_date }}

                    </center>
                </td>
                <td>
                    <center>
                        {{ $datareq->cost_control_manager_date }}

                    </center>
                </td>

                @if($ID==1)
                <td>
                    <center>
                        {{ $datareq->cto_manager_date }}

                    </center>
                </td>
                @else

                <td>
                    <center>
                        {{ $datareq->commercial_sector_manager_date }}

                    </center>
                </td>

                @endif
            </tr>
         
        </tbody>

            </table>
        </div>
        @endif
        <div class="col-sm-12">
            <h5 class="pt-2">
                <center>@lang('site.upup')<br>@lang('site.downdown')</center>
            </h5>
        </div>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

</body>

</html>
