<?php 
    $connect = mysqli_connect('localhost','root','root','coinskiper');

    $type = $_GET['type'];

    $query_db = $connect -> query("SELECT SUM(sum) as total FROM `balance` WHERE `type` = '$type' ");

    $myArr = [];
    $myArr = $query_db->fetch_all(MYSQLI_ASSOC);
            
    $myJSON = json_encode($myArr);
    
    echo $myJSON;
?>