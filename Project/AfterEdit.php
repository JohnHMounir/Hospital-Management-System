<?php
require_once("UserClass.php");
require_once("AddressClass.php");
require_once("UserTypeClass.php");
  session_start();

  $Fname = $_POST['fname'];
  $MName = $_POST['mname'];
  $LName = $_POST['lname'];
  $SSN = $_POST['ssn'];
  $object = $_SESSION['Object'];
  $AdressObject = new address();
  $UserTypeObject = new UserType();

  $AdressObject->ID = $object['Address_ID'];
  $UserTypeObject->ID = $object['UserType_ID'];
  $Gender = $object['Gender'];
  $DOB = $object['DateOfBirith'];
  $LoginStatus = $object['LoginStatus'];

  $UserObject = new user();
  $UserObject->FirstName = $Fname;
  $UserObject->MiddleName = $MName;
  $UserObject->LastName = $LName;
  $UserObject->UserType_Object = $UserTypeObject;
  $UserObject->Address_Object = $AdressObject;
  $UserObject->SocialSecurityNumber = $SSN;
  $UserObject->Gender = $Gender;
  $UserObject->DateOfBirith = $DOB;
  $UserObject->LoginStatus = $LoginStatus;
  $UserObject->modifyUser($object['ID'],$UserObject);
  header("Location:MainPage.php");
  exit;

 ?>
