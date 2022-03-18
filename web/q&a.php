<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A</title>
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

        #QA{
            font-size: 200px;
        }

        #form{
            line-height: 3;
            font-size: 50px;
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

        .mainimage .maintext{
        position:absolute;
        top:15%;
        left:10%;
        color:white;
        z-index: 1;
        text-align: center;
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
    <div class="mainimage">
        <img src="img/Q&A.jpg" width="100%" height="auto">
        <div class="maintext">
            <div id = "QA">
            Q & A
            </div>
            <br>
            <form id="form" form method="post" action="q&a_action.php">
                Name: <input type="text" name="name" style="width: 500px; height: 70px; font-size:30px">
                <br>
                E-mail: <input type="text" name="email" style="width: 490px; height: 70px; font-size:30px">
                <br>
                Title: <input type="text" name="title" style="width: 530px; height: 70px; font-size:30px">
                <br>
                Question
                <br>
                <textarea name="question" cols=25 rows=10 style= "font-size: 30px;"></textarea>
                <br>
                <input type="submit" value="SEND" style="width: 200px; height: 70px; font-size: 30px; text-align: center; border-radius:30px;">
            </form>
        </div>
    </div>
</body>
</html>