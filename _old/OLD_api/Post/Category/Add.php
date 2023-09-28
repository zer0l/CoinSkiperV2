<?php 

    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;

    $Category_Name = $_POST['Category_Name'];

    $params = [
		'name_category' => "$Category_Name", 
	];

    $db -> add('category', $params);

?>