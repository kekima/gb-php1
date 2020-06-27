<?php

$locations = [
        'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
        'Ленинградская область' => ['Санкт-Петербург', 'Зеленоград', 'Павловск', 'Кронштадт'],
        'Рязанская область' => ['Рязань', 'Сасово', 'Новомичуринск'],
		];



function listing($locations) {

    foreach ($locations as $region => $cities) {
            echo $region . ":<br>";
            echo implode(', ', $cities). ".<br><br>";
    }
};


listing($locations);