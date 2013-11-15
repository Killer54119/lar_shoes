@extends('layouts.default')

@section('content')
<div class="span12">
    {{ Form::open(array('route' => 'seller-invoice.store', 'files' => true)) }}
        @include('seller-invoice.form')
    {{ Form::close() }}
</div>
@stop