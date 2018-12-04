<html>

<head>
    <title>JB Express Home</title>
    <link rel="icon" type="image/png" href="Images/12540@2x.png">
</head>
<link rel="stylesheet" href="MyStyle.css">

<body>
    <?php
      $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password);

            $db_name="jbexpress"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

 session_start();
       $myusername1= $_SESSION['Email'] ;
       $id=$_SESSION['Id'];
                    
    //echo "this is the emial used to sign ".$id; 
    
    if(!empty($_POST)){
       //$id= rand(1, 99999);
      
    $sql="INSERT INTO `dropofdetail`(`dropofdetailID`, `dropofdetailStreetNumber`, `dropofdetailStreetName`, `dropofdetailSuburb`, `dropofdetailProvince`, `dropOfName`, `dropOfSurname`, `dropOfNumber`,`dropOffEmail`) VALUES ( 
    '{$_SESSION['Id']}',
    '{$conn->real_escape_string($_POST['rsnu'])}',
    '{$conn->real_escape_string($_POST['rsna'])}',
    '{$conn->real_escape_string($_POST['rs'])}',
    '{$conn->real_escape_string($_POST['rp'])}', 
    '{$conn->real_escape_string($_POST['rName'])}', 
    '{$conn->real_escape_string($_POST['rSurname'])}',
    '{$conn->real_escape_string($_POST['rNumber'])}',
    '{$conn->real_escape_string($_POST['rEmail'])}'
    )";
        
        $insert=$conn->query($sql);
        
        if($insert){
           /* $message = "Done";
            echo "<script type='text/javascript'>alert('$message');</script>";
                 */
  header('Location: Payment.php'); 
           
        }else{
        
            /*$message = "Oops, something went wrong, try again please.";
            echo "<script type='text/javascript'>alert('$message');</script>";*/
            die("error: {$conn->errno}:{$conn->error}");
          //  echo"nope".mysqli_error();
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
            <a href="logout.php"><button onclick="mytest()">Home</button></a>
            <a href=memberProfile.php target="_self"><button  >My Profile</button></a>
            <a href=NewBooking.php> <button style=" background-color: #152b37; color: white;" class=activeBut  >New Booking</button></a>
            <a href=MyBookings.php> <button  >My Bookings</button></a>
            <a href="ContactUsMemeber.php"> <button >Contact Us</button></a>
            <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
        </div>


        <div class="tab2">
            <button>Item Detail</button>
            <button>Collection Detail</button>
            <button style=" background-color:#737373; color: white;" class=activeBut>Delivery Detail</button>
            <button>Payment Detail</button>
            <button>Order Summery</button>
               <button>Order Conformation</button>
        </div>


        <div class=m>
            <div class="myPadding">
                <center>
                    <h2 class=title><b>DELIVERY INFORMATION</b></h2>
                </center>
                <fieldset>
                    <legend align=left><b>Enter the detail of where the item for courier must be delivered</b></legend>
                    <form method="post" action="">
                        <p>Please complete all of the fields for your order to be sucesfully completed</p>
                       
                        <label>Name of recipient<sup>*</sup></label>
                        <input type="text" id="rName" name="rName" placeholder="Name of recipient">
                        
                        <label>Last name of recipient<sup>*</sup></label>
                        <input type="text" id="rSurname" name="rSurname" placeholder="Last name of recipient">
                        
                        <label>Contact number of recipient<sup>*</sup></label>
                        <input type="text" id="rNumber" name="rNumber" placeholder="Contact number of recipient">
                        
                         <label>E-mail address of recipient<sup>*</sup></label>
                        <input type="text" id="rEmail" name="rEmail" placeholder="E-mail address of recipient">
                        
                        <label>Street name of recipient<sup>*</sup></label>
                        <input type="text" id="rsna" name="rsna" placeholder="Street name of recipient">                       
                                               
                        <label>Street number of recipient<sup>*</sup></label>
                        <input type="text" id="rsnu" name="rsnu" placeholder="Street number of recipient">
                        
                        <label>Suburb of recipient<sup>*</sup></label>
                        <input type="text" id="rs" name="rs" placeholder="Subhurb of recipient">
                        
                        <label>Province of recipient<sup>*</sup></label>
                        <input type="text" id="rp" name="rp" placeholder="Province of recipient">
                        
                        <div class="row">
                           
                            <div class="column2">

                                <center><input type="reset" value="Reset"></center>
                            </div>
                            <div class="column2">
                                <center>
                                    <a href=DropOffDetail.php><input type="submit" value="Next" onclick="return validateName() "></a>
                                </center>

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
            function validateName() {
                var name = document.getElementById('rName');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the name of the recipient");
                    return false;
                } else {
                    //alert("name is saved");
                    return validateSurname();
                }
            }

            function validateSurname() {
                var name = document.getElementById('rSurname');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the surname of the recipient");
                    return false;
                } else {
                    //alert("name is saved");
                    return validateNumber();
                }
            }

            function validateNumber() {
                var name = document.getElementById('rNumber');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the number of the recipient");
                    return false;
                } else {
                    //alert("name is saved");
                    return vsna();
                }
            }

            function vsna() {
                var name = document.getElementById('rsna');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the street name of the recipient");
                    return false;
                } else {
                    //alert("name is saved");
                    return vsnu();
                }
            }

            function vsnu() {
                var name = document.getElementById('rsnu');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the street number of the recipient");
                    return false;
                } else {
                    //alert("name is saved");
                    return vbs();
                }
            }

            function vbs() {
                var name = document.getElementById('rs');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the suburb of the recipient");
                    return false;
                } else {
                    //alert("name is saved");
                    return vbp();
                }
            }

            function vbp() {
                var name = document.getElementById('rp');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the province of the recipient");
                    return false;
                }else{
                    
                    return validateEmail();
                }
            }
               function validateEmail() {
            var email = document.getElementById('rEmail').value;
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                alert("You have entered a non-valid e-mail address for recipient");
                return false;
            } else {
                // alert("Email is saved")
               return validateNum();
            }
        }
             function mytest() {
            window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
        }

        </script>
</body>

</html>
