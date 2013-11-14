@extends('layouts.default')

@section('content')
<div class="row-fluid">
    <div class="span12">
        {{ Form::open(array('route' => 'share-holder-cost.store')) }}
            @include('share-holder-cost.form')
        {{ Form::close() }}
    </div>
</div>
@stop