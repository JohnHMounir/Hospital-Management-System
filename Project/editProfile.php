<!DOCTYPE html>

	<html>

		<head>

			<meta name="viewport" content="width=device-width, initial-scale=1">

      		<link rel="stylesheet" type="text/css" href="Style.css">

		</head>

		<body>

			<div class="header">

        		<a href="WelcomePage.html" class="logo"> <img src="logo.jpg" width="30px" height="30px"> </a>

      			<div class="header-right">

      				<div class="dropdown">

					    <button class="dropbtn"> Hello User!

					      <i class="fa fa-caret-down"></i>

					    </button>

					    <div class="dropdown-content">

					      <a href="editProfile.html">Edit Profile</a>

					      <a href="WelcomePage.html">Delete Account</a>

					      <a href="WelcomePage.html">Sign Out</a>

					    </div>

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


		    <div class="profile">

				<div class="info">
					<?php
					session_start();
					$ID = $_POST['ID'];
					require_once("UserClass.php");

					$object = new user();
					$result = $object->FindUser($ID);
					$row = mysqli_fetch_array($result);
					$_SESSION ['Object'] = $row;
					 ?>
					 <form action = 'AfterEdit.php' method = 'post'>
				    <p>First Name </p>

				    <input type="text" name="fname" value=<?php echo $row['FirstName'];?>>

				    <p>Middle Name </p>

				    <input type="text" name="mname" value=<?php echo $row['MiddleName'];?>>

				    <p>Last Name</p>

				    <input type="text" name="lname" value=<?php echo $row['LastName'];?>>

				    <p>Social Number</p>

				    <input type="text" name="ssn" value=<?php echo $row['SocialSecuirityNumber'];?>>

				</div>

				<input class="savepro" type="submit" name="Save">
			</form>

			</div>

			<script>

				// Globally head date object for the month shown

				var date = new Date();

				date.setDate(1);

				date.setMonth(0);

				window.onload = function()

				{

				    // Add the current month on load

				    createMonth();

				};

				document.onkeydown = function(evt)

				{

				    evt = evt || window.event;

				    switch (evt.keyCode)

				    {

				        case 37:

				            previousMonth();

				            break;

				        case 39:

				            nextMonth();

				            break;

				    }

				};

				// Converts day ids to the relevant string

				function dayOfWeekAsString(dayIndex)

				{

				    return ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"][dayIndex];
				}

				// Converts month ids to the relevant string

				function monthsAsString(monthIndex)

				{

				    return ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][monthIndex];

				}

				// Creates a day element

				function createCalendarDay(num, day, mon, year)

				{

				    var currentCalendar = document.getElementById("calendar");

				    var newDay = document.createElement("div");

				    var date = document.createElement("p");

				    var dayElement = document.createElement("p");

				    date.innerHTML = num;

				    dayElement.innerHTML = day;

				    newDay.className = "calendar-day ";

				    // Set ID of element as date formatted "8-January" etc

				    newDay.id = num + "-" + mon + "-" +year;

				    newDay.appendChild(date);

				    newDay.appendChild(dayElement);

				    currentCalendar.appendChild(newDay);

				}

				// Clears all days from the calendar

				function clearCalendar()

				{

				    var currentCalendar = document.getElementById("calendar");

				    currentCalendar.innerHTML = "";

				}

				// Clears the calendar and shows the next month

				function nextMonth()

				{

				    clearCalendar();

				    date.setMonth(date.getMonth() + 1);

				    createMonth(date.getMonth());

				}

				// Clears the calendar and shows the previous month

				function previousMonth()

				{

				    clearCalendar();

				    date.setMonth(date.getMonth() - 1);

				    var val = date.getMonth();

				    createMonth(date.getMonth());

				}

				// Creates and populates all of the days to make up the month

				function createMonth()

				{

				    var currentCalendar = document.getElementById("calendar");

				    var dateObject = new Date();

				    dateObject.setDate(date.getDate());

				    dateObject.setMonth(date.getMonth());

				    dateObject.setYear(date.getFullYear());

				    createCalendarDay(dateObject.getDate(), dayOfWeekAsString(dateObject.getDay()), monthsAsString(dateObject.getMonth()), dateObject.getFullYear());

				    dateObject.setDate(dateObject.getDate() + 1);

				    while (dateObject.getDate() != 1)

				    {

				        createCalendarDay(dateObject.getDate(), dayOfWeekAsString(dateObject.getDay()), monthsAsString(dateObject.getMonth()), dateObject.getFullYear());

				        dateObject.setDate(dateObject.getDate() + 1);

				    }

				    // Set the text to the correct month

				    var currentMonthText = document.getElementById("current-month");

				    currentMonthText.innerHTML = monthsAsString(date.getMonth()) + " " + date.getFullYear();

				    getCurrentDay();

				}


				function getCurrentDay()

				{

				    // Create a new date that will set as default time

				    var todaysDate = new Date();

				    var today = todaysDate.getDate();

				    var currentMonth = todaysDate.getMonth();

				    var currentYear = todaysDate.getFullYear();

				    var thisMonth = monthsAsString(currentMonth);

				    // Find element with the ID for today

				    currentDay = document.getElementById(today + "-" + thisMonth + "-" + currentYear);

				    currentDay.className = "calendar-day today";

				}

			</script>

		</body>

	</html>
