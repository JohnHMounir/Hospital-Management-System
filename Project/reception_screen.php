<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    require_once ("DBConnect.php");
    require_once ("UserClass.php");
    $button="";
    $name="";
    $id="";
    $err="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(!empty($_POST["search_by_id"])){
      $result=user::FindUser($_POST["search_by_id"]);
      $num_rows = mysqli_num_rows($result);
      if($num_rows!=0){
      $row=mysqli_fetch_array($result);
      $name="Patient name: ".$row[1]." ".$row[2]." ".$row[3];
      $id="ID: ".$row[0];
      $button="<a href = 'Treasury.php' ><button>Go to treasury</button></a>";
      $_SESSION["patient_id"] = $row[0];
      }
      else{
        $err="patient not found";
      }
     }
   }
     ?>
  </head>
  <body>
    <h2>Reception Screen</h2>
    <br>
    <h3>Search patient</h3>
    <form class="searchform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      Search patient_id by id: <input type="number" name="search_by_id" value="" required>
      <input type="submit" name="" value="search">
    </form>
    <div class="result">
      <?php
        echo "<br>".$name."<br>";
        echo "<br>".$id."<br>";
        echo "<br>".$button;
        echo $err;
       ?>
    </div>
  </body>
</html>
