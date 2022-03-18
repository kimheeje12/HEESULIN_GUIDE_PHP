<?php

    $connect = mysqli_connect('localhost', 'root', '000000', 'heesulin');
    $connect->set_charset("utf-8");

    function mq($sql)
    {
        global $connect; 
        return $connect->query($sql);
    }
?>