<?php

include('loginsession.php');

?>


<?php

if($login){
    session_destroy();
    echo'<script>alert("로그아웃 되었습니다"); location.href="main.php"; </script>';
}else{
    echo'<script>alert("로그인 해주세요"); history.back(); </script>';
}

?>