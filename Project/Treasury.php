<!DOCTYPE html>
  <html>
  <?php
  require_once ('bill_class.php');
  require_once ('discount_class.php');
  require_once ('services_class.php');
  require_once ('care_class.php');
  require_once ('careType_class.php');
  require_once ('payment_method.php');
  #require ('appointment_class.php');
  require_once ('waiting_class.php');
  $insuranceErr="";
  $serviceErr="";
  $care="";
  $caretype="";
  $id="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST["p_ID"])){
    $id=$_POST["p_ID"];
    }
    $date=date("Y-m-d");
    $time=date("h:i:s");
    $paymentmethod=$_POST["payment"];
    if(!empty($_POST["Insurance"])){
      if(($_POST["Insurance_name"]!=-1)&&($_POST["Insurance_type"]!=-1)&&($_POST["service"]!=-1)){
        $care=$_POST["Insurance_name"];
        $caretype=$_POST["Insurance_type"];
        $result=discount::findDiscount($care,$caretype,$_POST["service"]);
        $num_rows = mysqli_num_rows($result);
        if($num_rows!=0){
          $row=mysqli_fetch_array($result);
          $discount=$row[0];
        }
        else{
             $discount=0;
        }
      }
      else{
        $insuranceErr="Choose insurance name and type.";
      }

    }
    else{
       $discount=0;
    }
    if ($_POST["service"]!=-1){
      $result=service::findService($_POST["service"]);
      $row=mysqli_fetch_array($result);
      $price=$row[2];
      $service_name=$row[1];
      $depart_id=$row[3];
    }
    else{
      $serviceErr="Choose service.";
    }
    if((($_POST["service"]!=-1)&&(!empty($_POST["Insurance"]))&&($_POST["Insurance_name"]!=-1)&&($_POST["Insurance_type"]!=-1)) || (($_POST["service"]!=-1)&&(empty($_POST["Insurance"])))){
    $bill1=new bill();
    $waiting1=new waiting();
      $bill1->patient_id=$id;
      $bill1->bill_date=$date;
      $bill1->bill_time=$time;
      $bill1->payment_method_id=$paymentmethod;
      $bill1->service_name=$service_name;
      $bill1->price=$price;
      $bill1->discount=$discount;
      $bill1->total=$price*((100-$discount)/100);
      $result11=bill::AddBill($bill1);
      $waitingresult=waiting::displayWaitingList($depart_id);
      $type1=gettype($waitingresult);
      if($type1=="integer"){
        $w_n=1;
      }
      else{
      $num_row1= mysqli_num_rows($waitingresult);
      if($num_row1!=0){
        $row1=mysqli_fetch_array($waitingresult);
        $w_n=$row1[4]+1;
      }
    }
      $waiting1->waiting_number = $w_n;
      $waiting1->waiting_date = $date;
      $waiting1->patient_id = $id;
      $waiting1->dep_id = $depart_id;
      $result22=waiting::AddToWaiting($waiting1);
      if($result11&&$result22){
        header("Location: dep_waiting.php");
      }
    }



   }
   ?>
    <head>

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" type="text/css" href="Style.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>

      <div class="header">

        <a href="WelcomePage.html" class="logo"> <img src="logo.jpg" width="30px" height="30px"> </a>

        <div class = "header-right">

          <button onclick="document.getElementById('id1').style.display='block'" style="width:auto;">Sign Up</button>

          <button onclick="document.getElementById('id2').style.display='block'" style="width:auto;">Log In</button>

          <div id="id1" class="modal1">

            <span onclick="document.getElementById('id1').style.display='none'" class="close" title="Close Modal">&times;</span>

            <form class="modal1-content" action="/action_page.php">

              <div class="container1">

                <h1>Sign Up</h1>

                <p>Please fill in this form to create an account.</p>

                <hr>

                <label for="patient_id"><b>Patient ID</b></label>

                <input type="text" placeholder="Enter ID" name="id" required>

                <label for="psw"><b>Username</b></label>

                <input type="text" placeholder="Enter Username" name="psw" required>

                <label for="psw-new"><b>Password</b></label>

                <input type="password" placeholder="Enter Password" name="psw-new" required>

                <label>

                  <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me

                </label>

                <p> <a href="TermsPage.html">Terms & Privacy</a>.</p>

                <div class="clearfix">

                  <button type="button" onclick="document.getElementById('id1').style.display='none'" class="cancelbtn">Cancel</button>

                  <button type="submit" class="signupbtn">Sign Up</button>

                </div>

              </div>

            </form>

          </div>

          <div id="id2" class="modal1">

            <span onclick="document.getElementById('id2').style.display='none'" class="close" title="Close Modal">&times;</span>

            <form class="modal1-content animate" action="/action_page.php">

              <div class="imgcontainer">

                <img src="card.png" alt="Avatar" class="avatar" style=" width: 80px; height: 80px;">

              </div>

              <div class="container1">

                <h1>Log In</h1>

                <p>Please fill in this form to long into your account.</p>

                <label id="username"><b>Username</b></label>

                <input type="text" placeholder="Enter Username" name="psw" required>

                <label id="psw"><b>Password</b></label>

                <input type="password" id="myInput" placeholder="Enter Password" name="psw-new" required>

                <input type="checkbox" onclick="showPass()">Show Password

                <label>

                  <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me

                </label>

                <div class="clearfix">

                  <button type="button" onclick="document.getElementById('id2').style.display='none'" class="cancelbtn">Cancel</button>

                  <button type="submit" class="loginbtn">Log In</button>

                  <a id="forgetbtn"> Forget Passowrd? </a>

                  <!-- The Modal -->

                  <div id="myModal" class="modal">

                    <!-- Modal content -->

                    <div class="modal-content">

                      <span class="modelClose">&times;</span>

                      <form action = '' method = 'post'>

                        <label id="oldpws"><b>Old Password</b></label>

                        <input type = 'password' name = 'oldpassword' required>

                        <label id="newpws"><b>New Password</b></label>

                        <input type = 'password' name = 'newPassword' required>

                        <label id="renewpws"><b>Repeat New Password</b></label>

                        <input type = 'password' name = 'confirmpassword' reuqired>

                        <input class ="pwschanbtn" type = 'submit' value = 'change'>

                      </form>

                    </div>

                  </div>

                </div>

              </div>

            </form>

          </div>

        </div>

        <div class="header-left">

          <a class="active" href="WelcomePage.html">Home</a>

          <a href="DepartmentPage.html">Departments</a>

          <a href="Donate.html">Donate</a>

          <a href="location.html">Location</a>

          <a href="contactus.html">Contact Us</a>

        </div>

      </div>


<br><h3>Treasury</h3><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = 'post'>
<br>Patient ID : <input type ='number' name = 'p_ID' value="<?php echo $_SESSION["patient_id"]; ?>"  readonly required><br>

<br>Service :
<?php
$serviceresult=service::displayService();
echo "<select name="."'service'"." > <option value =",-1,"> Choose service</option>";
while($row = mysqli_fetch_array($serviceresult)){
 echo "<option value=".$row[0].">".$row[1]."</option>" ;
}
echo "</select><br>";
echo $serviceErr;
?>

<br>Insurance <input type ='checkbox' name ='Insurance' value="yes"><br>

<br>Insurance Name :
<?php
$result=care::DisplayCare();
echo "<select name="."'Insurance_name'"."  > <option value =",-1,"> Choose Provider</option>";
while($row = mysqli_fetch_array($result)){
 echo "<option value=".$row[0].">".$row[1]."</option>" ;
}
echo "</select><br>";
?>

<br>Insurance Type :
<?php
$result=careType::DisplayCareType();
echo "<select name="."'Insurance_type'"." > <option value =",-1,"> Choose Type</option>";
while($row = mysqli_fetch_array($result)){
 echo "<option value=".$row[0].">".$row[1]."</option>" ;
}
echo "</select><br>";
echo $insuranceErr;
?>

<br>Payment Method:
 <?php
$result=PaymentMethod::DisplayPaymentMethod();
$cond="false";
while($row = mysqli_fetch_array($result)){
  if ($cond=="false"){
  echo "<input type ='radio' name ='payment' value='".$row[0]."' checked='checked'>$row[1]" ;
  $cond="true";
  }
  else
  echo "<input type ='radio' name ='payment' value='".$row[0]."' >$row[1]" ;
}

?>
<br>
<br>
<input type = 'submit' value ='reserve and print bill'>
</form>

<br><a href = 'Treasury.php' ><button>Reset</button></a><br>
<br><a href = 'reception_screen.php' ><button>back to reception screen</button></a>
</body>
</html>
