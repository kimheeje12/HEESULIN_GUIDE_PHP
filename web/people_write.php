<?php

include('db.php');

//외부 사진
$path="img/";
$upload = $_FILES['image']['name'];
$uploadfile = $path . basename($upload); 

//내부 사진
$upload2 = $_FILES['image2']['name'];
$uploadfile2 = $path . basename($upload2);

$query = "INSERT INTO image2(image_path, image_created, image2_path) VALUES('$uploadfile', now(), '$uploadfile2')";
$result = mysqli_query($connect, $query);
$db_int = mysqli_insert_id($connect); // 외래키 등록!!

$title=$_POST['title'];
$info=$_POST['info'];
$opinion=$_POST['opinion'];


if($title=="" || $info=="" || $opinion==""){
  echo'<script>alert("빈 칸을 채워주세요"); history.back(); </script>';
}else if($title && $info && $opinion){
  $query2 = "INSERT INTO people_board(image_id, people_name, people_info, people_opinion, people_created) VALUES($db_int, '$title', '$info', '$opinion', now())";
  $result2 = mysqli_query($connect, $query2);
  echo "<script>
        alert('정상적으로 등록되었습니다 :)');
        location.href='people.php';
      </script>";
}else{
      echo "<script>
      alert('잠시 후 다시 작성해주세요!');
      history.back();
      </script>";
   }
?>