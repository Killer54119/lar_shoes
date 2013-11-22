<?php
$sellerId = null;
if(isset($params['col'])) {
	$sellerId = $params['kw']; 
}
$seller =  Seller::lists('seller_name', 'seller_id');
$optSeller = array('null' => '-SẠP-');
foreach ($seller as $k=>$v) {
    $optSeller[$k] = $v;
}
?>
<i class="icon-user"></i>
{{ Form::select('seller_id', 
                $optSeller, 
                $sellerId, 
                array('class' => 'w-min txt-large')
                ) }}

<div class="pull-right">
	
	<a href="/seller-invoice/return" class="btn btn-small btn-danger">
        <i class="icon-ban-circle icon-white"></i>&nbsp;
    </a>
	&nbsp;&nbsp;&nbsp;
	
    <a href="/seller-invoice/create" class="btn btn-small btn-success">
        <i class="icon-plus icon-white"></i>&nbsp;
    </a>
</div>

<script>
$(function() {
    $('select[name=seller_id]').change(function() {
        if($(this).val() == 'null') {
		    window.location = '/seller-invoice';
		}else {
		    window.location = '/seller-invoice/search?col=seller_id&kw=' + $(this).val();
		}
    });
});	
</script>