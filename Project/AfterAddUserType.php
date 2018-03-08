<?php
require_once("UserTypeClass.php");
$typeName = $_POST['type'];
$Object = new UserType();
$Object->Type = $typeName;
$Object->addUserType($Object);
 ?>
