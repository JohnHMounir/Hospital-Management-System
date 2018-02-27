<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Department Scedule</title>
  </head>
  <body>
    <h2>Department Scedule</h2>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="DepartmentScedule">
      Physician: <br>  <SELECT id="physician" name="physician" >
              <OPTION Value="">physician</OPTION>
        </select>
        <br>
        <br>
      Date: <div id="calendar">
      <input type="date" name="mydate" value="0" />
      </div>
      <br>
      <br>
      Starting time:  <SELECT id="from" name="from" >
          <OPTION Value="">S</OPTION>
          <OPTION id="f1" Value="8AM">8AM</OPTION>
          <OPTION id="f2" Value="2PM">2PM</OPTION>
          <OPTION id="f3" Value="8PM">8PM</OPTION>
        </select>
      <br>
      <br>
      Ending time: <SELECT id="to" name="to" >
          <OPTION Value="">E</OPTION>
          <OPTION id="t1" Value="8AM">8AM</OPTION>
          <OPTION id="t2" Value="2PM">2PM</OPTION>
          <OPTION id="t3" Value="8PM">8PM</OPTION>
        </select>
        <br>
        <br>
        Room: <SELECT id="room" name="room" >
            <OPTION Value="">room</OPTION>
          </select>
          <br>
          <br>
      <br> <input type="submit" name="submit" value="add">
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

  $(":date").dateinput( {

	// closing is not possible
	onHide: function()  {
		return false;
	}

}).data("dateinput").setValue(0).show();

</script>
