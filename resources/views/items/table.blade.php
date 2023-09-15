<div class="table-responsive">

    <table class="table" id="html5-extension2" border="1">

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
            @if($request->category->id !=3&&$request->category->id !=4)
                @if($request->category->id ==1 || $request->category->id ==5)    
                <th>  @lang('site.kind_of')  </th>
                @else 
                <th> @lang('site.name') </th>
                @endif
            @endif
            @if($request->category->id ==1 || $request->category->id ==5)
                <th>@lang('site.category_code') </th>
            @endif
            @if($request->category->id ==4)
                <th>@lang('site.terms_code')</th>
            @endif
            @if($request->category->id ==4)
                <th>@lang('site.terms')</th>
            @endif
            @if($request->category->id !=4)
                <th>{{$request->category->id==3?__('site.business statement'):__('site.description')}}</th>
            @endif
            @if(1)
            <th>@lang('site.unit')</th>
            @endif
            @if(1)
            <th>@lang('site.qty')</th>
            @endif
            @if(1)
            <th>@lang('site.contractual_qty')</th>
            @endif

                @if($request->category->id ==3||$request->category->id ==1||$request->category->id ==4)
                    <th>@lang('site.price')</th>
            @endif
            @if($request->category->id ==3||$request->category->id ==1)

            <th>@lang('site.total')</th>
                @endif
            @if($request->category->id ==2)
                <th>@lang('site.code')</th>
            @endif
            @if($request->category->id !=3 || $request->category->id !=4 )
                <th>@lang('site.terms_code')</th>
            @endif
                @if($request->category->id ==1||$request->category->id ==2)
                    <th>@lang('site.date of supply')</th>
            @endif
            @if($request->category->id ==4)
                <th>@lang('site.start_date')</th>
            @endif
            @if($request->category->id ==4)
                <th>@lang('site.end_date')</th>
            @endif
            @if($request->category->id ==1)
                    <th>@lang('site.notes')</th>
            @endif

            <th>@lang('site.action')</th>

        </tr>
        </thead>
        <tbody>

        @foreach($items as $x=>$item)

            <tr id="row_{{$item->id}}">
                <td>{{ $x+1 }}</td>
                @if($request->category->id !=3&&$request->category->id !=4)
                    <td>{{$item->name}} </td>
                @endif
                @if($request->category->id ==1 || $request->category->id ==5)
                <td>{{$item->category_code}} </td>
                @endif
                @if($request->category->id ==4)
                    <td> {{$item->terms_code}}</td>
                @endif
                @if($request->category->id ==4)
                    <td>{{$item->terms}}</td>
                @endif
                @if($request->category->id !=4)
                    <td>{!! $item->description !!}</td>
                @endif
                @if(1)
                    <td>{!! $item->unit !!}</td>
                @endif
                @if(1)
                    <td>{!! $item->qty !!}</td>
                @endif
                @if(1)
                    <td>{!! $item->contractual_qty !!}</td>
                @endif

                @if($request->category->id ==3||$request->category->id ==1||$request->category->id ==4)
                    <td>{!! $item->price !!}</td>
                @endif
                @if($request->category->id ==3||$request->category->id ==1)
                    <td>{!! $item->total !!}</td>
                @endif
                @if($request->category->id ==2)
                    <td>{!! $item->code !!}</td>

                @endif
                @if($request->category->id !=3 || $request->category->id !=4)
                    <td>{!! $item->terms_code !!}</td>
                @endif
                @if($request->category->id ==1||$request->category->id ==2)
                    <td>{!! $item->start_date !!}</td>
                @endif
                @if($request->category->id ==4)
                    <td>{!! $item->start_date !!}</td>
                @endif
                @if($request->category->id ==4)
                    <td>{!! $item->end_date !!}</td>
                @endif
                @if($request->category->id ==1)
                    <td>{!! $item->notes !!}</td>
                @endif

                <td class="text-center">

                    <ul class="table-controls">

                        <li><a href="{{ route('items.show',[$request_id, $item->id]) }}" class="bs-tooltip"
                               title="@lang('site.show') ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-eye text-danger">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a></li>
                        <li><a href="{{ route('items.edit', [$request_id,$item->id]) }}" class="bs-tooltip"
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
                               onclick="sweet_delete( ' {{ route('items.destroy',[$request_id,$item->id]) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $item->id }} )"
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
        <tfoot>
        <tr>
            <th>@lang('site.id') </th>
            @if($request->category->id !=3&&$request->category->id !=4)
                <th>@lang('site.name') </th>
            @endif
            @if($request->category->id ==4)
                <th>@lang('site.terms_code')</th>
            @endif
            @if($request->category->id ==4)
                <th>@lang('site.terms')</th>
            @endif
            @if($request->category->id !=4)
                <th>{{$request->category->id==3?__('site.business statement'):__('site.description')}}</th>
            @endif
            @if(1)
                <th>@lang('site.unit')</th>
            @endif
            @if(1)
                <th>@lang('site.qty')</th>
            @endif

            @if($request->category->id ==3||$request->category->id ==1||$request->category->id ==4)
                <th>@lang('site.price')</th>
            @endif
            @if($request->category->id ==3||$request->category->id ==1)

                <th>@lang('site.total')</th>
            @endif
            @if($request->category->id ==2)
                <th>@lang('site.code')</th>
            @endif
            @if($request->category->id !=3 || $request->category->id !=4)
                <th>@lang('site.terms_code')</th>
            @endif
            @if($request->category->id ==1||$request->category->id ==2)
                <th>@lang('site.date of supply')</th>
            @endif
            @if($request->category->id ==4)
                <th>@lang('site.start_date')</th>
            @endif
            @if($request->category->id ==4)
                <th>@lang('site.end_date')</th>
            @endif
            @if($request->category->id ==1)
                <th>@lang('site.notes')</th>
            @endif

            <th>@lang('site.action')</th>

        </tr>
        </tfoot>
    </table>

</div>
