<?php
include('db.php');

$bno = $_GET['image_id'];
$sql = mq("DELETE FROM people_board where image_id='$bno';");
$sql2 = mq("DELETE FROM image2 where image_id='$bno';");

echo '<script> alert("해당 게시물이 삭제되었습니다"); location.href="people.php"; </script>';

?>
