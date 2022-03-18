<?php

include('db.php');
include('loginsession.php');

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
            font-size: 25px;
        }

        
        a {
            text-decoration-line:none;
            color: black;
        }

        .mainimage .maintext{
        position:absolute;
        top:120%;
        left:35%;
        color: white;
        transform: translate(-50%, -50%);
        z-index: 1;
        text-align: left;
        }

        #page_num{
            font-size: 25px;
            margin-left: 20%;
            margin-top: 3%;
            margin-bottom: 3%;
        }

        #page_num ul li{
            float: left;
            list-style: none;
            margin-top: 2%;
            margin-bottom: 2%;
            margin-left: 20px;
            text-align: center;
        }

        .fo_re{
            font-weight: bold;
            color: red;
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
                <li><a href="q&a.php">Q&A</a></li>
                
                <li id="login_btn"><a href="login.php"><img src="img/admin.jpg"></a></li>
                <li id="logout_btn"><a href="logout.php">Logout</a></li>
                <li id="admin_btn"><a href="admin.php">Admin</a></li>

                <?php

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
        <img src="img/detail.jpg" width="100%" height="3100px;">   
        <div class="maintext">          
            <table class=people>
            <?php

            $image=$_GET['image_id'];  

            $x=0;

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
        
                $sql3 = mq("SELECT * FROM reply where image_id='".$image."'");
                $row_num = mysqli_num_rows($sql3); //게시판 총 레코드 수
                $list = 10; // 한 페이지에 보여줄 개수
                $block_ct = 5; // 블록당 보여줄 페이지 개수

                $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                $block_start = (($block_num - 1) * $block_ct) + 1; // 블록 시작번호
                $block_end = $block_start + $block_ct - 1; // 블록 마지막 번호

                $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                if($block_end > $total_page) $block_end = $total_page; // 만약 블록의 마지막 번호가 페이지수보다 많다면 마지막 번호는 페이지 수 
                $total_block = ceil($total_page / $block_ct); // 블럭의 총개수
                $start_num = ($page-1) * $list; // 시작번호 (page-1)에서 $list를 곱한다.

            $sql4 = mq("SELECT * FROM reply where image_id='".$image."' order by image_id desc limit $start_num, $list");

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
                    <p><td><?php echo "<img src='".$row2['image2_path']."' width=1000 height=800/>";?></td></p>
                    <br>
                </tr>
                <tr class="people2">
                    <td><p><?php echo $row['people_name'];?></p></td>
                </tr>
                <tr class="people2">
                    <p><td><?php echo $row['people_info'];?></td></p>
                </tr>
                <tr class="people2">
                    <td><h2><p style="color:pink; ">Opinion</h2></p><?php echo $row['people_opinion'];?></td>
                </tr>
            </table>
            
            <!-- 댓글 불러오기 -->
            <div class="reply">
                <h1>Comment</h1>
                <?php
                   
                    while($reply = $sql4->fetch_array()){
                        $delete_id='delete_btn'.$x;
                        $x++;

                ?>
                <div class="dap_lo">
                    <div><?php echo $reply['reply_content'];?></div>
                    <div><?php echo $reply['reply_created'];?></div>
                    <div class="delete">
                        <form method="post" action="reply_delete2.php">
                            <input type="submit" id="<?php echo $delete_id?>" value="삭제" onclick="return confirm('정말 삭제하시겠습니까?');">
                            <input type="hidden" name="idx" value="<?php echo $reply['reply_id']; ?>">
                            <input type="hidden" name="image_id" value="<?php echo $image?>">
                        </form>  
                    </div>
                </div>        
                <?php
                        if($login){
                            echo"<script>
                            var login = document.getElementById('{$delete_id}');
                            login.style.display = 'block';
                            </script>";
                        }else{
                            echo"<script>
                            var login = document.getElementById('{$delete_id}');
                            login.style.display = 'none';
                            </script>";
                        }
                ?>      
                <?php } ?>

                <!-- 댓글 입력 폼 -->
                <div id="reply2">
                    <form action="reply_ok2.php" method="post">
                    <input type="hidden" name="idx" value="<?php echo $image?>">
                    <textarea name="content" placeholder="인터넷에 남기는 당신의 흔적, 영원히 남는 당신의 얼굴입니다." id="content" style="font-size:25px; margin-top: 2%; width: 85%; "></textarea> <button style="font-size:25px; margin-left: 1%; "> Enter </button>
                    </form>
                </div>
                <div id="page_num">
                    <ul id="page">
                        <?php
                        if($page <= 1)
                        {
                            echo"<li><font color=white>처음</font></li>";
                        }else{
                            echo"<li><a href='?image_id=$image&page=1'><font color=white>처음</font></a></li>";
                        }
                        if($page <= 1)
                        {
                            
                        }else{
                            $pre = $page - 1;
                            echo"<li><a href='?image_id=$image&page=$pre'><font color=white>이전</font></a></li>";
                        }
                        for($i=$block_start; $i<=$block_end; $i++){
                            if($page == $i){
                                echo"<li class='fo_re'>[$i]</li>";
                            }else{
                                echo"<li><a href='?image_id=$image&page=$i'><font color=white>[$i]</font></a></li>";
                            }
                        }
                        if($block_num >= $total_block){
                        }else{
                            $next = $page + 1;
                            echo "<li><a href='?image_id=$image&page=$next'><font color=white>다음</font></a></li>";
                        }
                        if($page >= $total_page){
                            echo"<li>마지막</li>";
                        }else{
                            echo"<li><a href='?image_id=$image&page=$total_page'><font color=white>마지막</font></a></li>";
                        }
                        ?>
                    </ul>
                </div>       
                <br>
                <br>
                <br> 
                <div>
                    <a href="people.php"><input type="button" name="upload" value="List" style="width: 150px; height: 50px; font-size:25px; margin-top: 2%; border-radius: 30px;"></a>
                    <a href="people_modify.php?image_id=<?php echo $image?>"><input type="button" id="edit_btn" name="edit" value="Edit" style="width: 150px; height: 50px; font-size:25px; margin-left: 40%; border-radius: 30px;"></a>
                    <a href="people_delete.php?image_id=<?php echo $image?>"><input type="button" id="delete_btn" name="delete" value="Delete" onclick="return confirm('정말 삭제하시겠습니까?');" style="width: 150px; height: 50px; font-size:25px; margin-left: 2%; border-radius: 30px;"></a>
                </div>
                <?php
                        if($login){
                            echo"<script>
                                reply2.style.display = 'none';
                                edit_btn.style.display = 'inline-block';
                                delete_btn.style.display = 'inline-block';
                            </script>";
                        }else{
                            echo"<script>
                                reply2.style.display = 'block';
                                edit_btn.style.display = 'none';
                                delete_btn.style.display = 'none';

                            </script>";
                        }
                ?>  
        </div>
    </div>
    </body>
</html>