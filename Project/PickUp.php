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
       $id=$_SESSION['Id'];
                    
  // echo "this is the emial used to sign ".$id; 
    
    if(!empty($_POST)){
       //$id= rand(1, 99999);
      
    $sql="INSERT INTO `pickupdetail`( `pickupdetailID`,`pickupStreetNumber`, `pickupdetailStreetName`, `pickupdetailSuburb`, `pickupdetailProvince`, `pickupdetailTime`, `bName`, `bSurname`, `bNumber`,`pickupdate`) VALUES ('{$_SESSION['Id']}',
        '{$conn->real_escape_string($_POST['bsnu'])}',
        '{$conn->real_escape_string($_POST['bsna'])}',
        '{$conn->real_escape_string($_POST['bs'])}',
        '{$conn->real_escape_string($_POST['bp'])}',
        '{$conn->real_escape_string($_POST['time'])}',
        '{$conn->real_escape_string($_POST['benefactorName'])}',
        '{$conn->real_escape_string($_POST['benefactorSurname'])}',
        '{$conn->real_escape_string($_POST['benefactorNumber'])}',
        '{$conn->real_escape_string($_POST['pudate'])}'
        ) ";
        
       
   
        $insert=$conn->query($sql);
        
        if($insert){
           /* $message = "Done";
            echo "<script type='text/javascript'>alert('$message');</script>";
                 */
  header('Location: DropOffDetail.php'); 
           
        }else{
        
            /*$message = "Oops, something went wrong, try again please.";
            echo "<script type='text/javascript'>alert('$message');</script>";*/
            die("error: {$conn->errno}:{$conn->error}");
          //  echo"nope".mysqli_error();
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
            <a href="ContactUsMemeber.php"> <button >Contact Us</button></a>
            <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
        </div>



        <div class="tab2">
            <button>Item Detail</button>
            <button style=" background-color:#737373; color: white;" class=activeBut> Collection Detail</button>

            <button>Delivery Detail</button>
            <button>Payment Detail</button>
            <button>Order Summery</button>
            <button>Order Conformation</button>
        </div>


        <div class=m>
            <div class="myPadding">
                <center>
                    <h2 class=title><b>COLLECTION DETAIL</b></h2>
                </center>
                <fieldset>
                    <legend align=LEFT><b>Enter the detail of where the item for courier must be picked up</b></legend>
                    <form method="post" action="">
                        <p>Please complete all of the fields for your order to be sucesfully completed</p>
                        <label>Name of benefactor<sup>*</sup></label>
                        <input type="text" id="benefactorName" name="benefactorName" placeholder="Name of benefactor">
                        <label>Surname of benefactor<sup>*</sup></label>
                        <input type="text" id="benefactorSurname" name="benefactorSurname" placeholder="Surname of benefactor">
                        <label>Contact number of benefactor<sup>*</sup></label>
                        <input type="text" id="benefactorNumber" name="benefactorNumber" placeholder="Contact number of benefactor">
                        <label>Date of collection (YYYY-MM-DD)<sup>*</sup></label>
                        <input type="text" id="pudate" name="pudate" placeholder="Collection date">
                        <label>Collection time<sup>*</sup></label>
                        <select class="mySelect" name=time id=time>
                    <option  >08:00 to 09:00</option>
                    <option >09:00 to 10:00</option>
                    <option >10:00 to 11:00</option>
                    <option >11:00 to 12:00</option>
                    <option>12:00 to 13:00</option>
                    <option >13:00 to 14:00</option>
                    <option >14:00 to 15:00</option>
                    <option >15:00 to 16:00</option>
                </select>
                        <label>Street name of benefactor<sup>*</sup></label>
                        <input type="text" id="bsna" name="bsna" placeholder="Street name of benefactor">
                        <label>Street number of benefactor<sup>*</sup></label>
                        <input type="text" id="bsnu" name="bsnu" placeholder="Steet number of benefactor">
                        <div class="row">
                            <label>Suburb of benefactor<sup>*</sup></label>
                            <input type="text" id="bs" name="bs" placeholder="Subhurb of benefactor">
                            <label>Province of benefactor<sup>*</sup></label>
                            <input type="text" id="bp" name="bp" placeholder="Province of benefactor">
                            
                            <div class="column2">

                                <center><input type="reset" value="Reset"></center>
                            </div>
                            <div class="column2">
                                <center>
                                    <a href=DropOffDetail.php><input type="submit" value="Next" onclick="return validateName() "></a>
                                </center>

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
            function validateName() {
                var name = document.getElementById('benefactorName');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the name of the benefactor");
                    return false;
                } else {
                    //alert("name is saved");
                    return validateSurname();
                }
            }

            function validateSurname() {
                var name = document.getElementById('benefactorSurname');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the surname of the benefactor");
                    return false;
                } else {
                    //alert("name is saved");
                    return validateNumber();
                }
            }

            function validateNumber() {
                var name = document.getElementById('benefactorNumber');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the number of the benefactor");
                    return false;
                } else {
                    //alert("name is saved");
                    return vsna();
                }
            }

            function vsna() {
                var name = document.getElementById('bsna');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the street name of the benefactor");
                    return false;
                } else {
                    //alert("name is saved");
                    return vsnu();
                }
            }

            function vsnu() {
                var name = document.getElementById('bsnu');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the street number of the benefactor");
                    return false;
                } else {
                    //alert("name is saved");
                    return vbs();
                }
            }

            function vbs() {
                var name = document.getElementById('bs');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the suburb of the benefactor");
                    return false;
                } else {
                    //alert("name is saved");
                    return vbp();
                }
            }

            function vbp() {
                var name = document.getElementById('bp');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the province of the benefactor");
                    return false;
                } else {
                    //alert("name is saved");
                    return pudate();
                }
            }

            function pudate() {
                var name = document.getElementById('pudate');
                // alert(name.value); // to see the value inserted under name
                // alert(name.value.length); // To see the length of the character inserted under name
                if (name.value.length == 0) {
                    alert("Enter the collection date");
                    return false;
                }
            }

            function mytest() {
                window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
            }

        </script>
</body>

</html>
