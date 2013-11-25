@extends('layouts.default')

@section('content')
<div class="span12">
    {{ Form::model($results, array(
                                'method' => 'PATCH', 
                                'route' => array('seller-invoice.update', $results->invoice_id), 
                                'class' => 'form-horizontal',
                                'files' => true
                  )) }}



<!-- EDIT FORM -->
    <input class="w-min" readonly="readonly" type="text" value="{{ date('d-m-Y') }} ">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <i class="icon-user"></i>
    {{ Form::select('seller_id', Seller::lists('seller_name', 'seller_id'), null, array('class' => 'w-medium txt-large', 'disabled'=>'disabled') ) }}
    <br>

    @if ($errors->any())
    <div class="alert alert-danger alert-block">
        {{ MyLang::out('Recheck form') }}
    </div>
    @endif

    <div class="alert-info">
        <div class="row-fluid">
            <div class="left">
                {{ MyLang::out('Quality') }}
                <div>
                    <input  readonly="readonly" class="w-min" type="number" name="quality" value="<?php echo isset($results->quality) ? $results->quality : '';?>">
                </div>
            </div>
            <div class="left">
                {{ MyLang::out('Cost Price') }}
                <div>
                    <input  readonly="readonly" class="w-min" type="number" name="cost_price" value="<?php echo isset($results->cost_price) ? $results->cost_price : '';?>">
                </div>
                <span class="gray cal-quick-cost"><?php echo isset($results->quality) ? number_format($results->quality * $results->cost_price) : '';?></span>
            </div>
            <div class="left">
                <b>{{ MyLang::out('Selling Price') }}</b>
                <div>
                    <input  readonly="readonly" class="w-min" type="number" name="selling_price" value="<?php echo isset($results->selling_price) ? $results->selling_price : '';?>">
                </div>
                <span class="gray cal-quick-selling"><?php echo isset($results->quality) ? number_format($results->quality * $results->selling_price) : '';?></span>
            </div>
        </div>
        <input type="file" size="15" name="image">
    </div>

    <br>
    <div class="alert-info">
        <div class="row-fluid">
            <div class="left">
                {{ MyLang::out('Payment') }}
                <div>
                    <input  readonly="readonly" class="w-medium" type="number" name="payment" value="<?php echo isset($results->payment) ? $results->payment : '';?>">
                </div>
            </div>
            <div class="left">
                {{ MyLang::out('Debt Total') }}
                <div>{{ Form::text('debt_total', null, array('class'=>'w-medium txt-debt-total', 'readonly'=>'readonly')) }}</div>
            </div>
        </div>
        {{ MyLang::out('Invoice Note') }}<br>{{ Form::text('invoice_note', null, array('class'=>'w-large')) }}
    </div>

    <br>
    <a href="/seller-invoice" class="btn"><?=MyLang::out('Back')?></a>
    <button type="reset"  class="btn" >{{ MyLang::out('Reset') }}</button>
    <button type="submit" class="btn btn-primary" >{{ MyLang::out('Save') }}</button>


    {{ Form::hidden('profits') }}



    {{ Form::close() }}
</div>
@stop