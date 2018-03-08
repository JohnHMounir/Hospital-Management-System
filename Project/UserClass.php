<?php
require_once('DBConnect.php');
class user{
public $ID;
public $FirstName;
public $MiddleName;
public $LastName;
public $Address_Object;
public $UserType_Object;
public $Gender;
public $SocialSecurityNumber;
public $DateOfBirith;
public $LoginStatus;



public function AddUser($User_Object){
  $sql = 'INSERT INTO user (FirstName,MiddleName,LastName,Address_ID,UserType_ID,Gender,SocialSecuirityNumber,DateOfBirith,LoginStatus) VALUES ("'.$User_Object->FirstName.'","'.$User_Object->MiddleName.'","'.$User_Object->LastName.'","'.$User_Object->Address_Object->ID.'",
  "'.$User_Object->UserType_Object->ID.'","'.$User_Object->Gender.'","'.$User_Object->SocialSecurityNumber.'","'.$User_Object->DateOfBirith.'","'.$User_Object->LoginStatus.'")';
  $DB1 = new DB();
  $DB1->connect();
  $rnd = rand(1000,100000000);

  $result = $DB1->execute($sql);
  $ID = $DB1->getID();
  $sql2 = 'INSERT INTO unregister (User_ID,Number) VALUES ("'.$ID.'","'.$rnd.'")';
  $DB1->execute($sql2);
  $DB1->disconnect();

}

public function modifyUser ($ID , $User_Object){
  $sql = "UPDATE user SET FirstName = '".$User_Object->FirstName."',MiddleName = '".$User_Object->MiddleName."',LastName = '".$User_Object->LastName."',
  Address_ID = '".$User_Object->Address_Object->ID."',UserType_ID = '".$User_Object->UserType_Object->ID."',Gender = '".$User_Object->Gender."',SocialSecuirityNumber = '".$User_Object->SocialSecurityNumber."',
  DateOfBirith = '".$User_Object->DateOfBirith."',LoginStatus = '".$User_Object->LoginStatus."' WHERE ID = '".$ID."'";
  $DB = new DB();
  $DB->connect();
  $result = $DB->execute($sql);
  $DB->disconnect();
}

public function deleteUser ($ID){

  $DB = new DB();
  $DB->connect();
  $FirstStatment = "DELETE FROM user WHERE ID = '".$ID."'";


  $sql2 = "DELETE FROM phone WHERE User_ID = '".$ID."'";

  $result =$DB->execute($sql2);
  echo $result;

  $sql3 = "DELETE FROM register WHERE User_ID = '".$ID."'";

  $result =$DB->execute($sql3);
  echo $result;

  $sql4 = "DELETE FROM unregister WHERE User_ID = '".$ID."'";

  $result =$DB->execute($sql4);
  echo $result;
  $result = $DB->execute($FirstStatment);
  echo $result;


  $DB->disconnect();
}

public function FindUser ($ID){
  $sql = 'SELECT *FROM user WHERE ID = "'.$ID.'"';
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

public function FindPhones ($ID){
$sql = 'SELECT * FROM phone WHERE User_ID = "'.$ID.'"';
$DB = new DB();
$DB->connect();
$result = $DB->execute($sql);
$DB->disconnect();

  return $result;



}

}

 ?>
