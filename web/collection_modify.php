<?php

include('db.php');

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection_Upload</title>
    <script src="jquery 3.6.0.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
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
        color: white;
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

    $bno=$_GET['image_id'];
    $sql="SELECT * FROM collection_board WHERE image_id='".$bno."'";
    $result = mysqli_query($connect, $sql);
    $board = $result->fetch_array();  

    //이미지
    $sql2="SELECT * FROM image WHERE image_id='".$bno."'";
    $result2= mysqli_query($connect, $sql2);
    $board2 = $result2->fetch_array();

    ?>
    <div class="mainimage">
    <img src="img/upload.jpg" width="100%" height="1350px"> 
    <form class="maintext" form method="POST" action="collection_modify_ok.php?image_id=<?php echo $bno;?>" enctype="multipart/form-data">
        <h1 style="font-size: 50px; margin-top: 30%;"> Collection Upload</h1>
        <h1>Title</h1>
        <p><textarea name="title" cols=20 rows=2 placeholder="Title" style= "font-size: 25px; text-align:center;"><?php echo $board["collection_title"]?></textarea></p>
        <h1>Address</h1>
        <!-- <p><textarea name="address" cols=20 rows=5 placeholder="Address" style= "font-size: 25px; text-align:center;"><?php echo $board["collection_address"]?></textarea></p> -->
        <input type="text" name="address" value="<?php echo $board["collection_address"]?>" style="width:450px; height:130px; font-size: 20px;"/>
        <button type="button" style="width:100px; height:50px; font-size: 20px;" onclick="openZipSearch()">검색</button>
        
        <h1>Price</h1>
        <p><textarea name="price" cols=15 rows=1 placeholder="Price" style= "font-size: 25px; text-align:center;"><?php echo $board["collection_price"]?></textarea></p>
        <h1>Opinion</h1>
        <textarea name="opinion" cols=25 rows=8 placeholder="Opinion" style= "font-size: 25px; text-align:center;"><?php echo $board["collection_opinion"]?></textarea>
        <p><h1>Outside Image: <input type="file" name="image" value="찾아보기" style="width: 500px; height: 70px; font-size:25px;"></h1> </p>
        <p><h1>Inside Image: <input type="file" name="image2" value="찾아보기" style="width: 500px; height: 70px; font-size:25px;"></h1> </p>
        <input type="submit" name="upload" value="Upload" style="width: 150px; height: 50px; font-size:25px; border-radius: 30px;">
    </form>
</div>  

<script>
function openZipSearch() {
	new daum.Postcode({
		oncomplete: function(data) {
			// $('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
			$('[name=address]').val(data.address);
		}
	}).open();
}
</script>


</body>
</html>

<!-- // $sql = mq("SELECT * FROM collection_board WHERE image_id='".$bno."'");
    // $sql = mq("SELECT * FROM collection_board WHERE image_id='$bno';");
    // $board = $sql->fetch_array();

    // $sql = "SELECT * FROM collection_board WHERE image_id='".$bno."'";
    // $result = mysqli_query($connect, $sql);
    // $board = mysqli_fetch_array($result);
    // $board= mysqli_fetch_array($result);
    // $sql="SELECT * FROM collection_board WHERE image_id=$bno";

    // $result = $connect->query($sql);

    // $board = mysqli_fetch_assoc($result);
    // $result = mysqli_query($connect, $sql);
    // $board = $sql->fetch_array()   -->

        <!-- <h1>야키토리 묵</h1>
        <p>서울특별시 마포구 연남동 223-102</p>
        <p>30,000 ~ 40,000 KRW</p>
        <p>토종닭 중에서도 가장 큰 18호 닭을 직접 발골 및 해체 작업을 하여 다른 곳에서 쉽게 접할 수 없는 간, 꼬릿살 등의 부위를
            만나볼 수 있다.<br>오후 7시부터 11시까지는 1, 2부로 나눠 오마카세로 운영하며 이후에는 워크인 고객도 입장할 수 있다.
            대표 메뉴는 석화, 채소구이, 완자 등의<br> 요리와 5종의 야키토리, 메인 메뉴, 식사, 디저트가 차례대로 나오는 ‘야키토리 오마카세 3.5’. 
            소금과 타레를 약하게 사용하여 당일 수급받은<br> 토종닭 본연의 고소한 맛을 한껏 즐길 수 있다. 코스 중 녹진한 맛으로 입맛을 사로잡는 
            ‘닭간 파테’와 풍성한 육즙이 살아있는 ‘넓적다리 꼬치<br> 구이’가 가장 많은 사랑을 받는다.</p> -->