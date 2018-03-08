<?php
require_once("UserClass.php");
$ID = $_POST['ID'];
$Object = new user();
$Object->deleteUser($ID);
header("Location:MainPage.php");
exit;
 ?>
