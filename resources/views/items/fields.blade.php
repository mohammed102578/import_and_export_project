<?php
$category_id = \App\Models\Request::find($request_id)->category->id
?>
{!! Form::hidden('request_id', $request_id, ['class' => 'form-control']) !!}

<!-- Name Field -->
@if($category_id==1||$category_id==2||$category_id==5)
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name',$category_id==5? __('site.classification_name'): __('site.name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>

    </div>
@endif
@if($category_id==5)
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name',$category_id==5? __('site.management_name'): __('site.name')) !!}
        {!! Form::text('management_name', null, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>

    </div>
@endif
@if($category_id==1||$category_id==2||$category_id==5)
    <!-- Start Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('start_date', __('site.date of supply')) !!}
        {!! Form::date('start_date', @$item->start_date, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>
    </div>
@endif
@if($category_id==5)
    <!-- Start Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('end_date', __('site.date of supply required')) !!}
        {!! Form::date('end_date', @$item->end_date, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>
    </div>
@endif
@if($category_id==4)
    <!-- Start Date Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('start_date', __('site.start_date')) !!}
        {!! Form::date('start_date', @$item->start_date, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>
    </div>
@endif
@if($category_id==4)
    <!-- Start Date Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('end_date', __('site.start_date')) !!}
        {!! Form::date('end_date', @$item->end_date, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>
    </div>
@endif
@if($category_id==2||$category_id==5)


    <div class="form-group col-sm-6">
        {!! Form::label('code', __('site.code')) !!}
        {!! Form::text('code', null, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>
    </div>
@endif
@if($category_id==5)


    <!-- supplier Id Field -->
    <div class="form-group col-md-3">
        <label>@lang('site.supplier')</label>
        <select data-placeholder="@lang('site.supplier')" class="form-control basic" name="supplier_id"
                aria-describedby="inputGroupPrepend" required>
            <option value="">@lang('site.supplier')</option>

            @foreach(\App\Models\Supplier::get() as $supplier)
                <option
                    value="{{$supplier->id}} "{{@$item->supplier_id == $supplier->id||old('supplier_id') == $supplier->id? 'selected' : '' }} >{{$supplier->name}}</option>
            @endforeach

        </select>

        @error('supplier_id')<span class="text-danger">{{ $message }}</span>@enderror

    </div>
    <span class="invalid-feedback">@lang('site.required')</span>

    <div class="form-group col-sm-3">
        {!! Form::label('returned_qty', __('site.returned_qty')) !!}
        {!! Form::number('returned_qty', null, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>
    </div>
@endif
@if($category_id==2||$category_id==4)
    <div class="form-group col-sm-4">
        {!! Form::label('terms_code', __('site.terms_code')) !!}
        {!! Form::text('terms_code', null, ['class' => 'form-control','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>
    </div>

@endif
@if($category_id==4)
    <div class="form-group col-sm-12">
        {!! Form::label('terms', __('site.terms')) !!}
        {!! Form::textArea('terms', null, ['class' => 'form-control ckeditor','required']) !!}
        <span class="invalid-feedback">@lang('site.required')</span>
    </div>

@endif
<!-- Qty Field -->
<div class="form-group col-sm-4">
    {!! Form::label('unit', __('site.unit')) !!}
    {!! Form::text('unit', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>
<!-- Qty Field -->
<div class="form-group col-sm-4">
    {!! Form::label('qty', __('site.qty')) !!}
    {!! Form::number('qty', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>


<!-- Price Field -->
<div class="form-group col-sm-4">
    {!! Form::label('price', __('site.price')) !!}
    {!! Form::number('price', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>

@if($category_id!=3&&$category_id!=4&&$category_id!=5)
    <!-- Description Ar Field -->
    <div class="form-group {{$category_id==3?'col-sm-12':'col-sm-6'}}">
        {!! Form::label('description',$category_id==3?__('site.business statement'):__('site.description')) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control ckeditor', 'rows' => 3, 'cols' => 50]) !!}
    </div>
@endif
@if($category_id!=3&&$category_id!=4&$category_id!=5)
    <!-- Description Ar Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('notes', __('site.notes')) !!}
        {!! Form::textarea('notes', null, ['class' => 'form-control ckeditor', 'id' => 'editor-container', 'rows' => 3, 'cols' => 50]) !!}
    </div>
@endif

