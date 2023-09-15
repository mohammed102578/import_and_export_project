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

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <label  >@lang('site.role')</label>
    <select placeholder="@lang('site.role')" id="roles" class="selectpicker form-control " aria-expanded="false" multiple data-actions-box="true" name="role_id[]" required >
        @foreach($roles as $role)
            @isset($permission)
            <option value="{{$role->id}} " @foreach ($permission->roles as $item){{$item->id==$role->id?'selected':''}}  @endforeach
                >{{$role->name}}</option>
            @else
                <option value="{{$role->id}} "
                >{{$role->name}}</option>
                @endisset
        @endforeach

    </select>
    <span class="invalid-feedback">@lang('site.required')</span>
    @error('roles')<span class="text-danger">{{ $message }}</span>@enderror
</div>
