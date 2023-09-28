<?php 
    $connect = mysqli_connect('localhost','root','root','coinskiperv2');


    $IDWallet = $_POST['IDWallet'];
    $IDCategory = $_POST['IDCategory'];
    $Sum = $_POST['Sum'];

    
    $query_add_db = $connect -> query("INSERT INTO `expenses`(`id_category`, `id_wallet`, `sum`, `date`) VALUES ('$IDCategory','$IDWallet','$Sum','2023-01-01')");
    
    $query_db = $connect -> query("UPDATE `wallets` SET `balance`=`balance`- $Sum  WHERE `id` = $IDWallet");

    // OUTPUT ARR

    $outputArr = [];

    $query_category = $connect -> query("SELECT category.id,category.name,sum(expenses.sum) as `sum` 
    FROM category LEFT JOIN expenses ON category.id = expenses.id_category WHERE category.id = $IDCategory");

    $Category = [];

    while ($row = mysqli_fetch_assoc($query_category)){
        $myArr = [];
        $myArr['id'] = $row['id'];
        $myArr['name'] = $row['name'];
        $myArr['sum'] = $row['sum'] != 0 ? number_format($row['sum'] , 0, ',', ' ') : 0;
        array_push($Category, $myArr);
    } 

    $query_wallet = $connect -> query("SELECT * FROM `wallets` WHERE `id` = '$IDWallet'");

    $Wallets = [];

    while ($row = mysqli_fetch_assoc($query_wallet)){
        $myArr = [];
        $myArr['id'] = $row['id'];
        $myArr['name'] = $row['name'];
        $myArr['balance'] = number_format($row['balance'] , 0, ',', ' ');
        array_push($Wallets, $myArr);
    } 

    $outputArr = [
        'Category' => $Category,
        'Wallets' => $Wallets,
    ];

    echo json_encode($outputArr,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>