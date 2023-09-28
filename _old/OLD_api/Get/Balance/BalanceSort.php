<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;


    $columns = ['id', 'id_user', 'user_name', 'id_category', 'name_category', 'date', 'sum', 'type'];
    
    $Sort = $_GET['Sort'];
    $where = ['type' => $Sort];

    $db -> select('balance_all_info', $columns, $where);
?>