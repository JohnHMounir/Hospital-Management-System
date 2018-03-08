<?php
require_once("UnRegisteredClass.php");
require_once("Registration.php");
$Code = $_POST['Code'];
$UserName = $_POST['username'];
$Password = $_POST['password'];
$unObject = new UnRegister();
$reObject = new registered();

$unObject->Number = $Code;
$reObject->UserName = $UserName;
$reObject->Password = $Password;

$unObject->Register($unObject,$reObject);

header("Location:WelcomePage.html");
exit;


 ?>
