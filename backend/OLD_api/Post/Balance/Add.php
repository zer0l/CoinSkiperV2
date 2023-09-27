<?php 
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;

    $ID_User = $_POST['ID_User'];
    $Categories = $_POST['Categories'];
    $Date = $_POST['Date'];
    $Amount = $_POST['Amount'];
    $Type = $_POST['Type'];

    $params = [
		'id_user' => "$ID_User", 
        'id_category' => "$Categories", 
        'date' => "$Date",
        'sum' => "$Amount", 
        'type' => "$Type", 
	];

    $db -> add('balance', $params);

?>