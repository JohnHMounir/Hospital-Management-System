<?php
require_once ('DBConnect.php');
class department{


public function AddDepartment($department_Object){


}

public function DeleteDepartment ($ID){
    $DB = new DB();
    $DB->connect();
    $sql = "DELETE FROM doctor WHERE id = '".$ID."'";
    $result =$DB->execute($sql);
    $DB->disconnect();

}

public static function DisplayDepartment (){
  $sql = 'SELECT * FROM department';
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
