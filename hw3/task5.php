<?php

$origText = "Это бессмысленный текст, лорем ипсум и всё такое..";

$newText = str_replace(" ", "_", $origText);

echo $origText . "<br>";
echo $newText;
