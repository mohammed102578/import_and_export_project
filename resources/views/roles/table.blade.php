<div class="table-responsive">
    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
        <thead>
        <tr>
            <th>@lang('site.name')</th>
        <th>@lang('site.display_name')</th>
            <th >@lang('site.action')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)

            <tr id="row_{{$role->id}}">
                <td>{{ $role->name }}</td>
                <td>{{ $role->display_name }}</td>
                <td width="120">
                    <a href="{{ route('roles.edit', [$role->id]) }}" class="bs-tooltip dropdown-role"
                       title="@lang('site.edit') ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round"
                             class="feather feather-check-circle text-primary">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </a>
                    <a href="#"
                       onclick="sweet_delete( ' {{ route('roles.destroy',[$role->id]) }} ' , '{{ trans('site.confirm_delete') }}' ,{{ $role->id }} )"
                       class="bs-tooltip dropdown-role" title="@lang('site.delete') ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round"
                             class="feather feather-x-circle text-danger">
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
