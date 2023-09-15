@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css"
          href="{{ $url}}{{app()->getLocale()}}/plugins/bootstrap-select/bootstrap-select.min.css">
    <style>


        .fixed-top {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
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
                                href="{{route('permissions.index')}}">@lang('site.permissions')</a></li>
                        <li class="breadcrumb-item "><a
                                href="{{route('permissions.edit',$permission->id)}}">@lang('site.edit')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('permissions.index') }}">
                    @lang('site.permission')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">

        {{--        @include('adminlte-templates::common.errors')--}}

        <div class="card">

            {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'patch', 'files' => true,'class' =>"needs-validation " ,'novalidate']) !!}

            <div class="card-body">
                <div class="row">
                    @include('permissions.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('permissions.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ $url}}{{app()->getLocale()}}/plugins/bootstrap-select/bootstrap-select.min.js"></script>

@endsection
