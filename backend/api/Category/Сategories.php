<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;

    $columns = ['id','name'];
    
    $where = [];

    $db -> select('category', $columns,$where);
?>