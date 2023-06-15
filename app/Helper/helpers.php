<?php 
function bn_price($arg){
	$en = array(1,2,3,4,5,6,7,8,9,0);
	$bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০'); 
	$str = str_replace($en, $bn, $arg);
	return $str;
}

function find_discount($sellingPrice, $discountPrice){
	$amount = $sellingPrice - $discountPrice;
	$discount =  ( $amount/$sellingPrice) * 100;
	return round($discount);
}


?>