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
        <a href="logout.php"><button onclick="mytest()">Home</button></a>
        <a href=MemeberProfile.php target="_self"><button id="memenerProfile" style=" background-color: #152b37; color: white;" onclick="myActiveBut()"  >My Profile</button></a>
        <a href=NewBooking.php> <button >New Booking</button></a>
        <a href=MyBookings.php> <button  >My Bookings</button></a>
        <a href=ContactUsMemeber.php> <button >Contact Us</button></a>
        <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>


    </div>
    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>Peronal Information</b></h2>
            </center>
            <fieldset>
                <legend align=center>Your personal detail</legend>


                <div class="myText">

                    <?php
        session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password);


            $db_name="jbexpress"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

         
            $myusername1= $_SESSION['Email'] ;
                    
                //echo "this is the emial used to sign ".$myusername1;   
                    
                    $getMe="SELECT * FROM `client` WHERE `clientEmail`='$myusername1'";
                                      
                    $select=$conn->query($getMe);   
                    
                  if ($select){
                       // echo "query executed"."<br>";  
                      
            while($sqlRow=mysqli_fetch_array($select,MYSQLI_ASSOC)){
                $clientEmail=$sqlRow['clientEmail'];
                $clientName=$sqlRow['clientName'];
                $clientPassword=$sqlRow['clientPassword']; 
                $clientSurname=$sqlRow['clientSurname'];
                $Date=$sqlRow['timeRegistered'];              
                $number=$sqlRow['clientContactNumber'];  
                
               // echo $clientEmail ."\t".$clientName."\t".$clientPassword."<br>";
            }    
				    }else{
                       echo"<br>"."query not executed";
                   }
                                 
        
       
        mysqli_close($conn); 
    
            
    ?>

                </div>
                <table class=myText>
                    <tr>
                        <td>
                            <?php echo "Email Address";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo $clientEmail;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo "Name";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo $clientName;?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <?php echo "Surname";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo $clientSurname;?>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <?php echo "Contact number";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo  $number;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo "Registration date";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo  $Date;?>
                        </td>
                    </tr>


                </table>

                <br>
                <div class="row">
                    <div class="column2">
                        <center>
                            <a href="EditPersonalInfo.php"> <input type="button" name= editDetail value="Edit Detail"></a>
                        </center>
                    </div>
                    <div class="row">
                        <div class="column3">
                            <center><a href=NewBooking.php><input type="button" value="New Booking"></a></center>
                        </div>
                    </div>
                </div>
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
