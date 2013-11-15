@extends('layouts.default')

<?php
$options = array(
	'updated_at' => 'Updated At',
    'seller_name' => 'Seller Name',
    'paid_total' => 'Paid Total',
    'debt_total' => 'Debt Total',
	'debt_other_total' => 'Debt Other Total'	
);
?>

@section('content')

@include('seller.search-form')

<!-- List all seller -->
<div class="row-fluid show-grid">
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
                <?php
                foreach ($results as $row)
                {
                    $_primaryKey = $row->seller_id;
                    ?>
                    <tr {{ $row->seller_note ? 'class="error"' : ''}} >
						<td><small>{{ date('d/m', strtotime($row->updated_at)) }}</small></td>
                        <td title="{{ $row->seller_address }}">
                            <a href="/seller/<?= $_primaryKey ?>/edit">
								{{ $row->seller_name }}
							</a>
                        </td>
                        <td class="text-right">{{ number_format($row->paid_total) }}</td>
                        <td class="text-right"><b>{{ number_format($row->debt_total) }}</b></td>
						<td class="text-right">{{ number_format($row->debt_other_total) }}</td>                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Paging  -->
        {{ $results->links() }}

    </div>
</div>
@stop