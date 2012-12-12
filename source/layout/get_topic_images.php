<?
include('database.php');
$topic_id = addslashes($_REQUEST['topic_id']);
$query = mysql_query("SELECT * FROM image_master WHERE id_topic_master = $topic_id");
$images = array();
while($row = mysql_fetch_array($query)){
	array_push($images, array( 'id' => $row['id_image_master'], 'topic_id' => $row['id_topic_master'] ));
};

$query = mysql_query("SELECT * FROM quote_master WHERE id_topic_master = $topic_id");
$quote = array();
while($row = mysql_fetch_array($query)){
	array_push($quote, array( 'id' => $row['id_quote_master'], 'topic_id' => $row['id_topic_master'], 'content' => $row['quote_content'] ));
};

$out = array();
echo json_encode(array( 'images' => $images, 'quotes' => $quote ));
