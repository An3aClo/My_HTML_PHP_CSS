<html>

<head>
    <title>JB Express Home</title>
    <link rel="icon" type="image/png" href="Images/12540@2x.png">
</head>
<link rel="stylesheet" href="MyStyle.css">

<body>


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
        <a href=memberProfile.php target="_self"><button>My Profile</button></a>
        <a href=NewBooking.php> <button style=" background-color: #152b37; color: white;" class=activeBut>New Booking</button></a>
        <a href=MyBookings.php> <button>My Bookings</button></a>
        <a href=ContactUsMemeber.php> <button>Contact Us</button></a>
        <a href=logout.php> <button id=logout onclick="mytest()">Log Out</button></a>
    </div>

    <div class="tab2">
        <button>Item Detail</button>
        <button>Collection Detail</button>
        <button>Delivery Detail</button>
        <button>Payment Detail</button>
        <button>Order Summery</button>
        <button style=" background-color:#737373; color: white;" class=activeBut>Order Conformation</button>
    </div>
    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>ORDER CONFORMATION</b></h2>
            </center>
            <fieldset>
                <legend><b>Please confirm your order</b></legend>

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
       
$selected_val = $_POST['radio'];  
        
//echo "You have selected :" .$selected_val; 
        
            
$sql="UPDATE `payment` SET `state`='$selected_val',`userCancelationReason`='{$conn->real_escape_string($_POST['note'])}' WHERE `paymentId`='{$_SESSION['Id']}'";
          $insert=$conn->query($sql);
  
     if($insert){
            
                 
  header('Location: MyBookings.php'); 
           
        }else{
        echo "nope";
        }
        
        mysqli_close($conn);
    }
    
?>
                <form method="post" action="">
                    <p>Banking details can be found on the invoiced mailed to:
                        <?php echo $myusername1?>. Please note that the order can be cancled after invoice is received.</p>
                    <label><b>Order confirmation<sup>*</sup></b></label>

                    <div style="padding-left: 15px; padding-top: 15px;">

                        <label class="container" style=" font-family:inherit;font-size: 16;">Yes, I do confirm my order.
                            <input type="radio" checked="checked" name="radio" id=radio1 value="Confirmed">

                            <span class="checkmark"></span>
                        </label>

                        <label class="container" style=" font-family:inherit;font-size: 16;">No, I do not confirm my order. I wish to cancle my order.
                            <input type="radio" name="radio" id=radio2 value="Cancled by user">
                            <span class="checkmark"></span>
                        </label>

                    </div>
                    <br>
                    <label>Reason for cancelation</label>
                    <textarea class=textArea2 name=note id=note placeholder="If you wish to cancle the order, please help us understabd why."></textarea>

                    <div class="row">

                        <div class="column2">

                            <center><input type="reset" value="Reset"></center>
                        </div>
                        <div class="column2">
                            <center>
                                <input type="submit" value="Done">
                            </center>
                        </div>
                    </div>
                </form>
            </fieldset>
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
    </div>
    <script>
        function mytest() {
            window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
        }

    </script>

</body>

</html>
