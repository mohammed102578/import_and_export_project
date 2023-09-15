@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('roles.index')}}">@lang('site.roles')</a></li>
                        <li class="breadcrumb-item "><a
                                href="{{route('roles.edit',$role->id)}}">@lang('site.edit')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('roles.index') }}">
                    @lang('site.role')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">

        {{--        @include('adminlte-templates::common.errors')--}}

        <div class="card">

            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch', 'files' => true,'class' =>"needs-validation " ,'novalidate']) !!}

            <div class="card-body">
                <div class="row">
                    @include('roles.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.selectall').click(function () {
                if ($(this).is(':checked')) {
                    $('div input').attr('checked', true);
                } else {
                    $('div input').attr('checked', false);
                }
            });
        });
    </script>
@endsection
