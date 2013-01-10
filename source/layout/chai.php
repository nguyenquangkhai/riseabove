<?php
require_once 'chai_config.php';

$chai = imagecreatefrompng('images/bottle.png');
$thumb= imagecreatetruecolor(imagesx($chai), imagesy($chai));

imagealphablending($thumb,false);
imagealphablending($chai,true);
imagesavealpha($thumb, true);  

imagecopyresampled($thumb, $chai, 0, 0, 0, 0, imagesx($chai), imagesy($chai), imagesx($chai), imagesy($chai));

header('Content-type: image/png');
imagepng($thumb);
imagedestroy($thumb);