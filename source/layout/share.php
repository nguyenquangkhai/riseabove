<?php
include 'chai.php';

$template = addslashes($_POST['template'] == '' ? 1 : $_POST['template']);
$topic = addslashes($_POST['topic'] == '' ? 1 : $_POST['topic']);
$image_1 = addslashes($_POST['image_1'] == '' ? '' : $_POST['image_1']);
$image_2 = addslashes($_POST['image_2'] == '' ? 0 : $_POST['image_2']);
$text_1 = addslashes($_POST['text_1']);
$text_2 = addslashes($_POST['text_2']);

$uid = 'SH-'.date('His-dmY').rand(1000, 9999);
$chai = create_chai($template, $topic, $image_1, $image_2, $text_1, $text_2, $uid, TRUE);
if($chai != NULL){
	echo $chai;
}else{
	echo "fail";
};
