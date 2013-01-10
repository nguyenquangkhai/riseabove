<?php
$im = imagecreatetruecolor(100, 100);
define('CONTENT_Y', 650);
//define('CONTENT_X', );

$text_color = imagecolorallocate($im, 232, 184, 118);

define('TEXT_COLOR', $text_color);
define('TEXT_FONT', 'fonts/timesi.ttf');
define('TEXT_SIZE', 10.5);
define('TEXT_MAX_CHAR', 40);
define('TEXT_WIDTH', 190);
//define('TEXT_FONT_STRING', imageloadfont ('fonts/timesi.ttf'));
define('TEXT_HEIGHT_NORMAL',125);
define('TEXT_HEIGHT_SMALL', 60);

define('IMAGE_HEIGHT_NORMAL', 125);
define('IMAGE_HEIGHT_SMALL', 90);
define('GALLERY_URL', 'images/gallery/');
define('GALLERY_PATTERN', 'GA-');	

define('SHARE_URL', 'images/share/');






