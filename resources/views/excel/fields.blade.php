<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('site.file')) !!}
	<br>
    {!! Form::file('file', null, ['class' => 'form-control','required']) !!}
	<span class="invalid-feedback">@lang('site.required')</span>
</div>