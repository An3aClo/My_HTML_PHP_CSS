<html>

<head>

    <title>JB Express Home</title>
    <link rel="icon" type="image/png" href="Images/12540@2x.png">

    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<link rel="stylesheet" href=MyStyle.css>

<body>
    <?php

    if(!empty($_POST)){
        $servername = "localhost";
        $username = "root";
        $password = "";

// Create connection
        $conn = new mysqli($servername, $username, $password);

// Check connection
      /*  if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else{
        echo "Connected successfully";}*/

            $db_name="jbexpress"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

// checking that database was selected
          /*  if ($db_name){
           echo "Database has been selected"."<br>";    
				
			}else{
                echo"database not selected";
            }*/
    
    $sql="INSERT INTO `client`(`clientEmail`, `clientName`, `clientSurname`, `clientContactNumber`, `clientPassword`) VALUES ('{$conn->real_escape_string($_POST['registerEmail'])}', '{$conn->real_escape_string($_POST['registerfname'])}','{$conn->real_escape_string($_POST['registerlname'])}','{$conn->real_escape_string($_POST['registerNumber'])}',  '{$conn->real_escape_string($_POST['registerPassword'])}')";
        
        $insert=$conn->query($sql);
        
        if($insert){
                $message = "You are now registered. please login to access account.";
echo "<script type='text/javascript'>alert('$message');</script>";
          // header('Location: Login.php'); 
           
        }else{
        /*die("error: {$conn->errno}:{$conn->error}");
            header('AlreadyRegistered.php');*/
             $message = "You are already registered. please login to access account.";
echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
        mysqli_close($conn);
    }
    
?>


    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:100px;margin-top:0px !important;">JB Express</h1>
            <center>
                <table class="myTable">
                    <tr>
                        <td>
                            <center><img src="Images/e.png" width=30 height=30></center>
                        </td>
                        <td>
                            <p><b>023 342 2755</b></p>
                        </td>
                        <td>
                            <center><img src="Images/b.png" width=27 height=27></center>
                        </td>
                        <td>
                            <p><b>info@jb-express.co.za</b></p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="tab">
        <a href="HomePage.php" target="_self"><button>Home</button></a>
        <a href="ContactUs.php"> <button>Contact Us</button></a>
        <a href=UserAssistance.html > <button>User Assistance</button></a>
        <a href="Register.php"><button style=" background-color: #152b37; color: white;" class=activeBut>Register</button></a>
         
        
        <a href=Login.php> <button>Login</button></a>
    </div>

    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>REGISTER</b></h2>
            </center>

            <fieldset>
                <legend align=center>Make your life easy with online booking for our on point courier services !</legend>
                <form method="post" action="">

                    <label for="fname">First Name<sup>*</sup></label>
                    <input type="text" id="registerfname" name="registerfname" placeholder="First name">


                    <label for="lname">Last Name<sup>*</sup></label>
                    <input type="text" id="registerlname" name="registerlname" placeholder="Last name">

                    <label>Email Address<sup>*</sup></label>
                    <input type="text" id="registerEmail" name="registerEmail" placeholder="E-mail address">

                    <label>Contact Number<sup>*</sup></label>
                    <input type="text" id="registerNumber" name="registerNumber" placeholder="Contact number">

                    <label>Password<sup>*</sup></label>
                    <input type="password" id="registerPassword" name="registerPassword" placeholder="Password">


                    <label>Capatcha<sup>*</sup></label>
                    <div style="padding-top: 10px;     padding-bottom: 10px;">
                        <div class="g-recaptcha" data-sitekey="6LdVQm0UAAAAAHYKi2kD6WigkHLO3ox8ck5mH338"></div>

                    </div>

                    <div class="row">
                        <div class="column2">
                            <center>
                                <input type="submit" value="Register" id=submit onclick="return validateName()">
                            </center>
                        </div>
                        <div class="row">
                            <div class="column3">
                                <center><input type="reset" value="Reset"></center>
                            </div>
                        </div>
                    </div>


                </form>

            </fieldset>


        </div>
        <table border="0" width=100% height=15% cellspacing=0 padding=50px class=myColor>
            <tr>
                <td class=myFooter>
                    <center> &copy;Copyright 2017 All Rights Reserved | JB Express</center>
                </td>
            </tr>
        </table>

    </div>






    <script>
        function validateName() {
            var name = document.getElementById('registerfname');
            if (name.value.length == 0) {
                alert("Enter your name");
                return false;
            } else {
                return validateSurname();
            }
        }

        function validateSurname() {
            var surname = document.getElementById('registerlname');
            if (surname.value.length == 0) {
                alert("Enter your surname");
                return false;
            } else {
                return validateEmail();
            }
        }

        function validateEmail() {
            var email = document.getElementById('registerEmail').value;
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                alert("You have entered a non-valid e-mail address");
                return false;
            } else {
                return validateNum();
            }
        }

        function validateNum() {
            var tel = document.getElementById('registerNumber');
            if (tel.value.length == 0) {
                alert("Enter you phone number");
                return false;
            } else {
                //   alert("num");
                return validatePassword();
            }
        }

        function validatePassword() {
            var pass = document.getElementById('registerPassword');
            if (pass.value.length == 0) {
                alert("Enter a password");
                return false;
            }
        }

    </script>

</body>

</html>
