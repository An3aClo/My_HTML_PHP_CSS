<?php
    
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
    /*if($connection){
    echo "now connected";
    }*/
    

$select_db = mysqli_select_db($connection, 'jbexpress');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
    //Start the Session
   /* if($select_db){
        echo"db selected";
    }*/
    ?>
