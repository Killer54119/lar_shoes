<table width="100%" class="table table-bordered table-hover">

    <tr>
        <td class="required">{{ MyLang::out('Share Holder Name') }}</td>
        <td>{{ Form::text('share_holder_name') }}</td>
    </tr>
	
    <tr>
        <td >{{ MyLang::out('Share Holder Capital') }}</td>
        <td>{{ Form::text('share_holder_capital') }}</td>
    </tr>	
	
    <tr>
        <td >{{ MyLang::out('Share Holder Address') }}</td>
        <td>{{ Form::text('share_holder_address') }}</td>

    </tr>
	
	<tr>
        <td >{{ MyLang::out('Phone') }}</td>
        <td>{{ Form::text('phone') }}</td>        
    </tr>
	
    <tr>
        <td >{{ MyLang::out('Share Holder Note') }}</td>
        <td>{{ Form::textarea('share_holder_note') }}</td>
    </tr>

    <tr>
        <td colspan="2">
			<a href="/share-holder" class="btn"><?=MyLang::out('Back')?></a>
            <button type="reset"  class="btn" >{{ MyLang::out('Reset') }}</button>
            <button type="submit" class="btn btn-primary" >{{ MyLang::out('Save') }}</button>    
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