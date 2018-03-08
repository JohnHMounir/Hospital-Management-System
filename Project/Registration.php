<?php
require_once('DBConnect.php');
class registered{
public $UserName;
public $Password;
public $User_ID;

public function login($Register_Object){
  $DB = new DB();
  $DB->connect();
  #$Register_Object->Password = sha1($Register_Object->Password);
  $sql = 'SELECT User_ID FROM register WHERE UserName = "'.$Register_Object->UserName.'"AND Password = "'.$Register_Object->Password.'"';
  $result = $DB->execute($sql);
  if ($result!=null){
    $array = $result->fetch_array();
    $DB->disconnect();
    return $array['User_ID'];

  }
  else{
    //Redirect to Faild to Login Page
  }
}

public function ModifyUser ($Register_Object){
  $sql = 'UPDATE register SET UserName = "'.$Register_Object->UserName.'" , Password = "'.$Register_Object->Password.'" WHERE
  User_ID = "'.$Register_Object->User_ID.'"';
  $DB = new DB();
  $DB->connect();
  $Result = $DB->execute($sql);
  $DB->disconnect();
  return $Result;



}

public function getUserName ($ID){
  $sql = 'SELECT UserName FROM register WHERE User_ID = "'.$ID.'"';
  $DB = new DB();
  $DB->connect();
  $Result = $DB->execute($sql);
  $DB->disconnect();
  return $Result;
  }


public function getPassword ($ID){
  $sql = 'SELECT Password FROM register WHERE User_ID = "'.$ID.'"';
  $DB = new DB();
  $DB->connect();
  $Result = $DB->execute($sql);
  $DB->disconnect();
  return $Result;
}
}

 ?>
