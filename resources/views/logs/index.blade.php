@extends('layouts.app')
@section('title')
    @lang('site.logs')
@endsection
@section('style')
    <link href="{{$url}}{{app()->getLocale()}}/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <style>
        .modal-header{
            padding: 0px 0px;
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
                                href="{{route('logs.index')}}">@lang('site.logs')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('logs.create') }}">
                    @lang('site.add')
                </a>
            </div>
        </div>
    </div>


    @include('flash::message')

    <div class="clearfix"></div>


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing layout-top-spacing">
        <div class="widget-content widget-content-area ">
            @include('logs.table')


        </div>

    </div>

@endsection

@section('scripts')
    @include('inc.datatables_js')
@endsection
