<?php
require_once("UserPagesClass.php");
$Page = $_POST['page'];
$Type = $_POST['type'];

$object = new userPage();
$object->PageID = $Page;
$object->UserTypeID = $Type;
$object->AssignPages($object);
header("Location:MainPage.php");
exit;

 ?>
