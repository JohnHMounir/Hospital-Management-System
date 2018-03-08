<?php include_once("AddressClass.php");
?>

  <html>

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

      <div>

        <form action = 'AfterAddUser.php' method = 'post'>

          <p> First Name : <input type = "text" name = 'firstname' required></p>

          <p> Middle Name : <input type = "text" name = 'middlename' required></p>

          <p> Last Name : <input type = "text" name = 'lastname' required></p>

          <p> Address :

            <select name = 'address'>
              <?php
                $AdressObject = new address();
                $Names = $AdressObject->getAllRoots();
                $size = count($Names);

                for ($x=0;$x<$size;$x++){
                  echo '<option value = '.$Names[$x].'>'.$Names[$x].'</option>';
                }


              ?>


            </select>

          </p>

          <p> Gender :

            <input type = 'radio' name = 'gender' value = 'male'>Male

            <input type = 'radio' name = 'gender' value = 'female'>Female

          </p>

          <p> Social Secuirity Number <input type = 'number' name = 'ssn' required></p>

          <p> Date Of Birith : <input type = 'date' name = 'dob' required></p>

          <button type = "submit" id="addbtn"> Add </button>

        </form>

      </div>

    </body>

  </html>
