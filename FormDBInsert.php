<html><head></head><body>
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

            $db_name="a"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

// checking that database was selected
            if ($db_name){
           echo "Database has been selected"."<br>";    
				
			}else{
                echo"database not selected";
            }
    
    $sql="INSERT INTO `tabel`(`name`, `number`) VALUES ('{$conn->real_escape_string($_POST['name'])}','{$conn->real_escape_string($_POST['number1'])}')";
        
        $insert=$conn->query($sql);
        
        if($insert){
            echo "Sucess";
        }else{
            die("error: {$conn->errno}:{$conn->error}");
        }
        
        mysqli_close($conn);
    }
    
?>
    <form method="post" action="">
    <input type="text" name=name>
        <input type="text" name=number1>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>