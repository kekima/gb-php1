<?php
	$title = "Главная страница - страница обо мне";
	$h1 = "Информация обо мне";
	$curYear = "2018";

	$content = file_get_contents("site.html");

	$content = str_replace("{{ title }}", $title, $content);
	$content = str_replace("{{ h1 }}", $h1, $content);
	$content = str_replace("{{ curYear }}", $curYear, $content);

	echo $content;