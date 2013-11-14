@extends('layouts.default')

@section('content')
<div class="row-fluid">
    <div class="span12">
        {{ Form::open(array('route' => 'seller.store')) }}
        @include('seller.form')
        {{ Form::close() }}
    </div>
</div>
@stop