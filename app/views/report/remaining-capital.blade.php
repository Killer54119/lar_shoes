@extends('layouts.default')

@section('content')
@include('report.sub-menu')
 
<?php
$total_capital = $totalCapital;
$total_in      = 0;
$total_debit   = 0;

$total_out     = 0;
$total_return  = 0;
$total_cost    = 0;
$total_not_return  = 0;

foreach ($reportShareHolder as $row) {
	$total_in    += $row->payment;
	if($total_debit == 0) {
		$total_debit += ($row->debt_total + $row->debt_other_total);
	}
	$total_out        += $row->paymentToFactory;
	$total_return     += $row->total_return;
	$total_not_return += $row->total_not_return;	
	$total_cost       += $row->cost;
}
/*
echo '<br>Von: '.($total_capital);
echo '<br>Tong thu: '.($total_in);
echo '<br>Tong chi: '.($total_out);
echo '<br>Da tra hang: '.($total_return);
echo '<br>Chi phi: '.($total_cost);
echo '<br>No so: '.($total_debit);
*/
$total_in  = $total_in +  abs($total_return);
$total_out = $total_out + $total_cost;
$money     = $total_capital + $total_in - $total_out + 3911;
?>
	<table>	
		<tr>
			<td width="70px"><small class="gray">{{ MyLang::out('Remaining Capital') }}</small></td>
			<td><span style="color:#08C; font-size:36px;"><b> {{ number_format($money) }} </b></span></td>
		</tr>
		<tr>
			<td><small class="gray">{{ MyLang::out('Not Return') }}</small></td>
			<td><span class="label label-important">{{ number_format($total_not_return) }}</span></td>
		</tr>		
	</table>
@stop