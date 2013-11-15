{{ Form::select('seller_id', 
                Seller::lists('seller_name', 'seller_id'), 
                isset($_COOKIE['seller_id']) ? $_COOKIE['seller_id'] : 1,
                array('class' => 'w-min txt-large')
                ) }}
<br>
@if ($errors->any())
    <div class="alert alert-danger alert-block">
        {{ MyLang::out('Recheck form') }}
    </div>
@endif
<div class="alert-success">
    <div class="row-fluid">
        <div class="left">
                {{ MyLang::out('Quality') }}
                <div><input type="number" name="quality" min="1" max="2000" class="w-min"></div>
        </div>
        <div class="left">
                {{ MyLang::out('Cost Price') }}
                <div><input type="number" name="cost_price" min="10" max="300" class="w-min"></div>
        </div>
        <div class="left">
                {{ MyLang::out('Selling Price') }}
                 <div><input type="number" name="selling_price" min="10" max="300" class="w-min"></div>
        </div>
    </div>
    <input type="file" size="15" name="image">
</div>

<br>
<div class="alert-info">
    <div class="row-fluid">
        <div class="left">
            {{ MyLang::out('Payment') }}
            <div><input type="number" name="payment" min="100" class="w-nedium"></div>
        </div>
        <div class="left">
            {{ MyLang::out('Debt Total') }}
            <div>{{ Form::text('debt_total', null, array('class'=>'w-nedium txt-debt-total', 'readonly'=>'readonly')) }}</div>
        </div>
    </div>
    {{ MyLang::out('Invoice Note') }}<br>{{ Form::text('invoice_note', null, array('class'=>'w-large')) }}
</div>

<br>
<a href="/seller-invoice" class="btn"><i class="icon-arrow-left"></i><?=MyLang::out('Back')?></a>
<button type="reset"  class="btn" ><i class="icon-refresh"></i>{{ MyLang::out('Reset') }}</button>
<button type="submit" class="btn btn-primary" ><i class="icon-ok-circle icon-white"></i>{{ MyLang::out('Save') }}</button>  


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

            /*Reset data*/
            $('input[name=payment]').val('');
            setCookie('seller_id', $(this).val());
        });		
        $('select[name=seller_id]').change();
    });
	
    function setCookie(c_name,value) {
        var exdays = 7;
        var exdate=new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value=escape(value) + ((exdays==null) ? "" : "; path=/; expires="+exdate.toUTCString());
        document.cookie=c_name + "=" + c_value;
    }
</script>