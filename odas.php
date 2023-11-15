<?php

function register_odas() {
        global $dics;

        $dics = array_merge($dics, array(
                "@service" => "bot_resp_service",
		"@new-car" => "bot_resp_new_car",
                "@used-car" => "bot_resp_used_car",
		"@natural" => "bot_resp_natural",
                "@legal" => "bot_resp_legal",
        ));
}

function bot_resp_legal($word, $strong = false) {

/*      $excl = array(
	);

        foreach ($excl as $item) {
                if (strstr($word, $item))
                        return false;
        }
*/
        $dic = array(
                'юрик' => 'Юридическое лицо',
                'юрлицо' => 'Юридическое лицо',
                'юридич' => 'Юридическое лицо',
                'юридическое лицо' => 'Юридическое лицо',
                'организац' => 'Юридическое лицо',
                'по работе' => 'Юридическое лицо',
                'для работы' => 'Юридическое лицо',
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

function bot_resp_new_car($word, $strong = false) {

        $dic = array(
                'новый' => 'Новый автомобиль',
                'новая' => 'Новый автомобиль',
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

function bot_resp_used_car($word, $strong = false) {

	$excl = array(
		'без пробега',
	);

        foreach ($excl as $item) {
                if (strstr($word, $item))
                        return false;
        }

        $dic = array(
                'с пробегом' => 'Подержанный автомобиль',
                'не новый' => 'Подержанный автомобиль',
                'бу' => 'Подержанный автомобиль',
                'подержан' => 'Подержанный автомобиль',
                'пробег' => 'Подержанный автомобиль',
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

function bot_resp_natural($word, $strong = false) {

/*        $excl = array(
		'то',
	);

        foreach ($excl as $item) {
                if (strstr($word, $item))
                        return false;
        }
*/
        $dic = array(
                'физлицо' => 'Физическое лицо',
                'физическое лицо' => 'Физическое лицо',
                'для себя' => 'Физическое лицо',
                'физик' => 'Физическое лицо',
                'физическ' => 'Физическое лицо',
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

function bot_resp_service($word, $strong = false) {
        $excl = array(
                'автомобил',
		'что то',
                'почему то',
                'где то',
                'как то',
        );

        foreach ($excl as $item) {
                if (strstr($word, $item))
                        return false;
        }

        $dic = array(
                'сервис' => 'Сервис',
                'обслуж' => 'Сервис',
                'то' => 'Сервис',
                'техосмотр' => 'Сервис',
                'технический осмотр' => 'Сервис',
                'техническое обслуживание' => 'Сервис',
                'техобслуживание' => 'Сервис',
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
