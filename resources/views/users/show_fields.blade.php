<style>
    label {
        font-weight: bold;
    }
</style>

<!-- Category Id Field -->


<!-- Email Field -->

<div class="col-sm-6  form-group">
    {!! Form::label('full_name', __('site.full_name')." : ") !!}
    <span>{{@$user->name }}</span>
</div>
<div class="col-sm-6  form-group">
    {!! Form::label('email', __('site.email')." : ") !!}
    <span>{{@$user->email }}</span>
</div>


<div class="col-sm-6  form-group">
    {!! Form::label('mobile', __('site.mobile')." : ") !!}
    <span>{{ @$user->mobile }}</span>
</div>
<div class="col-sm-6  form-group">
    {!! Form::label('type', __('site.type')." : ") !!}
    <span>{{ __('site.'.$user->type) }}</span>
</div>



<div class="col-sm-6  form-group">
    {!! Form::label('created_at', __('site.created_at')." : ") !!}
    <span>{{ $user->created_at->format('d/m/Y') }}</span>
</div>
<div class="form-group col-sm-6">
    <div class="custom-file-container" data-upload-id="myFirstImage">

        <label>@lang('site.image') <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                      title="Clear Image"></a></label>


        <a href="{{$user->avatar_path}}" target="_blank"
           data-lightbox="mygallery">
            <img src="{{$user->avatar_path}}"

                 class="img-thumbnail custom-file-container__image-preview " alt="">
        </a>

    </div>
</div>
