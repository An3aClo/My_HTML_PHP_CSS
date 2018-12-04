<?php

    if(!empty($_POST)){
        $servername = "localhost";
        $username = "root";
        $password = "";

// Create connection
        $conn = new mysqli($servername, $username, $password);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else{
        echo "Connected successfully";}

            $db_name="jbexpress"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

// checking that database was selected
            if ($db_name){
           echo "Database has been selected"."<br>";    
				
			}else{
                echo"database not selected";
            }
    
 
    
      $sql="INSERT INTO `tabel`(`name`, `number`) VALUES ('{$conn->real_escape_string($_POST['name'])}','{$conn->real_escape_string($_POST['num'])}')";
        
        mysqli_close($conn);
    }
    
?>


























<html>

<head>

    <title>JB Express Home</title>
    <link rel="icon" type="image/png" href="Images/12540@2x.png">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<link rel="stylesheet" href=MyStyle.css>

<body>
    <?php

  // if(!empty($_POST)){
        $servername = "localhost";
        $username = "root";
        $password = "";

// Create connection
        $conn = new mysqli($servername, $username, $password);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else{
        echo "Connected successfully";}

            $db_name="jbexpress"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

// checking that database was selected
            if ($db_name){
           echo "Database has been selected"."<br>";    
				
			}else{
                echo"database not selected";
            }  
  //  }
    
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

            <a href="HomePage.php" target="_self"><button  >Home</button></a>
            <a href="ContactUs.php"> <button style=" background-color: #152b37; color: white;" class=activeBut>Contact Us</button></a>
            <a href="Register.php"><button  >Register</button></a>
            <a href=Login.php> <button>Login</button></a>
        </div>


        <div class=m>
            <div class="myPadding">
                <center>
                    <h2 class=title><b>CONTACT US</b></h2>
                </center>


                <fieldset>
                    <legend align=center>For a customised quote, please contact our sales team now !</legend>
                    <form method="post" action="">
                        <p></p>
                        <label>First Name<sup>*</sup></label>
                        <input type="text" id="contactName" name="contactName">

                        <label for="lname">Last Name<sup>*</sup></label>
                        <input type="text" id="contactSurname" name="contactSurname">

                        <label for="fname">Email Address<sup>*</sup></label>
                        <input type="text" id="contactEmail" name="contactEmail">

                        <label for="fname">Phone Number<sup>*</sup></label>
                        <input type="text" id="contactNum" name="contactNum">

                        <label for="fname">Message<sup>*</sup></label>
                        <textarea id="contactMessage" name="contactMessage"></textarea>

                        <label for="fname">Capatcha<sup>*</sup></label>
                        <div class="g-recaptcha" data-sitekey="6LdVQm0UAAAAAHYKi2kD6WigkHLO3ox8ck5mH338"></div>


                        <div class="row">
                            <div class="column2">
                                <center>
                                    <input type="button" value="Send" onclick="validateName()"></center>
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
                        <center>© Copyright 2017 All Rights Reserved | JB Express</center>
                    </td>
                </tr>
            </table>
        </div>


        <script>
            function validateName() {
                var name = document.getElementById('contactName');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter your name");
                    return false;
                } else {
                    //alert("name is saved");
                    return validateSurname();
                }
            }

            function validateSurname() {
                var surname = document.getElementById('contactSurname');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (surname.value.length == 0) {
                    alert("Enter your surname");
                    return false;
                } else {
                    //   return alert("surname is saved");
                    return validateEmail();
                }
            }

            function validateEmail() {
                var email = document.getElementById('contactEmail').value;
                var atpos = email.indexOf("@");
                var dotpos = email.lastIndexOf(".");
                if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                    alert("You have entered a non-valid e-mail address");
                    return false;
                } else {
                    // alert("Email is saved")
                    return validateNum();
                }
            }

            function validateNum() {

                //  var phoneno = /^\d{10}$/;
                var tel = document.getElementById('contactNum');

                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (tel.value.length == 0) {
                    alert("Enter you phone number");
                    return false;
                } else {
                    //   alert("num");
                    return validateMessage();

                }
            }

            function validateMessage() {
                var surname = document.getElementById('contactMessage');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (surname.value.length == 0) {
                    alert("Enter your message");
                    return false;
                } else {
                    return alert("message send");
                    //  return validateEmail();
                }
            }

        </script>


</body>

</html>