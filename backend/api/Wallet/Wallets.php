<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;

    $columns = ['id','name','balance'];
    
    $where = [];

    $db -> select('wallets', $columns,$where);
?>