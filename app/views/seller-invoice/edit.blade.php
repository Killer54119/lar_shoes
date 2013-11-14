@extends('layouts.default')

@section('content')
<div class="row-fluid">
    <div class="span12">
        {{ Form::model($results, array(
                                    'method' => 'PATCH', 
                                    'route' => array('seller-invoice.update', $results->invoice_id), 
                                    'class' => 'form-horizontal',
									'files' => true
									)) }}
            @include('seller-invoice.form')
        {{ Form::close() }}
    </div>
</div>
@stop