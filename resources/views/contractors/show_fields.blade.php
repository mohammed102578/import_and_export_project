<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $supplier->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $supplier->name }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $supplier->address }}</p>
</div>

<!-- Mobile Field -->
<div class="col-sm-12">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{{ $supplier->mobile }}</p>
</div>

<!-- Website Url Field -->
<div class="col-sm-12">
    {!! Form::label('website_url', 'Website Url:') !!}
    <p>{{ $supplier->website_url }}</p>
</div>

<!-- Responsible Name Field -->
<div class="col-sm-12">
    {!! Form::label('responsible_name', 'Responsible Name:') !!}
    <p>{{ $supplier->responsible_name }}</p>
</div>

<!-- Responsible Mobile Field -->
<div class="col-sm-12">
    {!! Form::label('responsible_mobile', 'Responsible Mobile:') !!}
    <p>{{ $supplier->responsible_mobile }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $supplier->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $supplier->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $supplier->updated_at }}</p>
</div>

