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
        <h1>10년 동안 고민해왔습니다</h1>
        <h1>이제는 세상에 나올 때가 되었다고 판단했습니다</h1>
        <h1>오랫동안 모아왔던 장소들을 지금부터 공개합니다</h1>
        <hr>
    </div>
    <div id = "history">
        <h1>History & Vision</h1>
    </div>
    <div>
    <div id = "detail">
        <img src="img/info.jpg" class="info2" style="float: right;">
        <p>무일푼이었고 츄파춥스와 소주 한 병이면 울고 웃었던 그 시절부터 시작됩니다</p>
        <p>무가 유가 되고 유가 무가 되던 시절 수많은 곳을 거쳐왔습니다</p>
        <p>부족하면 부족한 대로 넘치면 넘치는 대로 직접 느껴보았습니다</p>
        <p>2년 마다 격변하는 외식산업 속에서 변하지 않는 가치를 담은 곳을 찾기 위해 노력해왔습니다</p>
        <p>정성이 꾸준히 모이다보면 그 진심은 반드시 전달될 것이라 믿어 의심치 않습니다</p>
        <p>맛있게 먹으면 0kcal인 것처럼 항상 옆에서 함께 걸어가는 동반자가 되겠습니다</p>
        <p>세상에서 가장 맛있는 음식은 양념과 허기이듯 채워줄 수 있는 가이드북이 되겠습니다</p>
        <p>표정을 보면 맛이 보이듯이 절로 미소가 생기는 생생한 정보를 제공하겠습니다</p>
        <p>"대추가 저절로 붉어질 리는 없습니다"</p>
        <p>속도의 시대에 때론 느림의 미학으로 심리적 여유를 제공하겠습니다</p>
    </div>
    <hr>
    <div id = "detail2">
        <img src="img/info2.jpg" width="1400px" height="900px" style="float: left; margin-bottom: 5%;">
        <p style="font-size: 3em;">&nbsp Back to the Basics</p>
        <p>&nbsp&nbsp 기본에 충실하겠습니다</p>
        <p>&nbsp&nbsp 의미가 담기지 않은 곳은 추천하지 않습니다</p>
        <p>&nbsp&nbsp 오랜 정성과 진심이 담긴 장소만 담았습니다</p>
        <p>&nbsp&nbsp 대한민국 방방곡곡 직접 발로 뛰었습니다</p>
        <p>&nbsp&nbsp 음식에 대한 사랑보다 더 진실된 사랑은 없습니다</p>
        <p>&nbsp&nbsp "백문이불여일견"</p>
        <p>&nbsp&nbsp 빈 손으로 무심코 들어왔지만 나갈 때는 뿌듯했으면 좋겠습니다</p>
    </div>
</body>
</html>