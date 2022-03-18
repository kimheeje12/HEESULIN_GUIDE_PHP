<?php

include('db.php');

$bno = $_GET['image_id'];

$title = $_POST['title'];
$address = $_POST['address'];
$price = $_POST['price'];
$opinion = $_POST['opinion'];

$path="img/";
$upload = $_FILES['image']['name'];
$uploadfile = $path . basename($upload); 

$upload2 = $_FILES['image2']['name'];
$uploadfile2 = $path . basename($upload2); 

if($upload == null && $upload2 == null){
  $query = "SELECT image_path, image2_path from image where image_id=$bno";
  $result = mysqli_query($connect, $query);
}
else if($upload==null && $upload2 !=null){
  $query = "SELECT image_path from image where image_id=$bno";
  $result = mysqli_query($connect, $query);

  $query = "update image set image2_path='$uploadfile2' where image_id='$bno'";
  $result = mysqli_query($connect, $query);
}
else if($upload!=null && $upload2 ==null){
  $query = "SELECT image2_path from image where image_id=$bno";
  $result = mysqli_query($connect, $query);

  $query = "update image set image_path='$uploadfile' where image_id='$bno'";
  $result = mysqli_query($connect, $query);
}
else{
  $query = "update image set image_path='$uploadfile', image2_path='$uploadfile2' where image_id='$bno'";
  $result = mysqli_query($connect, $query);
}

if($title=="" || $address=="" || $price=="" || $opinion==""){
    echo'<script>alert("빈 칸을 채워주세요"); history.back(); </script>';
  }else if($title && $address && $price && $opinion){
    $sql = mq("update collection_board set collection_title='".$title."', collection_address='".$address."', collection_price='".$price."', collection_opinion='".$opinion."' where image_id='".$bno."'");
    echo "<script>
          alert('해당 게시물이 수정되었습니다');
          location.href='collection.php';
        </script>";
  }else{
        echo "<script>
        alert('잠시 후 다시 작성해주세요!');
        history.back();
        </script>";
     }
?>