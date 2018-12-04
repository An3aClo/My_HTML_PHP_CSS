<html>

<head></head>

<body>
    <?php 
if(!empty($_POST)){
        $servername = "localhost";
        $username = "root";
        $password = "";

// Create connection
        $conn = new mysqli($servername, $username, $password);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else{
        echo "Connected successfully";}

            $db_name="jbexpress"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

// checking that database was selected
            if ($db_name){
           echo "Database has been selected"."<br>";    
				
			}else{
                echo"database not selected";
            }    
       
  $sql="INSERT INTO `message`(`messagerName`, `messangerSurnme`, `messangerNumber`, `message`, `messageEmail`) VALUES
  ('{$conn->real_escape_string($_POST['contactMessage'])}','{$conn->real_escape_string($_POST['contactName'])}','{$conn->real_escape_string($_POST['contactSurname'])}','{$conn->real_escape_string($_POST['contactEmail'])}',
    '{$conn->real_escape_string($_POST['contactNum'])}')";
  
 
        $insert=$conn->query($sql);
        
        if($insert){
            echo "Sucess";
        }else{
            die("error: {$conn->errno}:{$conn->error}");
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

        <a href="HomePage.php" target="_self"><button  >Home</button></a>
        <a href="ContactUs.php"> <button style=" background-color: #152b37; color: white;" class=activeBut>Contact Us</button></a>
        <a href="Register.php"><button  >Register</button></a>
        <a href=Login.php> <button>Login</button></a>
    </div>


    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>CONTACT US</b></h2>
            </center>


            <fieldset>
                <legend align=center>For a customised quote, please contact our sales team now !</legend>
                <form method="post" action="">
                    <label>First Name<sup>*</sup></label>
                    <input type="text" id="contactName" name="contactName">

                    <label>Last Name<sup>*</sup></label>
                    <input type="text" id="contactSurname" name="contactSurname">

                    <label>Email Address<sup>*</sup></label>
                    <input type="text" id="contactEmail" name="contactEmail">s

                    <label>Phone Number<sup>*</sup></label>
                    <input type="text" id="contactNum" name="contactNum">

                    <label>Message<sup>*</sup></label>
                    <textarea id="contactMessage" name="contactMessage"></textarea>

                    <label>Capatcha<sup>*</sup></label>
                    <div class="g-recaptcha" data-sitekey="6LdVQm0UAAAAAHYKi2kD6WigkHLO3ox8ck5mH338"></div>
                    <div class="g-recaptcha" data-sitekey="6LdVQm0UAAAAAHYKi2kD6WigkHLO3ox8ck5mH338"></div>


                    <div class="row">
                        <div class="column2">
                            <center>
                                <input type="submit" value="submit"></center>
                        </div>
                        <div class="row">
                            <div class="column3">
                                <center><input type="reset" value="Reset"></center>
                            </div>
                        </div>
                    </div></form>
       
        </fieldset>
    </div>
    <table border="0" width=100% height=15% cellspacing=0 padding=50px class=myColor>
        <tr>
            <td class=myFooter>
                <center>© Copyright 2017 All Rights Reserved | JB Express</center>
            </td>
        </tr>
    </table>
    </div>


</body>

</html>
