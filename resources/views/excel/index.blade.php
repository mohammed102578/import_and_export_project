@extends('layouts.app')
@section('title')
    @lang('site.kind_h')
@endsection
@section('content')
<style>
    .table > thead > tr > th {
        font-size: 11px !important;

    }
</style>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('users.index')}}">@lang('site.kind_h')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('uploadFile.index') }}">
                    @lang('site.add')
                </a>
            </div>

        </div>
    </div>


    @include('flash::message')

    <div class="clearfix"></div>


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing layout-top-spacing">
        <div class="widget-content widget-content-area ">
            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('site.id')</th>
                    <th>@lang('site.kind_h')</th>
                    <th>@lang('site.code_c')</th>
                    <th>@lang('site.type_c')</th>
                    <th>@lang('site.action')</th>
                </tr>
                </thead>
                <tbody>
                @php $i=0; @endphp
                @foreach ($cats as $index=>$cat)
                @php $i++; @endphp
                    <tr id="row_{{$cat->id}}">
                        <td>{{ $i }}</td>
                        <td>{{ $cat->title }}</td>
                        <td>{{ $cat->section }}</td>
                        <td>{{ $cat->type }}</td>

                        <td class="text-center">

                            <ul class="table-controls">


                                <li><a href="#"
                                       onclick="sweet_delete( ' {{ route('cats.destroy',$cat->id_p) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $cat->id }} )"
                                       class="bs-tooltip" title="@lang('site.delete') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-x-circle text-danger">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </a></li>

                            </ul>


                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>
        </div>
    </div>





@endsection

@section('scripts')
    @include('inc.datatables_js')
@endsection
