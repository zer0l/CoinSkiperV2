<?php      
    require_once("../../Engine/Classes/DB.Class.php");
    $db = new db;

    $id = json_decode(file_get_contents('php://input'));

    if(empty($id)){
        echo json_encode("ERROR 213",JSON_UNESCAPED_UNICODE);
    }else{
        $params = [
            'id' => "$id", 
        ];
    
        $db -> delete('balance', $params);

        echo json_encode("Delete");
    }

   

?>