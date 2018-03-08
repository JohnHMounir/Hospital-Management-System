<html>
<head>
  <title>Assign</title>
</head>
<body>
  <form action = "afterAssign.php" method = "post">
    Pages List : <select name = 'page'>
  <?php
      require_once("PagesClass.php");
      require_once("UserTypeClass.php");

      $PageObject = new page();


      $Pages = $PageObject->getAllPages();

      $size = count($Pages);

      for ($x=0;$x<$size;$x++){
        echo "<option value = ".$Pages[$x]->ID.">".$Pages[$x]->FName."</option>";

      }



   ?>
  </select>
  <br>

   User Type List :
   <select name = 'type'>
     <?php
     $UserType = new UserType();
     $Types = $UserType->getAllUserTypes();
       $size2 = count($Types);
     for ($x2=0;$x2<$size2;$x2++){
       echo "<option value = ".$Types[$x2]->ID.">".$Types[$x2]->Type."</option>";

     }
      ?>
    </select>

<br>
<input type = 'submit' value = 'Save'>
</form>
</body>
</html>
