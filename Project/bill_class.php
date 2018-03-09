<?php
require ('DBConnect.php');
session_start();
class bill{
public $ID;
public $patient_id;
public $bill_date;
public $bill_time;
public $payment_method_id;
public $service_name;
public $price;
public $discount;
public $total;



public static function AddBill($bill_Object){
  $sql = 'INSERT INTO bill (patient_id,bill_date,bill_time,payment_method_id,service_name,price,discount,total) VALUES ("'.$bill_Object->patient_id.'","'.$bill_Object->bill_date.'","'.$bill_Object->bill_time.'",
  "'.$bill_Object->payment_method_id.'","'.$bill_Object->service_name.'","'.$bill_Object->price.'","'.$bill_Object->discount.'","'.$bill_Object->total.'")';
  $DB1 = new DB();
  $DB1->connect();
  $result = $DB1->execute($sql);
  $DB1->disconnect();
  return $result;
}

public static function DeleteBill ($ID){
    $DB = new DB();
    $DB->connect();
    $sql = "DELETE FROM bill WHERE id = '".$ID."'";
    $result =$DB->execute($sql);
    $DB->disconnect();

}

public function DisplayBills (){
  $sql = 'SELECT * FROM bill ';
  $DB = new DB();
  $DB->connect();
  $result = $DB->execute($sql);
  $DB->disconnect();
  if ($result != null){
    return $result;
  }
  else {
    return 0;
  }
}


}

 ?>
