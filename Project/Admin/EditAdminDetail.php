<html>

<head>

    <title>JB Express Home</title>

    <link rel="icon" type="image/png" href="Images/12540@2x.png">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<link rel="stylesheet" href=MyStyle.css>

<body>
    <?php    

    if(!empty($_POST)){
       
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password);

        $db_name="jbexpress"; 
        $my_db_select = mysqli_select_db($conn, $db_name);

        session_start();
        $myusername= $_SESSION['LoginEmail'] ;  
    
        
       $sql="UPDATE `administration` SET 
            `adminName`= '{$conn->real_escape_string($_POST['registerfname'])}',            
            `adminSurname`='{$conn->real_escape_string($_POST['registerlname'])}',            
            `adminContactNumber`='{$conn->real_escape_string($_POST['registerNumber'])}',
            `adminEmail`='{$conn->real_escape_string($_POST['registerEmail'])}' 
        WHERE adminID=$myusername";
        
        $insert=$conn->query($sql);       
       
        
        if($insert){
                $message = "Changes saved.";
echo "<script type='text/javascript'>alert('$message');</script>";
           //header('Location: AdminHome.php'); 
           
        }else{
        die("error: {$conn->errno}:{$conn->error}");
            header('AlreadyRegistered.php');
             $message = "Oops detail can't be saved.";
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
                            <p><b>ADMIN</b></p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="tab">
     
        <a href=EditAdminDetail.php><button  style=" background-color: #152b37; color: white;" class=activeBut>Edit admin detail</button></a>
        
    </div>
    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>EDIT PROFILE</b></h2>
            </center>

            <fieldset>
                <legend align=center>Set your personal information right, right now ! </legend>
                <form method="post" action="">

                    <label for="fname">First Name<sup>*</sup></label>
                    <input type="text" id="registerfname" name="registerfname" placeholder="First name">

                    <label for="lname">Last Name<sup>*</sup></label>
                    <input type="text" id="registerlname" name="registerlname" placeholder="Last name">

                    <label>Email Address<sup>*</sup></label>
                    <input type="text" id="registerEmail" name="registerEmail" placeholder="E-mail address">

                    <label>Contact Number<sup>*</sup></label>
                    <input type="text" id="registerNumber" name="registerNumber" placeholder="Contact number">

                    <div class="row">
                        <div class="column">
                            <center><a href="AdminHome.php"><input type="button" value="Back"></a></center>
                        </div>
                        <div class="column">
                            <center>
                                <input type="submit" value="Save" onclick="return validateName()">
                            </center>
                        </div>
                        <div class="column">
                            <center><input type="reset" value="Reset"></center>
                        </div>

                    </div>
                </form>
            </fieldset>
        </div>
        <p></p>

    </div>
    <script>
        function validateName() {
            var name = document.getElementById('registerfname');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (name.value.length == 0) {
                alert("Enter your name");
                return false;
            } else {
                //alert("name is saved");
                return validateSurname();
            }
        }

        function validateSurname() {
            var surname = document.getElementById('registerlname');
            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (surname.value.length == 0) {
                alert("Enter your last name");
                return false;
            } else {
                //  return alert("surname is saved");
                return validateEmail();
            }
        }

        function validateEmail() {
            var email = document.getElementById('registerEmail').value;
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                alert("You have entered a non-valid e-mail address");
                return false;
            } else {
                // alert("Email is saved")
                return validateNum();
            }
        }

        function validateNum() {

            //  var phoneno = /^\d{10}$/;
            var tel = document.getElementById('registerNumber');

            // alert(name.value); // to see the value inserted under name
            // alert(name.value.length); // To see the length of the character inserted under name
            if (tel.value.length == 0) {
                alert("Enter you phone number");
                return false;
            }
        }

    </script>


</body>

</html>
