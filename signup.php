<?php
  
  echo "<div class='wrapper'>";
  require "header.php";
?>

        <main>
        <section class="section-default">
              <h1 style="font-family: Caladea; font-size: 50px;">Signup</h1>

                 <?php

                      //error message if the user makes an error trying to sign up.
                      if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyfields") {
                              echo '<p class="signuperror">Complete the form!</p>';
                            }
                            else if ($_GET["error"] == "invalidmail") {
                              echo '<p class="signuperror">Invalid e-mail!</p>';
                            }
                            else if ($_GET["error"] == "passwordcheck") {
                              echo '<p class="signuperror">Your passwords do not match!</p>';
                            }
                          }
                              // success message if the new user was created.
                              else if (isset($_GET["signup"])) {
                                if ($_GET["signup"] == "success") {
                                  echo '<p class="signupsuccess">Signup successful!</p>';
                                }
                              }
                      ?>
                        <form class="form-signup" action="includes/signup.inc.php" method="POST">
                            <fieldset style='width:900px; margin:auto;'>
                                <legend style="font-family: Caladea; font-size: 30px;">Register</legend>
                                <input type="text" name="first" placeholder="First Name"/><br>
                                <input type="text" name="last" placeholder="Last Name"/><br>
                      <?php
                            // Check e-mail.
                            if (!empty($_GET["mail"])) {
                                echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'"><br>';
                            }
                            else {
                                echo '<input type="text" name="mail" placeholder="E-mail"><br>';
                            }
                            ?>
                                <input type="password" name="pwd" placeholder="Password"/><br>
                                <input type="password" name="pwd-repeat" placeholder="Repeat password"/><br>
                                <button type="submit" name="signup-submit" style="margin-top: 15px">Sign Up</button>



       </form>
       </section>
</div>
</main>


   

<?php
  
echo "<div class='wrapper'>";
require('footer.php');
echo "</div>";
