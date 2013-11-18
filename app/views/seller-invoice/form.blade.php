<link href="{{{ asset('assets/css/datepicker.css') }}}" rel="stylesheet">
<script src="{{{ asset('assets/js/bootstrap-datepicker.js') }}}"></script>

@if( isset($isEdit) )
	<input class="w-min" readonly="readonly" type="text" value="{{ date('d-m-Y') }} ">	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<i class="icon-user"></i>
	{{ Form::select('seller_id', 
					Seller::lists('seller_name', 'seller_id'), 
					null,
					array('class' => 'w-min txt-large')
					) }}
@else
	{{ Form::text('created_at', date('d-m-Y'), array('id'=>'created_at', 'class'=>'w-min')) }}
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<i class="icon-user"></i>
	{{ Form::select('seller_id', 
					Seller::lists('seller_name', 'seller_id'), 
					isset($_COOKIE['seller_id']) ? $_COOKIE['seller_id'] : 1,
					array('class' => 'w-min txt-large')
					) }}
@endif
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
                <div>{{ Form::text('quality', null, array('class'=>'w-min')) }}</div>
        </div>
        <div class="left">
                {{ MyLang::out('Cost Price') }}
                <div>{{ Form::text('cost_price', null, array('class'=>'w-min')) }}</div>
        </div>
        <div class="left">
                {{ MyLang::out('Selling Price') }}
                 <div>{{ Form::text('selling_price', null, array('class'=>'w-min')) }}</div>
        </div>
    </div>
    <input type="file" size="15" name="image">
</div>

<br>
<div class="alert-info">
    <div class="row-fluid">
        <div class="left">
            {{ MyLang::out('Payment') }}
            <div>{{ Form::text('payment', null, array('class'=>'w-medium')) }}</div>
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


<script>
    var debt_total = 0;
    $(function() {        
        /* Get debt_total */
        $('select[name=seller_id]').change(function() {
            $('input[name=debt_total]').val('---');
            $.get('/seller/get?field=debt_total&id=' + $(this).val(), function(res){
                debt_total = res;
                $('input[name=debt_total]').val(debt_total);
            });

            setCookie('seller_id', $(this).val());
        });		
        $('select[name=seller_id]').change();
		
		$('#created_at').datepicker({
			'format': 'd-m-yyyy'
		});
    });
	
    function setCookie(c_name,value) {
        var exdays = 7;
        var exdate=new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value=escape(value) + ((exdays==null) ? "" : "; path=/; expires="+exdate.toUTCString());
        document.cookie=c_name + "=" + c_value;
    }
</script>