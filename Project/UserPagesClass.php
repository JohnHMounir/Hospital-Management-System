<?php
require_once("DBConnect.php");
require_once("PagesClass.php");
class userPage{
  public $ID;
  public $PageID;
  public $UserTypeID;

  public function AssignPages($UserPagesObject){
    $sql = 'INSERT INTO user_pages (Page_ID , User_Type_ID) VALUES ("'.$UserPagesObject->PageID.'","'.$UserPagesObject->UserTypeID.'")';
    $DB = new DB();
    $DB->connect();
    $DB->execute($sql);
    $DB->disconnect();
  }
  public function getallUserPages($UID){
    $sql = 'SELECT * FROM user_pages WHERE User_Type_ID = "'.$UID.'"';
    $DB = new DB();
    $DB->connect();
    $result = $DB->execute($sql);
    $DB->disconnect();
    $index = 0;
    $Pages = array();
    if ($result != null){
      while ($row = mysqli_fetch_array($result)){
          $Pages[$index] = new page();
          $Pages[$index]->ID = $row['Page_ID'];
          $Pages[$index]->fillObject();
          $index++;
      }
      return $Pages;
    }
    else{
      return 0;
    }



  }
}
 ?>
