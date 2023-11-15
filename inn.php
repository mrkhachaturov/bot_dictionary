<?php 

function register_inn() {
	global $dics;

	$dics = array_merge($dics, array(
		"@inn" => "bot_resp_inn",
	));
}

function bot_resp_inn($word, $strong = false) {
	$inn = preg_replace('/[^0-9]/', '', $word);

	$engine = 'dadata';

	$res = hook_fire('check-inn', array("filter" => $engine, "inn" => $inn));
        if (is_array($res) && !empty($res[$engine]['result'])) {
		verbose(print_r($res[$engine]['result'], true), 'red');

		$sug = $res[$engine]['result'];
		if (!empty($sug))
			return "{$inn} ({$sug['short-name']}, {$sug['address-short']})";

		return $inn;
	}

	return false;
}

?>