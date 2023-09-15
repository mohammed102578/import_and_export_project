@extends('layouts.app')
<style>
    .layout-top-spacing {
        margin-top: 20px;
        width: 100%;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('settings.index')}}">@lang('site.settings')</a></li>
                        <li class="breadcrumb-item "><a
                                href="{{route('settings.edit',$setting->id)}}">@lang('site.edit')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('settings.index') }}">
                    @lang('site.setting')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">

        {{--        @include('adminlte-templates::common.errors')--}}

        <div class="card">

            {!! Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch', 'files' => true,'class' =>"needs-validation " ,'novalidate']) !!}

            <div class="card-body">
                <div class="row">
                    @include('settings.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('settings.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('scripts')
    @include('inc.file')
@endsection
