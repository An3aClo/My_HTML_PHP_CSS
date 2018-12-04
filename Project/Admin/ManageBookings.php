<html>


<head>

    <title>JB Express Home</title>

    <link rel="icon" type="image/png" href="Images/12540@2x.png">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<link rel="stylesheet" href=MyStyle.css>

<body>


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
       
        <a href=ViewMessages.php><button >Messages</button></a>
        <a href=ViewClients.php> <button >Clients</button></a>
        <a href=viewBookings.php><button  >View Bookings</button></a>
         <a href=ManageBookings.php> <button style=" background-color: #152b37; color: white;" class=activeBut >Manage Bookings</button></a>
        <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
    </div>
    
    <div class="tab2">
      <a href=ManageBookings.php><button style=" background-color:#737373; color: white;" class=activeBut>Accept order</button></a>  
        <a href=ConfirmPayment.php><button >Confirm Payment</button></a>
        <a href="DeclineOrder.php"><button>Decline order</button></a>
        <a href="ConfirmDelivery.php"> <button>Confirm delivery</button></a>
        <a href="AddPrice.php"><button >Add price</button></a>
        
    </div>
    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>CLIENT CANCELED BOOKINGS</b></h2>
            </center>
  <?php
  include("config.php");
   session_start();
 
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $num = mysqli_real_escape_string($connection,$_POST['on']);            
      $sql="UPDATE `payment` SET `Process`='Accepted' WHERE `paymentId`='$num'";
      $result = mysqli_query($connection,$sql);
       if($result){
            $message = "Done";
            echo "<script type='text/javascript'>alert('$message');</script>";}
        else {
             $message = "Oops! Something went worng";
            echo "<script type='text/javascript'>alert('$message');</script>";
            
        }
  }
            
       
      
   //   header('Location: OrderDetail.php'); 
   
?>
            <fieldset>
                <legend align=center>Enter the order number you want to accept</legend>

                    <form class="form-signin" method="POST">
                       
                        <p>Order number<sup>*</sup></p>
                        <input type="text" id="on" name="on">
                        
                        <div class="row">
                            <div class="column2">
                                <center><a href=ManageBookings.php><input type=button value="Back"></a></center>
                            </div>
                            <div class="column2">
                                <center> <input type="submit" value="Accept Order" id=view name=view>
                                </center>
                            </div></div>
                        
                </form></fieldset>
                      
                </div>
            


        </div>

   
    <script>
        function mytest() {
            window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
        }

    </script>


</body>

</html>
