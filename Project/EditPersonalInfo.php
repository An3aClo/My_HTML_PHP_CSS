<html>


<head>

    <title>JB Express Home</title>
    <link rel="icon" type="image/png" href="Images/12540@2x.png">
</head>

<link rel="stylesheet" href="MyStyle.css">

<body>
    <?php    

    if(!empty($_POST)){
       
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password);

        $db_name="jbexpress"; 
        $my_db_select = mysqli_select_db($conn, $db_name);

        session_start();
        $myusername= $_SESSION['Email'] ;  
    
        echo $myusername;
            
       $sql="UPDATE `client` SET 
               `clientName`='{$conn->real_escape_string($_POST['registerfname'])}',
        `clientSurname`='{$conn->real_escape_string($_POST['registerlname'])}',
        `clientContactNumber`='{$conn->real_escape_string($_POST['registerNumber'])}'
            WHERE `clientEmail`= '$myusername'";
            
        $insert=$conn->query($sql);       
       
        
        if($insert){
             $message = "Changes saved.";
echo "<script type='text/javascript'>alert('$message');</script>";
           header('Location: memberProfile.php'); 
           
        }else{
        die("error: {$conn->errno}:{$conn->error}");
            header('AlreadyRegistered.php');
             $message = "Oops detail can't be saved.";
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
        <a href=memberProfile.php target="_self"><button id="memenerProfile" style=" background-color: #152b37; color: white;" onclick="myActiveBut()">My Profile</button></a>
        <a href=NewBooking.php> <button>New Booking</button></a>
        <a href=MyBookings.php> <button>My Bookings</button></a>
        <a href=ContactUsMemeber.php> <button>Contact Us</button></a>
        <a href=logout.php> <button id=logout onclick="mytest()">Log Out</button></a>

    </div>
    <div class=m>
        <div class="myPadding">


            <center>
                <h2 class=title><b>EDIT PERSONAL INFORMATION</b></h2>
            </center>
            <fieldset>
                <legend align=center>Set your personal information right, right now !</legend>
                <form method="post" action="">

                    <label for="fname">First Name<sup>*</sup></label>
                    <input type="text" id="registerfname" name="registerfname" placeholder="First name">

                    <label for="lname">Last Name<sup>*</sup></label>
                    <input type="text" id="registerlname" name="registerlname" placeholder="Last name">


                    <label>Contact Number<sup>*</sup></label>
                    <input type="text" id="registerNumber" name="registerNumber" placeholder="Contact number">

                    <div class="row">
                        <div class="column">
                            <center><a href=memberProfile.php><input type="button" value="Back"></a></center>
                        </div>
                        <div class="column">
                            <center>
                                <input type="submit" value="Save" onclick="return validateName1()">
                            </center>
                        </div>
                        <div class="column">
                            <center><input type="reset" value="Reset"></center>
                        </div>

                    </div>
                </form>

            </fieldset>


        </div>
    </div>

    <table border="0" width=100% height=15% cellspacing=0 padding=50px class=myColor>
        <tr>
            <td class=myFooter>
                <center>
                    <p>© Copyright 2017 All Rights Reserved | JB Express</p>

                </center>

            </td>
        </tr>
    </table>

    <script>
        function validateName1() {
            var name = document.getElementById('registerfname');
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
            var surname = document.getElementById('registerlname');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (surname.value.length == 0) {
                alert("Enter your last name");
                return false;
            } else {
                //return alert("surname is saved");
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
            }
        }

    </script>
</body>

</html>
