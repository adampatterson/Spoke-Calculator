<form method="get" action="<?php echo $paypal->url; ?>">

	<input type="hidden" name="rm" value="2" />
	<input type="hidden" name="cmd" value="_xclick" />
	<input type="hidden" name="business" value="dingos_1274193261_biz@gmail.com" />
	<input type="hidden" name="notify_url" value="<?php echo url::page('paypal/server'); ?>" />
	<input type="hidden" name="return" value="<?php echo url::page('paypal/thanks'); ?>" />
	<input type="hidden" name="item_name" value="Awesome Service" />
	<input type="hidden" name="amount" value="5" />
	<input type="hidden" name="lc" value="US" />
	<input type="hidden" name="no_shipping" value="1" />
	
	<input type="submit" />

</form>