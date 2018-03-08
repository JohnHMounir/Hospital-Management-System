
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
					require_once("UserClass.php");
					$object = new user();
					$result = $object->FindUser($_SESSION['User_ID']);
					$row = mysqli_fetch_array($result);

					 ?>

				    <p>First Name : <?php echo $row['FirstName'];?> </p>

				    <p>Middle Name : <?php echo $row['MiddleName'];?></p>

				    <p>Last Name : <?php echo $row['LastName'];?></p>

				    <p>Gender : <?php echo $row['Gender'];?></p>

				    <p>Social Number : <?php echo $row['SocialSecuirityNumber'];?></p>

				    <p>Date Of Birith : <?php echo $row['DateOfBirith'];?> </p>


				</div>

				<div class="history">

				    <button id="appbtn" onclick="viewApp()"> Appointments </button>

				    <button id="repbtn" onclick="viewLab()"> Lab Reports </button>

					<button id"raybtn" onclick="viewRay()"> X-Rays Reports </button>

				</div>

				<div class="view">

					<div id ="app">

				    	<div class="card">

						  <h1>Departemnt</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

						<div class="card">

						  <h1>Departemnt</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

				    	<div class="card">

						  <h1>Departemnt</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

					</div>

					<div id ="lab">

				    	<div class="card">

						  <h1>Lab</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

						<div class="card">

						  <h1>Lab</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

				    	<div class="card">

						  <h1>Lab</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

					</div>

					<div id ="ray">

				    	<div class="card">

						  <h1>XRay</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

						<div class="card">

						  <h1>XRay</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

				    	<div class="card">

						  <h1>XRay</h1>

						  <p class="title">Doctor Name</p>

						  <p>Date</p>

						  <p><a>More Info</a></p>

						</div>

					</div>

				</div>

			</div>

			<script>

				function viewApp()

				{

					document.getElementById('app').style.display='block';

					document.getElementById('ray').style.display='none';

					document.getElementById('lab').style.display='none';

				}

				function viewLab()

				{

					document.getElementById('app').style.display='none';

					document.getElementById('ray').style.display='none';

					document.getElementById('lab').style.display='block';

				}

				function viewRay()

				{

					document.getElementById('app').style.display='none';

					document.getElementById('ray').style.display='block';

					document.getElementById('lab').style.display='none';

				}

			</script>

		</body>

	</html>
