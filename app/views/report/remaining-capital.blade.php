@extends('layouts.default')

@section('content')
<!-- List all seller-invoice -->
<b>{{ MyLang::out('Report by month') }}</b>
<div class="row-fluid show-grid">
    <div class="span12">
        <table width="100%" class="table striped table-bordered table-condensed">		
            <tbody>
                <?php
				$total_quality = 0;
				$total_profits = 0;
				$total_payment = 0;
                foreach ($reportShareHolder as $row)				
                {
					$total_quality += $row->quality;
					$total_profits += ($row->profits - $row->cost);
					$total_payment += $row->paymentToFactory;				
                ?>
                    <tr class="month{{ $row->mon%2 }}">
						<td><b>{{ $row->mon }}</b></td>
						
						<td class="text-right">{{ number_format($row->quality) }}</td>
						
						<td class="text-right">
							{{ number_format($row->profits - $row->cost) }}<br>
							<small class="gray" >[{{ number_format($row->profits_avg,1) }}]</small>
						</td>
						
						<td class="text-right">
							{{ number_format($row->paymentToFactory) }}<br>
							<small class="gray" >[{{ number_format($row->total_return) }}]</small>
						</td>
						
						
						<td class="text-right">
							{{ number_format($row->payment) }}<br>
							<small class="gray" >{{ number_format($row->debt_total + $row->debt_other_total) }}</small>
						</td>
						
						<td class="text-right">
							{{ number_format($row->cost) }}<br>
						</td>
						
						<td class="text-right">
<?php
//Von con = (Von moi + Tong thu) - (Tong Chi - Von cu)
//$temp = ($totalCapital - ($row->cost + $row->total_return + $row->debt_total + $row->debt_other_total);
$temp = 0;
?>
							{{ number_format($temp) }}<br>
						</td>
                    </tr>
                <?php } ?>
            </tbody>
            <thead>					
                <tr class="info">
					<th> </th>
					<th> {{ number_format($total_quality) }}</th>
					<th> {{ number_format($total_profits) }}</th>
					<th> {{ number_format($total_payment) }}</th>
					<th> </th>		
					<th> </th>
					<th> </th>
                </tr>			
                <tr class="info">
					<th> {{ MyLang::out('Month') }}</th>
					<th> {{ MyLang::out('Quality') }}</th>
					<th> {{ MyLang::out('Profits') }}</th>
					<th> {{ MyLang::out('Payment To Factory') }}</th>
					<th> {{ MyLang::out('Payment') }}</th>		
					<th> {{ MyLang::out('Cost') }}</th>
					<th> {{ MyLang::out('Remaining Capital') }}</th>
                </tr>
            </thead>			
        </table>
    </div>
</div>








<b>{{ MyLang::out('Report by seller') }}</b>
<div class="row-fluid show-grid">
    <div class="span12">
        <table width="100%" class="table striped table-bordered table-condensed">
            <thead>	
                <tr class="info">
					<th> {{ MyLang::out('Month') }}</th>
					<th> {{ MyLang::out('Quality') }}</th>
					<th> {{ MyLang::out('Profits') }}</th>
					<th> {{ MyLang::out('Payment') }}</th>
					<th> {{ MyLang::out('Debt Total') }}</th>                  
                </tr>
            </thead>		
            <tbody>
                <?php				
                foreach ($reportSeller as $row)				
                {
                ?>
                    <tr class="month{{ $row->mon%2 }}">
						<td>
							<b>{{ $row->mon }}</b><br>
							{{ $row->seller_name }}
						</td>
						
						<td class="text-right">{{ number_format($row->quality) }}</td>
						
						<td class="text-right">
							{{ number_format($row->profits) }}<br>
							<small class="gray" >[{{ number_format($row->profits_avg,1) }}]</small>
						</td>
						
						<td class="text-right">{{ number_format($row->payment) }}</td>
						
						<td class="text-right">
							{{ number_format($row->debt_total) }}<br>
							<small class="gray" >[{{ number_format($row->debt_other_total) }}]</small>
						</td>
                    </tr>
                <?php } ?>
            </tbody>			
        </table>		
    </div>
</div>
@stop