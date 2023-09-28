<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;


    $columns = ['id','name_category'];
    
    $where = [];

    $db -> select('category', $columns, $where);
?>