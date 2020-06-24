<?php

$alphabet = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
		];

$str = "Здесь строчка с БУкОвКами же..";
$translitStr = '';

for ($i = 0; $i <= mb_strlen($str); $i++) {
    $char = mb_substr($str, $i, 1);

    if (mb_strtolower($char) == $char) {
        $translitStr .= isset($alphabet[$char]) ? $alphabet[$char] : $char;
    } else {
        $schar = mb_strtolower($char);
        $translitStr .= isset($alphabet[$schar]) ? mb_strtoupper($alphabet[$schar]) : mb_strtoupper($schar);
    }
};

echo $str . "<br>";
echo $translitStr;




