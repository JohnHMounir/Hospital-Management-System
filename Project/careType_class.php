<?php
require_once ('DBConnect.php');
class careType{
public $ID;
public $userName;




public function AddCareType($careType_Object){


}

public function DeleteCareType ($ID){
    $DB = new DB();
    $DB->connect();
    $sql = "DELETE FROM patient_care_type WHERE id = '".$ID."'";
    $result =$DB->execute($sql);
    $DB->disconnect();

}

public static function DisplayCareType (){
  $sql = 'SELECT * FROM patient_care_type ';
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
