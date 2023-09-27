<?php 
    require_once("Engine/Classes/DB.Class.php");
    $db = new db;

    $params = [
		'name_category' => 'Новая категория', 
	];


    $where = [
       
    ];

    $columns = [
		'name_category', 
	];

    $db -> select('category', $columns, $where);


?>