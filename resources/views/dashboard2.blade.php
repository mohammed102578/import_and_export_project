@extends('layouts.app')
@section('title')
    @lang('site.statistics')
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .table > thead > tr > th {
            font-size: 11px !important;

        }
        .svg-icon.search-icon {

            /*color: #f1f2f3;*/
            stroke: #ffffff;

            /*background-color: #f1f2f3;*/

            /* On hover: blue strokes */
        }
        .search-path {
            stroke: #ffffff;
        }

    </style>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('statistics')}}">@lang('site.statistics')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-8">

                <form action="{{route('statistics')}}" method="get">

                    <div class="form-row ">

                        <div class="col-sm-3">
                            <select data-placeholder="@lang('site.country') " class="form-control basic" name="country_id"  aria-describedby="inputGroupPrepend" required>
                                <option value=""> @lang('site.country')</option>
                                @foreach(\App\Models\Country::get() as $country)
                                    <option
                                        value="{{$country->id}}" {{request('country_id') == $country->id? 'selected' : '' }} >{{$country->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon5">@lang('site.from')</span>
                            <input type="date" name="from_date" class="form-control"
                                   placeholder="@lang('site.search')"
                                   value="{{ request()->from_date }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
{{--                            <label>@lang('site.to')</label>--}}
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon5">@lang('site.to')</span>

                            <input type="date" name="to_date" class="form-control"
                                   placeholder="@lang('site.search')"
                                   value="{{ request()->to_date }}">
                            </div>

                        </div>


                        <div class="col-sm-1">
{{--                            <label><br></label>--}}

                            <button type="submit" class="btn btn-primary form-control ">    <svg class="svg-icon search-icon" aria-labelledby="title desc" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.9 19.7"><title id="title">Search Icon</title><desc id="desc">A magnifying glass icon.</desc><g class="search-path" fill="none" stroke="#848F91"><path stroke-linecap="square" d="M18.5 18.3l-5.4-5.4"/><circle cx="8" cy="8" r="7"/></g></svg></button>


                        </div>

                    </div>
                </form><!-- end of form -->

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
                    <th>@lang('site.country')</th>
                    <th>@lang('site.Finance')</th>
                    <th>@lang('site.Drugs')</th>

                    <th>@lang('site.Admin')</th>
                    <th>@lang('site.Media')</th>
                    <th>@lang('site.status')</th>
{{--                    <th>@lang('site.action')</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach ($camps as $x=>$camp)
                    <tr id="row_{{$camp->id}}">
                        <td>{{ $x+1}}</td>
                        <td><div class="td-content product-brand text-danger">{{ $camp->name}}</div></td>
                        <td><div class="td-content product-brand text-danger">{{ $camp->country->name}}</div></td>
                        <td><div class="td-content product-brand text-warning">{{ $camp->financeFollowUp}}</div></td>
                        <td><div class="td-content product-brand text-warning">{{ $camp->drugsFollowUp}}</div></td>
                        <td><div class="td-content product-brand text-warning">{{ $camp->mediaFollowUp}}</div></td>
                        <td><div class="td-content product-brand text-warning">{{ $camp->adminFollowUp}}</div></td>
                        <td><span class="badge {{$camp->status==1?'badge-success':'badge-danger'}}">{{ $camp->status==1?__('site.active'):__('site.inActive') }}</span>
                        {{--                        <td>{{ $camp->user->name }}</td>--}}


                    </tr>

                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th style="visibility: hidden">#</th>
                    <th>@lang('site.name')</th>
                    <th>@lang('site.country')</th>
                    <th>@lang('site.Finance')</th>
                    <th>@lang('site.Drugs')</th>

                    <th>@lang('site.Admin')</th>
                    <th>@lang('site.Media')</th>
                    <th>@lang('site.status')</th>


{{--                </tr>--}}
                </tfoot>
            </table>
        </div>
    </div>



@endsection


@section('scripts')
    @include('inc.datatables_js')

@endsection
