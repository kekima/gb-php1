<?php

$menu = renderTemplate("menu");
$about = renderTemplate("about");

//echo renderTemplate("site", $about);

//$sum = $menu .= $about;
//echo renderTemplate("site", $sum);

echo renderTemplate("site", $menu, $about);

function renderTemplate($page, $menu = "", $about = "") {
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}