<?php
/**
  QUESTION 1
  Step 1
  Create a simple HTML table that has 3 rows and 2 columns.
  
  Step 2
  Into the first column, enter labels for Firstname, Surname and ID Number and in the second column
  put in input fields where a user can enter their Firstname, Surname and ID Number.

  Step 3
  Create a form that will submit this information to the same page

  Step 4
  On the same page, take the submitted information and write a SQL query
  that will insert the posted information into a table called tbl_Person, that has columns
  col_firstname, col_surname, col_idnumber.

  Note: It's optional whether you want to write code that connects to a database and code
  that inserts into the database. We just want to see the SQL query, that uses the posted
  variables to insert into table person
*/
?>
<!-- SUPPLY YOUR ANSWER BELOW THIS COMMENT -->
<html>

<head>
</head>

<body>

    <form method="post" action="">

        <table>
            <tr>
                <td>
                    <label>Name: </label>
                </td>
                <td>
                    <input type="text" id="registerfname" name="registerfname" placeholder="First name">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Surname: </label>
                </td>
                <td>
                    <input type="text" id="registerlname" name="registerlname" placeholder="Last name">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Id:</label>
                </td>
                <td>
                    <input type="text" id="registerEmail" name="registerEmail" placeholder="E-mail address">
                </td>
            </tr>

        </table>


        <div class="row">
            <div class="column2">
                <center>
                    <input type="submit" value="Register" id=submit>
                </center>
            </div>

        </div>
    </form>
</body>

</html>


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

            $db_name="testphp"; 
            $my_db_select = mysqli_select_db($conn, $db_name);

// checking that database was selected
           if ($db_name){
           echo "Database has been selected"."<br>";    
				
			}else{
                echo"database not selected";
            }

        
         $sql= "INSERT INTO `tbl_person`(`col_firstname`, `col_surname`, `col_idnumber`) VALUES ('{$conn->real_escape_string($_POST['registerfname'])}','{$conn->real_escape_string($_POST['registerlname'])}','{$conn->real_escape_string($_POST['registerEmail'])}')";
        
        $insert=$conn->query($sql);
        
        if($insert){
                $message = "You are now registered. please login to access account.";
echo "<script type='text/javascript'>alert('$message');</script>";
          // header('Location: Login.php'); 
           
        }else{
        echo"oops";
        }
        
        mysqli_close($conn);
    }
    
?>
