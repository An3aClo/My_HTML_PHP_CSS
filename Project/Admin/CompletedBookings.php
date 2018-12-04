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
        <a href=AdminManagement.php> <button >Admin Management</button></a>
        <a href=ViewMessages.php><button >Messages</button></a>
        <a href=ViewClients.php> <button >Clients</button></a>
        <a href=viewBookings.php><button style=" background-color: #152b37; color: white;" class=activeBut >View Bookings</button></a>
        <a href=ManageBookings.php> <button >Manage Bookings</button></a>
        <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
    </div>
    
    <div class="tab2">
      <a href="viewBookings.php"><button  >Client confirmed</button></a>  
        <a href=CCanceledBookigs.php><button>Client canceled</button></a>
    <a href="AdminDeclienedBookings.php"> <button  >Admin declined</button></a>   
        <a href=PayedBookings.php ><button>Payed</button></a>
        <a href=CompletedBookings.php><button style=" background-color:#737373; color: white;" class=activeBut>Completed</button></a>
        <a  href="DetailBookingView.php"><button>Booking detail</button></a>
        
    </div>
    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>COMPLETED BOOKINGS</b></h2>
            </center>

            <fieldset>
                <legend align=center>This is all the bookings that have been sucessfully delivered</legend>

                <div class="MyText">
                    <?php
                    
                    $servername = "localhost";
                    $username = "root";
                    $password = "";

                    $conn = new mysqli($servername, $username, $password);

                    $db_name="jbexpress"; 
                    $my_db_select = mysqli_select_db($conn, $db_name);

                     session_start();
                         //  $myusername1= $_SESSION['Email'] ;
                          // $id=$_SESSION['Id'];

                         
                    $getMe="SELECT `paymentId`,  `state`,  `datAdded`, `prize`,`Process` FROM `payment` WHERE `Process`='Delivered'";
                    
                    $select=$conn->query($getMe);                
                        if ($select){                                        
                           while($sqlRow=mysqli_fetch_array($select,MYSQLI_ASSOC)){
                                $id=$sqlRow['paymentId'];
                                $state=$sqlRow['state'];
                                $date=$sqlRow['datAdded'];  
                                $prize=$sqlRow['prize'];
                                $process=$sqlRow['Process'];
                            
                    echo "<table class=myText>";
                  echo"<tr>";
                           echo"<td>";
                                echo"<b>Order</b>";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td></td>";
                            echo"<td></td>";
                          echo"<td></td>";
                        echo"</tr>";
                          
                        echo"<tr>";
                           echo"<td>";
                                echo"Order number";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$id."</td>";
                        echo"</tr>";
                           echo"<tr>";
                           echo"<td>";
                                echo"Price";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$prize."</td>";
                        echo"</tr>";
                      echo"<tr>";
                           echo"<td>";
                                echo"State of order";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$state."</td>";
                        echo"</tr>";
                               echo"<tr>";
                           echo"<td>";
                                echo"Process of order";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$process."</td>";
                        echo"</tr>";
                    
                    
                      echo"<tr>";
                           echo"<td>";
                                echo"Order placement date";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$date."</td>";
                        echo"</tr>";
                          
                    }
                          
                      
                  }else{
                      echo"<br>"."query not executed";
                  }
      
               
                 mysqli_close($conn);
                    ?>
                       
                </div>
            </fieldset></div>

    </div>
    <script>
        function mytest() {
            window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
        }

    </script>
 
</body>

</html>
