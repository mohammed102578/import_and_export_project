<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('site.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('site.address')) !!}
    {!! Form::text('address', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', __('site.mobile')) !!}
    {!! Form::text('mobile', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>

<!-- Website Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website_url', __('site.website_url')) !!}
    {!! Form::text('website_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsible Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible_name', __('site.responsible_name')) !!}
    {!! Form::text('responsible_name', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>

<!-- Responsible Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible_mobile', __('site.responsible_mobile')) !!}
    {!! Form::text('responsible_mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- attachments Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attachments', __('site.attachments')) !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('attachments', ['class' => 'custom-file-input']) !!}
            {!! Form::label('attachments', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
@if(isset($supplier->attachments))
    <div class="form-group col-sm-2">
        {!! Form::label('', '') !!}

        <a class="btn btn-success" href="#"  id="cmd" style="width:100%;margin-top: 10px" ><i class="fa fab-download"></i> {{__('site.download')}}</a>

    </div>
@endif
