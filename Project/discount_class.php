<?php
require_once ('DBConnect.php');
class discount{
public $ID;
public $patient_care_type_id;
public $care_id;
public $discount;
public $service_id;



public function AddDiscount($discount_Object){


}

public function DeleteDiscount ($ID){
    $DB = new DB();
    $DB->connect();
    $sql = "DELETE FROM discount WHERE id = '".$ID."'";
    $result =$DB->execute($sql);
    $DB->disconnect();

}

public static function displayDiscount (){
  $sql = 'SELECT * FROM discount ';
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

public static function findDiscount ($care_id,$caretype_id,$service_id1){
  $sql = 'SELECT discount FROM discount where care_id = "'.$care_id.'" AND patient_care_type_id ="'.$caretype_id.'" And service_id="'.$service_id1.'"';
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
