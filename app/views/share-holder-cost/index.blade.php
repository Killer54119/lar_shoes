@extends('layouts.default')

<?php
$options = array(
	'updated_at' => 'Updated At',
    'cost_for' => 'Cost For',
    'cost' => 'Cost',
);
?>

@section('content')
@include('share-holder-cost.search-form')

<!-- List all share-holder-cost -->
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
        </table>

        <!-- Paging  -->
        {{ $results->links() }}

    </div>
</div>
@stop