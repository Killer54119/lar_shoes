@extends('layouts.default')

@section('content')
@include('report.sub-menu')

<b>{{ MyLang::out('Report by seller') }}</b>
<div class="row-fluid show-grid">
    <div class="span12">
        <table width="100%" class="table table-bordered">
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
                <?php foreach ($reportSeller as $row) {  ?>
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