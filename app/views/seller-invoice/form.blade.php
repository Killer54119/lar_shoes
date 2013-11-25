<link href="{{{ asset('assets/css/datepicker.css') }}}" rel="stylesheet">
<script src="{{{ asset('assets/js/bootstrap-datepicker.js') }}}"></script>
<?php
$seller =  Seller::lists('seller_name', 'seller_id');
$optSeller = array('null' => '-SẠP-');
foreach ($seller as $k=>$v) {
    $optSeller[$k] = $v;
}
?>

{{ Form::text('created_at', date('d-m-Y'), array('id'=>'created_at', 'class'=>'w-min')) }}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon-user"></i>
{{ Form::select('seller_id', $optSeller, null, array('class' => 'w-medium txt-large')	)}}
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
				<input class="w-min" type="number" name="quality" value="<?php echo isset($results->quality) ? $results->quality : '';?>">
			</div>
        </div>
        <div class="left">
            {{ MyLang::out('Cost Price') }} <span class="gray cal-quick-cost">0</span>
			<div>
				<input class="w-min" type="number" name="cost_price" value="<?php echo isset($results->cost_price) ? $results->cost_price : '';?>">
			</div>
        </div>
        <div class="left">
            {{ MyLang::out('Selling Price') }} <span class="gray cal-quick-selling">0</span>
			<div>
				<input class="w-min" type="number" name="selling_price" value="<?php echo isset($results->selling_price) ? $results->selling_price : '';?>">
			</div>
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
				<input class="w-medium" type="number" name="payment" value="<?php echo isset($results->payment) ? $results->payment : '';?>">
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
        });
        /*Quick calculate*/
        $('input[name=cost_price]').keyup(function(){
            $('.cal-quick-cost').html($('input[name=quality]').val() * $(this).val());
        });
        $('input[name=selling_price]').keyup(function(){
            $('.cal-quick-selling').html($('input[name=quality]').val() * $(this).val());
        });
        $('input[name=quality]').keyup(function(){
            $('.cal-quick-cost').html($('input[name=cost_price]').val() * $(this).val());
            $('.cal-quick-selling').html($('input[name=selling_price]').val() * $(this).val());
        });

		$('#created_at').datepicker({			
			 weekStart: 1,
             autoclose: true,
			 format: 'd-m-yyyy',
		});
		
		/* Validate data */
		$("form").submit(function() {
            $('select[name=seller_id]').removeClass('error');
			$('input[name=selling_price]').removeClass('error');
			$('input[name=quality]').removeClass('error');
			
			if($('select[name=seller_id]').val() == 'null'){
				$('select[name=seller_id]').addClass('error');
				return false;
			}
			
			var profit = $('input[name=selling_price]').val() - $('input[name=cost_price]').val();
			if(profit < 0) {
				$('input[name=selling_price]').addClass('error');
			    return false;
			}
			
			if($('input[name=quality]').val() == '' && $('input[name=payment]').val() == '') {
				$('input[name=quality]').addClass('error');
			    return false;			 
			}
			
		    return true;
		});
		
    });
	
</script>