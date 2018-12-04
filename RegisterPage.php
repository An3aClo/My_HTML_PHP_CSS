 <?php
        
  //echo "hello from php"."<br>";
//Devine variables
        $username="root";
        $password="";
        $servername="localhost";

 $conn = mysqli_connect($servername, $username,$password);
 if ($conn){
            echo "You are connected"."<br>";}
        if(!$conn){
            die("This went wrong:  ".mysqli_error());}

  $db_name="da"; 
            $my_db_select = mysqli_select_db($conn, $db_name);
 if ($db_name){
           echo "Database has been selected"."<br>";    
				
			}
 ?>
<html>

<head>
	<title>Register</title>
</head>
<link rel="stylesheet" href="MyCSS.css">
<link rel="icon" type="image/png" href="images/JustReadLogo.jpg">
<?php
        
    //    echo "hello from php"."<br>";
//Devine variables
        $username="root";
        $password="";
        $servername="localhost";

 $conn = mysqli_connect($servername, $username,$password);
/*if ($conn){
            echo "You are connected"."<br>";}*/
        if(!$conn){
            die("This went wrong:  ".mysqli_error());}

  $db_name="da"; 
            $my_db_select = mysqli_select_db($conn, $db_name);
 ?>

	<body>
		<div class="WhyImportantTop">
			<br> <img id="logo" src="images/JustReadLogo.jpg">
			<br> </div>
		<div class="tab">
			<a href="ViewBooks.php">
				<button class="tablinks"><b>Home</b></button>
			</a>
			<a href="AboutUsPage.html">
				<button class="tablinks"><b>About us</b></button>
			</a>
			<a href="Login.php">
				<button class="tablinks"><b>Log in</b></button>
			</a>
			<a href="Login.php">
				<button class="tablinks"><b>My account</b></button>
			</a>
			<a href="RegisterPage.php">
				<button class="tablinks"><b>Register</b></button>
			</a>
			<a href="ContactUsPage.html">
				<button class="tablinks"><b>Contact Us</b></button>
			</a>
		</div>
		<div class="WhyImportant">
			<br>
			<br>
			<hr noshade align=“ left” width="70%" color=“000000” size="1">
			<p class="WhyImportantHeader">Register</p>
			<hr noshade align=“ left” width="70%" color=“000000” size="1">
			<center>
				<p>Anyone is welcome to register.</p>
				<p> Register to add the latest hottest books to your cart. Items can be collected by more than 10 stores in Cape Town alone, with many more stores poping up around you. </p>
				<br> </center>
			<fieldset>
				<p class="contactGat"><b><u>Personel Information</u></b></p>
				<center>
					<p><i>Fields that is marked with a * is compulsory.</i></p>
				</center>
				<form name=rFormmethod="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" style="padding:0px 30px">
					<table>
						<tr>
							<td>Name:<sup>*</sup></td>
							<td>
								<input type="text" name="name" id="name"> </td>
						</tr>
						<tr>
							<td>Surname:<sup>*</sup></td>
							<td>
								<input type="text" name="surname" id="surname"> </td>
						</tr>
						<tr>
							<td>E-mail:<sup>*</sup></td>
							<td>
								<input type="text" name="email" id="email"> </td>
							<tr>
								<td>Phone:<sup>*</sup></td>
								<td>
									<input type="text" name="tel" id="tel"> </td>
							</tr>
							<tr>
								<td>Password:<sup>*</sup></td>
								<td>
									<input type="password" name="pass" id="pass"> </td>
							</tr>
							<tr>
								<td>Confirm password: <sup>*</sup></td>
								<td>
									<input type="password" name="pass2" id="pass2"> </td>
							</tr>
					</table>
					<center>
						<input type="submit" class="button" value="Register" name="submit"> </center>
				</form>
			<?php
				$name='';
				$surname='';			
				$email='';
				$tel='';
				$pass='';
				
			
					if(isset($_GET['submit'])){
						$name=$_GET['name'];
						$surname=$_GET['surname'];			
						$email=$_GET['emial'];
						$tel=$_GET['tel'];
						$pass=$_GET['pass'];											
					
				
			$query=("DELETE FROM `cart` WHERE `cart`.`ClientEMail` = `$email` AND `cart`.`Isbn` =`$isbn`".$conn);
					("INSERT INTO `client`(`clientFirstName`, `clientSurname`, `clientEMail`, `clientNumber`, `clientPassword`) VALUES (`$name`,`$surname`,`$email`,`$tel`,`$pass`".$conn);					
			if(mysql_query($query)){
				echo "Sucesfully registered";
			
			}
				else{
				echo "Failed to register";}
					}
			?>
			</fieldset>
			<br>
			<hr noshade align=“ left” width="70%" color=“000000” size="1">
			<br>
			<center> <img class="twirl" src="images/swirl.png"></center>
			<br> </div>
	</body>

</html> -->