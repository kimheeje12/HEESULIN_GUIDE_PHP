<?php

include('db.php');

$bno = $_GET['image_id'];

$title = $_POST['title'];
$info = $_POST['info'];
$opinion = $_POST['opinion'];

$path="img/";
$upload = $_FILES['image']['name'];
$uploadfile = $path . basename($upload); 

$upload2 = $_FILES['image2']['name'];
$uploadfile2 = $path . basename($upload2); 

if($upload == null && $upload2 == null){
  $query = "SELECT image_path, image2_path from image2 where image_id=$bno";
  $result = mysqli_query($connect, $query);
}
else if($upload == null && $upload2 != null){
  $query = "SELECT image_path from image2 where image_id=$bno";
  $result = mysqli_query($connect, $query);

  $query = "update image2 set image2_path='$uploadfile2' where image_id='$bno'";
  $result = mysqli_query($connect, $query);
}
else if($upload != null && $upload2 == null){
  $query = "SELECT image2_path from image2 where image_id=$bno";
  $result = mysqli_query($connect, $query);

  $query = "update image2 set image_path='$uploadfile' where image_id='$bno'";
  $result = mysqli_query($connect, $query);
}
else{
  $query = "update image2 set image_path='$uploadfile', image2_path='$uploadfile2' where image_id='$bno'";
  $result = mysqli_query($connect, $query);
}

if($title=="" || $info=="" || $opinion==""){
    echo'<script>alert("빈 칸을 채워주세요"); history.back(); </script>';
  }else if($title && $info && $opinion){
    $sql = mq("update people_board set people_name='".$title."', people_info='".$info."', people_opinion='".$opinion."' where image_id='".$bno."'");
    echo "<script>
          alert('해당 게시물이 수정되었습니다');
          location.href='people.php';
        </script>";
  }else{
        echo "<script>
        alert('잠시 후 다시 작성해주세요!');
        history.back();
        </script>";
     }
?>