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
                <table class="myTabel">

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
        <a href="logout.php"><button onclick="mytest()" >Home</button></a>
        <a href=memberProfile.php target="_self"><button id="memenerProfile"  >My Profile</button></a>
        <a href=NewBooking.php> <button >New Booking</button></a>
        <a href=MyBookings.php> <button style=" background-color: #152b37; color: white;" onclick="myActiveBut()"   >My Bookings</button></a>
        <a href=ContactUsMemeber.php> <button >Contact Us</button></a>
        <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>

    </div>
    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>VIEW ORDER DETAIL</b></h2>
            </center>
            <fieldset>
                <legend align=center>Enter the order number of the order you would like to view</legend>
                <?php
  include("config.php");
   session_start();
 
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $num = mysqli_real_escape_string($connection,$_POST['on']);            
      
        //echo $_SESSION['Number'];
      
        $sql="select * FROM itemdetail JOIN dropofdetail ON (itemdetail.itemdetailID = dropofdetail.dropofdetailID) JOIN payment ON (itemdetail.itemdetailID=payment.paymentId) JOIN pickupdetail ON (itemdetail.itemdetailID=pickupdetail.pickupdetailID) where itemdetailID ='$num'"; 
      
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          
      $count = mysqli_num_rows($result);
    
      if($count == 1) {            
            $_SESSION['Number'] = $num;
          header("location:OrderDetail.php");
      }else {
        echo "<p style='color:red'>Invalid order number</p>";
      }
   }
      
   //   header('Location: OrderDetail.php'); 
   
?>

                    <form class="form-signin" method="POST">
                        <label>Order number<sup>*</sup></label>
                        <input type="text" id="on" name="on">

                        <div class="row">
                            <div class="column2">
                                <center><a href=MyBookings.php><input type=button value="Back"></a></center>
                            </div>
                            <div class="column2">
                                <center> <input type="submit" value="View" id=view name=view>
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

        <script>
            function mytest() {
                window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
            }

            function validateNum() {
                var name = document.getElementById('on');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the order number");
                    return false;
                }
            }

        </script>
    </div>
</body>

</html>
