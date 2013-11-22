<table width="100%" class="table table-bordered table-hover">

    <tr>
        <td class="required">{{ MyLang::out('Share Holder Name') }}</td>
        <td>{{ Form::text('share_holder_name') }}</td>
    </tr>
	
    <tr>
        <td >{{ MyLang::out('Share Holder Capital') }}</td>
        <td class="numbersOnly">
			{{ Form::text('share_holder_capital', null, array('readonly'=>'readonly', 'id'=>'capital')) }}			
		</td>
    </tr>	
	
    <!-- tr>
        <td >{{ MyLang::out('Share Holder Address') }}</td>
        <td>{{ Form::text('share_holder_address') }}</td>
    </tr>
	
	<tr>
        <td >{{ MyLang::out('Phone') }}</td>
        <td>{{ Form::text('phone') }}</td>        
    </tr-->
	
    <tr>
        <td >{{ MyLang::out('Share Holder Note') }}</td>
        <td>
			<input type="text" class="content" value="<?php echo date('d/m')?>: " /><br/>
			<input type="number" class="money w-medium" placeholder="Số tiền" />
			<span class="btn btn-success btn-small btnAddCapital" ><i class="icon-plus icon-white"></i>&nbsp;</span><br/>
			{{ Form::textarea('share_holder_note', null, array('readonly'=>'readonly')) }}		
		</td>
    </tr>

    <tr>
        <td colspan="2">
			<a href="/share-holder" class="btn"><?=MyLang::out('Back')?></a>
            <button type="reset"  class="btn" >{{ MyLang::out('Reset') }}</button>
            <button type="submit" class="btn btn-primary" >{{ MyLang::out('Save') }}</button>    
        </td>
    </tr>
</table>


<script>
$(function() {
	@if ($errors->any())
	errorMessages = <?= json_encode($errors->getMessages()) ?>;
	Common.showError(errorMessages);
	@endif
	
	$('.btnAddCapital').click(function(){
	    $('.money').removeClass('error');
	
		if (($('.money').val() == '') || ($('.content').val() == '') ) {
			$('.money').addClass('error');
			return;
		}
		
		$('#capital').val(parseInt($('#capital').val()) + parseInt($('.money').val()));
		
		var newValue = $('textarea[name=share_holder_note]').val() + "\n" + 		               
					   strPad($('.money').val(),6) + 
					   ' [' + $('.content').val() + ']';
		$('textarea[name=share_holder_note]').val(newValue);
		
	});
});

function strPad(i,l) {
	var o = i.toString();
	while (o.length < l) {
		o += ' ';
	}
	return o;
};
</script>
