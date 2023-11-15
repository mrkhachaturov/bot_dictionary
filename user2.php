<?php 

function register_user2() {
	global $dics;

	$dics = array_merge($dics, array(
		"@operator" => "bot_resp_operator",
		"@manager" => "bot_resp_manager",
		"@abon" => "bot_resp_abon",
		"@support" => "bot_resp_support",
		"@sales" => "bot_resp_sales",
		"@var1" => "bot_resp_var1",
		"@var2" => "bot_resp_var2",
		"@valera" => "bot_resp_valera",
	));
}

function bot_resp_var1($word, $strong = false) {
        $dic = array(
                'коврик' => 'Ковры',
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

function bot_resp_valera($word, $strong = false) {
        $dic = array(
                'валер' => 'Валера',
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


function bot_resp_var2($word, $strong = false) {
        $dic = array(
                'подшип' => 'подшипники',
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

function bot_resp_operator($word, $strong = false) {
        $dic = array(
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

function bot_resp_manager($word, $strong = false) {
        $dic = array(
                'руководство' => 'руководство',
                'руководителя' => 'руководителя',
                'менеджер' => 'менеджер',
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

function bot_resp_abon($word, $strong = false) {
        $dic = array(
                'жаловаться' => 'жалоба',
                'службу качества' => 'служба качества',
                'жалоба' => 'жалоба',
                'абонент' => 'абонентский отдел',
		'абонентский' => 'абонентский отдел',
		'абон' => 'абонентский отдел',
                'абонентская' => 'абонентский отдел',
                'оплата' => 'оплата',
		'биллинг' => 'биллинг',
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

function bot_resp_support($word, $strong = false) {
        $dic = array(
                'специалист' => 'специалист',
                'техподдержка' => 'техподдержка',
                'техподдержку' => 'техподдержка',
		'техническая' => 'техподдержка',
		'ТП' => 'техподдержка',
		'настройка' => 'настройка',
		'сломалось' => 'сломалось',
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

function bot_resp_sales($word, $strong = false) {
        $dic = array(
                'покупка' => 'купить',
                'купить' => 'купить',
		'приобрести' => 'приобрести',
                'цена' => 'уточнить цену',
                'цены' => 'уточнить цену',
		'продаж' => 'продажа',
		'стоимость' => 'отдел продаж',
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