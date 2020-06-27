<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Document</title>
</head>
<body>

<?php

$menu  = [
    'Home' => [
        'link' => "/index.php",
        'name' => "Home",
        'enabled' => true
    ],
    'About' => [
        'link' => "/about.php",
        'name' => "About",
        'enabled' => true
    ],
    'Admin' => [
        'link' => "/about.php",
        'name' => "Admin access",
        'enabled' => false
    ],

];

?>

<ul>

<?php foreach($menu as $item) {  ?> 
<?php     if($item['enabled']) {  ?>
<li> <a href="<?php echo $item['link']?>"><?php echo $item['name']?></a></li>
<?php } } ?>

</ul>
 
</body>
</html>