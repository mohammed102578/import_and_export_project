@extends('layouts.app')
@section('title')
    @lang('site.settings')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('settings.index')}}">@lang('site.settings')</a></li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>


    @include('flash::message')

    <div class="clearfix"></div>


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing layout-top-spacing">
        <div class="widget-content widget-content-area ">
            @include('settings.table')


        </div>

    </div>

@endsection

@section('scripts')
    @include('inc.datatables_js')
@endsection
