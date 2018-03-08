<?php
session_start();

require_once("Registration.php");
require_once("UserClass.php");
$userName = $_POST['username'];
$Password = $_POST['password'];

$reObject = new registered();

$reObject->UserName = $userName;
$reObject->Password = $Password;

$UserID = $reObject->login($reObject);

$UObject = new user();
$Result = $UObject->FindUser($UserID);
$array = mysqli_fetch_array($Result);
$_SESSION['User_ID'] = $array['ID'];
$_SESSION['UserType_ID'] = $array['UserType_ID'];
header("Location:MainPage.php");
exit;
?>
