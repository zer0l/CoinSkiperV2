<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;
    
    $columns = ['id', 'id_user','user_name', 'id_category','name_category', 'sum'];
    
    $where = ['id_user' => '1'];

    $db -> select('income_all_info', $columns, $where);
?>