<div class="table-responsive">
    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>@lang('site.username')</th>

            <th>@lang('site.model')</th>
            <th>@lang('site.key')</th>
            <th>@lang('site.name')</th>
            <th>@lang('site.event')</th>
            <th>@lang('site.date')</th>
            <th>@lang('site.time')</th>
            <th>@lang('site.action')</th>

        </tr>
        </thead>
        <tbody>
        @foreach($logs as $index=>$log)
            <tr>
                <td>{{$index++}}</td>
                <td class="text-center"><a  data-toggle="modal"
                                            data-target="#users{{$log->id}}"><span
                            class="badge badge-success">{{ $log->user->full_name }}</span></a></td>


                <td>{{__('site.'. $log->model) }}</td>
                <td>{{ $log->key }}</td>
                <td>{{ $log->name }}</td>
                <td>{{ __('site.'.$log->action) }}</td>
                <td>{{ date('d-m-Y',strtotime($log->date))}}</td>
                <td>{{ date('h:m A',strtotime($log->date))}}</td>
                <td class="text-center">

                    <ul class="table-controls">

{{--                        <li><a href="{{ route('logs.show', $log->id) }}" class="bs-tooltip"--}}
{{--                               title="@lang('site.show') ">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                     stroke-width="2" stroke-linecap="round"--}}
{{--                                     stroke-linejoin="round"--}}
{{--                                     class="feather feather-eye text-danger">--}}
{{--                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>--}}
{{--                                    <circle cx="12" cy="12" r="3"></circle>--}}
{{--                                </svg>--}}
{{--                            </a></li>--}}
                        <li><a href="#"
                               onclick="sweet_delete( ' {{ route('logs.destroy',$log->id) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $log->id }} )"
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
@foreach($logs as $log)

    <div class="modal  bd-example-modal-xl " id="users{{$log->id}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('site.staff')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    @if($log->user)
                        <table class="table table-hover non-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.email')</th>
                                <th>@lang('site.mobile')</th>
                                <th>@lang('site.type')</th>
                                <th>@lang('site.branch')</th>
                                <th>@lang('site.vendor')</th>

                            </tr>
                            </thead>
                            <tbody>
                                <tr id="row_{{$log->user->id}}">
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $log->user->full_name }}</td>
                                    <td>{{ $log->user->email }}</td>
                                    <td>{{ $log->user->mobile }}</td>
                                    <td>{{ $log->user->type }}</td>
                                    <td>{{ @$log->branch->name }}</td>
                                    <td>{{ @$log->vendor->name }}</td>

                                </tr>


                            </tbody>
                        </table>
                    @else
                        @lang('site.data_not_found')
                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i
                            class="flaticon-cancel-12"></i> @lang('site.discard')</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
