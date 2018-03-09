<?php
require_once ('DBConnect.php');
class service{
public $ID;
public $name;
public $price;
public $dep_id;



public function AddService($service_Object){
  $sql = 'INSERT INTO service (name,price,dep_id) VALUES ("'.$service_Object->name.'","'.$service_Object->price.'","'.$service_Object->dep_id.'")';
  $DB1 = new DB();
  $DB1->connect();
  $result = $DB1->execute($sql);
  $DB1->disconnect();

}

public function DeleteService ($ID){
    $DB = new DB();
    $DB->connect();
    $sql = "DELETE FROM service WHERE id = '".$ID."'";
    $result =$DB->execute($sql);
    $DB->disconnect();

}

public static function displayService (){
  $sql = 'SELECT * FROM service ';
  $DB = new DB();
  $DB->connect();
  $result = $DB->execute($sql);
  $DB->disconnect();
  if ($result != null){
    return $result;
  }
  else {
    return 0;
  }
}

public static function findService ($id){
  $sql = 'SELECT * FROM service where id="'.$id.'"';
  $DB = new DB();
  $DB->connect();
  $result = $DB->execute($sql);
  $DB->disconnect();
  if ($result != null){
    return $result;
  }
  else {
    return 0;
  }
}


}

 ?>
