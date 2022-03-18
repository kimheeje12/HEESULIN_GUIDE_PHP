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
    <title>Main</title>

    <script type="text/javascript">
        function getCookie(name)
        {
            var cookie = document.cookie;
                    if (document.cookie != "") {
                        var cookie_array = cookie.split("; ");
                        for ( var index in cookie_array) {
                            var cookie_name = cookie_array[index].split("=");
                            if (cookie_name[0] == "popupYN") {
                                return cookie_name[1]; 
                            } 
                        }
                    }
            return ;
        }

       function openPopup(url) {
            var cookieCheck = getCookie("popupYN");
            if (cookieCheck != "N") window.open(url, '', 'width=800,height=850,left=0,top=0')
        }
    </script>

    <script src="jquery 3.6.0.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,700&display=swap');

        body{
            font-family: 'Open Sans', sans-serif;        
        }

        .mainimage .maintext{
        position:absolute;
        top:45%;
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

        .bar{
            /* margin:0 auto; 중앙정렬*/
            /* line-height: 2; 줄 간격 조절 */
            margin-top: 5%;
            margin-left: 15%;
            width: 100px;
            height: 10px;
            background-color: black;
        }
        #title{
            line-height: 0%;
            margin-left: 15%;
            font-size: 50px;
        }
        /* object-fit: cover; 비율 맞추기 */

        .bar2{
            margin-top: 32%;
            margin-left: 15%;
            width: 100px;
            height: 10px;
            background-color: black;
        }


        #search{
            background-image: url('img/search.jpg');
            background-position: left;
            background-repeat: no-repeat;
        }

        /* .slide_wrapper{
            position: relative;
            width: 1900px;
            margin-left: 13.5%;
            height: 500px;
            overflow: hidden;
        }
        .slides{
            position: absolute;
            left: 0;
            top:0;
            transition: left 0.5s ease-out;
            list-style: none;
        }
        .slides li:not(:last-child){
            float: left;
            margin-right: 30px;
        } */
        /* .controls{
            text-align: center;
        }
        .controls span{
            color: #fff;
        } */
        
        .collection{
            float: left;
            margin-left: 15%;
        }

        #good{
            float: left;
        }

    </style>
</head>
<body onload="javascript:openPopup('popup.html')">
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
        <img src="img/main.jpg" width="100%" height="auto">
        <div class="maintext"> 
        <h1><i><p>"인생은 요리와 같다</p><p>좋아하는 게 뭔지 알려면 일단 맛부터 봐야한다"</p><p><br></p><p>-Paulo Coelho-</p></i></h1>
        <!-- <input id="search" type="text" name="search" placeholder="레스토랑, 쉐프 검색" style="width: 300px; height: 50px; font-size: 20px; text-align: center; ime-mode:active;">     -->
        </div>
    </div>

    <div class="bar">
        <p></p>
    </div>
    <div id="title">
        <p>Collection</p>
    </div>
    
    <div>
        <table class=collection>
        <?php
        $query = "SELECT * FROM image order by image_id asc limit 3";
        $result = mysqli_query($connect, $query);

        while($row = $result->fetch_assoc()){

        ?>  
            <tr id=good>
                <td><a href="collection_detail.php?image_id=<?php echo $row["image_id"];?>">
                    <?php echo "<img src='".$row['image_path']."'/<?php width=600 height=600/>";?></a></td>
            </tr>
            <?php }?>
            <tr>
            <td><a href="collection.php">
            <button style="font-size: 30px; margin-left: 39%; margin-top: 1%; width: 400px; height: 70px; background: white; border-width: thick; border-color: black; border-radius: 30px;"> 
            더 많은 Collection 보기</button></a></td>
            </tr>
        </table>
    </div>

    <div class="bar2">
        <p></p>
    </div>
    <div id="title">
        <p>People</p>
    </div>
    <table class=collection>
        <?php
        $query = "SELECT * FROM image2 order by image_id asc limit 3";
        $result = mysqli_query($connect, $query);
        while($row = $result->fetch_assoc()){
        ?>  
            <tr id=good>
                <td><a href="people_detail.php?image_id=<?php echo $row["image_id"];?>">
                    <?php echo "<img src='".$row['image_path']."' width=600 height=600/>";?></a></td>
            </tr>
            <?php }?>
            <tr>
            <td><a href="people.php">
            <button style="font-size: 30px; margin-left: 39%; margin-top: 1%; margin-bottom: 2%; width: 400px; height: 70px; background: white; border-width: thick; border-color: black; border-radius: 30px;">  
            더 많은 People 보기</button></a></td>
            </tr>
        </table>

</body>
</html>