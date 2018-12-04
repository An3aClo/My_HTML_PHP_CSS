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
        <a href=viewBookings.php><button style=" background-color: #152b37; color: white;" class=activeBut >View Bookings</button></a>
        <a href=ManageBookings.php> <button >Manage Bookings</button></a>
        <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
    </div>
    
    <div class="tab2">
      <a href="viewBookings.php"><button  >Client confirmed</button></a>  
        <a href=CCanceledBookigs.php><button >Client canceled</button></a>
        <a href="AdminDeclienedBookings.php"><button>Admin declined</button></a>
        <a href=PayedBookings.php ><button>Payed</button></a>
        <a href=CompletedBookings.php><button>Completed</button></a>
        <a href="DetailBookingView.php"><button style=" background-color:#737373; color: white;" class=activeBut>Booking detail</button></a> 
        
    </div>
  
    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>BOOKING DETAIL</b></h2>
            </center>

            <fieldset>
                <legend align=center>Enter the order number you want to view</legend>

                <div class="MyText">
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
          header("location:FullDetail.php");
      }else {
        echo "<p style='color:red'>Invalid order number</p>";
      }
   }
      
   //   header('Location: OrderDetail.php'); 
   
?>
                    <form class="form-signin" method="POST">
                       <p>Order number<sup>*</sup></p>
                        <input type="text" id="on" name="on" placeholder="Order number">
                        
                        <div class="row">
                            <div class="column2">
                                <center><a href=viewBookings.php><input type=button value="Back"></a></center>
                            </div>
                            <div class="column2">
                                <center> <input type="submit" value="View" id=view name=view>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>


        </div>

    </div>
    <script>
        function mytest() {
            window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
        }

    </script>


</body>

</html>
