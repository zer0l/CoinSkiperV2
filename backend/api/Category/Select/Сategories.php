<?php 
    $connect = mysqli_connect('localhost','root','root','coinskiperv2');
    
    $query_db = $connect -> query("SELECT category.id,category.name,sum(expenses.sum) as `sum` 
    FROM category LEFT JOIN expenses ON category.id = expenses.id_category GROUP BY category.id");

    $Categories = [];

    while ($row = mysqli_fetch_assoc($query_db)){
        $myArr = [];
        $myArr['id'] = $row['id'];
        $myArr['name'] = $row['name'];
        $myArr['sum'] = $row['sum'] != 0 ? number_format($row['sum'] , 0, ',', ' ') : 0;
        array_push($Categories, $myArr);
    } 

    echo json_encode($Categories,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>