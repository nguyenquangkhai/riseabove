<?php
require_once 'chai_config.php';

function create_chai($chai, $template, $topic, $image1, $image2, $text1, $text2, $uid) {
	//Load chai
	if ($uid != null) {
		$chai = imagecreatefrompng('images/bottle.png');
		imagealphablending($chai, true);
		$chai_w = imagesx($chai);
		$chai_h = imagesy($chai);
		//Load image
		$image_1 = imagecreatefrompng('images/creative/images/' . substr($image1, 0, 1) . '/' . $image1 . '.png');
		$image_2 = imagecreatefrompng('images/creative/images/' . substr($image2, 0, 1) . '/' . $image2 . '.png');
		$text_1 = strip_tags($text1);
		$text_2 = strip_tags($text2);
		switch ($template) {
			case 1 :
				imagecopy($chai, $image_1, ($chai_w - imagesx($image_1)) / 2, CONTENT_Y, 0, 0, imagesx($image_1), imagesy($image_1));
				imagettftext($chai, TEXT_SIZE, 0, ($chai_w - TEXT_WIDTH) / 2, CONTENT_Y + imagesy($image_1) + 15, TEXT_COLOR, TEXT_FONT, wordwrap($text_1, TEXT_MAX_CHAR));
				break;
			case 2 :
				imagettftext($chai, TEXT_SIZE, 0, ($chai_w - TEXT_WIDTH) / 2, CONTENT_Y, TEXT_COLOR, TEXT_FONT, wordwrap($text_1, TEXT_MAX_CHAR));
				imagecopy($chai, $image_1, ($chai_w - imagesx($image_1)) / 2, CONTENT_Y + TEXT_HEIGHT_NORMAL + 15, 0, 0, imagesx($image_1), imagesy($image_1));
				break;
			case 3 :
				imagettftext($chai, TEXT_SIZE, 0, ($chai_w - TEXT_WIDTH) / 2, CONTENT_Y, TEXT_COLOR, TEXT_FONT, wordwrap($text_1, TEXT_MAX_CHAR));
				imagecopy($chai, $image_1, ($chai_w - imagesx($image_1)) / 2, CONTENT_Y + TEXT_HEIGHT_SMALL + 15, 0, 0, imagesx($image_1), imagesy($image_1));
				imagettftext($chai, TEXT_SIZE, 0, ($chai_w - TEXT_WIDTH) / 2, CONTENT_Y + TEXT_HEIGHT_SMALL + imagesy($image_1) + 30, TEXT_COLOR, TEXT_FONT, wordwrap($text_2, TEXT_MAX_CHAR));
				break;
			case 4 :
				$wid = imagesx($image_1) * IMAGE_HEIGHT_SMALL / imagesy($image_1);
				imagecopy($chai, $image_1, ($chai_w - imagesx($image_1)) / 2, CONTENT_Y, 0, 0, imagesx($image_1), imagesy($image_1));
				//imagecopyresized($chai, $image_1, ($chai_w - $wid) / 2, CONTENT_Y, 0, 0, $wid, IMAGE_HEIGHT_SMALL, imagesx($image_1), imagesy($image_1));
				$text_hold = imagettftext($chai, TEXT_SIZE, 0, ($chai_w - TEXT_WIDTH) / 2, CONTENT_Y + imagesy($image_1) + 15, TEXT_COLOR, TEXT_FONT, wordwrap($text_1, TEXT_MAX_CHAR));
				//imagecopyresized($chai, $image_2, ($chai_w - $wid) / 2, CONTENT_Y + IMAGE_HEIGHT_SMALL +TEXT_HEIGHT_NORMAL + 15, 0, 0,  $wid, IMAGE_HEIGHT_SMALL, imagesx($image_1), imagesy($image_1));
				imagecopy($chai, $image_2, ($chai_w - imagesx($image_2)) / 2, CONTENT_Y + imagesy($image_1) + $text_hold[6] + 15, 0, 0, imagesx($image_2), imagesy($image_2));
				break;
			case 5 :
				imagettftext($chai, TEXT_SIZE, 0, ($chai_w - TEXT_WIDTH) / 2, CONTENT_Y, TEXT_COLOR, TEXT_FONT, wordwrap($text_1, TEXT_MAX_CHAR));
				break;
			case 6 :
				imagecopy($chai, $image_1, ($chai_w - imagesx($image_1)) / 2, CONTENT_Y, 0, 0, imagesx($image_1), imagesy($image_1));
				break;
			default :
				break;
		}

		$thumb = imagecreatetruecolor(imagesx($chai), imagesy($chai));
		imagealphablending($thumb, false);
		imagesavealpha($thumb, true);
		imagecopyresampled($thumb, $chai, 0, 0, 0, 0, imagesx($chai), imagesy($chai), imagesx($chai), imagesy($chai));
		$result = imagepng($thumb, GALLERY_URL.GALLERY_PATTERN. $uid . ".png");
		imagedestroy($thumb);
		return $result;
	} else {
		return NULL;
	}
}


$result_image = create_chai($chai, 4, 3, 1001, 2001, $text, $text2, 123);
//header('Content-type: text/html; charset=utf-8');
