<?php
include('db.php');

$boardinput = $_GET['idx'];
$sql = mq("DELETE FROM qa_board where qa_board_idx='$boardinput';");


echo '<script> alert("해당 게시물이 삭제되었습니다"); location.href="q&a_board.php"; </script>';

?>
