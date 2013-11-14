@extends('layouts.default')

<?php
$options = array(
	'updated_at' => 'Updated At',
	'image' => 'Image',
    'quality' => 'Quality',	
    'debt_total' => 'Debt Total',
);
?>

@section('content')

@include('seller-invoice.search-form')

<!-- List all seller-invoice -->
<div class="row-fluid show-grid">
    <div class="span12">
        <table width="100%" class="table striped table-bordered table-condensed">
            <thead>
                <tr class="info">
                    @foreach ($options as $k => $v)                        
                    {{ Header::out($k, $v) }}
                    @endforeach
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($results as $row)
                {
                    $_primaryKey = $row->invoice_id;
                    ?>
                    <tr {{ $row->invoice_note ? 'class="error"' : ''}}>
						<td>
							<small>{{ date('d/m', strtotime($row->updated_at)) }}</small>
							<div class="gray">{{ $row->seller_name }}</div>
						</td>
						
						<td>
							<?php if($row->image) {
								echo '<a href="/assets/products/small/'.$row->image . '">';
								echo '<img width=50 height=50 src="/assets/products/small/'.$row->image . '">';
								echo '</a>';
							}?>
						</td>
						
						
                        <td>
							@if($row->quality)
								<span {{ $row->quality < 0 ? 'class="red"' : '' }}>{{ $row->quality }}</span>
								x 
								<a href="/seller-invoice/search?col=selling_price&kw={{ $row->selling_price }}">
								{{ $row->selling_price }}
								</a>
								
								<br/>
								<small class="gray"> 
									{{ number_format($row->quality * $row->selling_price) }}
									<a  class="gray" href="/seller-invoice/search?col=cost_price&kw={{ $row->cost_price }}">
									[{{ $row->profits }}]
									</a>
								</small>
							@endif
						</td>
						
						<td>
							<b>{{ $row->debt_total ? number_format($row->debt_total) : '' }}</b>
							<br>
							<small class="gray" >{{ $row->payment ? number_format($row->payment) : '' }}</small>
						</td>						
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Paging  -->
        {{ $results->links() }}

    </div>
</div>
@stop