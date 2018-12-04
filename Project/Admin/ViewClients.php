<html>


<head>

    <title>JB Express Home</title>

    <link rel="icon" type="image/png" href="Images/12540@2x.png">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<link rel="stylesheet" href=MyStyle.css>

<body>


    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:100px;margin-top:0px !important;">JB Express</h1>
            <center>
                <table class="myTable">
                    <tr>
                        <td>
                            <p><b>ADMIN</b></p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="tab">
        <a href=AdminHome.php><button  >Home</button></a>
        
        <a href=ViewMessages.php><button >Messages</button></a>
        <a href=ViewClients.php> <button style=" background-color: #152b37; color: white;" class=activeBut >Clients</button></a>
         <a href=viewBookings.php><button>View Bookings</button></a>
        <a href=ManageBookings.php> <button >Manage Bookings</button></a>
        <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
    </div>

    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>CLIENTS</b></h2>
            </center>

            <fieldset>
                <legend align=center>This is all the regestered clients</legend>

                <div class="MyText">
                  <?php
                    
                    $servername = "localhost";
                    $username = "root";
                    $password = "";

                    $conn = new mysqli($servername, $username, $password);

                    $db_name="jbexpress"; 
                    $my_db_select = mysqli_select_db($conn, $db_name);

                     session_start();
                        //   $myusername1= $_SESSION['Email'] ;
                          // $id=$_SESSION['Id'];

                         
 $getMe="SELECT * FROM `clients`";
                    
    $select=$conn->query($getMe); 

          if ($select){
              while($sqlRow=mysqli_fetch_array($select,MYSQLI_ASSOC)){
                                $cEmail=$sqlRow['clientEmail'];
                                $cName=$sqlRow['clientName'];
                                $cSurname=$sqlRow['clientSurname'];  
                                $cNum=$sqlRow['clientContactNumber'];
                                $cTime=$sqlRow['timeRegistered'];
                  
                                                    
                    echo "<table class=myText>";
                  echo"<tr>";
                           echo"<td>";
                                echo"<b><u>Clients</u></b>";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td></td>";
                            echo"<td></td>";
                          echo"<td></td>";
                        echo"</tr>";
                          
                        echo"<tr>";
                           echo"<td>";
                                echo"Client Email ";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$cEmail."</td>";
                        echo"</tr>";            
                      echo"<tr>";
                           echo"<td>";
                                echo"Client Name";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$cName." ".$cSurname."</td>";
                        echo"</tr>";
                     echo"<tr>";
                           echo"<td>";
                                echo"Client contact number";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$cNum."</td>";
                        echo"</tr>";                         
                            
                           echo"<td>";
                                echo"Registration date";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$cTime."</td>";
                        echo"</tr>";
                      echo"<tr>";
                  
                    echo"</table>";}
                      
                  }else{
                      echo"<br>"."query not executed";
                  }
      
               
                 mysqli_close($conn);
                    ?>

                       </div>
            </fieldset>

         
        </div>

    </div>
    <script>
        function mytest() {
            window.alert("You are about to exit to the home page of JB Express Couriers. To access your account again login is required");
        }

    </script>


</body>

</html>
