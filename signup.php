<?php
  
  echo "<div class='wrapper'>";
  require "header.php";
?>

        <main>
        <section class="section-default">
            <fieldset style='width:900px; margin:auto;'>
            <legend><h1 style="font-family: Caladea; font-size: 40px;">Signup</h1></legend>

                 <?php

                 if (isset($_GET["error"])) {
                     if ($_GET["error"] == "emptyfields") {
                         echo '<p class="signuperror">Fill in all fields!</p>';
                     }
                     else if ($_GET["error"] == "invaliduidmail") {
                         echo '<p class="signuperror">Invalid username and e-mail!</p>';
                     }
                     else if ($_GET["error"] == "invaliduid") {
                         echo '<p class="signuperror">Invalid username!</p>';
                     }
                     else if ($_GET["error"] == "invalidmail") {
                         echo '<p class="signuperror">Invalid e-mail!</p>';
                     }
                     else if ($_GET["error"] == "passwordcheck") {
                         echo '<p class="signuperror">Your passwords do not match!</p>';
                     }
                     else if ($_GET["error"] == "usertaken") {
                         echo '<p class="signuperror">Username is already taken!</p>';
                     }
                 }

                 else if (isset($_GET["signup"])) {
                     if ($_GET["signup"] == "success") {
                         echo '<p class="signupsuccess">Signup successful!</p>';
                     }
                 }
                 ?>
            <form class="form-signup" action="includes/signup.php" method="post">
                <?php

                if (!empty($_GET["uid"])) {
                    echo '<input type="text" name="uid" placeholder="Username" value="'.$_GET["uid"].'">';
                }
                else {
                    echo '<input type="text" name="uid" placeholder="Username"><br>';
                }


                if (!empty($_GET["mail"])) {
                    echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
                }
                else {
                    echo '<input type="text" name="mail" placeholder="E-mail"><br>';
                }
                ?>

                <input type="password" name="pwd" placeholder="Password"><br>
                <input type="password" name="pwd-repeat" placeholder="Repeat password"><br>
                <button type="submit" name="signup-submit" style="margin-top: 15px">Signup</button>

</form>
       </section>
</div>
</main>


   

<?php
  
echo "<div class='wrapper'>";
require('footer.php');
echo "</div>";
