<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;

    $ID_User = $_POST['ID_User'];
    $ID_Category = $_POST['ID_Category'];
    $Sum = $_POST['Sum'];

    $params = [
		'id_user' => "$ID_User", 
        'id_category' => "$ID_Category", 
        'sum' => "$Sum", 
	];

    $db -> add('expense', $params);

?>