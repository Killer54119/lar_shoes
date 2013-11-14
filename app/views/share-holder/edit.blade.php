@extends('layouts.default')

@section('content')
<div class="row-fluid">
    <div class="span12">
        {{ Form::model($results, array(
        'method' => 'PATCH', 
        'route' => array('share-holder.update', $results->share_holder_id), 
        'class' => 'form-horizontal')) }}
        @include('share-holder.form')
        {{ Form::close() }}
    </div>
</div>
@stop