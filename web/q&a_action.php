<?php
include('db.php');

$name=$_POST['name'];
$email=$_POST['email'];
$title=$_POST['title'];
$question=$_POST['question'];


if($name=="" || $email=="" || $title=="" || $question==""){
    echo'<script>alert("빈 칸을 채워주세요"); history.back(); </script>';
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo'<script>alert("이메일 형식이 유효하지 않습니다! 다시 작성해주세요!"); history.back(); </script>';
}else if($name && $email && $title && $question){
    // for($i=1; $i<=100000; $i++){
    $query = "INSERT INTO qa_board(qa_name, qa_title, qa_email, qa_content, qa_created) VALUES('$name', '$title', '$email', '$question', now())";
    // $query = "INSERT INTO qa_board(qa_name, qa_title, qa_email, qa_content, qa_created) VALUES($i, $i, $i, $i, now())";
    $result = mysqli_query($connect, $query);
    echo "<script>
          alert('빠른 시일 내 답변드리겠습니다 :)');
          location.href='main.php';
        </script>";
    // }
}else{
        echo "<script>
        alert('다시 문의해주세요!');
        history.back();
        </script>";
     }
?>

<!-- // $query="INSERT INTO user(user_id, user_name, user_email, user_created)
//         values(user_id, '$name', '$email', '$date')";

// $query = "INSERT INTO qa_board(qa_title, qa_content, qa_email, qa_created) VALUES('$title', '$question', '$email', now())";
// $result = mysqli_query($connect, $query); -->

<!-- // $result = $connect->query($query);
//if($name && $email && $title && $question){
//     $sql = query("INSERT INTO qa_board(qa_title, qa_content, qa_created) VALUES('$title','$question', '$date')");
//     echo "<script>
//          alert('빠른 시일 내 답변드리겠습니다 :)');
//          location.href='main2.php';
//         </script>";
// }else{
//     echo "<script>
//     alert('다시 문의해주세요!');
//     location.href='q&a.php';
//    </script>";
// $result = $connect->query($query);
// mysqli_query($connect, $query);

// if($result) {
//     alert("빠른 시일 내 답변드리겠습니다 :)");
//     location.href='q&a.php';
// </script>
// }else{
//     echo "다시 문의해주세요!";
// }
// mysqli_close($connect);  -->