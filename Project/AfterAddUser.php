<?php
require_once("UserClass.php");
require_once("AddressClass.php");
require_once("UserTypeClass.php");
$FirstName = $_POST['firstname'];
$MiddleName = $_POST['middlename'];
$LastName = $_POST['lastname'];
$Address = $_POST['address'];
$Gender = $_POST['gender'];
$SSN = $_POST['ssn'];
$DOB = $_POST['dob'];
$Address_object = new address();
$Address_object->fillObject($Address);
$UserType_Object = new UserType();
$UserType_Object->ID = 2;
$UserClass_object = new user();
$UserClass_object->FirstName = $FirstName;
$UserClass_object->MiddleName = $MiddleName;
$UserClass_object->LastName = $LastName;
$UserClass_object->Address_Object = $Address_object;
$UserClass_object->UserType_Object = $UserType_Object;
$UserClass_object->Gender = $Gender;
$UserClass_object->SocialSecurityNumber = $SSN;
$UserClass_object->DateOfBirith = $DOB;
$UserClass_object->LoginStatus = false;
$UserClass_object->AddUser($UserClass_object);

header("Location:MainPage.php");
exit;

 ?>
