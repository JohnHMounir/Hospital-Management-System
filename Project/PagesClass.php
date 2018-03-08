<?php
require_once("DBConnect.php");
class page{

public $ID;
public $FName;
public $URL;

public function getAllPages (){
  $sql = 'SELECT * FROM pages';
  $DB = new DB();
  $DB->connect();
  $result = $DB->execute($sql);
  $DB->disconnect();
  $Objects = array();
  $index =0 ;
  if ($result != null){
    while ($row = mysqli_fetch_array($result)){
      $Objects[$index] = new page();
      $Objects[$index]->ID = $row['ID'];
      $Objects[$index]->FName = $row['Friendly_Name'];
      $index++;
    }
    return $Objects;
  }
  else{
    return 0;
  }

}

public function fillObject (){
  $sql = 'SELECT * FROM pages WHERE ID = "'.$this->ID.'"';
  $DB = new DB();
  $DB->connect();
  $result = $DB->execute($sql);
  $DB->disconnect();
  $row = mysqli_fetch_array($result);
  $this->FName = $row['Friendly_Name'];
  $this->URL = $row['URL'];

}
}
 ?>
