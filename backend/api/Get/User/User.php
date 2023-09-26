<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;
    
    $UserID = $_GET['UserID'];

    $columns = ['name'];
    
    $where = ['id' => $UserID];

    $db -> select('users', $columns, $where);
?>