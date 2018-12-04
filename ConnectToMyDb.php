<html>

<head>
	<title>Connect To My Database</title>
</head>

<body>
    <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn){
     echo "You are connected"."<br>";
 }
if(!$conn){
    die("This went wrong:  ".mysqli_error());
}
    
// selecting the database 
$db_name="mydbconnecction"; 
$my_db_select = mysqli_select_db($conn, $db_name);

// checking that database was selected
if ($db_name){
    echo "Database has been selected"."<br>";    
}
    
//insert statement
$my_insert_query=  
  "INSERT INTO `user`(`name`, `surname`) VALUES ('Andrea','Cloete')";
$run_query = mysqli_query($conn, $my_insert_query);
    
//check if insert were sucessfull
    if($my_insert_query){
        echo("it is inserted");
    }
    if(!$my_insert_query){
        echo ("not inserted");
    }

    //display content
    $my_select_query="SELECT * FROM `user`";
    
     $select_result=mysqli_query($conn,$my_select_query);

            while($sqlRow=mysqli_fetch_array($select_result,MYSQLI_ASSOC)){
                $name=$sqlRow['name'];
                $surname=$sqlRow['surname'];
               
                echo $name."\t".$surname."<br>";
            }
    
?>
	<p>Hi daar slaaibaar</p>
	<p>Please enter your name and surname</p>
	<form>
		<table>
			<tr>
				<td>Name:</td>
				<td>
					<input type=t ext name=n ame id=n ame>
				</td>
			</tr>
			<tr>
				<td>Surname:</td>
				<td>
					<input type=t ext name=s urname id=s urname>
				</td>
			</tr>
		</table>
		<center>
			<input type=submit name=submit id=submit value=Submit>
		</center>
	</form>

</body>

</html>
