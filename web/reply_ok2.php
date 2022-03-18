<?php

include('db.php');


$bno = $_POST['idx'];
$content = $_POST['content'];

if($bno && $content){
    // for($i=1; $i<=10000; $i++){
    $query = "INSERT INTO reply(image_id, reply_content, reply_created) values($bno, '$content', now())"; 
    // $query = "INSERT INTO reply(image_id, reply_content, reply_created) values($bno, $i, now())"; 
    $result = mysqli_query($connect, $query);
    echo"<script>alert('댓글이 작성되었습니다'); location.href='people_detail.php?image_id=$bno'; </script>";
    // }    
}else{
    echo'<script>alert("댓글을 다시 작성해주세요!"); history.back(); </script>';
}

?>