<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Prescription</title>
  </head>
  <body>
    <h2>Prescription</h2>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="Prescription">
      <br> Patient Name: <input type="text" name="PatientName" id="PatientNameid">
       &nbsp;&nbsp;  &nbsp;&nbsp;  Date:  <SELECT id="day" name="day" >
          <OPTION Value="">D</OPTION>
          <OPTION id="d1" Value="1">1</OPTION>
          <OPTION id="d2" Value="2">2</OPTION>
          <OPTION id="d3" Value="3">3</OPTION>
          <OPTION id="d4" Value="4">4</OPTION>
          <OPTION id="d5" Value="5">5</OPTION>
          <OPTION id="d6" Value="6">6</OPTION>
          <OPTION id="d7" Value="7">7</OPTION>
          <OPTION id="d8" Value="8">8</OPTION>
          <OPTION id="d9" Value="9">9</OPTION>
          <OPTION id="d10" Value="10">10</OPTION>
          <OPTION id="d11" Value="11">11</OPTION>
          <OPTION id="d12" Value="12">12</OPTION>
          <OPTION id="d13" Value="13">13</OPTION>
          <OPTION id="d14" Value="14">14</OPTION>
          <OPTION id="d15" Value="15">15</OPTION>
          <OPTION id="d16" Value="16">16</OPTION>
          <OPTION id="d17" Value="17">17</OPTION>
          <OPTION id="d18" Value="18">18</OPTION>
          <OPTION id="d19" Value="19">19</OPTION>
          <OPTION id="d20" Value="20">20</OPTION>
          <OPTION id="d21" Value="21">21</OPTION>
          <OPTION id="d22" Value="22">22</OPTION>
          <OPTION id="d23" Value="23">23</OPTION>
          <OPTION id="d24" Value="24">24</OPTION>
          <OPTION id="d25" Value="25">25</OPTION>
          <OPTION id="d26" Value="26">26</OPTION>
          <OPTION id="d27" Value="27">27</OPTION>
          <OPTION id="d28" Value="28">28</OPTION>
          <OPTION id="d29" Value="29">29</OPTION>
      <OPTION id="d30" Value="30">30</OPTION>
          <OPTION id="d31" Value="31">31</OPTION>

   </SELECT>

          <SELECT id="month" name="month" >
          <OPTION Value="">M</OPTION>
          <OPTION id="m1" Value="1">1</OPTION>
          <OPTION id="m2" Value="2">2</OPTION>
          <OPTION id="m3" Value="3">3</OPTION>
          <OPTION id="m4" Value="4">4</OPTION>
          <OPTION id="m5" Value="5">5</OPTION>
          <OPTION id="m6" Value="6">6</OPTION>
          <OPTION id="m7" Value="7">7</OPTION>
          <OPTION id="m8" Value="8">8</OPTION>
          <OPTION id="m9" Value="9">9</OPTION>
          <OPTION id="m10" Value="10">10</OPTION>
          <OPTION id="m11" Value="11">11</OPTION>
          <OPTION id="m12" Value="12">12</OPTION>
       </SELECT>
          <SELECT id="year" name="year" >
          <OPTION Value="">Y</OPTION>
          <OPTION id="y17" Value="2017">2017</OPTION>
          <OPTION id="y18" Value="2018">2018</OPTION>
          <OPTION id="y19" Value="2019">2019</OPTION>
          <OPTION id="y20" Value="2020">2020</OPTION>
          <OPTION id="y21" Value="2021">2021</OPTION>
      <OPTION id="y22" Value="2022">2022</OPTION>
      <OPTION id="y23" Value="2023">2023</OPTION>
          </SELECT>  <br>
      <br> PhysicianName: <input type="text" name="PhysicianName" id="PhysicianNameid">
      &nbsp;&nbsp;  &nbsp;&nbsp; The organization affiliated with it: <input type="text" name="TOAWI" id="TOAWIid">  <br>
      <br> <textarea name="OperationDetails" rows="30" cols="100" form="Prescription"></textarea>  <br>
      <h3>Signature</h3>
      <br>
      <br> <input type="submit" name="submit" value="Print and save">
    </form>
    <button type="button" name="backbutn" id="backbutn">back</button>

  </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

}
 ?>

<script type="text/javascript">
  document.getElementById('backbutn').onclick=goback;
  function goback() {
    window.location.href = '';
  }
</script>
