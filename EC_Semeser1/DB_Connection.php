<?php 

$username="root";
$password="";
$servername="localhost";
$db="testingphp";
//connection
$con = mysqli_connect($servername, $username,$password,$db); //connection
 
if($con){
    echo "Connected";
}else{echo "somethinnh went wrong";}

$query="SELECT * FROM `item`;";
$result= mysqli_query($con, $query);

echo mysqli_num_rows($result)."<br>";//return number of rowns

//check if there are content withn
if(mysqli_num_rows ($result)>0){
while($row= mysqli_fetch_assoc($result)){
    
    
    echo $row['number']."   ".$row['Name']." ". $row['Cost']."<br>";
}
}

?>