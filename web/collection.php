<?php

include('db.php');

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection</title>
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

        .collection{
            float: left;
            margin-top: 1%;
        }

        #good{
            float: left;
            margin-left:1.5% ;
            margin-top:1.5% ;
            font-size: 50px;
            text-align: center;
        }

        #search{
            float: left;
            background-position: left;
            background-repeat: no-repeat;
        }

        #page_num{
            font-size: 25px;
            margin-left: 38%;
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

        a{
            color: black;
            text-decoration:none;
        }

    </style>
</head>
<body>
    <div>
        <a href="main.php"><img src="img/logo.jpg" width=100px height="auto" style="float: left;"></a>
        <div id="head">
            <h1><i>HEESULIN GUIDE</i></h1>
            <br>
            <form action="collection_search_result.php" method="get">
            <input id="search" type="text" name="search" placeholder="레스토랑 검색" style="width: 300px; height: 50px; font-size: 20px; text-align: center;"> 
            <button style="margin-left:10px; background: white;"><img src="img/search.jpg"></button>    
            </form>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table class=collection>
    <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
                $sql = mq("SELECT * FROM image");
                $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
                $list = 8; // 한 페이지에 보여줄 개수
                $block_ct = 5; // 블록당 보여줄 페이지 개수

                $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                $block_start = (($block_num - 1) * $block_ct) + 1; // 블록 시작번호
                $block_end = $block_start + $block_ct - 1; // 블록 마지막 번호

                $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                if($block_end > $total_page) $block_end = $total_page; // 만약 블록의 마지막 번호가 페이지수보다 많다면 마지막 번호는 페이지 수 
                $total_block = ceil($total_page / $block_ct); // 블럭의 총개수
                $start_num = ($page-1) * $list; // 시작번호 (page-1)에서 $list를 곱한다.

            $sql2 = mq("SELECT * FROM image order by image_id asc limit $start_num, $list");
            // $sql3 = "SELECT * FROM image2";
            // $result = mysqli_query($connect, $sql3);
            while($row = $sql2->fetch_assoc()){
                
        // $query = "SELECT * FROM image";
        // $result = mysqli_query($connect, $query);
        // $row = mysqli_fetch_array($result);
        // while($row = $result->fetch_assoc()){

            
        // 문제) $lastIdx변수를 기준점으로 ASC(오름차순)하여 10개의 행만(limit 10)가져와야 한다 하지만 보여지는 것은 DESC(내림차순)으로 보여줘야 한다

        // 해결)
        // $query_2 = "SELECT * FROM (SELECT * FROM my_db.board WHERE idx >= $lastIdx ORDER BY idx ASC LIMIT 10) a ORDER BY idx DESC;";
            
         // ASC(오름차순)한 테이블을 다시 DESC 정렬 (개념: 서브쿼리)

        ?>  
            <tr id=good>
                <td><a href="collection_detail.php?image_id=<?php echo $row["image_id"];?>">
                    <?php echo "<img src='".$row['image_path']."' width=570 height=500/>";?>
            </tr>
            <?php }?>
        </table>
        <div id="page_num">
            <ul id="page">
                <?php
                if($page <= 1)
                {
                    echo"<li>처음</li>";
                }else{
                    echo"<li><a href='?page=1'>처음</a></li>";
                }
                if($page <= 1)
                {
                    
                }else{
                    $pre = $page - 1;
                    echo"<li><a href='?page=$pre'>이전</a></li>";
                }
                for($i=$block_start; $i<=$block_end; $i++){
                    if($page == $i){
                        echo"<li class='fo_re'>[$i]</li>";
                    }else{
                        echo"<li><a href='?page=$i'>[$i]</a></li>";
                    }
                }
                if($block_num >= $total_block){
                }else{
                    $next = $page + 1;
                    echo "<li><a href='?page=$next'>다음</a></li>";
                }
                if($page >= $total_page){
                    echo"<li>마지막</li>";
                }else{
                    echo"<li><a href='?page=$total_page'>마지막</a></li>";
                }
                ?>
            </ul>
        </div>
</body>
</html>