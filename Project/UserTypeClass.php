<?php
require_once("DBConnect.php");
class UserType{
  public $ID;
  public $Type;
public function addUserType ($UserType_Object){
  $sql = 'INSERT INTO usertype (Type) VALUES ("'.$UserType_Object->Type.'")';
  $DB = new DB();
  $DB->connect();
  $DB->execute($sql);
  $DB->disconnect();
}

public function deleteUserType ($ID){
  $sql = 'DELETE FROM usertype WHERE ID = "'.$ID.'"';
  $DB = new DB();
  $DB->connect();
  $DB->execute($sql);
  $DB->disconnect();
}

public function getAllUserTypes (){
  $sql = 'SELECT * FROM usertype';
  $DB = new DB();
  $DB->connect();
  $result = $DB->execute($sql);
  $DB->disconnect();
  $object = array();
  $index = 0;
  if ($result!=null){
    while ($row = mysqli_fetch_array($result)){
      $object[$index] = new UserType();
        $object[$index]->ID = $row['ID'];
        $object[$index]->Type = $row['Type'];
        $index++;
    }
    return $object;
  }
  else{
    return 0;
  }

}

}
 ?>
