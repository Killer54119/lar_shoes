<table width="100%" class="table table-bordered table-hover">

    <tr>
        <td class="required">{{ MyLang::out('Seller Name') }}</td>
        <td>{{ Form::text('seller_name') }}</td>        
    </tr>
	
    <tr>
        <td >{{ MyLang::out('Seller Address') }}</td>
        <td>{{ Form::text('seller_address') }}</td>        
    </tr>
	
	<tr>
        <td >{{ MyLang::out('Phone') }}</td>
        <td>{{ Form::text('phone') }}</td>        
    </tr>
	
	<tr>
        <td >{{ MyLang::out('Debt Other Total') }}</td>
        <td class="numbersOnly" >{{ Form::text('debt_other_total') }}</td>        
    </tr>
	
    <tr>
        <td >{{ MyLang::out('Seller Note') }}</td>
        <td>{{ Form::textarea('seller_note') }}</td>        
    </tr>


	
    <tr>
        <td colspan="2">
			<a href="/seller" class="btn"><?=MyLang::out('Back')?></a>
            <button type="reset"  class="btn" ><i class="icon-refresh"></i> {{ MyLang::out('Reset') }}</button>
            <button type="submit" class="btn btn-primary" ><i class="icon-ok-circle icon-white"></i> {{ MyLang::out('Save') }}</button>    
        </td>
    </tr>
</table>

@if ($errors->any())
<script>
    $(function() {
        errorMessages = <?= json_encode($errors->getMessages()) ?>;
        Common.showError(errorMessages);
    });
</script>
@endif