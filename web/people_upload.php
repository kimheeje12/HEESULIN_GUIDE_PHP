<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People_Upload</title>
    <script src="jquery 3.6.0.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap');

        body{
            font-family: 'Open Sans', sans-serif;        
            text-align: center;
        }

        .mainimage .maintext{
        position:absolute;
        top:50%;
        left:50%;
        color: black;
        transform: translate(-50%, -50%);
        z-index: 1;
        text-align: center;
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
        <img src="img/kitchen2.jpg" width="100%" height="1350px"> 
        <form class="maintext" form method="POST" action="people_write.php" enctype="multipart/form-data">
            <h1 style="font-size: 50px; margin-top: 30%;"> People Upload</h1>
            <h1>Name</h1>
            <p><textarea name="title" cols=20 rows=2 placeholder="Name" style= "font-size: 25px; text-align:center;"></textarea></p>
            <h1>Basic Info</h1>
            <p><textarea name="info" cols=25 rows=6 placeholder="Basic Info" style= "font-size: 25px; text-align:center;"></textarea></p>
            <h1>Opinion</h1>
            <textarea name="opinion" cols=30 rows=8 placeholder="Opinion" style= "font-size: 25px; text-align:center;"></textarea>
            <p><h1>Outside Image: <input type="file" name="image" value="찾아보기" style="width: 500px; height: 70px; font-size:25px;"></h1> </p>
            <p><h1>Inside Image: <input type="file" name="image2" value="찾아보기" style="width: 500px; height: 70px; font-size:25px;"></h1> </p>
            <input type="submit" name="upload" value="Upload" style="width: 150px; height: 50px; font-size:25px; border-radius: 30px;">
        </form>
    </div>    
</body>
</html>