<?php
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
//displaying
echo"<br>"."========display data====="."<br>";
        //Select statement
            $my_select_query="SELECT * FROM `client` ";
            $select_result=mysqli_query($conn,$my_select_query);

            while($sqlRow=mysqli_fetch_array($select_result,MYSQLI_ASSOC)){
                $email=$sqlRow['clientEmail'];
                $name=$sqlRow['clientName'];
                $surname=$sqlRow['clientSurname'];  
                $number=$sqlRow['clientContactNumber'];
                    $password=$sqlRow['clientPassword'];
                echo $email ."\t".$name."\t".$surname."\t".$number."\t".$password."<br>";
            }

//insert
 $my_insert_query="INSERT INTO `client`(`clientEmail`, `clientName`, `clientSurname`, `clientContactNumber`, `clientPassword`) VALUES ('rene@outlook.com','Andrea','Cloete','0720949108','12345')";
            $run_query = mysqli_query($conn, $my_insert_query);









//db disconnection
    mysqli_close($conn);
        
//Conformation
        echo "<br>"."We are now done "."<br>";
?>

