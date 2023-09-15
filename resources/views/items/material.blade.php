<style>
    th {
        font-size: 10px !important;
    }
</style>
<div class="">

    <table class="" id="html5-extension2" border="1">

        <caption>
            <div class="row">
                <div class="col-md-4">
                </div>
                <h2 style="text-align: center"> {{$request->category->name}} </h2>

            </div>
            <div class="row mr-2 ml-3 " style="border: solid #c9cccf">

                <div
                    class="col-md-2">{{$request->category->id ==2?__('site.req_by') : __('site.req_by') .' : '}} </div>

                <div class="col-md-1"> {{ $request->name }}</div>
                <div class="col-md-2">{{__('site.name_et') .' : '}}</div>
                <div class="col-md-1"> {{ $request->name_et }}</div>
                <div class="col-md-1">{{__('site.request_number') .' : '}}</div>
                <div class="col-md-1"> {{ $request->id }}</div>
                <div class="col-md-2">{{ __('site.request_date').' : '}}</div>
                <div class="col-md-2">{{ date('d-m-Y',strtotime($request->created_at))}}</div>

                <div class="col-md-2 mt-1 mb-1">{{__('site.code') .' : '}}</div>
                <div class="col-md-2 mt-1 mb-1"> {{ $request->code }}</div>
                <div class="col-md-2">{{__('site.project_name') .' : '}}</div>
                <div class="col-md-1"> {{ $request->title }}</div>
                <div class="col-md-2">{{ __('site.ref').' : '}}</div>
                <div class="col-md-2">{{ $request->ref }}</div>


                </dev>
            </div>
        </caption>

        <thead>
        <tr>
            <th>@lang('site.id') </th>

            <th>@lang('site.date of supply')</th>
            <th>@lang('site.operation_manager_notes')</th>
            <th>@lang('site.cto_manager_notes')</th>
            <th>@lang('site.general_manager_notes')</th>
            <th>@lang('site.returned_qty')</th>
            <th>@lang('site.supplier')</th>
            <th>@lang('site.asset_manager_notes')</th>
            <th>@lang('site.stock_manager_notes')</th>
            <th>@lang('site.hse_manager_notes')</th>
            <th>@lang('site.it_manager_notes')</th>
            <th>@lang('site.signature_notes')</th>
            <th>@lang('site.date of supply required')</th>

            <th>@lang('site.total')</th>
            <th>@lang('site.total')</th>
            <th>@lang('site.unit')</th>
            <th>@lang('site.qty')</th>
            <th>@lang('site.price')</th>
            <th>@lang('site.classification_name')</th>
            <th>@lang('site.code')</th>
            <th>@lang('site.management_name')</th>
            <th>@lang('site.project_name')</th>
            <th>@lang('site.request_number')</th>


            <th>@lang('site.action')</th>

        </tr>
        </thead>
        <tbody>

        @foreach($items as $x=>$item)

            <tr id="row_{{$item->id}}">
                <td>{{$x+1}} </td>

                <td>{{$item->start_date}}</td>
                <td id="{{'operation_manager_notes'.$item->id}}">{{$item->operation_manager_notes}}</td>
                <td id="{{'cto_manager_notes'.$item->id}}">{{$item->cto_manager_notes}}</td>
                <td id="{{'general_manager_notes'.$item->id}}">{{$item->general_manager_notes}}</td>
                <td >{{$item->returned_qty}}</td>
                <td>{{$item->supplier}}</td>
                <td id="{{'asset_manager_notes'.$item->id}}">{{$item->asset_manager_notes}}</td>
                <td id="{{'stock_manager_notes'.$item->id}}">{{$item->stock_manager_notes}}</td>
                <td id="{{'hse_manager_notes'.$item->id}}">{{$item->hse_manager_notes}}</td>
                <td id="{{'it_manager_notes'.$item->id}}">{{$item->it_manager_notes}}</td>
                <td id="{{'signature_notes'.$item->id}}">{{$item->signature_notes}}</td>
                <td>{{$item->end_date}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->unit}}</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->code}}</td>
                <td>{{$item->management_name}}</td>
                <td>{{$request->name}}</td>
                <td>{{$request->code}}</td>

                <td class="text-center">

                    <ul class="table-controls">



                    </ul>

                    <div class="btn-group">
                        <button type="button" class="btn btn-dark btn-sm">Open</button>
                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference5" style="will-change: transform;">
                            <a href="{{ route('items.edit', [$request_id,$item->id]) }}" class="bs-tooltip dropdown-item"
                               title="@lang('site.edit') ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-check-circle text-primary">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                {{__('site.delete')}}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#"
                               onclick="sweet_delete( ' {{ route('items.destroy',[$request_id,$item->id]) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $item->id }} )"
                               class="bs-tooltip dropdown-item" title="@lang('site.delete') ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-x-circle text-danger">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                                {{__('site.delete')}}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="#" onclick="addEvent('{{$item->id}}','operation_manager_notes','{{$item->operation_manager_notes}}','{{__('site.cto_manager_notes')}}')">{{__('site.operation_manager_notes')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"  onclick="addEvent('{{$item->id}}','cto_manager_notes','{{$item->cto_manager_notes}}','{{__('site.cto_manager_notes')}}')">{{__('site.cto_manager_notes')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"  onclick="addEvent('{{$item->id}}','general_manager_notes','{{$item->general_manager_notes}}','{{__('site.general_manager_notes')}}')">{{__('site.general_manager_notes')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"  onclick="addEvent('{{$item->id}}','asset_manager_notes','{{$item->asset_manager_notes}}','{{__('site.asset_manager_notes')}}')">{{__('site.asset_manager_notes')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"  onclick="addEvent('{{$item->id}}','stock_manager_notes','{{$item->stock_manager_notes}}','{{__('site.stock_manager_notes')}}')">{{__('site.stock_manager_notes')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"  onclick="addEvent('{{$item->id}}','hse_manager_notes','{{$item->hse_manager_notes}}','{{__('site.hse_manager_notes')}}')">{{__('site.hse_manager_notes')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"href="#"   onclick="addEvent('{{$item->id}}','it_manager_notes','{{$item->it_manager_notes}}','{{__('site.it_manager_notes')}}')">{{__('site.it_manager_notes')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"   onclick="addEvent('{{$item->id}}','signature_notes','{{$item->signature_notes}}','{{__('site.signature_notes')}}')">{{__('site.signature_notes')}}</a>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>@lang('site.id') </th>

            <th>@lang('site.date of supply')</th>
            <th>@lang('site.operation_manager_notes')</th>
            <th>@lang('site.cto_manager_notes')</th>
            <th>@lang('site.general_manager_notes')</th>
            <th>@lang('site.returned_qty')</th>
            <th>@lang('site.supplier')</th>
            <th>@lang('site.asset_manager_notes')</th>
            <th>@lang('site.stock_manager_notes')</th>
            <th>@lang('site.hse_manager_notes')</th>
            <th>@lang('site.it_manager_notes')</th>
            <th>@lang('site.signature_notes')</th>
            <th>@lang('site.date of supply required')</th>

            <th>@lang('site.total')</th>
            <th>@lang('site.total')</th>
            <th>@lang('site.unit')</th>
            <th>@lang('site.qty')</th>
            <th>@lang('site.price')</th>
            <th>@lang('site.classification_name')</th>
            <th>@lang('site.code')</th>
            <th>@lang('site.management_name')</th>
            <th>@lang('site.project_name')</th>
            <th>@lang('site.request_number')</th>


            <th>@lang('site.action')</th>

        </tr>
        </tfoot>
    </table>

</div>
