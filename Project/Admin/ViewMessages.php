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
        
        <a href=ViewMessages.php><button style=" background-color: #152b37; color: white;" class=activeBut>Messages</button></a>
        <a href=ViewClients.php> <button >Clients</button></a>
         <a href=viewBookings.php><button>View Bookings</button></a>
        <a href=ManageBookings.php> <button >Manage Bookings</button></a>
        <a href=logout.php> <button  id=logout onclick="mytest()">Log Out</button></a>
    </div>

    <div class=m>
        <div class="myPadding">
            <center>
                <h2 class=title><b>CLIENT MESSAGES</b></h2>
            </center>

            <fieldset>
                <legend align=center>This is all the messages recevied from clients</legend>

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

                         
 $getMe="SELECT `idmessage`, `messagerName`, `messangerSurnme`, `messangerNumber`, `message`, `messageEmail`, `timeSend` FROM `message` ORDER BY `timeSend` DESC";
    $select=$conn->query($getMe); 

          if ($select){
              while($sqlRow=mysqli_fetch_array($select,MYSQLI_ASSOC)){
                                $msgId=$sqlRow['idmessage'];
                                $msgName=$sqlRow['messagerName'];
                                $msgNum=$sqlRow['messangerNumber'];  
                                $msgSurname=$sqlRow['messangerSurnme'];
                                $msg=$sqlRow['message'];
                                $msgEmail=$sqlRow['messageEmail'];
                                $dmsgTime=$sqlRow['timeSend'];  
                             echo "<div style=color:red> ";                             
                    echo "<table class=myText>";
                  echo"<tr>";
                           echo"<td>";
                                echo"<b><u>Messages</u></b>";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td></td>";
                            echo"<td></td>";
                          echo"<td></td>";
                        echo"</tr>";
                          
                        echo"<tr>";
                           echo"<td>";
                                echo"From ";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$msgName." ". $msgSurname."</td>";
                        echo"</tr>";            
                      echo"<tr>";
                           echo"<td>";
                                echo"Email address";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$msgEmail."</td>";
                        echo"</tr>";
                     echo"<tr>";
                           echo"<td>";
                                echo"Time send";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$dmsgTime."</td>";
                        echo"</tr>";
                          
                                echo"<tr>";
                           echo"<td>";
                                echo"";
                            echo"</td>";
                           echo"<td> </td>";
                            echo"<td> </td>";
                            echo"<td> </td>";
                          echo"<td> </td>";
                        echo"</tr>";
                      echo"<tr>";
                           echo"<td>";
                                echo"Message";
                            echo"</td>";
                           echo"<td></td>";
                            echo"<td>:</td>";
                            echo"<td></td>";
                          echo"<td>".$msg."</td>";
                        echo"</tr>";
                      echo"<tr>";
                  echo "</div>";
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
