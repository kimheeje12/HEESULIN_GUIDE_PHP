<?php

include('loginsession.php');

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="jquery 3.6.0.js"></script>
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap');

        body{
            font-family: 'Open Sans', sans-serif;        
        }

        #head{
            float:left;
            color: black;
        }

        #menu{
            float: right;
        }

        #menu li{
            float: left;
            margin-top: 25px;
            margin-bottom: 25px;
            font-size: 30px;
            list-style: none;
        }

        #menu a{
            color: black;
            float: right;
            text-decoration: none;
            padding: 0 20px;
        }

        .login {
            width: 500px;
            margin: 0 auto;
            text-align: center;
            font-size:30px;
        }

        .mainimage .maintext{
        position:absolute;
        top:50%;
        left:50%;
        color: white;
        transform: translate(-50%, -50%);
        z-index: 1;
        text-align: center;
        }


    </style>

</head>
<body>
    <?php
        if($login){
            echo "<script>
            alert('이미 로그인하셨습니다');
            location.href='main.php';
          </script>";
    ?>
    <?php 
        }else{
    ?>
    <div>
        <a href="main.php"><img src="img/logo.jpg" width=100px height="auto" style="float: left;"></a>
        <div id="head">
            <h1><i>HEESULIN GUIDE</i></h1>
        </div>
        <div id="menu">
            <ul>
                <li><a href="collection.php">Collection</a></li>
                <li><a href="people.php">People</a></li>
                <li><a href="info.php">Info</a></li>
                <li><a href="q&a.php">Q&A</a></li>
                <li><a href="login.php"><img src="img/admin.jpg"></a></li>
            </ul>
        </div>
    </div>

    <div class="mainimage">
        <img src="img/login.jpg" width="100%" height="1350px"> 
        <form class="maintext" name="LoginForm" method="post" action="logincheck.php">
            <div class="login">
                <h1 class = "title">Admin</h1>
                <hr>
                <p><label>ID: <input type="text" name="ID" style="width: 200px; height: 35px; font-size:25px"></label></p>
                <p><label>PW: <input type="password" name="PW" style="width: 200px; height: 35px; font-size:25px"></label></p>
                <p><input type="submit" value="LOGIN" style="width: 150px; height: 40px; font-size: 25px; text-align: center; border-radius: 30px;"></p>
                <hr>
            </div>        
        </form>
        </div>
    <?php }?>
</body>
</html>

