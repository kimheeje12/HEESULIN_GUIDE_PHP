<?php 
include('db.php');
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A_Answer</title>
    <script src="jquery 3.6.0.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap');

        body{
            font-family: 'Open Sans', sans-serif;        
        }
        
        tr{
                padding: 10px;
        }
        td{
                font-size: 40px;
                font-weight: bold;
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                padding-top:10px;
                color:#000000
        }

        #board{
            font-size: 40px;
            text-align: center;
        }

        .mainimage .maintext{
        position:absolute;
        top:60%;
        left:50%;
        color:white;
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
    <?php

    $boardinput = $_GET['idx'];
    $sql = mq("SELECT * FROM qa_board WHERE qa_board_idx='".$boardinput."'");
    $board = $sql->fetch_array();

    ?>
    <div class="mainimage">
        <img src="img/q&a.jpg" width="100%" height="1350px"> 
        <div id = "board" class="maintext">
        <br>
        <h1>Reply</h1>
            <form method="post" action="mail.php">
            <table>
                <tr>
                <td>Title</td>
                <td id="title"><input type=text name='title' style="width: 570px; height: 50px; font-size: 20px; margin-right:53%;"></td>
                <tr>
                <td>Answer</td>
                <td><textarea name='content' cols=50 rows=20 style= "font-size: 20px;"></textarea></td>
            </table>
                <a href="q&a_board.php"><input type=submit value=LIST style= "width:150px; height:60px; font-size: 30px; margin-top: 1%; "></a>
                <a href="mail.php?idx=<?php echo $board['qa_board_idx'];?>"><input type=submit value=SEND style= "width:150px; height:60px; font-size: 30px; margin-top: 1%; margin-left: 48%;"></a>
            </form>
        </div>
    </div>
</body>
</html>