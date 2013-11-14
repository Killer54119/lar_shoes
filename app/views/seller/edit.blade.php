@extends('layouts.default')

@section('content')
<div class="row-fluid">
    <div class="span12">
        {{ Form::model($results, array(
        'method' => 'PATCH', 
        'route' => array('seller.update', $results->seller_id), 
        'class' => 'form-horizontal')) }}
        @include('seller.form')
        {{ Form::close() }}
    </div>
</div>
@stop