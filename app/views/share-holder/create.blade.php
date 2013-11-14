@extends('layouts.default')

@section('content')
<div class="row-fluid">
    <div class="span12">
        {{ Form::open(array('route' => 'share-holder.store')) }}
        @include('share-holder.form')
        {{ Form::close() }}
    </div>
</div>
@stop