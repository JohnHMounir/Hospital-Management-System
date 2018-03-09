<?php
require_once ('DBConnect.php');

class waiting{
public $ID;
public $patient_id;
public $dep_id;
public $waiting_date;
public $waiting_number;




public static function AddToWaiting($waiting_Object){
  $sql = 'INSERT INTO waiting (dep_id,patient_id,waiting_date,waiting_number) VALUES ("'.$waiting_Object->dep_id.'","'.$waiting_Object->patient_id.'","'.$waiting_Object->waiting_date.'","'.$waiting_Object->waiting_number.'")';
  $DB1 = new DB();
  $DB1->connect();
  $result = $DB1->execute($sql);
  $DB1->disconnect();
  return $result;

}

public static  function DeleteFromWaiting ($ID){
    $DB = new DB();
    $DB->connect();
    $sql = "DELETE FROM waiting WHERE id = '".$ID."'";
    $result =$DB->execute($sql);
    $DB->disconnect();

}

public static function displayWaitingList ($dep_id){
  $sql = 'SELECT * FROM waiting  where dep_id = "'.$dep_id.'" ORDER BY waiting_number DESC';
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
