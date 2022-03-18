<?php

include('loginsession.php');
include('db.php');

?>

<?php
if($login){
    echo "<script>
    alert('이미 로그인하셨습니다');
    location.href='main.php';
  </script>";
}else{

    $ID=$_POST['ID'];
    $PW=$_POST['PW'];
    
    $query = "SELECT * FROM login WHERE id='$ID' and pw='$PW'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    
    if($ID=="" || $PW==""){
            echo'<script>alert("아이디나 패스워드를 입력하세요"); history.back(); </script>';
        }else if($ID==$row['id'] && $PW==$row['pw']){
            $_SESSION['ID'] = $ID;    
            echo'<script>alert("관리자 계정으로 접속하였습니다"); location.href="main.php"; </script>';
        }else{
            echo'<script>alert("아이디, 비밀번호를 확인해주세요"); history.back(); </script>';
        } 
    }
?>


<!-- //  if($_POST['ID']=="" || $_POST["PW"]==""){
//     echo'<script>alert("아이디나 패스워드를 입력하세요"); history.back(); </script>';
//     return;
// }

// while($row = mysqli_fetch_assoc($result)){
//     if($row['id']==$_POST["ID"] && $row['pw']==$_POST["PW"]){
//         echo'<script>alert("관리자 계정으로 접속하였습니다"); location.href="main2.php"; </script>';
//         return;
//     }
// }

// if($row['id']!=$_POST["ID"] || $row['pw']!=$_POST["PW"]){
//     echo'<script>alert("아이디, 비밀번호를 확인해주세요"); history.back(); </script>';
//     return;
// } 

// if($ID == "" || $PW == ""){
//         echo'<script>alert("아이디나 패스워드를 입력하세요") location.href="login.php"</script>';
// }
// else{
//     $sql = mysqli_query($connect, "SELECT * FROM login WHERE id='".$ID."'");
//     $user = $sql->fectch_array();
//     $hash_pwd = $user[''];
    
//     if(password_verify($PW, $hash_pwd))
//     {
//         $_SESSION['ID'] = $user["id"];
//         echo "<script>alert('로그인 성공!'); location.href='main2.php'; </script>";
//     }
//     else{
//         echo "<script>alert('아이디 혹은 비밀번호를 확인하세요'); history.back();</script>";
//     }
// } -->



<!-- $User = $sql->fetch_array();

if(User==NULL){
    echo'<script>alert("아이디나 패스워드를 입력하세요")</script>';
}else{
   if(password_verify($PW, $User['PW'])){
    echo'<script>alert("관리자 계정으로 접속하였습니다"); location.href="main2.php"; </script>';
   }else{
       echo'<script>alert("아이디나 패스워드를 입력하세요")</script>';
   } -->


<!-- if($_POST['ID']=="" || $_POST["PW"]==""){
    echo'<script>alert("아이디나 패스워드를 입력하세요"); history.back(); </script>';
    return;
}

while($row = mysqli_fetch_assoc($result)){
    if($row['id']==$_POST["ID"] && $row['pw']==$_POST["PW"]){
        echo'<script>alert("관리자 계정으로 접속하였습니다"); location.href="main2.php"; </script>';
        return;
    }
}

if($row['id']!=$_POST["ID"] || $row['pw']!=$_POST["PW"]){
    echo'<script>alert("아이디, 비밀번호를 확인해주세요"); history.back(); </script>';
    return;
} -->



<!-- $query = "SELECT * FROM login WHERE id='$ID' and pw='$PW'"; //아이디가 있는지 검사
 $result = mysqli_query($connect, $query);
 $row = mysqli_fetch_array($result);

 //아이디가 있으면 비밀번호 검사
 if($ID==$row['ID'] && $PW==$row['PW']){ // id와 pw가 맞다면 login
 }else{
     echo "<script>alert('아이디 또는 비밀번호가 잘못 되었습니다');</script>";
     echo "<script>location.href='login.php';</script>";
 }
?> -->

    <!-- // if(isset($_POST['ID'])&&isset($_POST['PW'])){

    //         $ID=$_POST['ID'];
    //         $PW=$_POST['PW'];
    
    //         $connect = mysqli_connect('localhost','root','000000','heesulin'); 
    
    //         $sql="SELECT * FROM login where id='$ID'&&pw='$PW'";
            
    //         if($result=mysqli_fectch_array(mysqli_query($conn, $sql))){
    //             echo "로그인 성공!";
    //             header('Location: main2.php');
    //         }else{
    //             echo "login fail";
    //         }
    //     }
    
    // $ID=$_POST['ID'];
    // $PW=$_POST['PW'];

    // if(!is_null($ID)){
    //     $connect = mysqli_connect('localhost','root','000000','heesulin'); 
    //     $sql = "SELECT PW FROM login where id ='" . $ID . "';";
    //     $result = mysqli_query($connect, $sql);
    //     while($row = mysqli_fetch_array($result)){
    //         $encrypted_password = $row['pw'];
    //     }
    //     if(is_null($encrypted_password)){
    //         $wu = 1;
    //     }else{
    //         if(password_verify($PW, $encrypted_password)){
    //         header('Location: main2.php');
    //         }else{
    //         $wp = 1;
    //         }
    //     }
    // } -->