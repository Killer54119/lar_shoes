<table width="100%" class="table table-bordered table-hover">

    <tr>
        <td class="required">{{ MyLang::out('Cost For') }}</td>
        <td>{{ Form::text('cost_for') }}</td>
        
    </tr>

    <tr>
        <td class="required">{{ MyLang::out('Cost') }}</td>
        <td class="numbersOnly">{{ Form::text('cost') }}</td>
        
    </tr>

    <tr>
        <td colspan="2">
			<a href="/share-holder-cost" class="btn"><?=MyLang::out('Back')?></a>
            <button type="reset"  class="btn" >{{ MyLang::out('Reset') }}</button>
            <button type="submit" class="btn btn-primary" >{{ MyLang::out('Save') }}</button>    
		</td>
    </tr>
</table>
        
@if ($errors->any())
<script>    
    $(function(){
        errorMessages = <?= json_encode($errors->getMessages()) ?>;
        Common.showError(errorMessages);
    });
</script>
@endif