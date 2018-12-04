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
                    
                //echo "this is the emial used to sign ".$myusername1; 
    
    if(!empty($_POST)){
       $id= rand(1, 99999);
          $_SESSION['Id']=$id;
        
      
    $sql="INSERT INTO `itemdetail`(`itemdetailID`, `clientEmail`, `itemDescriprion`, `itemWeight`, `itemHeight`, `itemLenght`, `itemWidth`) VALUES (  '{$_SESSION['Id']}','{$_SESSION['Email']}','{$conn->real_escape_string($_POST['contactMessage'])}',
            '{$conn->real_escape_string($_POST['weight'])}',
            '{$conn->real_escape_string($_POST['height'])}',
            '{$conn->real_escape_string($_POST['lenght'])}',
            '{$conn->real_escape_string($_POST['width'])}')";
       /* $sql2=" INSERT INTO `pickupdetail`(`pickupdetailID`) VALUES ('$id')";
        $insert2=$conn->query($sql2);*/
  /*  $sql1=" INSERT INTO `dropofdetail`(`dropofdetailID`) VALUES ('$id')";
    
    $sql3="INSERT INTO `receiverdetail`(`receiverdetailId`) VALUES ('$id')";
   $sql4="INSERT INTO `payment`(`paymentId`) VALUES ('$id')";
         $insert4=$conn->query($sql4);
        $insert3=$conn->query($sql3);
            
          $insert1=$conn->query($sql1);*/
        
        $insert=$conn->query($sql);
        
        if($insert){
                 
  header('Location: PickUp.php'); 
           
        }else{
        
            $message = "Oops, something went wrong, try again please.";
            echo "<script type='text/javascript'>alert('$message');</script>";
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
        <a href=memberProfile.php target="_self"><button  >My Profile</button></a>
        <a href=NewBooking.php> <button style=" background-color: #152b37; color: white;" class=activeBut  >New Booking</button></a>
        <a href=MyBookings.php> <button  >My Bookings</button></a>
        <a href=ContactUsMemeber.php> <button >Contact Us</button></a>
      <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
    </div>

    <div class="tab2">
        <button style=" background-color:#737373; color: white;" class=activeBut>Item Detail</button>
        <button> Collection Detail</button>
        <button>Delivery Detail</button>
        <button>Payment Detail</button>
        <button>Order Summery</button>
              <button>Order Conformation</button>
    </div>

    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>ITEM DETAIL</b></h2>
            </center>
            <fieldset>
                <legend align=left><b>Enter the detail of the item for collection</b></legend>
                <form method="post" action="">
                    <p>Please complete all of the fields for your order to be sucesfully completed</p>
                    <p></p>
                    
                     <label>Item description<sup>*</sup></label>
                        <textarea id="contactMessage" name="contactMessage" maxlength="255" placeholder="Type your messsage here"></textarea>


                    <label>Weight of item (kg)<sup>*</sup></label>
                    <input type="text" id="weight" name="weight" placeholder="Weight">

                    <label>Height of item (cm)<sup>*</sup></label>
                    <input type="text" id="height" name="height" placeholder="Height">

                    <label>Lenght of item (cm)<sup>*</sup></label>
                    <input type="text" id="lenght" name="lenght" placeholder="Lenght">

                    <label>Width of item (cm)<sup>*</sup></label>
                    <input type="text" id="width" name="width" placeholder="Width">



                    <div class="row">
                       
                        <div class="column2">

                            <center><input type="reset" value="Reset"></center>
                        </div>
                        <div class="column2">
                            <center>
                                <a href=PickUp.php><input type="submit" value="Next" onclick="return validateWeight() "></a></center>

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
      /*  function validateItem() {
            var name = document.getElementById('item');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (name.value.length == 0) {
                alert("Enter your item type");
                return false;
            } else {
            //alert("name is saved");
                return validateWeight();
            }
        }*/
         function validateWeight() {
            var name = document.getElementById('weight');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (name.value.length == 0) {
                alert("Enter weight of item");
                return false;
            } else {
        //    alert("name is saved");
          return validateHeight();
            }
        }
           function validateHeight() {
            var name = document.getElementById('height');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (name.value.length == 0) {
                alert("Enter height of item");
                return false;
            } else {
           // alert("name is saved");
            return validateLenght();
            }
        }
        function validateLenght() {
            var name = document.getElementById('lenght');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (name.value.length == 0) {
                alert("Enter length of item");
                return false;
            } else {
           // alert("name is saved");
            return validateWidth();
            }
        }
        function validateWidth() {
            var name = document.getElementById('width');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (name.value.length == 0) {
                alert("Enter width of item");
                return false;
            } else {
           // alert("name is saved");
            return validateMessage();
            }
        }
            function validateMessage() {
            var name = document.getElementById('contactMessage');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (name.value.length == 0) {
                alert("Enter description");
                return false;
            } 
        }
       
        function mytest() {
            window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
        }

    

    </script>
</body>

</html>
