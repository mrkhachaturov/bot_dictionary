<?php 

function register_features() {
	global $dics;

	$dics = array_merge($dics, array(
                "@features" => "bot_resp_features",
                "@odas" => "bot_resp_odas",
                "@clifford" => "bot_resp_clifford",
                "@onec" => "bot_resp_onec",
                "@autoserv" => "bot_resp_autoserv"
	));
}

function bot_resp_features($word, $strong = false) {
	$dic = array (
		"особенности" => "особенности",
                "возможности" => "возможности",
                "что ты умеешь" => "что ты умеешь",
                "что умеешь" => "что умеешь"
	);

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

function bot_resp_odas($word, $strong = false) {
        $dic = array (
                "одас" => "одас",
                "брайт парк" => "брайт парк",
                "брайт" => "брайт парк",
                "парк" => "парк",
                "одос" => "одос"
        );

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

function bot_resp_clifford($word, $strong = false) {
        $dic = array (
                "клиффорд" => "клиффорд",
                "клиф" => "клиф"
        );

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

function bot_resp_onec($word, $strong = false) {
        $dic = array (
                "один с" => "один с",
                "1 с" => "1 с"
        );

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

function bot_resp_autoserv($word, $strong = false) {
        $dic = array (
                "автосервис" => "автосервис",
                "авто сервис" => "автосервис"
        );

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