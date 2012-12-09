<?
include('database.php');
$topic_id = addslashes($_REQUEST['topic_id']);
$query = mysql_query("SELECT * FROM image_master WHERE id_topic_master = $topic_id");
$out = array();
while($row = mysql_fetch_array($query)){
	array_push($out, array( 'id' => $row['id_image_master'], 'topic_id' => $row['id_topic_master'] ));
};
echo json_encode($out);
