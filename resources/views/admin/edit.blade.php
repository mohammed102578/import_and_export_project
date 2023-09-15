@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                            </li>
{{--                            <li class="breadcrumb-item "><a--}}
{{--                                    href="{{route('users.edit',$user->id)}}">@lang('site.edit')</a>--}}
{{--                            </li>--}}
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
{{--                <a class="btn btn-primary float-right"--}}
{{--                   href="{{ route('users.create') }}">--}}
{{--                    @lang('site.add')--}}
{{--                </a>--}}
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing col-sm-12">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <form action="{{route('admin.update')}}" method="post" enctype="multipart/form-data" class ="needs-validation"  novalidate >

                {{ csrf_field() }}
                {{ method_field('post') }}
                <div class="card-body">
                    <div class="row">



                        <div class="form-group col-sm-6">
                            <label>@lang('site.Salt')</label>
                            <input type="text" name="Salt" class="form-control" value="{{  $user->Salt  }}" aria-describedby="inputGroupPrepend" required>
                            <span class="invalid-feedback">@lang('site.required')</span>
                        </div>

                        <div class="form-group col-sm-6">
                            <label>@lang('site.Email')</label>
                            <input type="email" name="Email" class="form-control" value="{{ $user->Email }}" aria-describedby="inputGroupPrepend" required>
                            <span class="invalid-feedback">@lang('site.email_valid')</span>
                        </div>


                        <div class="form-group col-md-6">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control" autocomplete="new-password" aria-describedby="inputGroupPrepend"  minlength="6">
                            <span class="invalid-feedback">@lang('site.password_valid')</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control"  id="confirmPassword"  >
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
{{--                    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>--}}
                </div>

            </form><!-- end of form -->

        </div>
    </div>
@endsection
@section('scripts')
    @include('inc.file')
@endsection
