@extends('layouts.default')

@section('content')
@include('report.sub-menu')

<!-- List all seller-invoice -->
<b>{{ MyLang::out('Report by month') }}</b>
<div class="row-fluid show-grid">
    <div class="span12">
        <table width="100%" class="table table-bordered">		
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
                </tr>			
                <tr class="info">
                        <th> {{ MyLang::out('Month') }}</th>
                        <th> {{ MyLang::out('Quality') }}</th>
                        <th> {{ MyLang::out('Profits') }}</th>
                        <th> {{ MyLang::out('Payment To Factory') }}</th>
                        <th> {{ MyLang::out('Payment') }}</th>		
                        <th> {{ MyLang::out('Cost') }}</th>
                </tr>
            </thead>			
        </table>
    </div>
</div>
@stop