<?php

include('db.php');

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A_Board</title>
    <script src="jquery 3.6.0.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap');

        body{
            font-family: 'Open Sans', sans-serif;        
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
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        a{
            color: white;
            text-decoration:none;
        }

        #board{
            font-size: 40px;
            text-align: center;
        }

        .mainimage .maintext{
        position:absolute;
        top:65%;
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
        
        #page_num{
            font-size: 25px;
            margin-left: 20%;
            margin-top: 30px;
        }

        #page_num ul li{
            float: left;
            list-style: none;
            margin-left: 20px;
            text-align: center;
        }

        .fo_re{
            font-weight: bold;
            color: red;
        }

        #last{
            margin-top: 10%;
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
        <img src="img/q&a.jpg" width="100%" height="1350px"> 
        <div id = "board" class="maintext">
        <h1>Q & A</h1>
        <table>
            <thead>
                <tr>
                    <td width = "60">번호</td>
                    <td width = "400">제목</td>
                    <td width = "200">작성자</td>
                    <td width = "300">날짜</td>
                </tr>
            </thead>

            <?php
            $category = $_GET['catgo'];
            $search_con = $_GET['search'];    
            
            if(isset($_GET['page'])){ 
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
                $sql = mq("SELECT * FROM qa_board where $category like '%$search_con%'");
                $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
                $list = 10; // 한 페이지에 보여줄 개수
                $block_ct = 5; // 블록당 보여줄 페이지 개수

                $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                $block_start = (($block_num - 1) * $block_ct) + 1; // 블록 시작번호
                $block_end = $block_start + $block_ct - 1; // 블록 마지막 번호

                $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                if($block_end > $total_page) $block_end = $total_page; // 만약 블록의 마지막 번호가 페이지수보다 많다면 마지막 번호는 페이지 수 
                $total_block = ceil($total_page / $block_ct); // 블럭의 총개수
                $start_num = ($page-1) * $list; // 시작번호 (page-1)에서 $list를 곱한다.

            $sql2 = mq("SELECT * FROM qa_board where $category like '%$search_con%' order by qa_board_idx desc limit $start_num, $list");
            // $sql2 = mq("SELECT * FROM qa_board where $category like '%$search_con%' order by qa_board_idx desc limit 0, 10");
            while($board = $sql2->fetch_array()){
                $title=$board["qa_title"];
                if(strlen($title)>30)
                {
                    $title=str_replace($board["qa_title"],mb_substr($board["qa_title"],0,30,"utf-8")."...",$board["qa_title"]);
                }
            ?>
            <tbody>
                <tr>
                    <td width="60"><?php echo $board['qa_board_idx']; ?></td>
                    <td width="400"><a href="q&a_read.php?idx=<?php echo $board["qa_board_idx"];?>"><?php echo $title;?></a></td>
                    <td width="200"><?php echo $board['qa_name']; ?></td>
                    <td width="300"><?php echo $board['qa_created']; ?></td>
                </tr>
            </tbody>
            <?php }?>
        </table>   
        <div id="page_num">
            <ul>
                <?php
                if($page <= 1)
                {
                    echo"<li>처음</li>";
                }else{
                    echo"<li><a href='?catgo=$category&search=$search_con&page=1'>처음</a></li>";
                }
                if($page <= 1)
                {
                    
                }else{
                    $pre = $page - 1;
                    echo"<li><a href='?catgo=$category&search=$search_con&page=$pre'>이전</a></li>";
                }
                for($i=$block_start; $i<=$block_end; $i++){
                    if($page == $i){
                        echo"<li class='fo_re'>[$i]</li>";
                    }else{
                        echo"<li><a href='?catgo=$category&search=$search_con&page=$i'>[$i]</a></li>";
                    }
                }
                if($block_num >= $total_block){
                }else{
                    $next = $page + 1;
                    echo "<li><a href='?catgo=$category&search=$search_con&page=$next'>다음</a></li>";
                }
                if($page >= $total_page){
                    echo"<li>마지막</li>";
                }else{
                    echo"<li><a href='?catgo=$category&search=$search_con&page=$total_page'>마지막</a></li>";
                }
                ?>
            </ul>
        </div>
        <div id="last">
            <form action="search_result.php" method="get">
                <select name="catgo" style="font-size:25px;">
                    <option value="qa_title">제목</option>
                    <option value="qa_name">작성자</option>
                    <option value="qa_content">내용</option>
                </select>
                <input type="text" name="search" size="15" required="required" style="font-size:30px;"/> <button style="font-size:25px; width:100px; ">검색</button>
            </form>
        </div>
    </div>
</body>
</html>
