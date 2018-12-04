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
                <h2 class=title><b>MY BOOKINGS</b></h2>
            </center>
            <fieldset>
                <legend align=center>Detail of the item you wish to courier</legend>


                <?php
                    
                    $servername = "localhost";
                    $username = "root";
                    $password = "";

                    $conn = new mysqli($servername, $username, $password);

                    $db_name="jbexpress"; 
                    $my_db_select = mysqli_select_db($conn, $db_name);

                     session_start();
                           $myusername1= $_SESSION['Email'] ;
                          // $id=$_SESSION['Id'];

                         
 $getMe="SELECT `paymentId`,  `state`,  `datAdded`, `prize` FROM `payment` WHERE `state` ='Confirmed'  and  `clientEmail`='$myusername1' order by  `datAdded` desc";
    $select=$conn->query($getMe);                
     
      
    

          if ($select){
                                        
                            while($sqlRow=mysqli_fetch_array($select,MYSQLI_ASSOC)){
                                $id=$sqlRow['paymentId'];
                                $state=$sqlRow['state'];
                                $date=$sqlRow['datAdded'];  
                                $prize=$sqlRow['prize'];
                            
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
                                echo"Order placement date";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$date."</td>";
                        echo"</tr>";
                          
                                echo"<tr>";
                           echo"<td>";
                                echo"";
                            echo"</td>";
                           echo"<td> </td>";
                            echo"<td> </td>";
                            echo"<td> </td>";
                          echo"<td> </td>";
                        echo"</tr>";    
                    echo"</table>";}
                      
                  }else{
                      echo"<br>"."query not executed";
                  }
      
               
                 mysqli_close($conn);
                    ?>
                <br>
                   <div class="row">
        
        <div class="column2">
            <center>
           <a href="ViewDetail.php"><input type="button" value="View order detail" id=view onclick="return validateName()"></a> 
            </center>
        </div>
        <div class="row">
            <div class="column3">
                <center><a href=DeleteOrder.php><input type="button" value="Cancel order"></a></center>
            </div>
        </div>
    </div>
<br>
            </fieldset>
        </div>
        <br>
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
