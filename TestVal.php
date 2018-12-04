
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr  = "";
$name =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    /*  $sql="INSERT INTO `client`( `clientName`, `clientSurname`,`clientEmail`, `clientContactNumber`, `clientPassword`) VALUES
    ('{$conn->real_escape_string($_POST['registerfname'])}','{$conn->real_escape_string($_POST['registerlname'])}','{$conn->real_escape_string($_POST['registerEmail'])}','{$conn->real_escape_string($_POST['registerNumber'])}','{$conn->real_escape_string($_POST['registerPassword'])}')";
        */
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>