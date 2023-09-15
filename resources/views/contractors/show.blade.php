@extends('layouts.app')

@section('style')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('contractors.index')}}">@lang('site.contractors')</a></li>
                        <li class="breadcrumb-item "><a href="#">@lang('site.show')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('contractors.index') }}">
                    @lang('site.contractor')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">


        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('contractors.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
