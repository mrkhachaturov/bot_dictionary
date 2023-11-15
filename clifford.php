<?php

function register_clifford() {
    global $dics;

    $dics = array_merge($dics, array(
        "@service2" => "bot_resp_service2",
        "@equipment" => "bot_resp_equipment",

    ));
}

function bot_resp_service2($word, $strong = false) {
    $dic = array(
        'то' => 'техобслуживание',
        'техобслуж' => 'техобслуживание',
        'технич' => 'техобслуживание',
        'автосервис' => 'автосервис',
        'сервис' => 'автосервис',
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

function bot_resp_equipment($word, $strong = false) {
    $dic = array(
        'стар' => 'старлайн',
        'климат' => 'климатическое оборудование',
        'оборуд' => 'климатическое оборудование',
        'сигнал' => 'сигнализация',
        'допол' => 'дополнительное оборудование',
        'ремонт' => 'ремонт',
        'установ' => 'установка',
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