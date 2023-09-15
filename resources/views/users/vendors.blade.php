@extends('layouts.app')

@section('content')
<style>
    .table > thead > tr > th {
        font-size: 11px !important;

    }
</style>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('users.index')}}">@lang('site.vendors')</a></li>
                    </ol>
                </nav>
            </div>


        </div>
    </div>


    @include('flash::message')

    <div class="clearfix"></div>


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing layout-top-spacing">
        <div class="widget-content widget-content-area ">
            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('site.name')</th>
                    <th>@lang('site.email')</th>
                    <th>@lang('site.mobile')</th>
                    <th>@lang('site.type')</th>

                    <th>@lang('site.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $index=>$user)
                    <tr id="row_{{$user->id}}">
                        <td>{{ $index + 1 }}</td>
                        <td class="text-center"><a href="{{ route('users.show', $user->id) }}"><span
                                    class="badge badge-success">{{ $user->full_name }}</span></a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->type }}</td>

                        <td class="text-center">

                            <ul class="table-controls">

                                <li><a href="{{ route('users.show', $user->id).'?type='.auth()->user()->type }}" class="bs-tooltip"
                                       title="@lang('site.show') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-eye text-danger">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </a></li>
                                <li><a href="{{ route('users.edit', $user->id) }}" class="bs-tooltip"
                                       title="@lang('site.edit') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-check-circle text-primary">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </a></li>
                                <li><a href="#"
                                       onclick="sweet_delete( ' {{ route('users.destroy',$user->id) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $user->id }} )"
                                       class="bs-tooltip" title="@lang('site.delete') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-x-circle text-danger">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </a></li>

                            </ul>


                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>
        </div>
    </div>





@endsection

@section('scripts')
    @include('inc.datatables_js')
@endsection
