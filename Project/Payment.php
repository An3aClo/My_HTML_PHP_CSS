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
                    
   // echo "this is the emial used to sign ".$myusername1; 
    
    if(!empty($_POST)){
       
$selected_val = $_POST['radio'];  // Storing Selected Value In Variable
        
//echo "You have selected :" .$selected_val; 
        
       //$prize="Please check your your email inbox for invoice";
          
        $sql="INSERT INTO `payment`(`paymentId`, `paymentMethod`, `AditionalNotes`, `clientEmail`, `prize`,`state`) VALUES ('{$_SESSION['Id']}','$selected_val','{$conn->real_escape_string($_POST['note'])}','{$_SESSION['Email']}','Please check your your email inbox for invoice','Processing')";  
        $sql2="UPDATE `pickupdetail` SET `clientEmail`='$myusername1' WHERE`pickupdetailID`='{$_SESSION['Id']}'";       
        $sql4="UPDATE `dropofdetail` SET =`clientEmail`='$myusername1' WHERE `dropofdetailID`='{$_SESSION['Id']}'";
        
        $insert2=$conn->query($sql2);
       
     $insert4=$conn->query($sql4);
            
        $insert=$conn->query($sql);
        
        if($insert){
           
  header('Location: BookingConformation.php'); 
           
        }else{
        
            $message = "Oops, something went wrong, try again please.";
            echo "<script type='text/javascript'>alert('$message');</script>";
          //  die("error: {$conn->errno}:{$conn->error}");
           echo"nope".mysqli_error();
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
            <a href="memberProfile.php" target="_self"><button  >My Profile</button></a>
            <a href=NewBooking.php> <button style=" background-color: #152b37; color: white;" class=activeBut  >New Booking</button></a>
            <a href=MyBookings.php> <button  >My Bookings</button></a>
            <a href="ContactUsMemeber.php"> <button >Contact Us</button></a>
            <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
        </div>
        <div class="tab2">
            <button>Item Detail</button>
            <button>Collection Detail</button>
            <button>Delivery Detail</button>
            <button style=" background-color:#737373; color: white;" class=activeBut>Payment Detail</button>
            <button>Order Summery</button>
            <button>Order Conformation</button>
        </div>


        <div class=m>
            <div class="myPadding">
                <center>
                    <h2 class=title><b>PAYMENT DETAIL</b></h2>
                </center>
                <fieldset>
                    <legend align=left><b>Select payment option and add additional notes</b></legend>
                    <form method="post" action=""><br>
                        <label >Banking details can be found on the invoiced mailed to: <?php echo $myusername1?></label><br><br>
                        <label>Payment Option<sup>*</sup></label>

                        <div style="padding-left: 15px; padding-top: 15px;">

                            <label class="container" style=" font-family:inherit;font-size: 16;">Cash on collection
                                <input type="radio" checked="checked" name="radio" id = radio1 value="Cash on collection">
                               
                                <span class="checkmark"></span>
                            </label>

                            <label class="container" style=" font-family:inherit;font-size: 16;">EFT
                                  <input type="radio" name="radio" id=radio2 value="EFT">
                                  <span class="checkmark"></span>
                            </label>

                        </div>

                        <label>Addition Notes</label>
                        <textarea class=textArea2 name=note id=note placeholder="Type any additional notes here ..."></textarea>
                        <div class="row">
                          
                            <div class="column2">

                                <center><input type="reset" value="Reset"></center>
                            </div>
                            <div class="column2">
                                <center>
                                    <input type="submit" value="Next">
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
            function mytest() {
                window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
            }

        </script>


</body>

</html>
