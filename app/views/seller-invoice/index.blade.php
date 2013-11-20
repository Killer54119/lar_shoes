@extends('layouts.default')

<?php
$options = array(
    'created_at' => 'Updated At',
    'image' => 'Image',
    'quality' => 'Quality',	
    'debt_total' => 'Debt Total',
);
?>

@section('content')

@include('seller-invoice.search-form')

<!-- List all seller-invoice -->
<div class="row show-grid">
    <div class="span12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="info">
                    @foreach ($options as $k => $v)
                    {{ Header::out($k, $v) }}
                    @endforeach
                </tr>
            </thead>

            <tbody>
                <?php foreach ($results as $row) { ?>
                    <tr id="{{ $row->invoice_id  }}"<?php echo $row->invoice_note ? "class='error'" : ''?>>
                        <td>                            
							<small>{{ date('d/m', strtotime($row->created_at)) }}</small>							
                            <br>{{ Common::showName($row->seller_id, $row->seller_name) }}
                        </td>

                        <td>
                            @if($row->image)
                                <img width=60 height=60 src="/assets/products/small/{{ $row->image }}">
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

                        <td class="text-right">
                                <b>{{ $row->debt_total ? number_format($row->debt_total) : '' }}</b>
                                <br>
                                <small class="gray" >{{ $row->payment ? number_format($row->payment) : '' }}</small>&nbsp;
                        </td>

                    </tr>
					
					@if($row->invoice_note)
                        <tr class="error"><td colspan="4">{{ $row->invoice_note }}</td></tr>
					@endif
					
                <?php } ?>
            </tbody>
        </table>

        <!-- Paging  -->
        {{ $results->links() }}

    </div>
</div>
@stop