@php $data = \App\Models\Category::find($category_id); @endphp
<html>
  <head>
<!--   External CSS  -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet"> </link>
  </head>
<title>@lang('site.print') - {{ $data['name'] }}</title>
<script type="text/javascript">

    //window.print();

</script>
<style>
    @import url(https://fonts.googleapis.com/css?family=Tajawal);

body{
  direction : rtl;
 background: #DFE7E5!important;
 font-family:'tajawal'!important;
}

h3{
  color: #32c19a;
}
.main-content{
  width:100%!important;
  padding-left:150px!important;
    padding-right:150px!important;
  background: white;

}
.thead_dark {
    background: #42c2a1;
    color:white;
}
.btn-download {
    background: #42C2A1!important;
    border-radius: 50%!important;
    padding-top: 0px;
    padding-bottom: 0px;
    vertical-align: top!important;
    padding: 5px;
    border: none;
    color: white;
  
}

div.dataTables_wrapper div.dataTables_info {
    padding-top: 0px !important;
    white-space: nowrap;
    color: #64b99c!important;
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
    color: #fff!important;
    background-color: #42c2a1!important;
    border-color: #42c2a1!important;
    border-radius: 8px!important;
}

.page-link {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #42c2a1!important;
    background-color: #fff;
    border: 1px solid #dee2e6;
}
.dataTables_info, .dataTables_length{
      float: right;
}
#files_list_paginate,.dataTables_filter{
  float: left;
}
@page 
{
    size: auto;
    margin-top: 0mm;
    margin-bottom: 0mm;
    margin-right: 15mm;
}
@media print {
html, body {
width:110%;
height:auto;
margin:auto;
padding:0;
}

</style>
<body>
  
  <div class="main-content">
    <div class="row">
        <div class="col-sm-4 pt-5">

  <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"  style="float:right;">

        </div>
        <div class="col-sm-4 pt-5">

    <h5 class="card-title pt-2"><center>{{ $data['name']." رقم ".$category_id }}</center></h5>

</div>
        <div class="col-sm-4 pt-5">

    <h5 class="card-title pt-2">www.company.com</h5>

</div>
<div class="col-sm-8">
    <h5 style="float:right;" class="pt-2 pb-2">
        @lang('site.date') : 00/00/0000
        <br>
        @lang('site.to') : شركة
        <br>
        @lang('site.address') : المنطقة
    </h5>
</div>
<div class="col-sm-4">
    <h5 class="pt-2 pb-2">
        @lang('site.for_project') : المشروع<br>
        @lang('site.project_location') : المكان
    </h5>
</div>
<div class="col-sm-12">
    <h5 style="float:right;" class="pt-2">
        @lang('site.text_full') :
    </h5>
</div>
    <table id="files_list" class="table table-striped dt-responsive  "style="width:100%">
        <thead class="thead_dark">
        <tr>
            <th>{{$category_id!=1?__('site.name'):__('site.management_name')}}</th>
            <th>@lang('site.name_et')</th>
            <th>@lang('site.Ref')</th>
            <th>@lang('site.code')</th>
            <th>@lang('site.category')</th>
			<th>@lang('site.req_type')</th>
            @if (auth()->user()->hasPermission('update_hse_manager'))
                <th>@lang('site.HSE')</th>
            @endif
            @if (auth()->user()->hasPermission('update_it_manager'))
                <th>@lang('site.IT')</th>
            @endif
            @if (auth()->user()->hasPermission('update_stock_manager'))
                <th>@lang('site.Stock')</th>
            @endif
            @if (auth()->user()->hasPermission('update_asset_manager'))
                <th>@lang('site.Asset')</th>
            @endif
            @if (auth()->user()->hasPermission('update_cost_control_manager'))
                <th>@lang('site.cost_control_manager')</th>
            @endif
            @if (auth()->user()->hasPermission('update_commercial_sector_manager'))
                <th>@lang('site.commercial_sector_manager')</th>
            @endif
            <th>@lang('site.created_by')</th>
            <th>@lang('site.created_at')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr id="row_{{$request->id}}">
                <td>{{ $request->name }}</td>
                <td>{{ $request->name_et }}</td>
                <td>{{ $request->ref }}</td>
                <td>{{ $request->code }}</td>
                <td>{{ $request->category->name }}</td>
				<td>{{ $request->type_req }}</td>
                @if (auth()->user()->hasPermission('update_hse_manager'))
                    <td id="HSE-{{$request->id}}">{{$request->hse_manager_name}}</td>
                @endif
                @if (auth()->user()->hasPermission('update_it_manager'))
                    <td id="IT-{{$request->id}}">{{$request->it_manager_name}}</td>
                @endif
                @if (auth()->user()->hasPermission('update_stock_manager'))
                    <td id="stock-{{$request->id}}">{{$request->stock_manager_name}}</td>
                @endif
                @if (auth()->user()->hasPermission('update_asset_manager'))
                    <td id="asset-{{$request->id}}">{{$request->asset_manager_name}}</td>
                @endif
                @if (auth()->user()->hasPermission('update_cost_control_manager'))
                    <td id="cost_control-{{$request->id}}">{{$request->cost_control_manager_name}}</td>
                @endif
                @if (auth()->user()->hasPermission('update_commercial_sector_manager'))
                    <td id="commercial_sector-{{$request->id}}">{{$request->commercial_sector_manager_name}}</td>
                @endif
                <td class="text-center">{{$request->createdBy->name}}</td>
                <td class="text-center">{{$request->created_at->toDateString()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
<div class="col-sm-12">
   <h3 style="float:right;">@lang('site.terms')</h3>
</div>
<div class="col-sm-12">
    <table id="files_list" class="table table-striped dt-responsive  "style="width:50%">
        <thead>
        <tr>
            <td>@lang('site.time_req')</td>
            <td>@lang('site.time_req')</td>

        </tr>
        <tr>
            <td>@lang('site.location_req')</td>
            <td>@lang('site.location_req')</td>

        </tr>
        <tr>
            <td>@lang('site.type_l_req')</td>
            <td>@lang('site.type_l_req')</td>


        </tr>
        <tr>
            <td>@lang('site.id_req')</td>
            <td>@lang('site.id_req')</td>


        </tr>
        </thead>
    </table>
</div>
<div class="col-sm-6">
    <h5 style="float:right;" class="pt-5 pb-5">
        @lang('site.chef')<br>
        @lang('site.signature')
    </h5>
</div>
<div class="col-sm-6">
    <h5 style="float:left;" class="pt-5 pb-5">
        @lang('site.used')<br>
         @lang('site.gchef')<br>
          @lang('site.signature')
    </h5>
</div>
<div class="col-sm-6">
    <h5 style="margin: auto" class="pt-5 pb-5">
        @lang('site.used')<br>
         @lang('site.gchef')<br>
          @lang('site.signature')
    </h5>
</div>
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
</div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

</body>
</html>
