<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <script src="jquery 3.6.0.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap');

        body{
            font-family: 'Open Sans', sans-serif;        
        }

        #head{
            float:left;
        }

        #info{
            margin-left: 2%;
            font-size: 150px;
        }

        #mainsentence{
            text-align: center;
            margin: 0 auto;
        }

        #history{
            margin-left: 2%;
            font-size: 50px;
        }

        #detail{
            font-size: 30px;
            margin-left: 10%;
        }

        #detail2{
            font-size: 30px;
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

        .info2{
            width: 1000px;
            height: 700px;
        }
        
    </style>
</head>
<body>
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
                <li id="login_btn"><a href="login.php"><img src="img/admin.jpg"></a></li>
                <li id="logout_btn"><a href="logout.php">Logout</a></li>
                <li id="admin_btn"><a href="admin.php">Admin</a></li>

                <?php

                include('loginsession.php');

                if($login){
                    echo"<script>
                        login_btn.style.display = 'none';
                        logout_btn.style.display = 'block';
                        admin_btn.style.display = 'block';
                    </script>";
                }else{
                    echo"<script>
                        login_btn.style.display = 'block';
                        logout_btn.style.display = 'none';
                        admin_btn.style.display = 'none';
                    </script>";
                }
                
                ?>
            </ul>
        </div>
    </div>
    <br>
    <div id="info">
        <p>HEESULIN GUIDE INFO</p>
    </div>
    <div>
        <img src="img/cookbook.jpg" width="100%" height="800px">
    </div>
    <div id = "mainsentence">
        <h1>10??? ?????? ?????????????????????</h1>
        <h1>????????? ????????? ?????? ?????? ???????????? ??????????????????</h1>
        <h1>???????????? ???????????? ???????????? ???????????? ???????????????</h1>
        <hr>
    </div>
    <div id = "history">
        <h1>History & Vision</h1>
    </div>
    <div>
    <div id = "detail">
        <img src="img/info.jpg" class="info2" style="float: right;">
        <p>?????????????????? ??????????????? ?????? ??? ????????? ?????? ????????? ??? ???????????? ???????????????</p>
        <p>?????? ?????? ?????? ?????? ?????? ?????? ?????? ????????? ?????? ??????????????????</p>
        <p>???????????? ????????? ?????? ????????? ????????? ?????? ?????? ?????????????????????</p>
        <p>2??? ?????? ???????????? ???????????? ????????? ????????? ?????? ????????? ?????? ?????? ?????? ?????? ?????????????????????</p>
        <p>????????? ????????? ??????????????? ??? ????????? ????????? ????????? ????????? ?????? ????????? ????????????</p>
        <p>????????? ????????? 0kcal??? ????????? ?????? ????????? ?????? ???????????? ???????????? ???????????????</p>
        <p>???????????? ?????? ????????? ????????? ????????? ???????????? ????????? ??? ?????? ??????????????? ???????????????</p>
        <p>????????? ?????? ?????? ???????????? ?????? ????????? ????????? ????????? ????????? ?????????????????????</p>
        <p>"????????? ????????? ????????? ?????? ????????????"</p>
        <p>????????? ????????? ?????? ????????? ???????????? ????????? ????????? ?????????????????????</p>
    </div>
    <hr>
    <div id = "detail2">
        <img src="img/info2.jpg" width="1400px" height="900px" style="float: left; margin-bottom: 5%;">
        <p style="font-size: 3em;">&nbsp Back to the Basics</p>
        <p>&nbsp&nbsp ????????? ?????????????????????</p>
        <p>&nbsp&nbsp ????????? ????????? ?????? ?????? ???????????? ????????????</p>
        <p>&nbsp&nbsp ?????? ????????? ????????? ?????? ????????? ???????????????</p>
        <p>&nbsp&nbsp ???????????? ???????????? ?????? ?????? ???????????????</p>
        <p>&nbsp&nbsp ????????? ?????? ???????????? ??? ????????? ????????? ????????????</p>
        <p>&nbsp&nbsp "?????????????????????"</p>
        <p>&nbsp&nbsp ??? ????????? ????????? ??????????????? ?????? ?????? ??????????????? ???????????????</p>
    </div>
</body>
</html>