<?php
$sellerId = 1;
if(isset($params['col'])) {
	$sellerId = $params['kw']; 
}
?>
{{ Form::select('seller_id', 
                Seller::lists('seller_name', 'seller_id'), 
				$sellerId, 
				array('class' => 'w-min txt-large')
				) }}

<div class="pull-right">
    <a href="/seller-invoice/create" class="btn btn-small btn-success">
        <i class="icon-plus icon-white"></i>
        {{ MyLang::out('Add Seller Invoice') }}
    </a>
</div>

<script>
$(function() {
	$('select[name=seller_id]').change(function() {
		window.location = '/seller-invoice/search?col=seller_id&kw=' + $(this).val();
	});
});	
</script>