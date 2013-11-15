@extends('layouts.default')

<?php
$options = array(
    'updated_at' => 'Updated At',
    'image' => 'Image',
    'quality' => 'Quality',	
    'is_return' => 'Is Return',
);

$sellerId = 1;
if(isset($params['col'])) {
	$sellerId = $params['kw']; 
}

$isReturn = array(
	'0' => '<span class="badge badge-important" onclick="changeTo(this, 1)">NO</span>',
	'1' => '<span class="badge badge-success"  onclick="changeTo(this, 0)">YES</span>',
)
?>

@section('content')

<i class="icon-user"></i>
{{ Form::select('seller_id', 
                Seller::lists('seller_name', 'seller_id'), 
                $sellerId, 
                array('class' => 'w-min txt-large')
                ) }}
<script>
$(function() {
	$('select[name=seller_id]').change(function() {
		window.location = '/seller-invoice/return?col=seller_id&kw=' + $(this).val();
	});		
});	

function changeTo(obj, value){
	var id = $(obj).parent().parent().attr('id');
	window.location = '/seller-invoice/update-return?is_return='+value+'&id=' + id;
}
</script>




<!-- List all seller-invoice -->
<div class="row-fluid show-grid">
    <div class="span12">
        <table class="table table-striped table-bordered">
            <tbody>
                <?php
                $total_quality = 0;
                $total_money   = 0;
				
                foreach ($results as $row)
                {
                    $_primaryKey = $row->invoice_id;
					if(!$row->is_return) {
						$total_quality += $row->quality;
						$total_money   += ($row->quality * $row->selling_price);
					}
                    ?>
                    <tr {{ $row->invoice_note ? 'class="error"' : ''}} id="{{$_primaryKey}}" >
                        <td>
                                <small>{{ date('d/m', strtotime($row->created_at)) }}</small>
								<br>{{ Common::showName($row->seller_id, $row->seller_name) }}
                        </td>

                        <td>
                            @if($row->image)
                                <img width=50 height=50 src="/assets/products/small/{{ $row->image }}">
                            @endif
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
                                {{ $isReturn[$row->is_return] }}
								@if( $row->created_at != $row->updated_at)
								<br>
								<small class="gray">{{ date('d/m', strtotime($row->updated_at)) }}</small>
								@endif
                        </td>						
                    </tr>
					
					@if($row->invoice_note)
                        <tr class="error"><td colspan="4">{{ $row->invoice_note }}</td></tr>
					@endif
					
                <?php } ?>				
            </tbody>
            <thead>
				<tr class="info">
					<td colspan="2">
                        <small>{{ MyLang::out('Total Quantity') }}: {{ number_format($total_quality) }}</small>
                    </td>
                    <td colspan="2">
                        <small>{{ MyLang::out('Total Money') }}: {{ number_format($total_money) }}</small>
					</td>
                </tr>
                <tr class="info">
                    @foreach ($options as $k => $v)
                    {{ Header::out($k, $v) }}
                    @endforeach
                </tr>
            </thead>			
        </table>

        <!-- Paging  -->
        {{ $results->links() }}

    </div>
</div>
@stop