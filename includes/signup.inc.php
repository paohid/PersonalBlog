<?php
//Working on signup and login
if (isset($_POST['signup-submit'])) {


  require 'dbh.inc.php';


  

        $sql = "INSERT INTO users (first, last, uidUser, emailUser, pwdUser) VALUES ('".($_POST['first'])."', '".($_POST['last'])."', '".($_POST['uid'])."',
                '".($_POST['mail'])."', '".($_POST['pwd'])."')";
        
        
         mysqli_query($conn, $sql);
         
          header("Location: ../signup.php?error=sqlerror");
          exit();
        } else {
              header("Location: ../signup.php");
             exit();
        }
    

      
    
  
  

  

