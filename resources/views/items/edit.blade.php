@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('items.index',$request_id)}}">@lang('site.items')</a></li>
                        <li class="breadcrumb-item "><a
                                href="{{route('items.edit',[$request_id,$item->id])}}">@lang('site.edit')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('items.index',$request_id) }}">
                    @lang('site.item')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">

        {{--        @include('adminlte-templates::common.errors')--}}

        <div class="card">

            {!! Form::model($item, ['route' => ['items.update', [$request_id,$item->id]], 'method' => 'patch', 'files' => true,'class' =>"needs-validation " ,'novalidate']) !!}

            <div class="card-body">
                <div class="row">
                    @include('items.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('items.index',$request_id) }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.config.language =  "{{ app()->getLocale() }}";

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
