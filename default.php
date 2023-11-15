<?php 

function register_default() {
	global $dics;

	$dics = array_merge($dics, array(
		"@def" => "bot_resp_default",
		"@yes" => "bot_resp_yes",
		"@no" => "bot_resp_no",
		"@options" => "bot_resp_options",
		"@number" => "bot_resp_number",
		"@empty" => "bot_resp_empty",
                "@rep" => "bot_resp_repeat",
	));
}

function bot_resp_default($word, $strong = false) {
	return !empty($word) ? $word : true;
}

function bot_resp_empty($word, $strong = false) {
	return empty($word);
}

function bot_resp_yes($word, $strong = false) {
	$excl = array(
		'не понял',
		'не знаю',
		'не уверен',
                'не слышу',
                'не расслышал',
                'не услышал',
                'не подтверждаю',
        );

	foreach ($excl as $item) {
		if (strstr($word, $item))
			return false;
	}

        $dic = array(
                'да' => 'да',
                'требуется' => 'требуется',
                'ладно' => 'ладн',
                'хорошо' => 'хор',
                'понял' => 'поня',
                'принял' => 'приня',
                'согласен' => 'согл',
                'возможно' => 'возм',
                'хочу' => 'хочу',
                'давай' => 'давай',
                'окей' => 'окей',
                'легко' => 'легко',
                'конечно' => 'коне',
                'ага' => 'ага',
		'угу' => 'угу',
		'есть' => 'есть',
		'валяй' => 'валяй',
		'можно' => 'можно',
		'интересно' => 'интересно',
		'то что надо' => 'то что надо',
		'правильно' => 'правильно',
		'молодец' => 'молодец',
		'точно' => 'точно'
        );

        if ($strong)
                return isset($dic[$word]);

        foreach ($dic as $item) {
                if (strstr($word, $item)) {
                        return 'Да';
                }
        }

        return false;
}

function bot_resp_no($word, $strong = false) {
	$excl = array(
		'не понял',
		'не знаю',
		'не уверен',
                'не слышу',
                'не расслышал',
                'не услышал',
        );

	foreach ($excl as $item) {
		if (strstr($word, $item))
			return false;
	}

        $dic = array(
                'не' => 'не',
                'нет' => 'нет',
		'да нет' => 'да нет'
        );

        if ($strong)
                return isset($dic[$word]);

        foreach ($dic as $item) {
                if (strstr($word, $item)) {
                        return 'Нет';
                }
        }

        return false;
}

function bot_resp_number($word, $strong = false) {
	global $_user;

	if (empty($word))
		return false;

	$res = preg_replace('/[^0-9]/', '', $word);

	return $res;
}

function bot_resp_options($word, $strong = false) {
        $dic = array(
                'варианты' => 'варианты',
                'опции' => 'опции',
                'пункты' => 'пункты',
                'что есть' => 'что есть',
                'выбрать' => 'выбрать',
                'выбирать' => 'выбирать',
                'услуги' => 'услуги',
                'какие есть' => 'какие есть',
                'что можете предложить' => 'что можете предложить',
        );

        if ($strong)
                return isset($dic[$word]);

        $chunks = split_chanks($word);

        foreach ($chunks as $chunk) {
                if (isset($dic[$chunk]))
                        return $dic[$chunk];

                foreach ($dic as $key => $val) {
                        if (strstr($chunk, $key))
                                return $val;
                }
        }
                
        return false;
}

function bot_resp_repeat($word, $strong = false) {
        $dic = array(
                'повтори' => 'повтори',
                'до этого' => 'до этого',
                'перед этим' => 'перед этим',
                'что вы сказали' => 'что вы сказали',
                'что ты сказал' => 'что вы сказали',
                'еще раз' => 'еще раз',
                'не понял' => 'не понял',
                'не слышу' => 'не слышу',
                'не расслышал' => 'не расслышал',
                'не услышал' => 'не услышал',
        );

        if ($strong)
                return isset($dic[$word]);

        $chunks = split_chanks($word);

        foreach ($chunks as $chunk) {
                if (isset($dic[$chunk]))
                        return $dic[$chunk];

                foreach ($dic as $key => $val) {
                        if (strstr($chunk, $key))
                                return $val;
                }
        }
                
        return false;
}

?>