@extends('layouts.default')

<?php
$options = array(
	'updated_at' => 'Updated At',
    'share_holder_name' => 'Share Holder Name',
    'share_holder_capital' => 'Share Holder Capital'    
);
?>

@section('content')

@include('share-holder.search-form')

<!-- List all share-holder -->
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
                    $_primaryKey = $row->share_holder_id;
                    ?>
                    <tr>
                        <td><small>{{ date('d/m', strtotime($row->updated_at)) }}</small></td>					
                        <td>
							<a href="/share-holder/<?= $_primaryKey ?>/edit">
								{{ $row->share_holder_name }}
							</a>
						</td>     
                        <td>{{ number_format($row->share_holder_capital) }}</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Paging  -->
        {{ $results->links() }}

    </div>
</div>
@stop