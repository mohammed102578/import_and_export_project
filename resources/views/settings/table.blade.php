<div class="table-responsive">
    <table class="table" id="settings-table">
        <thead>
        <tr>
            <th>Logo</th>
        <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($settings as $setting)
            <tr>
                <td><img src="{{$setting->logo_path}}" style="width: 70px;height: 70px"  width="200" height="200 "class="img-circle"></td>
            <td>{{ $setting->name }}</td>
                <td class="text-center">

                    <ul class="table-controls">
                        @if (auth()->user()->hasPermission('update_users'))

                            <li><a href="{{ route('settings.edit', $setting->id) }}" class="bs-tooltip"
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
                        @endif
                    </ul>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
