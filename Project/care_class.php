<?php
require_once ('DBConnect.php');
class care{
public $ID;
public $userName;




public function AddCare($care_Object){


}

public function DeleteCare ($ID){
    $DB = new DB();
    $DB->connect();
    $sql = "DELETE FROM care WHERE id = '".$ID."'";
    $result =$DB->execute($sql);
    $DB->disconnect();

}

public static function DisplayCare (){
  $sql = 'SELECT * FROM care ';
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
