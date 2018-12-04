<?php
   session_start();
session_destroy();
   header("Location: http://localhost/Project/HomePage.php");
  /* if(session_destroy()) {
      header("Location: HomePage.php");
   }*/
?>