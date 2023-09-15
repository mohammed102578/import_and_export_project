<div class="table-responsive">
    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
        <th>Display Name</th>
        <th>Description</th>
            <th >Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
            <td>{{ $permission->display_name }}</td>
            <td>{{ $permission->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>

                        <a href="{{ route('permissions.edit', [$permission->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>

            <th>@lang('site.year')</th>
            <th>@lang('site.tour')</th>
            <th>@lang('site.country')</th>
            <th> @lang('site.camp')</th>


        </tr>
        </tfoot>
    </table>
</div>
