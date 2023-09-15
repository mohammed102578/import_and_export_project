@extends('layouts.app')

@section('style')

@endsection
@section('content')
@php $data = \App\Models\Category::find($category_id); @endphp
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('requests.index',$category_id)}}">@lang('site.requests')</a></li>
                        <li class="breadcrumb-item "><a href="{{route('requests.create',$category_id)}}">@lang('site.add')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('requests.index',$category_id) }}">
                    {{ $data['name'] }}
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing container-fluid">

{{--        @include('adminlte-templates::common.errors')--}}

        <div class="card" style="width: 100%;display: block">

            {!! Form::open(['route' => ['requests.store',$category_id], 'files' => true,'class' =>"needs-validation " ,'novalidate']) !!}
 
            <div class="card-body">

                <div class="row">
                    @include('requests.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit(__('site.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('requests.index',$category_id) }}" class="btn btn-default">{{__('site.cancel')}}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    @include('partials.repeeter')
    @include('inc.datatables_js')
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
