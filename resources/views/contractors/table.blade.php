<div class="table-responsive">
    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
        <thead>
        <tr>
            <th>{{__('site.id')}}</th>
            <th>{{__('site.name')}}</th>
            <th>{{__('site.address')}}</th>
            <th>{{__('site.mobile')}}</th>
            <th>{{__('site.responsible_name')}}</th>
            <th>{{__('site.responsible_mobile')}}</th>
            <th>{{__('site.created_by')}}</th>
            <th>{{__('site.created_at')}}</th>
            <th>{{__('site.action')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($contractors as $x=>$contractor)
            <tr id="row_{{ $contractor->id}}">
                <td>{{ $x+1}}</td>
                <td>{{ $contractor->name }}</td>
            <td>{{ $contractor->address }}</td>
            <td>{{ $contractor->mobile }}</td>
            <td>{{ $contractor->responsible_name }}</td>
            <td>{{ $contractor->responsible_mobile }}</td>
            <td>{{ $contractor->createdBy->name }}</td>
            <td>{{ $contractor->created_at->toDateString() }}</td>
                <td class="text-center">

                    <ul class="table-controls">

                        <li><a href="{{ route('contractors.show', $contractor->id) }}" class="bs-tooltip"
                               title="@lang('site.show') ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-eye text-danger">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a></li>
                        <li><a href="{{ route('contractors.edit', $contractor->id) }}" class="bs-tooltip"
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
                               onclick="sweet_delete( ' {{ route('contractors.destroy',$contractor->id) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $contractor->id }} )"
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
            <th style="visibility: hidden">{{__('site.id')}}</th>
            <th>{{__('site.name')}}</th>
            <th>{{__('site.address')}}</th>
            <th>{{__('site.mobile')}}</th>
            <th>{{__('site.responsible_name')}}</th>
            <th>{{__('site.responsible_mobile')}}</th>
            <th>{{__('site.created_by')}}</th>
            <th>{{__('site.created_at')}}</th>
            <th style="visibility: hidden">{{__('site.id')}}</th>

        </tr>
        </tfoot>
    </table>
</div>
