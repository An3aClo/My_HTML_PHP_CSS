<?php
// above is opening tag for php

echo "Hello from php";
echo "loading...";

$username="root";
$password="";
$servername="localhost";
//connection
$myconnect = mysqli_connect($servername, $username,$password);
//echo mysqli_error($myconnect);
// below is checking if connection was successful
if ($myconnect)
echo "You are connected";

if(!$myconnect)
die("This went wrong:  ".mysqli_error());

// selecting the database 
 $db_name="frontendtest"; 
$my_db_select = mysqli_select_db($myconnect, $db_name);

// checking that database was selected
if ($db_name)
echo "database selected"."<br>";

// create  query
$my_insert_query="INSERT INTO `itemsTable` (`number`, `Name`, `cost`)VALUES(2, 'Clock', 5)";

$run_query = mysqli_query($myconnect, $my_insert_query);

//echo mysqqli_error($run_query);

//display tabel content
echo"<br>"."========display data====="."<br>";
$my_select_query="Select*from `itemsTable`";
$select_result=mysqli_query($myconnect,$my_select_query);

while($sqlRow=mysqli_fetch_array($select_result,MYSQLI_ASSOC)){
    $number=$sqlRow['number'];
    $name=$sqlRow['name'];
    $cost=$sqlRow['cost'];  
    echo $number ."\t".$name."\t".$cost."<br>";
}

mysqli_close($myconnect);
echo "... done "."<br>";


// below is closing tag for php
 ?>
