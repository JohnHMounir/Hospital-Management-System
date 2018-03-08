<?php
session_start();
 ?>
<html>
<head>
  <title>Home Page</title>
</head>
<body>

  <ul>
    <?php


      $ID =  $_SESSION['UserType_ID'];
      require_once("UserPagesClass.php");
      $object = new userPage();
      $result = $object->getallUserPages($ID);
      $size = count($result);

      for ($x=0;$x<$size;$x++){
        echo "<li><a href = ".$result[$x]->URL.">".$result[$x]->FName."</a></li>";
      }


    ?>

  </ul>

</body>
</html>
