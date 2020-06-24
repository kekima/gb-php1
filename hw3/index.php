<?php
define('TEMPLATES_DIR', './templates/');
define('LAYOUTS_DIR', 'layouts/');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}
$params = [];
switch ($page) {
    case 'index':
        $params['name'] = "alex";
        break;
    case 'catalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        break;
}

echo render($page, $params);



function render($page, $params = []) {
    return renderTemplate(LAYOUTS_DIR . 'main',
        [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu')
        ]
    );
}

function renderTemplate($page, $params = []) {
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }
    //Как работает Extract
    /*
    foreach ($params as $key => $value) {
        $$key = $value;
    }
*/
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Такой страницы не существует. 404");
    }
    return ob_get_clean();
}


