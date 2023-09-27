<?php 
    $connect = mysqli_connect('localhost','root','root','coinskiper');

    $token = $_POST['token'];

    $query_db = $connect -> query("SELECT `id` FROM `users` WHERE `token` = '$token'");

    $myArr = [];
    $myArr = $query_db->fetch_all(MYSQLI_ASSOC);
            
    $myJSON = json_encode($myArr);
    
    echo $myJSON;
?>