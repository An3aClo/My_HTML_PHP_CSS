<?php
   session_start();
   session_destroy();
header ("Location:HomePage.php");
 /*  if(session_destroy()) {
      header("Location: Project/HomePage.php");
   }*/
?>