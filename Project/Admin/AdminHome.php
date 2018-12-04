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
        <a href=AdminHome.php><button  style=" background-color: #152b37; color: white;" class=activeBut>Home</button></a>
        
        <a href="ViewMessages.php"><button >Messages</button></a>
        <a href=ViewClients.php> <button >Clients</button></a>
         <a href=viewBookings.php><button>View Bookings</button></a>
        <a href=ManageBookings.php> <button >Manage Bookings</button></a>
        <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
    </div>

    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>ADMIN PROFILE</b></h2>
            </center>

            <fieldset>
                <legend align=center>This is your personal information. Any incorrect information can be changed. </legend>


                <div class="MyText">
                
<?php

            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password);


            $db_name="jbexpress"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

         
            $myusername= $_SESSION['LoginEmail'] ;  
                                 
            $myProfile="SELECT `adminID`, `adminName`, `adminPassword`, `adminSurname`, `adminStartDate`, `adminContactNumber`, `adminPosition`, `adminEmail` FROM `administration` WHERE `adminID`= $myusername";
            $select=$conn->query($myProfile);
                
            while($sqlRow=mysqli_fetch_array($select,MYSQLI_ASSOC)){
                $adminId=$sqlRow['adminID'];
                $adminName=$sqlRow['adminName'];
                $adminPassword=$sqlRow['adminPassword']; 
                $adminSurname=$sqlRow['adminSurname'];
                $startDate=$sqlRow['adminStartDate'];
                $position=$sqlRow['adminPosition'];
                $email=$sqlRow['adminEmail'];
                $number=$sqlRow['adminContactNumber'];             
            }    
       
        mysqli_close($conn); 
    
    ?>
                </div>
                <br>
                <table class=myText>
                    <tr>
                        <td>
                            <?php echo "Staff Number";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo $adminId;?>
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
                            <?php echo $adminName;?>
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
                            <?php echo $adminSurname;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo "Position";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo $position;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo "E-mail address";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo $email;?>
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
                            <?php echo $number;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo "Start date";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>
                            <?php echo $startDate;?>
                        </td>
                    </tr>


                </table>
                
                <p style="text-align:center">For user assistance click <a href=AdminUserManual.pdf>here</a></p>
                <div class="row">
                    <div class="column2">
                        <center>
                            <a href=EditAdminDetail.php>  <input type="button" value="Edit" ></a> </center>
                    </div>
                    <div class="row">
                        <div class="column2">
                            <center><a href=logout.php> <input type=button id=logout onclick="mytest()" value="Log Out"></a></center>
                            
                        </div>
                    </div></div><br>
            </fieldset>
             
     <br>
    </div>

    </div>
  



</body>

</html>
