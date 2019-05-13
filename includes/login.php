<?php
/
if (isset($_POST['login-submit'])) {


    require 'dbh.inc.php';


    $mailuid = $_POST['mail'];
    $password = $_POST['pwd'];


    if (empty($mailuid) || empty($password)) {
        header("Location: ../posts.php?error=emptyfields&mailuid=".$mailuid);
        exit();
    }
    else {


        $sql = "SELECT * FROM users WHERE uidUser=? OR emailUser=?;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location: ../posts.php?error=sqlerror");
            exit();
        }
        else {


            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                $pwdCheck = password_verify($password, $row['pwdUser']);

                if ($pwdCheck == false) {

                    header("Location: ../posts.php?error=wrongpwd");
                    exit();
                }

                else if ($pwdCheck == true) {


                    session_start();

                    $_SESSION['id'] = $row['uidUser'];
                    $_SESSION['uid'] = $row['uidUser'];
                    $_SESSION['email'] = $row['emailUser'];
                    // Now the user is registered as logged in and we can now take them back to the front page! :)
                    header("Location: ../posts.php?login=success");
                    exit();
                }
            }
            else {
                header("Location: ../posts.php?login=wronguidpwd");
                exit();
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

