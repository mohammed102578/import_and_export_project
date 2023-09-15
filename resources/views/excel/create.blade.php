@extends('layouts.app')
@section('title')
    @lang('site.add')
@endsection
@section('style')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a href="#">@lang('site.file')</a></li>
                        <li class="breadcrumb-item "><a href="{{route('categories.create')}}">@lang('site.add')</a></li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>


    <div class="content px-3 layout-top-spacing" style="width:100%">

	@if (Session::has('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
				  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
				</svg>
			</button>
			{{ session('success') }}
		</div>
	@endif	

        <div class="card" style="width: 100%;display: block">

            {!! Form::open(['route' => 'uploadFile.store', 'files' => true,'class' =>"needs-validation " ,'novalidate']) !!}

            <div class="card-body">

                <div class="row">
                    @include('excel.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit(__('site.add'), ['class' => 'btn btn-primary']) !!}
            <a href="{{ asset('public/model/Model.xlsx') }}" class="btn btn-success">@lang('site.model')</a>
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
