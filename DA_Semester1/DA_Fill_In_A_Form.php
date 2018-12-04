    <?php
        
        echo "hello from php"."<br>";
//Devine variables
        $username="root";
        $password="";
        $servername="localhost";
        
//connection
        $myconnect = mysqli_connect($servername, $username,$password);
        

// below is checking if connection was successful
        if ($myconnect)
            echo "You are connected"."<br>";
        if(!$myconnect)
            die("This went wrong:  ".mysqli_error());

// selecting the database 
            $db_name="frontendtest"; 
            $my_db_select = mysqli_select_db($myconnect, $db_name);

// checking that database was selected
            if ($db_name){
            echo "Database has been selected"."<br>";          
            }

// create  query
        //insert statement
            $my_insert_query="INSERT INTO `itemsTable` (`number`, `Name`, `cost`)VALUES(2, 'Handbag', 5)";
            $run_query = mysqli_query($myconnect, $my_insert_query);

//echo mysqqli_error($run_query);

//display tabel content
            echo"<br>"."========display data====="."<br>";
        //Select statement
            $my_select_query="Select*from `itemsTable`";
            $select_result=mysqli_query($myconnect,$my_select_query);

            while($sqlRow=mysqli_fetch_array($select_result,MYSQLI_ASSOC)){
                $number=$sqlRow['number'];
                $name=$sqlRow['name'];
                $cost=$sqlRow['cost'];  
                echo $number ."\t".$name."\t".$cost."<br>";
            }
        
/*add a user(insert query)        
        $addUser="INSERT INTO `customer`(`CustomerUserName`, `CustomerPassword`) VALUES ('Zeldene','99999');";
        $run_query = mysqli_query($myconnect, $addUser);

//Display users

        echo"<br>"."========display Users====="."<br>";
        //Select statement
            $my_select_query="Select*from `itemsTable`";
            $select_result=mysqli_query($myconnect,$my_select_query);

            while($sqlRow=mysqli_fetch_array($select_result,MYSQLI_ASSOC)){
                $number=$sqlRow['number'];
                $name=$sqlRow['name'];
                $cost=$sqlRow['cost'];  
                echo $number ."\t".$name."\t".$cost."<br>";
            }
*/

//enter into db

$enteredusername=$_POST['CustomerUserName'];
$enteredpassword=$_POST['CustomerPassword'];

if(empty($enteredusername)||empty($enteredpassword)){
    echo"the fields are empty";
}

if(!empty($enteredusername)||!empty($enteredpassword)){
   $addUserQuery="INSERT INTO customer(CustomerUserName, CustomerPassword) Values ('".$enteredusername."','".$enteredpassword."');";
}
   
   if($_POST['register']){
    $run_query_reqister=mysqli_query($myconnect,$addUserQuery);
}
   
   if($run_query_reqister){
    echo"You are now registered"."<br>";
    
}else{
    echo"Registration failed"."<br>";
    
}
//Closing connection
            mysqli_close($myconnect);
        
//Conformation
        echo "<br>"."We are now done "."<br>";

    ?>  
<html>
    <head>
    <title>My php login </title>
    </head>
    
    <body>
        <h1>Fill in the form</h1>
    <form method="post" action="hello.php">
        
        <table>
            
        <tr>
            <td>Enter Username</td>
            
            <td><input type="text" name="	CustomerUserName"></td>
        </tr>
            
            <br>
            
        <tr>
            <td> Enter Password</td>
            <td><input type="password" name="CustomerPassword"></td>
        </tr>
            
        <tr>
            <td>
                <input type="submit" name="register "value="Register">
                <input type="submit" name="logging" value="Login">
            </td>
        </tr>
        
        </table>
        
    </form>
    </body>
</html>