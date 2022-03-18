<?php
include('db.php');

$bno = $_GET['image_id'];
$sql = mq("DELETE FROM collection_board where image_id='$bno';");
$sql2 = mq("DELETE FROM image where image_id='$bno';");

echo '<script> alert("해당 게시물이 삭제되었습니다"); location.href="collection.php"; </script>';

?>
