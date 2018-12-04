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
            $my_insert_query="INSERT INTO `itemsTable` (`number`, `Name`, `cost`)VALUES(2, 'Clock', 5)";
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
        

        
//Closing connection
            mysqli_close($myconnect);
        
//Conformation
        echo "<br>"."We are now done "."<br>";

   ?>