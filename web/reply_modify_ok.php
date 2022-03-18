<?php

include('db.php');

$idx=$_POST['idx'];
$sql=mq("select from reply where reply_id='".$idx."'");
$reply=$sql->fetch_array();

$bno=$_POST['image_id'];
$sql2=mq("select from people_board where image_id='".$bno."'");
$board=$sql2->fetch_array();

$sql3=mq("update reply set reply_content='".$_POST['content']."' where reply_id='".$idx."'");

echo '<script> alert("댓글이 수정되었습니다"); location.href="people.php"; </script>';

?>

