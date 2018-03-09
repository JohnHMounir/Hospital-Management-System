<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    require_once ("DBConnect.php");
    require_once ("department_class.php");
    require_once ("waiting_class.php");
    $cond="";
    $err="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      if($_POST["dep"]!=-1){

      $result1=waiting::displayWaitingList($_POST["dep"]);
      $num_rows = mysqli_num_rows($result1);
              if($num_rows!=0){
                   $cond="true";
              }
              else{
                $err="no waiting list";
              }
             }
             else{
                   $err="Choose Department";
             }
           }
     ?>
  </head>
  <body>
    <h2>Waiting Screen</h2>
    <br>
    <h3>Department Waiting List</h3>
    <form class="searchform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <?php
      $result=department::DisplayDepartment();
      echo "<select name="."'dep'"." > <option value =",-1,"> Choose Type</option>";
      while($row = mysqli_fetch_array($result)){
       echo "<option value=".$row[0].">".$row[1]."</option>" ;
      }
      echo "</select><br>";
      ?>
      <br>
      <input type="submit" name="" value="search">
    </form>

      <?php
      if($cond=="true"){
      echo "<table> <tr><th>Department</th>    <th>Patient ID</th>    <th>waiting date</th>    <th>waiting number</th></tr>";
      while($row1=mysqli_fetch_array($result1)){
        echo "<tr><td>".$row1[1]."</td><td>  ".$row1[2]."</td> <td> ".$row1[3]."</td> <td> ".$row1[4]."</td></tr>";
      }
      echo "</table>";
    }
    echo $err;

       ?>
       <br>
       <br>
<a href="reception_screen.php"><button>back to Reception Screen</button></a>
  </body>
</html>
