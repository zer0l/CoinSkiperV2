<?php 

    $connect = mysqli_connect('localhost','root','root','coinskiperv2');
        
    $query_db = $connect -> query("SELECT * FROM wallets");

    $Wallets = [];

    while ($row = mysqli_fetch_assoc($query_db)){
        $myArr = [];
        $myArr['id'] = $row['id'];
        $myArr['name'] = $row['name'];
        $myArr['balance'] = number_format($row['balance'] , 0, ',', ' ');
        array_push($Wallets, $myArr);
    } 

    echo json_encode($Wallets,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

?>  