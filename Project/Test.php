<?php
require ("UserTypeClass.php");
$object =new UserType();
$Array = $object->getAllUserTypes();
echo $Array[0]->Type;
echo $Array[1]->Type;

 ?>
