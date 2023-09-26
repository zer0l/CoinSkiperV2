<?php 
class db {
  public function __construct(){
      $this -> connect = mysqli_connect('localhost','root','root','coinskiper');
  }

  private $connect;

  function add ($tablename,$params = []){
      $connect = $this -> connect;

      $total = count($params);
      $counter = 0;

      foreach($params as $key => $value){
      $counter++;
      if($counter == $total){
        $columns_name .= "`$key`";
        $columns_value .= "'$value'";
      }
      else{
        $columns_name .= "`$key`,";
        $columns_value .= "'$value',";
      }
      }

      $result = $connect -> query("INSERT INTO `$tablename`($columns_name) VALUES ($columns_value)");

      $myJSON = json_encode("ADD");
                
      echo $myJSON;
  }

  function delete ($tablename,$params = []){
    $connect = $this -> connect;

    $total = count($params);
    $counter = 0;

    foreach($params as $key => $value){
      $counter++;
      if($counter == $total){
        $string .= "`$key` = '$value'";
      }
      else{
        $string .= "`$key` = '$value' AND";
      }
    }

    $result = $connect -> query("DELETE FROM `$tablename` WHERE $string");
  }

  function update ($tablename,$params = [],$where= []){
    $connect = $this -> connect;

    $total = count($params);
    $counter = 0;

    foreach($params as $key => $value){
      $counter++;
      if($counter == $total){
        $string .= "`$key` = '$value'";
      }
      else{
        $string .= "`$key` = '$value',";
      }
    }


    $totalWhere = count($where);
    $counterWhere = 0;

    foreach($where as $key => $value){
      $counterWhere++;
      if($counterWhere == $totalWhere){
        $whereString .= "`$key` = '$value'";
      }
      else{
        $whereString .= "`$key` = '$value' AND";
      }
    }
            
    $result = $connect -> query("UPDATE `$tablename` SET $string WHERE $whereString");
  }


  function select ($tablename,$columns = [],$where= []){
    $connect = $this -> connect;

    $total = count($columns);
    $counter = 0;

    foreach($columns as $key => $value){
      $counter++;
      if($counter == $total){
        $columns_name .= "`$value`";
      }
      else{
        $columns_name .= "`$value`,";
      }
    }
            
    $totalWhere = count($where);
    $counterWhere = 0;
    if($totalWhere != 0){

      foreach($where as $key => $value){
        $counterWhere++;
        if($counterWhere == $totalWhere){
          $whereString .= "`$key` = '$value'";
        }
        else{
          $whereString .= "`$key` = '$value' AND";
        }
      }
    
      $whereStringReady = "WHERE $whereString";

    }
            
      $result = $connect -> query("SELECT $columns_name FROM `$tablename` $whereStringReady");

      $myArr = [];
      $myArr = $result->fetch_all(MYSQLI_ASSOC);

      $myJSON = json_encode($myArr);
                
      echo $myJSON;
  }


}