@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        @if (auth()->user()->type == 'vendor' || auth()->user()->type == 'branch')
                            <li class="breadcrumb-item active"><a
                                    href="{{route('users.vendors')}}">@lang('site.'.auth()->user()->type ) @lang('site.user' )</a>
                        @else
                            <li class="breadcrumb-item active"><a href="{{route('users.index')}}">@lang('site.users')</a>
                         @endif
                            </li>
                            <li class="breadcrumb-item "><a
                                    href="{{route('users.edit',$user->id)}}">@lang('site.edit')</a>
                            </li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('users.create') }}">
                    @lang('site.add')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="card-body">
                    <div class="row">


                        <div class="form-group col-sm-6">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>@lang('site.mobile')</label>
                            <input type="tel" name="mobile" class="form-control" value="{{  $user->mobile  }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                    @php
                        $type_arr=[];
                            if (auth()->user()->type=='super_admin' ){
                                $type_arr=['super_admin' => __('site.super_admin'), 'vendor' => __('site.vendor'), 'branch' => __('site.branch'), 'customer_service' => __('site.customer_service'), 'operation' => __('site.operation')];
                           } elseif (auth()->user()->type=='operation' ){
                                $type_arr=[ 'vendor' => __('site.vendor'), 'branch' => __('site.branch'), 'customer_service' => __('site.customer_service'), 'operation' => __('site.operation')];
                            } elseif (auth()->user()->type=='customer_service' ){
                                $type_arr=[ 'vendor' => __('site.vendor'), 'branch' => __('site.branch'), 'customer_service' => __('site.customer_service')];
                            } elseif  (auth()->user()->type=='vendor' ){
                                $type_arr=[ 'vendor' => __('site.vendor'), 'branch' => __('site.branch')];
                            } else{
                                $type_arr=[  'branch' => __('site.branch')];
                                }
                    @endphp
                    <!-- Type Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('type',  __('site.type')) !!}
                            <select class="form-control basic" name="type">
                                @foreach(\App\Models\Role::all() as $role)
                                    <option value="{{$role->name}}" {{$user->type==$role->name?'selected':''}}>{{__('site.'.$role->name)}}</option>
                                @endforeach
                            </select>
                            @error('type')<span class="text-danger">{{ $message }}</span>@enderror

                        </div><!-- Type Field -->

                        <div class="form-group col-md-6">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
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
{{--                <div class="form-group">--}}
{{--                    <label>@lang('site.permissions')</label>--}}

{{--                        @php--}}
{{--                            $models = ['users', 'categories', 'products', 'clients', 'orders'];--}}
{{--                            $maps = ['create', 'read', 'update', 'delete'];--}}
{{--                        @endphp--}}

{{--                        <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">--}}
{{--                            @foreach ($models as $index=>$model)--}}


{{--                                <li class="nav-item  {{ $index == 0 ? 'active' : '' }}"><a  class="nav-link " href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}

{{--                        <div class="tab-content">--}}

{{--                            @foreach ($models as $index=>$model)--}}

{{--                                <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">--}}

{{--                                    @foreach ($maps as $map)--}}
{{--                                        --}}{{--create_users--}}
{{--                                        <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission($map . '_' . $model) ? 'checked' : '' }} value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>--}}
{{--                                    @endforeach--}}

{{--                                </div>--}}

{{--                            @endforeach--}}

{{--                        </div><!-- end of tab content -->--}}


{{--                </div>--}}


                <div class="card-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                </div>

            </form><!-- end of form -->

        </div>
    </div>
@endsection
@section('scripts')
    @include('inc.file')
@endsection
