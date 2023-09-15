<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_name', 'Display Name:') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-12">
    <div class="form-group">
        <label>{{__('site.Permissions')}}</label>
        <label><input type="checkbox" class="selectall"/> {{__('site.Select all')}}
        </label>
    </div>
</div>
<div class=" col-sm-12">
    <div class="row">
    @foreach ($models as $index=>$model)
        @php
            $model_name= str_replace('read_', '', $model)
        @endphp
        <div class="col-md-6">
            <h4 class="{{ $index == 0 ? 'Admin' : '' }}">{{ucfirst(__('site.'.$model_name))}}

            </h4>

            @foreach (\App\Models\Permission::where('name' ,'like', '%' . $model_name . '%')->get() as $action)
                @php
                    $action_name= str_replace('_'.$model_name, '', $action->name)
                @endphp
                {{--                                                                    <label>{{admin($model)}} </label>--}}
                @if(!str_starts_with($action_name, 'create_')&&!str_starts_with($action_name, 'read_')&&!str_starts_with($action_name, 'destroy_')&&!str_starts_with($action_name, 'activate_')&&!str_starts_with($action_name, 'disable_')&&!str_starts_with($action_name, 'export_')&&!str_starts_with($action_name, 'update_')&&$action_name!='delete_campStatus'&&$action_name!='delete_sponsorShips')
                    <label>{{ucfirst($action_name)}} </label>
                    <input type="checkbox" name="permission_id[]"
                           value="{{$action->id }}" @isset($role){{ $role->hasPermission($action_name . '_' . $model_name) ? 'checked' : '' }}@endisset class="form-group">
                    &nbsp; &nbsp;  &nbsp;
                @endif
            @endforeach


        </div>

    @endforeach
    </div>

</div>
