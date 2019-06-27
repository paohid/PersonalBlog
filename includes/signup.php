<?php

if (isset($_POST['signup-submit'])) {


    require 'dbh.php';


  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];


  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invaliduidmail");
      exit();
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invaliduid&mail=".$email);
      exit();
  }

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invalidmail&uid=".$username);
      exit();
  }

  else if ($password !== $passwordRepeat) {
      header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
      exit();
  }
  else {


      $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";

      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {

          header("Location: ../signup.php?error=sqlerror");
          exit();
      }
      else {

          mysqli_stmt_bind_param($stmt, "s", $username);

          mysqli_stmt_execute($stmt);

          mysqli_stmt_store_result($stmt);

          $resultCount = mysqli_stmt_num_rows($stmt);

          mysqli_stmt_close($stmt);

          if ($resultCount > 0) {
              header("Location: ../signup.php?error=usertaken&mail=".$email);
              exit();
          }
          else {

              $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";

              $stmt = mysqli_stmt_init($conn);

              if (!mysqli_stmt_prepare($stmt, $sql)) {

                  header("Location: ../signup.php?error=sqlerror");
                  exit();
              }
              else {


                  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


                  mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);

                  mysqli_stmt_execute($stmt);

                  header("Location: ../signup.php?signup=success");
                  exit();

              }
          }
      }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {

    header("Location: ../signup.php");
    exit();
}

























/*



    $name = $_POST['first'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $email = $_POST['emailUser'];
    $password = $_POST['pwdUser'];
    $passwordRepeat = $_POST['pwd-repeat'];


    if (empty($name) || empty($last) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    }



        if (empty($name) || empty($last) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {

            header("Location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
            exit();

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {

            header("Location: ../signup.php?error=invalidmailuid");
            exit();


        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {


            header("Location: ../signup.php?error=invalidmail&uid=" .$username);
            exit();

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            header("Location: ../signup.php?error=invalidmail&uid=" .$username);
            exit();

        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {


            header("Location: ../signup.php?error=invalidmail&uid=" .$email);
            exit();

        } elseif ($password !== $passwordRepeat) {

            header("Location: ../signup.php?error=passwordcheckuid=" .$username . "&mail=" .$email);
            exit();

        } else {
            $sql = 'SELECT username FROM users WHERE username=?';
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location: ../signup.php?error=sqlerror");
                exit();

            } else {

                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);

                if ($resultCheck > 0) {

                    header("Location: ../signup.php?error=usernametaken&mail=" .$email);
                    exit();

                } else {

                    $sql = 'INSERT INTO users (first, last, username, emailUser, pwdUser) VALUES ("'.$_POST["first"].'", "'.$_POST["last"].'", "'.$_POST["username"].'", 
                     "'.$_POST["emailUser"].'". "'.$_POST["pwdUser"].'")';
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {

                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    } else {

                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "ssssss", $name, $last, $username, $email, $hashedPassword);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit();


                        }

                    }
                }

            }
            myqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        else{
            header("Location: ../signup.php");
            exit();





}
*/