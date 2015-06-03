<?php
	$vars = array(
	'project' => 6792,
	'nickname' => '649',
	'order_id' => '123456',
	'amount' => 100,
	'mode_type' => 263,
	'xml' => 1
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.onlinedengi.ru/wmpaycheck.php');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	
	$res = curl_exec($ch);
	echo $res;
	$xml = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);

	if(intval($xml->status) == 0){
	$url = trim($xml->iframeUrl).'?'
			.'payment_id='.trim($xml->paymentId)
			.'&amount_original='.trim($xml->amountOriginal)
			.'&currency='.trim($xml->currency)
			.'&lang='.trim($xml->lang)
			.'&hash='.trim($xml->hash);
	?>
	<iframe name="onmoney" src="<?php echo $url; ?>" width="530" height="925"
	frameborder="0" scrolling="no" marginwidth="0" marginheight="0"></iframe>
	<?php
	}
	else{
	echo $xml->comment;
	}
	?>