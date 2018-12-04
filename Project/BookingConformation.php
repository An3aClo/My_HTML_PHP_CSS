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
        <button style=" background-color:#737373; color: white;" class=activeBut>Order Summery</button>
        <button>Order Conformation</button>
    </div>
    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>DETAIL OF ORDER </b></h2>
            </center>
            <fieldset>
                <legend><b>This is all the information that you provided for your order to be sucessful</b></legend>



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
    
  
    $sql="select * FROM itemdetail JOIN dropofdetail ON (itemdetail.itemdetailID = dropofdetail.dropofdetailID) JOIN payment ON (itemdetail.itemdetailID=payment.paymentId) JOIN pickupdetail ON (itemdetail.itemdetailID=pickupdetail.pickupdetailID) where itemdetailID ='$id'";   
        
    $insert=$conn->query($sql);
                  
                      
    while($sqlRow=mysqli_fetch_array($insert,MYSQLI_ASSOC)){ 
        //$collectionDate=$sqlRow['pickupdate'];
        $state=$sqlRow['state'];
                $ID=$sqlRow['itemdetailID'];
                $clientEmail=$sqlRow['clientEmail'];
                $itemSescription=$sqlRow['itemDescriprion']; 
                $weight=$sqlRow['itemWeight'];
                $height=$sqlRow['itemHeight'];              
                $lenght=$sqlRow['itemLenght'];  
                $width=$sqlRow['itemWidth']; 
               // $itemTimeAdded=$sqlRow['timeAdded']; 
                $doSNum=$sqlRow['dropofdetailStreetNumber'];                 
                $doSName=$sqlRow['dropofdetailStreetName']; 
                $doSub=$sqlRow['dropofdetailSuburb'];                 
                $doProv=$sqlRow['dropofdetailProvince']; 
                //$doTimeAdded=$sqlRow['timeAdded']; 
                $doName=$sqlRow['dropOfName'];
                $doSurname=$sqlRow['dropOfSurname'];
                $doNumber=$sqlRow['dropOfNumber'];
                $doEmail=$sqlRow['dropOffEmail'];
                $payMethod=$sqlRow['paymentMethod'];
                $notes=$sqlRow['AditionalNotes'];
               // $state=$sqlRow['state'];
                $puSNum=$sqlRow['pickupStreetNumber'];
                $puSName=$sqlRow['pickupdetailStreetName'];
                $puSSub=$sqlRow['pickupdetailSuburb'];
                $puProv=$sqlRow['pickupdetailProvince'];
                $puTime=$sqlRow['pickupdetailTime'];
                $bName=$sqlRow['bName'];
                $bSurname=$sqlRow['bSurname'];
                $bNum=$sqlRow['bNumber'];
                    $prize=$sqlRow['prize'];
               // $puAddedTime=$sqlRow['timeAdded'];
              
                 
            }
              
        mysqli_close($conn);
?>
                <table class=myText>

                    <tr>
                        <td style="font-size: 20px;">
                            <u><b>Order detail:</b></u>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Order number";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $ID;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "State of order";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $state;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Client Email address";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $clientEmail;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Prefered payment method";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $payMethod;?>
                        </td>
                    </tr>

                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Additional notes";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $notes;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Prize";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $prize;?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-size: 20px;">
                            <b><u>Item detail:</u></b>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        </td>
                    </tr>


                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Item description";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $itemSescription;?>
                        </td>
                    </tr>

                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Weight of item";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $weight." kg";?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Height of item";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $height." cm";?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Lenght of item";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $lenght." cm";?>
                        </td>
                    </tr>

                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Width of item";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $width." cm";?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-size: 20px;">
                            <u><b>Delivery detail:</b></u>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                    </tr>


                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Delivery address";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $doSNum."\t".$doSName."\t".$doSub."\t".$doProv;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Recipient name";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $doName;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Recipient surname";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $doSurname;?>
                        </td>
                    </tr>

                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Contact number of recipient";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $doNumber;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Email address of recipient";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $doEmail;?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-size: 20px;">

                            <u><b>Collection detail:</b></u>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        </td>
                    </tr>


                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Item collection address";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $puSNum."\t".$puSName."\t".$puSSub."\t".$puProv;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Prefered collection time";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $puTime;?>
                        </td>
                    </tr>

                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Name of benefactor";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $bName;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Surname of benefactor";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $bSurname;?>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding-left: 13px;">
                            <?php echo "Contact number of benefactor";?>
                        </td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td style=" padding-left: 13px;">
                            <?php echo $bNum;?>
                        </td>
                    </tr>

                </table>
                <form method="post" action="">


                    <center>
                        <p>Banking details can be found on the invoiced mailed to:
                            <?php echo $myusername1?>. Please note that the order can be cancled after invoice is received.</p>
                        <p>Note if any of the information is incorrect please do not confirm your booking</p>

                        <a href="ConfirmOrder.php"> <input type="button" value="Next"></a>

                    </center>

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
