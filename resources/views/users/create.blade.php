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
                                href="{{route('users.index')}}">@lang('site.users')</a></li>
                        <li class="breadcrumb-item "><a href="{{route('users.create')}}">@lang('site.add')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('users.index') }}">
                    @lang('site.vendor')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">

        {{--        @include('adminlte-templates::common.errors')--}}

        <div class="card">

            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('post') }}
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <!-- Type Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('type',  __('site.type')) !!}
                            <select class="form-control basic" name="type">
                                @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->name}}">{{__('site.'.$role->name)}}</option>
                                    @endforeach
                            </select>
                            @error('type')<span class="text-danger">{{ $message }}</span>@enderror

                        </div><!-- Type Field -->

                        <div class="form-group col-md-6">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror

                        </div>
                        <div class="form-group col-md-6">
                            <label>@lang('site.mobile')</label>
                            <input type="mobile" name="mobile" class="form-control" value="{{ old('mobile') }}">
                            @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror

                        </div>


                        <div class="form-group col-md-6">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror

                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror


                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-sm-12">
                            <div class="custom-file-container" data-upload-id="myFirstImage">

                                <label>@lang('site.avatar') <a href="javascript:void(0)"
                                                               class="custom-file-container__image-clear"
                                                               title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                           name="avatar"
                                           accept="image/*">
                                    <input type="hidden" value="10485760"/>
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror

                                </label>
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                    @isset($user)
                                        <div class="form-group col-sm-3">

                                            <a href="{{$user->avatar_path}}" target="_blank"
                                               data-lightbox="mygallery">
                                                <img src="{{$user->avatar_path}}"

                                                     class="img-thumbnail custom-file-container__image-preview " alt="">
                                            </a>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </form><!-- end of form -->

        </div><!-- end of box body -->

    </div><!-- end of box -->



@endsection
@section('scripts')
    @include('inc.file')
@endsection
