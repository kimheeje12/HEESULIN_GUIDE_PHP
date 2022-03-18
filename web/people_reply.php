<?php

include('db.php');

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People_Detail</title>
    <script src="jquery_3.6.0.js"></script>
    <script src="common.js"></script>
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

        .people{
            margin-left: 20%;
        }

        table{
                margin: auto;
                border-collapse: collapse;
        }
        tr{
                padding: 10px;
        }
        td{
                font-size: 32px;
                font-weight: bold;
                border-bottom: 1px solid #787878;
                padding: 10px;
        }

        .reply{
            margin-left: 20%;
            font-size: 20px;
        }

        .dap_lo{
            margin-top: 20px;
        }

        
        a {
            text-decoration-line:none;
            color: black;
        }

    </style>
</head>
<body>
    <div>
        <a href="main.php"><img src="img/logo.jpg" width=100px height="auto" style="float: left;">
        <div id="head">
            <h1><i>HEESULIN GUIDE</i></h1>
        </div>
    </div>
    <div id="menu">
            <ul>
                <li><a href="collection.php">Collection</a></li>
                <li><a href="people.php">People</a></li>
                <li><a href="info.php">Info</a></li>
                
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
    <table class=people>
    <?php

    $image=$_GET['image_id'];  

    $query = "SELECT * FROM people_board WHERE image_id=$image";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    $query2 = "SELECT * FROM image2 WHERE image_id=$image"; 
    $result2 = mysqli_query($connect, $query2);
    $row2 = mysqli_fetch_assoc($result2);

    //삭제
    $sql=mq("SELECT * from people_board where image_id='".$image."'");
    $board = $sql->fetch_array();

    $sql2=mq("SELECT * from image2 where image_id='".$image."'");
    $board2 = $sql2->fetch_array();

    ?>
        <tr class="people2">
            <p><td><?php echo "<img src='".$row2['image_path']."' width=1400 height=900/>";?></td></p>
            <br>
        </tr>
        <tr class="people2">
            <td><p><?php echo $row['people_name'];?></p></td>
        </tr>
        <tr class="people2">
            <p><td><?php echo $row['people_info'];?></td></p>
        </tr>
        <tr class="people2">
            <td><p><?php echo OPINION ?></p><?php echo $row['people_opinion'];?></td>
        </tr>
    </table>
    <!-- 댓글 불러오기 -->
    <div class="reply">
        <h2>Comment</h2>
        <?php
            $sql3=mq("select * from reply where image_id='".$image."'");
            while($reply = $sql3->fetch_array()){
        ?>
        <div class="dap_lo">
            <div><?php echo $reply['reply_content'];?></div>
            <div><?php echo $reply['reply_created'];?></div>
            <a class="dat_edit_bt" href="#">수정</a>
            <a class="dat_delete_bt" href="#">삭제</a>    
            <div class="dat_edit">
                <form method="post" action="reply_modify_ok.php">
                    <input type="hidden" name="idx" value="<?php echo $reply['reply_id']; ?>">
                    <input type="hidden" name="image_id" value="<?php echo $image?>">
                    <textarea name="content"><?php echo $reply['reply_content']; ?></textarea>
                    <input type="submit" value="수정하기">
                </form>
            </div>    
            <div class="dat_delete">
                <form method="post" action="reply_delete.php">
                    <input type="hidden" name="idx" value="<?php echo $reply['reply_id']; ?>">
                    <input type="hidden" name="image_id" value="<?php echo $image?>">
                </form>    
            </div>
        </div>    
        <?php } ?>

        <!-- 댓글 입력 폼 -->
        <div class="reply3">
            <form action="reply_ok.php" method="post">
            <input type="hidden" name="idx" value="<?php echo $image?>">
            <textarea name="content" placeholder="인터넷에 남기는 당신의 흔적, 영원히 남는 당신의 얼굴입니다." id="content" style="font-size:20px; margin-top: 2%; width: 40%; "></textarea> <button style="font-size:25px; margin-left: 1%; "> Enter </button>
            </form>
        </div>
            <a href="people.php"><input type="button" name="upload" value="List" style="width: 150px; height: 50px; font-size:25px; margin-top: 2%;"></a>

        

        <script>
   
    </body>
</html>