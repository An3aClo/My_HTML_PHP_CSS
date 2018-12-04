<?php 

$server="localhost";
$username="root";
$password="pass";

$connection=mysqli_connect($server,$username,$password); 
 
if($connection){
    echo "Connected";
}

$query="SELECT * FROM `itemstable`";
$result= mysqli_query($query);


?>