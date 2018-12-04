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
        <a href="ContactUs.php"> <button >Contact Us</button></a>
         <a href=UserAssistance.html> <button>User Assistance</button></a>
        <a href="Register.php"><button >Register</button></a>
        <a href=Login.php> <button  style=" background-color: #152b37; color: white;" class=activeBut>Login</button></a>
    </div>

    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>MEMBER LOGIN</b></h2>
            </center>

            <fieldset>
                <legend align=center>You are on your way to make your life easy !</legend>

                <form class="form-signin" method="POST">


                    <p></p>
                    <div style="color:red;">

                        <?php
                            include("config.php");
                            session_start();
   
                                if($_SERVER["REQUEST_METHOD"] == "POST") {     
      
                                    $myusername = mysqli_real_escape_string($connection,$_POST['Email']);
                                    $mypassword = mysqli_real_escape_string($connection,$_POST['LoginPassword']); 
      
                                    $sql ="SELECT * FROM `client` WHERE `clientEmail`='$myusername' and  `clientPassword`=  '$mypassword'";
       
                                    $result = mysqli_query($connection,$sql);
                                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
                                    $count = mysqli_num_rows($result);
    
                                        if($count == 1) {
                                            $_SESSION['Email'] = $myusername;     
                                            header("location: memberProfile.php");
                                        }else {
                                           
                                            echo "Your Emial Address or Password is invalid";
                                        }
                                }else {
                                    ;
                                }
                        ?>
                    </div><br>
                    <label for="fname">Email Address<sup>*</sup></label>
                    <input type="text" name="Email" class="form-control" placeholder="Username" required>


                    <label for="fname">Password<sup>*</sup></label>
                    <input type="password" name="LoginPassword" id="inputPassword" class="form-control" placeholder="Password" required>

                    
                      
                            <center>
                                <input type=submit value=Login>
                            </center>
                    
                </form>

            </fieldset>
        </div>
        <table border="0" width=100% height=15% cellspacing=0 padding=50px class=myColor>
            <tr>
                <td class=myFooter>
                    <center> &copy;Copyright 2017 All Rights Reserved | JB Express</center>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
