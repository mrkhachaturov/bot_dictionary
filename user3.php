<?php

function register_user3() {
        global $dics;

        $dics = array_merge($dics, array(
                "@shodrazval" => "bot_resp_shodrazval",
		"@oil" => "bot_resp_oil",
                "@brake" => "bot_resp_brake",
		"@pads" => "bot_resp_pads",
                "@tire" => "bot_resp_tire",
                "@drossel" => "bot_resp_drossel",
		"@carmaintenance" => "bot_resp_carmaintenance",
		"@reason_good" => "bot_resp_reason_good",
                "@reason_bad" => "bot_resp_reason_bad",
        ));
}

function bot_resp_shodrazval($word, $strong = false) {
        $dic = array(
                'сход-развал' => 'Проверка и регулировка углов установки колёс',
                'развал' => 'Проверка и регулировка углов установки колёс',
                'схождение' => 'Проверка и регулировка углов установки колёс',
                'развал-схождение' => 'Проверка и регулировка углов установки колёс',
                'углы колес' => 'Проверка и регулировка углов установки колёс',
                'углы' => 'Проверка и регулировка углов установки колёс',
                'регулировка углов' => 'Проверка и регулировка углов установки колёс',
                'проверка углов' => 'Проверка и регулировка углов установки колёс',
                'регулировка колес' => 'Проверка и регулировка углов установки колёс',
                'колеса' => 'Проверка и регулировка углов установки колёс',
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

function bot_resp_brake($word, $strong = false) {
        $dic = array(
                'торможение' => 'Проверка тормоза',
                'проверить тормоз' => 'Проверка тормоза',
                'тормоз' => 'Проверка тормоза',
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

function bot_resp_tire($word, $strong = false) {

        $excl = array(
                'машин',
        );

        foreach ($excl as $item) {
                if (strstr($word, $item))
                        return false;
        }

        $dic = array(
                'шиномонтаж' => 'Шиномонтаж',
                'колес' => 'Шиномонтаж',
                'шины' => 'Шиномонтаж',
                'переобуться' => 'Шиномонтаж',
                'резин' => 'Шиномонтаж',
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

function bot_resp_pads($word, $strong = false) {
        $dic = array(
                'колодки' => 'Замена колодок',
                'замена колодок' => 'Замена колодок',
                'замена тормозных колодок' => 'Замена колодок',
                'колодок' => 'Замена колодок'
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

function bot_resp_carmaintenance($word, $strong = false) {
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
                'то' => 'ТО',
                'техосмотр' => 'ТО',
                'технический осмотр' => 'ТО',
                'техническое обслуживание' => 'ТО',
                'техобслуживание' => 'ТО',
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

function bot_resp_oil($word, $strong = false) {
        $dic = array(
                'масло' => 'Замена масла',
                'пять сорок' => '5-40',
                'пять тридцать' => '5-30',
                'пять в сорок' => '5-40',
                'пять в тридцать' => '5-30',
                'замена масла' => 'Замена масла',
                'укол жене арматек' => 'Лукоил Дженезис Арматек',
		'укол жене' => 'Лукоил Дженезис',
		'укол' => 'Лукоил',
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

function bot_resp_drossel($word, $strong = false) {
        $dic = array(
                '8' => 'Прочистка дроссельной заслонки',
                'да 8' => 'Прочистка дроссельной заслонки',
                'дроссель' => 'Прочистка дроссельной заслонки',
                'дросель' => 'Прочистка дроссельной заслонки',
                'дросельная заслонка' => 'Прочистка дроссельной заслонки',
                'чистка заслонки' => 'Прочистка дроссельной заслонки',
                'заслонка' => 'Прочистка дроссельной заслонки',
                'прочистка дросселя' => 'Прочистка дроссельной заслонки',
                'заслонки' => 'Прочистка дроссельной заслонки',
                'прочистка' => 'Прочистка дроссельной заслонки',
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

function bot_resp_reason_good($word, $strong = false) {
        $dic = array(
                'план' => 'планово',
                'заменил шины' => 'замена шин',
                'замени шины' => 'замена шин',
                'замена шин' => 'замена шин',
                'пробег' => 'по пробегу',
                'плановая замена' => 'плановая замена',
                'ремонт' => 'ремонт',
                'переобулся' => 'замена шин',
                'сменил резину' => 'замена шин',
                'смени резину' => 'замена шин',
                'техобслуживание' => 'ТО',
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

function bot_resp_reason_bad($word, $strong = false) {
        $dic = array(
                'износ' => 'быстрый износ',
                'ведет в сторону' => 'ведет в сторону',
		'наезд' => 'наезд на препятствие',
		'плохо' => 'плохо ведет на дороге',
		'проблема' => 'есть проболема',
		'проблемы' => 'есть проблема',
		'вибрация' => 'вибрация',
		'скрип' => 'скрип',
		'педаль проваливается' => 'проваливается педаль',
		'проверьте двигатель' => 'проверьте двигатель',
		'горит лампочка' => 'горит лампочка'

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