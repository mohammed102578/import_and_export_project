@if($category_id==2)
@php if(isset($_GET['id'])){
$id_g = $_GET['id'];
$nameQ =\App\Models\Request::where('id',$id_g)->first()->name_et;
}else{
$id_g =""; 
$nameQ ="";
} 
@endphp
<!-- Name Field -->

<div class="form-group col-sm-4">
	{!! Form::label('name',  __('site.date of order_req')) !!}
	<select class="form-control" name="link_with" id="dateViewBy" onchange="myFunction()" style="padding: 0;">
		<option value="0">@lang('site.Select')</option>
	@foreach(\App\Models\Request::
          where('category_id',1)
        ->where('hse_manager','!=',0)
        ->where('stock_manager','!=',0)
        ->where('cost_control_manager','!=',0)
        ->where('it_manager','!=',0)
        ->where('asset_manager','!=',0)
        ->where('cto_manager','!=',0)
        ->where('project_manager','!=',0)->get() as $role)
			@php $id_i = $role->id; @endphp
			<option value="{{$role->id}}" @if($id_g == $id_i) Selected @endif>  {{ $role->created_at->format(' M d Y h:i')}}</option>
		@endforeach
	</select>
	<span class="invalid-feedback">@lang('site.required')</span>

</div>




<div class="form-group col-sm-4">
	{!! Form::label('name',  __('site.order_req')) !!}
	<select class="form-control" name="link_with" id="ddlViewBy" onchange="myFunction()" style="padding: 0;">
		<option value="0">@lang('site.Select')</option>
		@foreach(\App\Models\Request::
          where('category_id',1)
        ->where('hse_manager','!=',0)
        ->where('stock_manager','!=',0)
        ->where('cost_control_manager','!=',0)
        ->where('it_manager','!=',0)
        ->where('asset_manager','!=',0)
        ->where('cto_manager','!=',0)
        ->where('project_manager','!=',0)->get() as $role)
			@php $id_i = $role->id; @endphp
			<option value="{{$role->id}}" @if($id_g == $id_i) Selected @endif>  {{ $role->title}}</option>
		@endforeach
	</select>
	<span class="invalid-feedback">@lang('site.required')</span>

</div>
<div class="form-group col-sm-4">
    {!! Form::label('name',__('site.name_et')) !!}
    {!! Form::text('name', $nameQ, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('title',__('site.project_name')) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('ref',__('site.ref')) !!}
    {!! Form::text('ref', null, ['class' => 'form-control']) !!}
</div>
<!-- time_req Field -->	
<div class="form-group col-sm-4">
    {!! Form::label('name', __('site.time_req')) !!}
    {!! Form::text('time_req', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>

</div>
<!-- time_req Field -->	
<!-- location_req Field -->
<div class="form-group col-sm-4">
	{!! Form::label('name',  __('site.location_req')) !!}
	<select class="form-control" name="location_req" style="padding: 0;">
		<option value="0">@lang('site.Select')</option>
		<option value="{{__('site.stock_req')}}">{{__('site.stock_req')}}</option>
		<option value="{{__('site.website')}}">{{__('site.website')}}</option>
		<option value="{{__('site.administration')}}">{{__('site.administration')}}</option>
		<option value="{{__('site.other')}}">{{__('site.other')}}</option>
	</select>
	<span class="invalid-feedback">@lang('site.required')</span>

</div>
<!-- type_l_req Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type_l_req',__('site.type_l_req')) !!}
    {!! Form::text('type_l_req', null, ['class' => 'form-control']) !!}
	<span class="invalid-feedback">@lang('site.required')</span>

</div>
@if($category_id !=4)
<div class="form-group col-sm-4">
	{!! Form::label('name',  __('site.supplier')) !!}
	<select class="form-control" name="supplier_id" style="padding: 0;">
		<option value="0">@lang('site.Select')</option>
			@php $suppliers=(\App\Models\Supplier::all());
			@endphp
			
    		@foreach($suppliers as $supplier)
				<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
			@endforeach
	</select>
	<span class="invalid-feedback">@lang('site.required')</span>

</div>
@else
<div class="form-group col-sm-4">
	{!! Form::label('name',  __('site.contractor_boq')) !!}
	<select class="form-control" name="contractor_id" style="padding: 0;">
		<option value="0">@lang('site.Select')</option>
			@php $contractors=(\App\Models\Contractor::all());
			@endphp
			
    		@foreach($contractors as $contractor)
				<option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
			@endforeach
	</select>
	<span class="invalid-feedback">@lang('site.required')</span>

</div>
@endif

<div class="form-group col-sm-4">
    {!! Form::label('terms_code', __('site.terms_code')) !!}
    {!! Form::text('terms_code', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('notes', __('site.notes')) !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control ckeditor', 'id' => 'editor-container', 'rows' => 1, 'cols' => 50]) !!}
</div>


{!! Form::hidden('category_id', $category_id, ['class' => 'form-control']) !!}
@else
@if($category_id!=1)
<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('name', $category_id!=1?__('site.project_name'):__('site.management_name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>

</div>
{!! Form::hidden('category_id', $category_id, ['class' => 'form-control']) !!}
@else
<div class="form-group col-sm-3">
    {!! Form::label('title', __('site.project_name')) !!}
    {!! Form::text('title', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>

</div>
<!-- Name Field -->
<div class="form-group col-sm-3">
	{!! Form::label('name',  __('site.req_by')) !!}
	<select class="form-control" name="name" style="padding: 0;">
		<option value="{{__('site.p_projects')}}">{{__('site.p_projects')}}</option>
		<option value="{{__('site.desk_mp')}}">{{__('site.desk_mp')}}</option>
	</select>
	<span class="invalid-feedback">@lang('site.required')</span>

</div>
<div class="form-group col-sm-3">
    {!! Form::label('name_et', __('site.name_et')) !!}
    {!! Form::text('name_et', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>

</div>
<!-- Name Field -->
{!! Form::hidden('category_id', $category_id, ['class' => 'form-control']) !!}
<!-- Type Field -->
@php  $dc =__('site.direct_costs');  @endphp
@php  $ic =__('site.undirect_costs');  @endphp
@php if(isset($_GET['id_t'])){ $id_r = $_GET['id_t'];}else{ $id_r =""; } @endphp
<div class="form-group col-sm-3">
	{!! Form::label('type',  __('site.req_type')) !!}
	<select class="form-control" name="type_req" id="idcount" onchange="myFunction_new()" style="padding: 0;">
	   <option value="0" @if($id_r == 0) Selected @endif>@lang('site.Select')</option>
		<option value="{{__('site.direct_costs')}}" @if($id_r == $dc) Selected @endif>{{__('site.direct_costs')}}</option>
		<option value="{{__('site.undirect_costs')}}" @if($id_r == $ic) Selected @endif>{{__('site.undirect_costs')}}</option>
	</select>
	<span class="invalid-feedback">@lang('site.required')</span>

</div>
<!-- Type Field -->
                    <!-- Name Field -->
                        <div class="form-group col-sm-5">
                            {!! Form::label('kind_h',$category_id==5? __('site.kind_h'): __('site.kind_h')) !!}
							<select class="form-control" name="kind_h" style="padding: 0;">
							  	@if (isset($_GET['id_t']))
							  	
                        			@php $categories_c=(\App\Models\Cats::where('type',$_GET['id_t'])->get());
                        			@endphp
                        			
                        		@else
                        		
                        			@php $categories_c=array(); @endphp
                        			
                        		@endif
                        		@foreach($categories_c as $category)
									<option value="{{ $category->id_p }}">{{ $category->title }} - #{{$category->section}}</option>
								@endforeach
							</select>
                            <span class="invalid-feedback">@lang('site.required')</span>

                        </div>
@endif
<!-- Ref Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ref',__('site.ref')) !!}
    {!! Form::text('ref', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-3">
    {!! Form::label('code', __('site.code')) !!}
    {!! Form::text('code', null, ['class' => 'form-control','required']) !!}
    <span class="invalid-feedback">@lang('site.required')</span>
</div>
@if($category_id==4)

                        <!-- contractor Id Field -->
                            <div class="form-group col-md-3">
                                <label>@lang('site.contractor_boq')</label>
                                <select data-placeholder="@lang('site.contractor_boq')" class="form-control basic" name="contractor_id"
                                        aria-describedby="inputGroupPrepend" required>
                                    <option value="">@lang('site.contractor_boq')</option>
                                
                                    @foreach(\App\Models\Contractor::get() as $contractor)
                                        <option
                                            value="{{$contractor->id}}"{{@$item->contractor_id == $contractor->id||old('contractor_id') == $contractor->id? 'selected' : '' }} >{{$contractor->name}}</option>
                                    @endforeach

                                </select>

                                @error('contractor_id')<span class="text-danger">{{ $message }}</span>@enderror

                            </div>
@endif
@endif
                @if($category_id==1||$category_id==5)
                    <!-- Start Date Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('start_date', __('site.date of supply required')) !!}
                            {!! Form::date('start_date', @$item->start_date, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>
                        </div>
                @endif

               
<div class="repeater" style="width: 100%">
    <div data-repeater-list="items">
        @if (isset($request)&& count($request->items)>0)
            <?php $category_id=$request->category->id;
            ?>
            @foreach( $request->items as $x=>$item)

                <div data-repeater-item>
                    <div class="input-group mb-2">
                        <div class="col-md-12">
                            <h1>@lang('site.item'){{$x+1}}</h1>
                            <hr>
                        </div>
                        {!! Form::hidden('id', $item->id, ['class' => 'form-control']) !!}
                                {!! Form::hidden('request_id', $item->request_id, ['class' => 'form-control']) !!}
                    @if($category_id==1||$category_id==5)
                        <div class="form-group col-sm-4">
                            {!! Form::label('name',$category_id==5? __('site.kind_of'): __('site.kind_of')) !!}
	                            {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>

                        </div>
                                
                        {{-- code of category --}}
                        <div class="form-group col-sm-4">
                            {!! Form::label('name',$category_id==5? __('site.category_code'): __('site.category_code')) !!}
                                {!! Form::text('category_code',  $item->category_code, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>

                        </div>
                    @endif
                    @if($category_id==5)
                        <!-- Name Field -->
                            <div class="form-group col-sm-4">
                                {!! Form::label('name',$category_id==5? __('site.management_name'): __('site.name')) !!}
                                {!! Form::text('management_name', $item->management_name, ['class' => 'form-control','required']) !!}
                                <span class="invalid-feedback">@lang('site.required')</span>

                            </div>
                    @endif
                    @if($category_id==1||$category_id==5)
                        <!-- Start Date Field -->
                            <div class="form-group col-sm-4">
                                {!! Form::label('start_date', __('site.date of supply required')) !!}
                                {!! Form::date('start_date', @$item->start_date, ['class' => 'form-control','required']) !!}
                                <span class="invalid-feedback">@lang('site.required')</span>
                            </div>
                    @endif
                    @if($category_id==5)
                        <!-- Start Date Field -->
                            <div class="form-group col-sm-4">
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
                                {!! Form::label('end_date', __('site.end_date')) !!}
                                {!! Form::date('end_date', @$item->end_date, ['class' => 'form-control','required']) !!}
                                <span class="invalid-feedback">@lang('site.required')</span>
                            </div>
                        @endif
                        @if($category_id==5)


                            <div class="form-group col-sm-4">
                                {!! Form::label('code', __('site.code')) !!}
                                {!! Form::text('code', $item->code, ['class' => 'form-control','required']) !!}
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
                                {!! Form::number('returned_qty', $item->returned_qty, ['class' => 'form-control','required']) !!}
                                <span class="invalid-feedback">@lang('site.required')</span>
                            </div>
                        @endif
                        @if($category_id  !==2)
                            <div class="form-group col-sm-4">
                                {!! Form::label('terms_code', __('site.terms_code')) !!}
                                {!! Form::text('terms_code', $item->terms_code, ['class' => 'form-control','required']) !!}
                                <span class="invalid-feedback">@lang('site.required')</span>
                            </div>

                        @endif
                        @if($category_id==4)
                            <div class="form-group col-sm-12">
                                {!! Form::label('terms', __('site.terms')) !!}
                                {!! Form::textArea('terms', $item->terms, ['class' => 'form-control ckeditor','required']) !!}
                                <span class="invalid-feedback">@lang('site.required')</span>
                            </div>

                        @endif


                        
                    <!-- Qty Field -->

                        <div class="form-group col-sm-4">
                    	{!! Form::label('unit',  __('site.unit')) !!}
                    	<select class="form-control" name="unit" style="padding: 0;">
                    		<option value="{{__('site.metret')}}">{{__('site.metret')}}</option>
                    		<option value="{{__('site.metrem')}}">{{__('site.metrem')}}</option>
                    		<option value="{{__('site.tonne')}}">{{__('site.tonne')}}</option>
                    		<option value="{{__('site.number')}}">{{__('site.number')}}</option>
                    	</select>
                    	<span class="invalid-feedback">@lang('site.required')</span>
                    
                        </div>
                        <!-- Qty Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('qty', __('site.qty')) !!}
                            {!! Form::number('qty', $item->qty, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>
                        </div>
                        <!-- contractual_qty Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('contractual_qty', __('site.contractual_qty')) !!}
                            {!! Form::number('contractual_qty', $item->contractual_qty, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>
                        </div>


                        <!-- Price Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('price', $category_id != 5 ? __('site.price') : __('site.price_p')) !!}
                            {!! Form::number('price', $item->price, ['class' => 'form-control']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>
                        </div>
                        
                    <!-- Price Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('currency', __('site.currency')) !!}
                        {!! Form::text('currency', $item->currency, ['class' => 'form-control']) !!}
                        <span class="invalid-feedback">@lang('site.required')</span>
                    </div>
                        @if($category_id!=3&&$category_id!=4&&$category_id!=5)
                        <!-- Description Ar Field -->
                            <div class="form-group {{$category_id==3?'col-sm-12':'col-sm-6'}}">
                                {!! Form::label('description',$category_id==3?__('site.business statement'):__('site.description')) !!}
                                {!! Form::textarea('description', $item->description, ['class' => 'form-control ckeditor', 'rows' => 3, 'cols' => 50]) !!}
                            </div>
                        @endif
                        @if($category_id!=3&&$category_id!=4&$category_id!=5)
                        <!-- Description Ar Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('notes', __('site.notes')) !!}
                                {!! Form::textarea('notes', $item->notes, ['class' => 'form-control ckeditor', 'id' => 'editor-container', 'rows' => 3, 'cols' => 50]) !!}
                            </div>
                        @endif
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">
                                      <a data-repeater-delete onclick="this.preventDefault"
                                         class="bs-tooltip  col-1"
                                         title="@lang('site.delete') ">
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
                                </span>
                        </div>
                        <span class="invalid-feedback">@lang('site.required')</span>

                    </div>
                </div>


            @endforeach
        @else
            <div data-repeater-item>
                <div class="input-group mb-1">

				@if($category_id==2)
                    <div class="col-md-12">
                        <h1>@lang('site.items')</h1>
                        <hr>
                    </div>
					@include('requests.items')
				@else
                    <div class="col-md-12">
                        <h1>@lang('site.create')@lang('site.item')</h1>
                        <hr>
                    </div>				
				@endif
                @if($category_id==1||$category_id==5)

                        <div class="form-group col-sm-4">
                            {!! Form::label('name',$category_id==5? __('site.kind_of'): __('site.kind_of')) !!}
	                            {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>

                        </div>
                        {{-- code of category --}}
                        <div class="form-group col-sm-4">
                            {!! Form::label('name',$category_id==5? __('site.category_code'): __('site.category_code')) !!}
	                            {!! Form::text('category_code', null, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>

                        </div>
                @endif
                @if($category_id==5)
                    <!-- Name Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('name',$category_id==5? __('site.management_name'): __('site.name')) !!}
                            {!! Form::text('management_name', null, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>

                        </div>
                @endif

                @if($category_id==5)
                    <!-- Start Date Field -->
                        <div class="form-group col-sm-4">
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
                            {!! Form::label('end_date', __('site.end_date')) !!}
                            {!! Form::date('end_date', @$item->end_date, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>
                        </div>
                    @endif
                    @if($category_id==5)


                        <div class="form-group col-sm-6">
                            {!! Form::label('code', __('site.code')) !!}
                            {!! Form::text('code', null, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>
                        </div>
                    @endif
                    @if($category_id==5)


                    <div class="form-group col-sm-4">
                        {!! Form::label('name',  __('site.supplier')) !!}
                        <select class="form-control" name="supplier_id" style="padding: 0;">
                            <option value="0">@lang('site.Select')</option>
                                @php $suppliers=(\App\Models\Supplier::all());
                                @endphp
                                
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                        </select>
                        <span class="invalid-feedback">@lang('site.required')</span>
                    
                    </div>
                        <div class="form-group col-sm-3">
                            {!! Form::label('returned_qty', __('site.returned_qty')) !!}
                            {!! Form::number('returned_qty', null, ['class' => 'form-control','required']) !!}
                            <span class="invalid-feedback">@lang('site.required')</span>
                        </div>
                    @endif
                    @if($category_id !=2)
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
					@if($category_id!=2)
                <!-- Qty Field -->
                        <div class="form-group col-sm-4">
                    	{!! Form::label('unit',  __('site.unit')) !!}
                    	<select class="form-control" name="unit" style="padding: 0;">
                    		<option value="{{__('site.metret')}}">{{__('site.metret')}}</option>
                    		<option value="{{__('site.metrem')}}">{{__('site.metrem')}}</option>
                            <option value="{{__('site.cubic_meterst')}}">{{__('site.cubic_meterst')}}</option>
                    		<option value="{{__('site.tonne')}}">{{__('site.tonne')}}</option>
                    		<option value="{{__('site.number')}}">{{__('site.number')}}</option>
                    		<option value="{{__('site.thousand')}}">{{__('site.thousand')}}</option>
                    		<option value="{{__('site.kg')}}">{{__('site.kg')}}</option>
                    		<option value="{{__('site.liter')}}">{{__('site.liter')}}</option>
                    		<option value="{{__('site.roll')}}">{{__('site.roll')}}</option>
                    		<option value="{{__('site.shikara')}}">{{__('site.shikara')}}</option>
                    	</select>
                    	<span class="invalid-feedback">@lang('site.required')</span>
                    
                        </div>
                    <!-- Qty Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('qty', __('site.qty')) !!}
                        {!! Form::number('qty', null, ['class' => 'form-control','required']) !!}
                        <span class="invalid-feedback">@lang('site.required')</span>
                    </div>
                    <!-- contractual_qty Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('contractual_qty', __('site.contractual_qty')) !!}
                        {!! Form::number('contractual_qty', null, ['class' => 'form-control','required']) !!}
                        <span class="invalid-feedback">@lang('site.required')</span>
                    </div>


                    <!-- Price Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('price', $category_id != 5 ? __('site.price') : __('site.price_p')) !!}
                        {!! Form::number('price', null, ['class' => 'form-control']) !!}
                        <span class="invalid-feedback">@lang('site.required')</span>
                    </div>
                    
                    <!-- Price Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('currency', __('site.currency')) !!}
                        {!! Form::text('currency', null, ['class' => 'form-control']) !!}
                        <span class="invalid-feedback">@lang('site.required')</span>
                    </div>

                    @if($category_id!=4&&$category_id!=5)
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
                    <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">
                                      <a data-repeater-delete onclick="this.preventDefault"
                                         class="bs-tooltip  col-1"
                                         title="@lang('site.delete') ">
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
                                </span>
                    </div>
				@endif
                </div>
            </div>
        @endif
    </div>
	@if($category_id!=2)
    <div class="form-group col-sm-2">
        <input data-repeater-create type="button"
               class="form-control btn btn-success"
               value="{{__('site.add')}}"/>
    </div>
	@endif	
</div>


