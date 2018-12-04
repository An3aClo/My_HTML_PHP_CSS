<html>

<head>
    <title>JB Express Home</title>
    <link rel="icon" type="image/png" href="Images/12540@2x.png">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<link rel="stylesheet" href=MyStyle.css>

<body>

    <?php
    
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
    if($connection){
    echo "now connected";
    }
    

$select_db = mysqli_select_db($connection, 'jbexpress');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
    //Start the Session
    if($select_db){
        echo"db selected";
    }
    
session_start();
    require('connect.php');

        if (isset($_POST['LoginEmail']) and isset($_POST['LoginPassword'])){

            $email = $_POST['LoginEmail'];
            $password = $_POST['LoginPassword'];

            $query = "SELECT * FROM `client` WHERE  clientEmail='$email' and clientPassword='$password'";
            
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
            
            if($query){
                header('Location: HomePage.php'); 
            }
            
            $count = mysqli_num_rows($result);

                if ($count == 1){
                    $_SESSION['LoginEmail'] = $email;
                }else{
                    
                    $fmsg = "Invalid Login Credentials.";
                    
                }
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
            <a href="ContactUs.php"> <button >Contact Us</button></a>
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


                        <label for="fname">Email Address<sup>*</sup></label>
                        <input type="text" name="LoginEmail" class="form-control" placeholder="Username" required>


                        <label for="fname">Password<sup>*</sup></label>
                        <input type="password" name="LoginPassword" id="inputPassword" class="form-control" placeholder="Password" required>

                        <div class="row">
                            <div class="column2">
                                <center>
                                    <input type=submit value=Login>

                                </center>
                            </div>
                            <div class="row">
                                <div class="column3">
                                    <center><input type="button" value="Reset Password"></center>
                                </div>
                            </div>
                        </div>
                    </form>

                </fieldset>
            </div>
        </div>
</body>

</html>
