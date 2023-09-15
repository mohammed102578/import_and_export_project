@php $sd=0; @endphp
@if (isset($_GET['type']))
    @php
        $sd = $_GET['type'];
    @endphp
    @if ($_GET['type'] == 2)
        @php
            $requests = $requests_del;
        @endphp
    @endif
@endif
@php $data = \App\Models\Category::find($category_id); @endphp
<div class="table-responsive">


    <div class="card" style="width: 100%;display: block">


        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-4">
                    {!! Form::label('name', __('site.type')) !!}
                    <select class="form-control" name="idid" id="idid" onchange="myFunctionidid()"
                        style="padding: 0;">
                        <option value="0" @if ($sd == 0) Selected @endif>@lang('site.Select')
                        </option>
                        <option value="1"@if ($sd == 1) Selected @endif>{{ $data['name'] }}
                        </option>
                        <option value="2"@if ($sd == 2) Selected @endif>
                            {{ $data['name'] }} - {{ __('site.canceled_rq') }}</option>
                    </select>
                    <span class="invalid-feedback">@lang('site.required')</span>

                </div>
            </div>

        </div>


    </div>



    <table class="table" id="html5-extension">
        <thead>
            <tr>
                <th>#@lang('site.order_number')</th>

                @if ($category_id == 1)
                <th>@lang('site.management_name')</th>
                @else              
                  <th>@lang('site.project_name')</th>
                @endif
                <th>@lang('site.name_et')</th>
                <th>@lang('site.Ref')</th>
                <th>@lang('site.code')</th>
                <th>@lang('site.category')</th>
                <th>@lang('site.req_type')</th>
                @if ($category_id == 2 || $category_id == 1)
                    @if (auth()->user()->hasPermission('update_project_manager'))
                        <th>@lang('site.project_manager')</th>
                    @endif
                @endif
                @if ($category_id == 2 || $category_id == 1)

                    @if (auth()->user()->hasPermission('update_hse_manager'))
                        <th>@lang('site.HSE')</th>
                    @endif
                @endif

                @if ($category_id == 2 || $category_id == 1)

                    @if (auth()->user()->hasPermission('update_it_manager'))
                        <th>@lang('site.IT')</th>
                    @endif
                @endif


                @if ($category_id == 2 || $category_id == 1)

                    @if (auth()->user()->hasPermission('update_stock_manager'))
                        <th>@lang('site.Stock')</th>
                    @endif
                @endif

                @if ($category_id == 2 || $category_id == 1)

                    @if (auth()->user()->hasPermission('update_asset_manager'))
                        <th>@lang('site.Asset')</th>
                    @endif
                @endif

                @if ($category_id == 2 || $category_id == 1 || $category_id == 5)

                    @if (auth()->user()->hasPermission('update_cost_control_manager'))
                        <th>@lang('site.cost_control_manager')</th>
                    @endif
                @endif

                @if ($category_id == 2 ||  $category_id == 5)

                @if (auth()->user()->hasPermission('update_commercial_sector_manager'))
                
                    <th>@lang('site.commercial_sector_manager')</th>
                @endif
            @endif

            @if ($category_id == 1)

            @if (auth()->user()->hasPermission('update_cto_manager_notes'))
            
                <th>@lang('site.projects_manager')</th>
            @endif
        @endif

                <th>@lang('site.created_by')</th>
                <th>@lang('site.created_at')</th>
                <th>@lang('site.action')</th>
            </tr>
        </thead>
        <!------tbody----->

        <tbody>
            @foreach ($requests as $request)
                <tr id="row_{{ $request->id }}">

                    <td>{{ $request->id}}</td>
                    <td>{{ $request->title }}</td>
                    <td>{{ $request->name }}</td>
                    <td>{{ $request->ref }}</td>
                    <td>{{ $request->code }}</td>
                    <td>{{ $request->category->name }}</td>
                    <td>{{ $request->type_req }}</td>




                    @if ($category_id == 2 || $category_id == 1)
                        @if (auth()->user()->hasPermission('update_project_manager'))
                            <td id="project-{{ $request->id }}">{{ $request->project_manager_name }}</td>
                        @endif
                    @endif

                    @if ($category_id == 2 || $category_id == 1)
                        @if (auth()->user()->hasPermission('update_hse_manager'))
                            <td id="HSE-{{ $request->id }}">{{ $request->hse_manager_name }}</td>
                        @endif
                    @endif


                    @if ($category_id == 2 || $category_id == 1)
                        @if (auth()->user()->hasPermission('update_it_manager'))
                            <td id="IT-{{ $request->id }}">{{ $request->it_manager_name }}</td>
                        @endif
                    @endif

                    @if ($category_id == 2 || $category_id == 1)
                        @if (auth()->user()->hasPermission('update_stock_manager'))
                            <td id="stock-{{ $request->id }}">{{ $request->stock_manager_name }}</td>
                        @endif
                    @endif

                    @if ($category_id == 2 || $category_id == 1)
                        @if (auth()->user()->hasPermission('update_asset_manager'))
                            <td id="asset-{{ $request->id }}">{{ $request->asset_manager_name }}</td>
                        @endif
                    @endif

                    @if ($category_id == 2 || $category_id == 1 || $category_id == 5)
                        @if (auth()->user()->hasPermission('update_cost_control_manager'))
                            <td id="cost_control-{{ $request->id }}">{{ $request->cost_control_manager_name }}</td>
                        @endif
                    @endif

                  

            @if ($category_id == 2 ||  $category_id == 5)
              @if (auth()->user()->hasPermission('update_commercial_sector_manager'))
                            <td id="commercial_sector-{{ $request->id }}">{{ $request->commercial_sector_manager_name }}</td>
                        @endif
                @endif

                @if ($category_id == 1)
                @if (auth()->user()->hasPermission('update_cto_manager_notes'))
                            <td id="cto-{{ $request->id }}">{{ $request->cto_manager_name }}</td>
                        @endif
                       @endif








                    <td class="text-center">{{ $request->createdBy->name }}</td>
                    <td class="text-center">{{ $request->created_at->toDateString() }}</td>
                    <td class="text-center">
                        @if ((isset($_GET['type']) && $_GET['type'] != 2) || !isset($_GET['type']))
                            <div class="btn-group">
                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                                    style="min-width: 100px" onclick="setHeight()" id="dropdownMenuReference5"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    data-reference="parent">
                                    {{ __('site.action') }} <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference5"
                                    style="will-change: transform;height: 200px;overflow-y: auto;">
                                    <a href="{{ route('items.print', $request->id) }}" class="bs-tooltip dropdown-item"
                                        title="@lang('site.print') ">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-eye text-success">
                                            <path
                                                d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                            <path
                                                d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        {{ __('site.print') }}
                                    </a>
                                    <a href="{{ route('items.index', $request->id) }}" class="bs-tooltip dropdown-item"
                                        title="@lang('site.show') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-eye text-danger">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        {{ __('site.show') }}
                                    </a>
                                    <div class="dropdown-divider"></div>

                                    <a href="{{ route('requests.edit', [$request->category->id, $request->id]) }}"
                                        class="bs-tooltip dropdown-item" title="@lang('site.edit') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-check-circle text-primary">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        {{ __('site.edit') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#"
                                        onclick="sweet_delete(' {{ route('requests.destroy', [$request->category->id, $request->id]) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $request->id }} )"
                                        class="bs-tooltip dropdown-item" title="@lang('site.delete') ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x-circle text-danger">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15">
                                            </line>
                                            <line x1="9" y1="9" x2="15" y2="15">
                                            </line>
                                        </svg>
                                        {{ __('site.delete') }}
                                    </a>
                                    <div class="dropdown-divider"></div>





                                    @if ($category_id == 2 || $category_id == 1)
                                        @if (auth()->user()->hasPermission('update_project_manager'))
                                            <a class="dropdown-item" href="#"
                                                onclick="addEvent('{{ $request->id }}','project','{{ $request->project_manager }}','{{ __('site.project_manager') }}')">{{ __('site.project_manager') }}</a>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                    @endif


                                    @if ($category_id == 2 || $category_id == 1)
                                        @if (auth()->user()->hasPermission('update_hse_manager'))
                                            <a class="dropdown-item" href="#"
                                                onclick="addEvent('{{ $request->id }}','HSE','{{ $request->hse_manager }}','{{ __('site.hse_manager') }}')">{{ __('site.hse_manager') }}</a>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                    @endif


                                    @if ($category_id == 2 || $category_id == 1)
                                        @if (auth()->user()->hasPermission('update_it_manager'))
                                            <a class="dropdown-item" href="#"
                                                onclick="addEvent('{{ $request->id }}','IT','{{ $request->it_manager }}','{{ __('site.it_manager') }}')">{{ __('site.it_manager') }}</a>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                    @endif


                                    @if ($category_id == 2 || $category_id == 1)
                                        @if (auth()->user()->hasPermission('update_stock_manager'))
                                            <a class="dropdown-item" href="#"
                                                onclick="addEvent('{{ $request->id }}','stock','{{ $request->stock_manager }}','{{ __('site.stock_manager') }}')">{{ __('site.stock_manager') }}</a>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                    @endif


                                    @if ($category_id == 2 || $category_id == 1)
                                        @if (auth()->user()->hasPermission('update_asset_manager'))
                                            <a class="dropdown-item" href="#"
                                                onclick="addEvent('{{ $request->id }}','asset','{{ $request->asset_manager }}','{{ __('site.asset_manager') }}')">{{ __('site.asset_manager') }}</a>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                    @endif

                                    @if ($category_id == 2 || $category_id == 1 || $category_id == 5)
                                        @if (auth()->user()->hasPermission('update_cost_control_manager'))
                                            <a class="dropdown-item" href="#"
                                                onclick="addEvent('{{ $request->id }}','cost_control','{{ $request->cost_control_manager }}','{{ __('site.cost_control_manager') }}')">{{ __('site.cost_control_manager') }}</a>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                    @endif
                                  
                                 

                                    @if ($category_id == 2 ||  $category_id == 5)
                                    @if (auth()->user()->hasPermission('update_commercial_sector_manager'))
                                    <a class="dropdown-item" href="#"
                                        onclick="addEvent('{{ $request->id }}','commercial_sector','{{ $request->commercial_sector_manager }}','{{ __('site.commercial_sector_manager') }}')">{{ __('site.commercial_sector_manager') }}</a>
                                @endif
                                      @endif
                      
                                      @if ($category_id == 1)
                      
                                      @if (auth()->user()->hasPermission('update_cto_manager_notes'))
                                      <a class="dropdown-item" href="#"
                                          onclick="addEvent('{{ $request->id }}','cto','{{ $request->cto_manager }}','{{ __('site.cto_manager') }}')">{{ __('site.cto_manager') }}</a>
                                  @endif
                                  @endif



                                </div>
                            </div>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>



        <!------tfoot----->
        <tfoot>

            <tr>
                <th>#@lang('site.order_number')</th>

                @if ($category_id == 1)
                <th>@lang('site.management_name')</th>
                @else              
                <th>@lang('site.name')</th>
                @endif
                <th>@lang('site.name_et')</th>
                <th>@lang('site.Ref')</th>
                <th>@lang('site.code')</th>
                <th>@lang('site.category')</th>
                <th>@lang('site.req_type')</th>
                @if ($category_id == 2 || $category_id == 1)
                    @if (auth()->user()->hasPermission('update_project_manager'))
                        <th>@lang('site.project_manager')</th>
                    @endif
                @endif
                @if ($category_id == 2 || $category_id == 1)

                    @if (auth()->user()->hasPermission('update_hse_manager'))
                        <th>@lang('site.HSE')</th>
                    @endif
                @endif

                @if ($category_id == 2 || $category_id == 1)

                    @if (auth()->user()->hasPermission('update_it_manager'))
                        <th>@lang('site.IT')</th>
                    @endif
                @endif


                @if ($category_id == 2 || $category_id == 1)

                    @if (auth()->user()->hasPermission('update_stock_manager'))
                        <th>@lang('site.Stock')</th>
                    @endif
                @endif

                @if ($category_id == 2 || $category_id == 1)

                    @if (auth()->user()->hasPermission('update_asset_manager'))
                        <th>@lang('site.Asset')</th>
                    @endif
                @endif

                @if ($category_id == 2 || $category_id == 1 || $category_id == 5)

                    @if (auth()->user()->hasPermission('update_cost_control_manager'))
                        <th>@lang('site.cost_control_manager')</th>
                    @endif
                @endif

                @if ($category_id == 2 ||  $category_id == 5)

                    @if (auth()->user()->hasPermission('update_commercial_sector_manager'))
                    
                        <th>@lang('site.commercial_sector_manager')</th>
                    @endif
                @endif

                @if ($category_id == 1)

                @if (auth()->user()->hasPermission('update_cto_manager_notes'))
                
                    <th>@lang('site.projects_manager')</th>
                @endif
            @endif



                <th>@lang('site.created_by')</th>
                <th>@lang('site.created_at')</th>
                <th>@lang('site.action')</th>
            </tr>
        </tfoot>
        <tbody>
    </table>
</div>
