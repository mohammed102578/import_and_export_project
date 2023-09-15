
@include('inc.styles')
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
    @page 
    {
      size: A4;
      margin: 0;
    }
    @media print {
    html, body {
    width:110%;
    height:auto;
    margin:auto;
    padding:0;
    }
    </style>
<script type="text/javascript">

    window.print();

</script>
<title>@lang('site.report')</title>

<div class="main-content">
<div class="row layout-top-spacing">
    <div class="row mr-1 ml-1 mt-0">
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
                </div>
            </div>
        </div>
    </div>

   </div>

</div>

