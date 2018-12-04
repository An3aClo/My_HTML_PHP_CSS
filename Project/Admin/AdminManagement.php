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
        $conn = new mysqli($servername, $username, $password);
        $db_name="jbexpress"; 
        $my_db_select = mysqli_select_db($conn, $db_name);
    
    $sql="INSERT INTO `administration`(`adminID`, `adminName`, `adminPassword`, `adminSurname`, `adminStartDate`, `adminContactNumber`, `adminPosition`, `adminEmail`) VALUES ('{$conn->real_escape_string($_POST['adminIDNum'])}','{$conn->real_escape_string($_POST['registerfname'])}','{$conn->real_escape_string($_POST['registerPassword'])}',
            '{$conn->real_escape_string($_POST['registerlname'])}',
            '{$conn->real_escape_string($_POST['date'])}',
            '{$conn->real_escape_string($_POST['registerNumber'])}',
            '{$conn->real_escape_string($_POST['position'])}',
            '{$conn->real_escape_string($_POST['registerEmail'])}'";
            
        $insert=$conn->query($sql);
        
        if($insert){
                $message = "You are now registered. Please login to gain access.";
echo "<script type='text/javascript'>alert('$message');</script>";
          // header('Location: Login.php'); 
           
        }else{
        die("error: {$conn->errno}:{$conn->error}");
           /* header('AlreadyRegistered.php');*/
            /* $message = "You are already registered. Please login to access account.";
echo "<script type='text/javascript'>alert('$message');</script>";*/
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
                                <p><b>ADMIN</b></p>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>

        <div class="tab">
            <a href=AdminHome.php><button  >Home</button></a>
            <a href=AdminManagement.php> <button style=" background-color: #152b37; color: white;" class=activeBut >Admin Management</button></a>
            <a href=ViewMessages.php><button >Messages</button></a>
            <a href=ViewClients.php> <button >Clients</button></a>
            <a href=viewBookings.php><button>View Bookings</button></a>
            <a href=ManageBookings.php> <button >Manage Bookings</button></a>
            <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
        </div>

        <div class=m>
            <div class="myPadding">
                <center>
                    <h2 class=title><b>REGISTER ADMIN</b></h2>
                </center>

                <fieldset>
                    <legend align=center>Make your life easy with online booking for our on point courier services !</legend>
                    <form method="post" action="">

                        <label for="fname">Admin ID number<sup>*</sup></label>
                        <input type="text" id="adminIDNum" name="adminIDNum">

                        <label for="fname">First Name<sup>*</sup></label>
                        <input type="text" id="registerfname" name="registerfname">


                        <label for="lname">Last Name<sup>*</sup></label>
                        <input type="text" id="registerlname" name="registerlname">

                        <label>Email Address<sup>*</sup></label>
                        <input type="text" id="registerEmail" name="registerEmail">

                        <label>Phone Number<sup>*</sup></label>
                        <input type="text" id="registerNumber" name="registerNumber">

                        <label>Start date (YYYY-MM-DD)<sup>*</sup></label>
                        <input type="text" id="date" name="date">

                        <label>Position<sup>*</sup></label>
                        <input type="text" id="position" name="position">

                        <label>Password<sup>*</sup></label>
                        <input type="password" id="registerPassword" name="registerPassword">


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
        </div>

        <script>
            function validateName() {
                var name = document.getElementById('registerfname');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter your name");
                    return false;
                } else {
                    // alert("name is saved");
                    return validateSurname();
                }
            }

            function validateSurname() {
                var surname = document.getElementById('registerlname');
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
                var email = document.getElementById('registerEmail').value;
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
                var tel = document.getElementById('registerNumber');

                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
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
                } else {
                    return validateID();
                }
            }

            function validateID() {
                var pass = document.getElementById('adminIDNum');
                if (pass.value.length == 0) {
                    alert("Enter admin ID number");
                    return false;
                } else {
                    return validateDate();
                }
            }

            function validateDate() {
                var pass = document.getElementById('date');
                if (pass.value.length == 0) {
                    alert("Enter satrt date");
                    return false;
                } else {
                    return validatePosition();
                }
            }

            function validatePosition() {
                var pass = document.getElementById('position');
                if (pass.value.length == 0) {
                    alert("Enter position");
                    return false;
                }
            }

        </script>
</body>

</html>
