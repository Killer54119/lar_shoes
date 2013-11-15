@extends('layouts.default')

<?php
$options = array(
	'updated_at' => 'Month',
    'cost_for' => 'Cost For',
    'cost' => 'Cost',
);
?>

@section('content')
@include('share-holder-cost.search-form')

<!-- List all share-holder-cost -->
<div class="row-fluid show-grid">
    <div class="span12">
        <table class="table table-striped table-bordered">
            <tbody>
                <?php
				$total_cost = 0;
                foreach ($results as $row)
                {
					$total_cost += $row->cost;
                    $_primaryKey = $row->cost_id;
                    ?>
                    <tr>
						<td><small>{{ date('d/m', strtotime($row->updated_at)) }}</small></td>
                        <td>
							<a href="/share-holder-cost/<?= $_primaryKey ?>/edit">
								{{ $row->cost_for }}
							</a>
						</td>    
                        <td>{{ number_format($row->cost) }}</td>
                    </tr>
                <?php } ?>
            </tbody>
            <thead>
				<tr class="info">
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>{{ number_format($total_cost) }}</td>
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