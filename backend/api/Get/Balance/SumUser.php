<?php 
    $connect = mysqli_connect('localhost','root','root','coinskiper');

    $user_id = $_GET['user_id'];
    $type = $_GET['type'];

    $query_db = $connect -> query("SELECT SUM(sum) as total FROM `balance` WHERE `id_user` = '$user_id' AND `type` = '$type' ");

    $myArr = [];
    $myArr = $query_db->fetch_all(MYSQLI_ASSOC);
            
    $myJSON = json_encode($myArr);
    
    echo $myJSON;
?>