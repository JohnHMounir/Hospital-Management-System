<?php
require_once ('DBConnect.php');
class PaymentMethod{
public $ID;
public $name;




public function AddPaymentMethod($PaymentMethod_Object){
  $sql = 'INSERT INTO payment_method (name) VALUES ("'.$PaymentMethod_Object->name.'")';
  $DB1 = new DB();
  $DB1->connect();
  $result = $DB1->execute($sql);
  $DB1->disconnect();

}

public function DeletePaymentMethod ($ID){
    $DB = new DB();
    $DB->connect();
    $sql = "DELETE FROM payment_method WHERE id = '".$ID."'";
    $result =$DB->execute($sql);
    $DB->disconnect();

}

public static function DisplayPaymentMethod (){
  $sql = 'SELECT * FROM payment_method ';
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
