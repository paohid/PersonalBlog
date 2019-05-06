<?php
//Working on signup and login
if (isset($_POST['signup-submit'])) {

  
  require 'dbh.inc.php';


         
        $sql = "INSERT INTO users (first, last, uidUsers, emailUser, pwdUsers) VALUES ('".($_POST['firstname'])."', '".($_POST['lastname'])."', '".($_POST['username'])."',
                '".($_POST['email'])."', '".($_POST['hashedPwd'])."')";
        
        
         mysqli_query($conn, $sql);
         
          header("Location: ../signup.php?error=sqlerror");
          exit();
        } else {
              header("Location: ../signup.php");
             exit();
        }
    

      
    
  
  

  

