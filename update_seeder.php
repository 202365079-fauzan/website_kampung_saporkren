<?php
$content = file_get_contents('database/seeders/TourPackageSeeder.php');
$content = preg_replace_callback('/\'price\'\s*=>\s*\'Rp\.?\s*([\d\.]+).*?\',/', function($matches) {
    $num = str_replace('.', '', $matches[1]);
    return "'price' => $num,";
}, $content);
file_put_contents('database/seeders/TourPackageSeeder.php', $content);
