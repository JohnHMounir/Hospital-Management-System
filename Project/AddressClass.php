<?php
require_once("DBConnect.php");
  class address{
    public $ID;
    public $name;
    public $ParentID;

    public function retrieveAddress ($Address_Object){
      $FullAdress;
      $DB = new DB();
      $DB->connect();
      while ($Address_Object->ParentID!=0){
        $sql = 'SELECT Name , Parent_ID FROM address WHERE ID = "'.$Address_Object->ID.'"';
        $result = $DB->execute($sql);
        if ($result != null){
          $row = mysqli_fetch_array($result);
          $FullAdress = $FullAdress+","+$row['Name'];
          $Address_Object->ID = $row['Parent_ID'];
        }
        else{
          break;
        }
      }
      $DB->disconnect();
    }

    public function AddNewRecord($Address_Object){
      $sql = 'INSERT INTO address (Name , Parent_ID) VALUES ("'.$Address_Object->name.'","'.$Address_Object->ParentID.'")';
      $DB = new DB();
      $DB->connect();
      $DB->execute($sql);
      $DB->disconnect();
    }

    public function getAllRoots (){
      $sql = 'SELECT Name FROM address WHERE Parent_ID = 0';
      $DB = new DB();
      $DB->connect();
      $index = 0;
      $result = $DB->execute($sql);
      $Names = array();
      $DB->disconnect();
      if ($result != null){
        while ($row = mysqli_fetch_array($result)){
          $Names[$index] = $row['Name'];
          $index++;
        }

      return $Names;
    }
      else {
        return 0;
      }

    }

    public function fillObject ($name){
      $sql = 'SELECT * FROM address WHERE Name = "'.$name.'"';
      $DB = new DB();
      $DB->connect();
      $result = $DB->execute($sql);
      $DB->disconnect();
      $row = mysqli_fetch_array($result);
      $this->ID = $row['ID'];
      $this->name = $row['Name'];
      $this->ParentID = $row['Parent_ID'];
    }

  }
 ?>
