<?php 

function register_rating() {
	global $dics;

	$dics = array_merge($dics, array(
		"@worst" => "bot_resp_worst",
		"@average" => "bot_resp_average",
		"@best" => "bot_resp_best",
	));
}

function bot_resp_best($word, $strong = false) {
        $dic = array(
		'то что надо' => '5',
                'молодец' => '5',
                'отлично' => '5',
                'великолепно' => '5',
                'замечательно' => '5',
		'офигенно' => '5',
                'зашибись' => '5',
                'сногшибательно' => '5',
                'офигительно' => '5',
                'потрясающе' => '5',
                'божественно' => '5',
                'восторг' => '5',
		'5' => '5',
		'пятерка' => '5',
		'пять' => '5',
                'окей' => '5',
                'хорошо' => '4',
		'4' => '4',
		'четверка' => '4',
		'четыре' => '4',
		'нормально' => '4',
		'неплохо' => '4',
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

function bot_resp_average($word, $strong = false) {
        $dic = array(
                '3' => '3',
                'три' => '3',
                'тройка' => '3',
                'трояк' => '3',
		'не знаю' => '3',
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

function bot_resp_worst($word, $strong = false) {
        $dic = array(
                'очень не удовлетворен' => '1',
                'очень плохо' => '1',
		'ужасно' => '1',
		'кошмар' => '1',
		'отвратительно' => '1',
		'единица' => '1',
		'один' => '1',
                '1' => '1',
		'кол' => '1',
		'не удовлетворен' => '2',
		'плохо' => '2',
		'двойка' => '2',
		'два' => '2',
                '2' => '2',
		'не очень' => '2',
		'так себе' => '2',
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