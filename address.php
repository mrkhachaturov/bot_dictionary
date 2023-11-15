<?php 

function register_address() {
	global $dics;

	$dics = array_merge($dics, array(
		"@addr" => "bot_resp_address",
	));
}

function bot_resp_address($word, $strong = false) {
	return preg_replace("/(\d+)(\.)(\d+)/", "$1/$3", $word);
}

?>