<?php
require_once('DBConnect.php');
class UnRegister{
  public $Number;
  public $User_ID;

  public function Register ($UnRegister_Object , $Registered_Object){
    $sql = 'SELECT User_ID FROM unregister WHERE Number = "' .$UnRegister_Object->Number.'"';
    $DB = new DB();
    $DB->connect();
    $Result = $DB->execute($sql);
    if ($Result !=null){
      $row = mysqli_fetch_array($Result);
      $UnRegister_Object->User_ID = $row['User_ID'];
      $sql2 = 'INSERT INTO register (User_ID , UserName , Password) VALUES ("'.$UnRegister_Object->User_ID.'","'.$Registered_Object->UserName.'","'.$Registered_Object->Password.'")';
      $DB->execute($sql2);
      $sql3 = 'DELETE FROM unregister WHERE User_ID = "'.$UnRegister_Object->User_ID.'"';
      $DB->execute($sql3);
    }
    else{
      #Faild To Register Page



    }
  }

  public function DeleteData ($ID){
    $sql = 'DELETE FROM unregister WHERE User_ID = "'.$ID.'"';
    $DB = new DB();
    $DB->connect();
    $DB->execute($sql);
    $DB->disconnect();
  }

  public function ViewCode ($ID){
    $sql = 'SELECT Number FROM unregister WHERE User_ID = "'.$ID.'"';
    $DB = new DB();
    $DB->connect();
    $result = $DB->execute($sql);
    $DB->disconnect();
    if ($result !=null){
      $row = mysqli_fetch_array($result);
      $Number = $row['Number'];
      return $Number;
    }
    else{
      return 0;
    }
  }

  public function AddUnregister ($UnRegister_Object){
    $sql = 'INSERT INTO unregister (User_ID , Number) VALUES ("'.$UnRegister_Object->User_ID.'","'.$UnRegister_Object->Number.'")';
    $DB = new DB();
    $DB->connect();
    $DB->execute($sql);
    $DB->disconnect();
  }
}


 ?>
