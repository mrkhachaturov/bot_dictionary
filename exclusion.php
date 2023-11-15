<?php 

function register_exclusion() {
	global $dics;

	$dics = array_merge($dics, array(
		"@e-oper" => "bot_excl_operator",
		"@e-call" => "bot_excl_call",
                "@e-repeat" => "bot_excl_repeat",
                "@e-empty" => "bot_excl_empty",
                "@e-def" => "bot_excl_default",
	));
}

function bot_excl_operator($word, $strong = false) {
        $dic = array(
                'кожаного мешка' => 'оператор',
                'кожаный мешок' => 'оператор',
                'оператор' => 'оператор',
		'человек' => 'человек',
		'руководство' => 'руководство',
                'руководителя' => 'руководителя',
                'менеджер' => 'менеджер',
                'специалист' => 'специалист',
                'живой' => 'живой',
                'живого' => 'живого',
                'техподдержка' => 'техподдержка',
                'техподдержку' => 'техподдержку',
                'жаловаться' => 'жаловаться',
                'службу качества' => 'службу качества',
                'жалоба' => 'жалоба',
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

function bot_excl_repeat($word, $strong = false) {
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

function bot_excl_call($word, $strong = false) {
	global $_user;
	//if (preg_match("/номер\s+(\d+)/", $word, $match)) {
        if (preg_match("/(\d+)/", $word, $match)) {
		$_user['data.exten'] = $match[1];
		return true;
	}

	return false;
}

function bot_excl_empty($word, $strong = false) {
        return empty($word);
}

function bot_excl_default($word, $strong = false) {
        return !empty($word) ? $word : true;
}

?>