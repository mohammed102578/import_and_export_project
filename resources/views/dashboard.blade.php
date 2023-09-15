@extends('layouts.app')
@section('title')
    @lang('site.dashboard')
@endsection

@section('style')

    <link href="{{ $url}}{{app()->getLocale()}}/assets/css/widgets/modules-widgets.css" rel="stylesheet"
          type="text/css"/>
    <style>
        .widget-account-invoice-two .account-box .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            height: 70px;
            /*margin-bottom: 86px;*/
        }

        #content {
            margin-top: 70px !important;
        }
        .balance-credited{
            min-width: 80px;
        }

    </style>
@endsection
@section('content')
    @include('partials._errors')
    <div class="container-fluid" style="display:none;">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('report') }}">
                    @lang('site.report')
                </a>
            </div>
        </div>
    </div>
{{--    <div class="row layout-top-spacing">--}}
{{--        <div class="row mr-1 ml-1 mt-0">--}}

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info">
                                <div class="inv-title">
                                    <h5 class="">{{__('site.users')}} </h5>
                                </div>
                                <div class="inv-balance-info">
                                    <p class="inv-balance">{{\App\Models\User::count()}}</p>
                                    <span class="inv-stats balance-credited">@lang('site.user')</span>
                                </div>
                            </div>
                            <div class="acc-action">
                                <div class="">

                                    <a href="{{route('users.index')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </a>
                                </div>
                                <a href="{{route('users.index')}}">@lang('site.index')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php $categoryx = (\App\Models\Category::where('id',1)->first()); @endphp
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info">
                                    <div class="inv-title">
                                        <h5 class="">{{$categoryx->name}} @lang('site.Pending')</h5>
                                    </div>
                                    <div class="inv-balance-info">
                                        <p class="inv-balance">{{ $categoryx->requests()->orWhere('category_id', '!=', 1)->orWhere('hse_manager', '!=', 1)->orWhere('stock_manager', '!=', 1)->orWhere('cost_control_manager', '!=', 1)->orWhere('commercial_sector_manager', '!=', 1)->orWhere('it_manager', '!=', 1)->orWhere('asset_manager', '!=', 1)->count() }}</p>
                                        <span class="inv-stats balance-credited">@lang('site.request')</span>
                                    </div>
                                </div>
                                <div class="acc-action">
                                    <div class="">

                                        <a href="{{route('requests.create',$categoryx->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </a>
                                    </div>
                                    <a href="{{route('requests.index',$categoryx->id)}}">@lang('site.index')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @foreach(\App\Models\Category::get() as $category)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info">
                                    <div class="inv-title">
                                        <h5 class="">{{$category->name}} </h5>
                                    </div>
                                    <div class="inv-balance-info">
                                        <p class="inv-balance">{{$category->requests()->count()}}</p>
                                        <span class="inv-stats balance-credited">@lang('site.request')</span>
                                    </div>
                                </div>
                                <div class="acc-action">
                                    <div class="">

                                        <a href="{{route('requests.create',$category->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </a>
                                    </div>
                                    <a href="{{route('requests.index',$category->id)}}">@lang('site.index')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-account-invoice-two">
            <div class="widget-content">
                <div class="account-box">
                    <div class="info">
                        <div class="inv-title">
                            <h5 class="">{{__('site.categories')}} </h5>
                        </div>
                        <div class="inv-balance-info">
                            <p class="inv-balance">{{\App\Models\Category::count()}}</p>
                            <span class="inv-stats balance-credited">@lang('site.category')</span>
                        </div>
                    </div>
                    <div class="acc-action">
                        <div class="">

                            <a href="{{route('categories.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                        </div>
                        <a href="{{route('categories.index')}}">@lang('site.index')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-account-invoice-two">
            <div class="widget-content">
                <div class="account-box">
                    <div class="info">
                        <div class="inv-title">
                            <h5 class="">{{__('site.suppliers')}} </h5>
                        </div>
                        <div class="inv-balance-info">
                            <p class="inv-balance">{{\App\Models\Supplier::count()}}</p>
                            <span class="inv-stats balance-credited">@lang('site.supplier')</span>
                        </div>
                    </div>
                    <div class="acc-action">
                        <div class="">

                            <a href="{{route('suppliers.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                        </div>
                        <a href="{{route('suppliers.index')}}">@lang('site.index')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 layout-spacing" style="display:none;">
        <div class="widget widget-account-invoice-two">
            <div class="widget-content">
                <div class="account-box">
                    <div class="info">
                        <div class="inv-title">
                            <h5 class="">{{__('site.contractors')}} </h5>
                        </div>
                        <div class="inv-balance-info">
                            <p class="inv-balance">{{\App\Models\Contractor::count()}}</p>
                            <span class="inv-stats balance-credited">@lang('site.contractor')</span>
                        </div>
                    </div>
                    <div class="acc-action">
                        <div class="">

                            <a href="{{route('contractors.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                        </div>
                        <a href="{{route('contractors.index')}}">@lang('site.index')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing layout-top-spacing">
        <div class="widget-content widget-content-area ">

            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">{{__('site.latest_request')}}</h5>
                </div>

                <div class="widget-content">

            <table class="table table-hover table-dark mb-4">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('site.name')</th>
                    <th>@lang('site.category')</th>
                    <th>@lang('site.item')</th>
                    <th>@lang('site.created_at')</th>

                    <th>@lang('site.code')</th>
                    <th>@lang('site.ref')</th>
                                        <th>@lang('site.action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach (\App\Models\Request::latest()->get() as $x=>$request)
                    <tr id="row_{{$request->id}}">
                        <td>{{ $x+1}}</td>
                        <td><div class="td-content product-brand text-success">{{ $request->name}}</div></td>
                        <td><a href="{{route('requests.index',[$request->category->id])}}"><span class="badge badge-danger">{{ $request->category->name}}</span></a></td>
                        <td><a href="{{route('items.index',[$request->id])}}"> <span class="badge badge-success">{{ $request->items()->count()}}</span></a></td>
                        <td><span class="badge badge-round badge-warning"> {{ $request->created_at->toDateString()}}</span></td>
                        <td><div class="td-content product-brand text-white">{{ $request->code}}</div></td>
                        <td><div class="td-content product-brand text-warning">{{ $request->ref}}</div></td>
                        <td class="text-center">

                          <a href="{{ route('items.index', $request->id) }}" class="bs-tooltip"

                                       title="@lang('site.show') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-eye text-success">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </a><a href="{{ route('requests.edit', [$request->category->id,$request->id]) }}" class="bs-tooltip"
                                       title="@lang('site.edit') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-check-circle text-white">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </a><a href="#"
                                       onclick="sweet_delete( ' {{ route('requests.destroy',[$request->category->id,$request->id]) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $request->id }} )"
                                       class="bs-tooltip" title="@lang('site.delete') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-x-circle text-warning">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </a>




                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>
                </div>
            </div>
        </div>
    </div>




    {{--        </div>--}}


{{--    </div>--}}


@endsection
