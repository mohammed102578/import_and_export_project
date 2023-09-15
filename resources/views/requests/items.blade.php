<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
        <tr>
            <th></th>
			<th>@lang('site.id')</th>
			<th>@lang('site.item')</th>
            <th>@lang('site.unit')</th>
            <th>@lang('site.qty')</th>
            <th>@lang('site.contractual_qty')</th>
			<th>@lang('site.price_p')</th>
			<th>@lang('site.price_total')</th>
        </tr>
        </thead>
        <tbody>
		@if (isset($_GET['id']))
			@php $categories=(\App\Models\Item::where('request_id',$_GET['id'])->get()); @endphp
		@else
			@php $categories=array(); @endphp
		@endif
		@php $total = 0;@endphp
        @foreach($categories as $category)
			@php $total += ($category->price*$category->qty); @endphp
            <tr id="row_{{$category->id}}">
				<td>
				    <a href="#"
                       onclick="sweet_delete('{{ route('items.destroy',[$category_id,$category->id])}}', '{{ trans('site.confirm_delete')}}',{{ $category->id }})"
                       class="bs-tooltip dropdown-item" title="@lang('site.delete') ">
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
                </td>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
                <td>{{ $category->unit }}</td>
				<td>{{ number_format($category->qty,2) }}</td>
				<td>{{ number_format($category->contractual_qty,2) }}</td>
				<td>{{ number_format($category->price,2) }}</td>
				<td>{{ number_format($category->price*$category->qty,2) }}</td>
            </tr>
        @endforeach
			<tr>
				<td></td>
				<td><b>@lang('site.price_total')</b></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b>{{ number_format($total,2) }}</b></td>
            </tr>
			<tr>
				<td style="color:green;">يضاف</td>
				<td>@lang('site.price_add')</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ number_format($total*0.14,2) }}</td>
            </tr>
			<tr>
				<td style="color:red;">يخصم</td>
				<td>@lang('site.price_del')</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ number_format($total*0.01,2) }}</td>
            </tr>
			<tr>
				<td></td>
				<td><b>@lang('site.price_total_end')</b></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b>{{ number_format($total*0.85,2) }}</b></td>
            </tr>
        </tbody>
    </table>
</div>
