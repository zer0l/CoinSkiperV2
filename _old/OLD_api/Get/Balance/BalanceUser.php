<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;

    $UserID = $_GET['UserID'];

    $columns = ['id', 'id_user', 'user_name', 'id_category', 'name_category', 'date', 'sum', 'type'];
    
    $where = ['id_user' => $UserID];

    $db -> select('balance_all_info', $columns, $where);

