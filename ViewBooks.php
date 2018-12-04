<?php
        
    //    echo "hello from php"."<br>";
//Devine variables
        $username="root";
        $password="";
        $servername="localhost";

 $conn = mysqli_connect($servername, $username,$password);
/* if ($myconnect){
            echo "You are connected"."<br>";}*/
        if(!$conn){
            die("This went wrong:  ".mysqli_error());}

  $db_name="da"; 
            $my_db_select = mysqli_select_db($conn, $db_name);
 ?>
	<html>

	<head>
		<title>Home</title>
		<link rel="icon" type="image/png" href="images/JustReadLogo.jpg"> </head>
	<link rel="stylesheet" href="MyCSS.css">

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
		<center>
			<div class="WhyImportant">
				<br>
				<hr noshade align=“ left” width="70%" color=“000000” size="1">
				<p class=WhyImportantHeader>Popular books</p>
				<hr noshade align=“ left” width="70%" color=“000000” size="1">
				<div class="topnav">
					<input class="s" type="text" placeholder="Search..">
					<button class="sub" type="submit">Search</button>
				</div><fieldset>
				<p class="contactGat"><b><u>All books available</u></b></p>
			<center>
				<p><i>Browse all the books we have in stock. updates are made weekly. Do not miss your change to get that book you always wanted.</i></p></center>
				<?php
				//echo "My php";
				if ($db_name){
           // echo "Database has been selected"."<br>";          
					 $sql=//"SELECT * FROM da.allbooks";
						 "SELECT `Isbn`, `BName`, `BType`, `Bcategory`, `BPrice`,`bEdition` FROM `book`";
            $result=$conn->query($sql);

           if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "- ".$row["BName"]."<br>"."ISBN: ".$row["Isbn"]."<br>". "Book type: ".$row["BType"]."<br>". "Book category".$row["Bcategory"]."<br>"."Book price: R".$row["BPrice"]."<br>"."Book edition: ".$row["bEdition"]."<br>"."<br>";}
		   }else{ echo "0 result";}
        
//Closing connection
          $conn->close();
			}
				?></fieldset>
					
					<hr noshade align=“ left” width="70%" color=“000000” size="1">
					<br>
					<center> <img class="twirl" src="images/swirl.png"></center>
					<br>
			</div>
		</center>
	</body>

	</html>