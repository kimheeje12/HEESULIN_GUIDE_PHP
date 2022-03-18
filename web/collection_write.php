<?php

include('db.php');


//외부 사진
$path="img/";
$upload = $_FILES['image']['name'];
$uploadfile = $path . basename($upload); 

//내부 사진
$upload2 = $_FILES['image2']['name'];
$uploadfile2 = $path . basename($upload2);

$query = "INSERT INTO image(image_path, image_created, image2_path) VALUES('$uploadfile', now(), '$uploadfile2')";
$result = mysqli_query($connect, $query);
$db_int = mysqli_insert_id($connect); // 외래키 등록!!


$title=$_POST['title'];
$address=$_POST['address'];
$price=$_POST['price'];
$opinion=$_POST['opinion'];

$mqq = mq("alter table collection_board auto_increment =1"); 


if($title=="" || $address=="" || $price=="" || $opinion==""){
  echo'<script>alert("빈 칸을 채워주세요"); history.back(); </script>';
}else if($title && $address && $price && $opinion){
  $query3 = "INSERT INTO collection_board(image_id, collection_title, collection_address, collection_price, collection_opinion, collection_created) VALUES($db_int, '$title', '$address', '$price', '$opinion', now())";
  $result3 = mysqli_query($connect, $query3);

  echo "<script>
        alert('정상적으로 등록되었습니다 :)');
        location.href='collection.php';
      </script>";
}else{
      echo "<script>
      alert('잠시 후 다시 작성해주세요!');
      history.back();
      </script>";
   }
?>

<!-- // $uploadfile=$path . basename($_FILES['image1']['name']);
// move_uploaded_file($_FILES['image']['tmp_name']);

// if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
//   echo("정상적으로 등록되었습니다");
// }else{
//   echo("fail!");
// }



// $uploadfile = $path . basename($_FILES['image1']['name']);
// $name = $_FILES['image1']["name"];
// $tmp_name=$_FILES['image1']["tmp_name"];

// $result=move_uploaded_file($tmp_name, $path . $name);



// $uploadfile=$_FILES['image1']['name'];

// $upload=$path.basename($_FILES['image1']['name']);
// move_uploaded_file($_FILES['image']['tmp_name'], $upload);
// echo"<img src={$_FILES['image1']['name']}>"; -->