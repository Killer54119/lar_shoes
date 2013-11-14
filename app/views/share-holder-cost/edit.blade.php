@extends('layouts.default')

@section('content')
<div class="row-fluid">
    <div class="span12">
        {{ Form::model($results, array(
                                    'method' => 'PATCH', 
                                    'route' => array('share-holder-cost.update', $results->cost_id), 
                                    'class' => 'form-horizontal')) }}
            @include('share-holder-cost.form')
        {{ Form::close() }}
    </div>
</div>
@stop