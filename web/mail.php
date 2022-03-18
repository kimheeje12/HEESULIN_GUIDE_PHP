<?php

include('db.php');

$boardinput = $_GET['idx'];

// $query = "SELECT * FROM qa_board WHERE qa_board_idx=$boardinput";
// $result = mysqli_query($connect, $query);
// $row = mysqli_fetch_assoc($result);

$sql = mq("SELECT * FROM qa_board WHERE qa_board_idx='".$boardinput."'");
$board = $sql->fetch_array();

$name=$_POST['title'];
$answer=$_POST['content'];

$to=$board['qa_email'];
$subject='안녕하세요! HEESULINE GUIDE입니다.';
$msg="제목: $name\n\n"."내용: $answer\n";
$headers="From: HEESULIN GUIDE";
mail($to, $subject, $msg, $headers);


echo '<script> alert("답변이 정상적으로 전송되었습니다"); location.href="q&a_board.php"; </script>';
?>