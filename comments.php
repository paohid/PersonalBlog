<?php

function setComments($conn) {
    if (isset($_POST['commentSubmit'])){
        $user_id = $_POST['user_id'];
        $body = $_POST['body'];
        $posted = $_POST['posted'];
        $sql = "INSERT INTO comments (user_id, posted, body) VALUES ('$user_id', '$posted', '$body')";
        $result = mysqli_query($conn, $sql);
    }
    
}

function getComments($conn) {
    $sql = "SELECT * FROM comments";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()){
        echo "<div class='comment-box'><p>";
        echo $row['user_id']."<br>";
        echo $row['posted']."<br>";
        echo nl2br($row['body']);
        echo "</p></div>";
    
    }
}

function editComments($conn) {
    if (isset($_POST['commentSubmit'])){
        $cid = $_POST['id'];
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $comment = $_POST['body'];
        
     $sql = "UPDATE comments SET body='$comment' WHERE id='$cid'";
    $result = mysqli_query($conn, $sql); 
    header("Location: posts.php");
    }
}
    function deleteComments($conn) {
    if (isset($_POST['commentDelete'])){
        $cid = $_POST['id'];
              
    $sql = "DELETE FROM comments WHERE id='$cid'";
    $result = mysqli_query($conn, $sql); 
    header("Location: posts.php");
    }
}
  

function setContact($conn)
{
    if (isset ($_POST['submit'])) {

        $sql = "INSERT INTO contact (Name, Last_Name, Email) VALUES ('" . ($_POST['FName']) . "', '" . ($_POST['LastName']) . "', '" . ($_POST['UEmail']) . "')";
        $result = mysqli_query($conn, $sql);

    }
}

function getLogin($conn) {
    if(isset($_POST['loginSubmit'])){
        $user_id = $_POST['user_id'];
        $pwd = $_POST['password'];

        $sql = "SELECT * FROM users WHERE user_id='$user_id' AND password='$pwd'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){

            if ($row = $result->fetch_assoc()){
                $_SESSION['id'] = $row['id'];
                header("Location: posts.php?loggedin");
                exit();
            }
        }else{
            header("Location: posts.php");
            exit();

        }

    }
}

function uLogout($conn) {
    if(isset($_POST['logoutSubmit'])){
        session_start();
        session_destroy();
        header("Location: posts.php?loggedout");
        exit();
    }

}








    

