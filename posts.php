<?php


    echo "<div class='wrapper'>";
    require ('header.php');
    include_once ('comments.php');
    require ('includes/dbh.php');
    date_default_timezone_set('America/New_York');
    //session_start();
   
    

?>







    
<!-- Blog entry -->
  
  
  <img src="images/huipmex.jpg" alt="Huipil" style="width:50%" class="centera"/>
    
      <h3 class="h3"><b></b>Wear a huipil</b></h3>
      <h5>Huipiles are part of our Mesoamerican heritage and an ancient gift from the ancestors<span class="w3-opacity"> September 23, 2018</span></h5>
    
   

    <p>The Huipil is a pre-Hispanic garment believed to have been developed by early Maya peoples. It is widely worn among the indigenous communities of Mexico and Guatemala. 
    Unfortunately, other Mesoamericans of both indigenous and Spanish admixture have stopped wearing Huipiles and have made it a garment to be worn on special occasion only. </p>
    <p>The Huipil is a cultural heritage that many mixed ancestry indigenous peoples have forgotten about. It is important to understand the traditional value of the Huipil and to 
    connect to the indigenous traditions so that they will not be lost. The younger generations sometimes feel ashamed to be seen wearing Huipiles. It is the job of the older 
    generations to teach them the cultural and historical value of the Huipil.</p>
    <p>As the early populations of Mesoamerica grew new hybridized cultural groups arose. This caused for different styles of Huipiles to develop amongst the distinct tribes that share 
    a single origin. As other tribes began to settle near Huipil wearing communities, they adopted the tradition such was the case of the widely known Mexicas, often called the Aztecs.</p>
    <p>Many of today's indigenous communities have modernized the Huipil so that younger people are more likely to wear them. Sadly in many cases Huipiles spend most of the year reserved 
    in a closet. The effort to continue the tradition seems sometimes useless, however, there are many young people who take pride in their roots.</p>
    <p>There are several styles of Huipiles. In the past different styles signified different social class. There are Huipiles that are unique for ceremonies or certain social events 
    such as a funeral. Our society is evolving rapidly and as in the past many traditions will be lost, it would be really sad to see such an ancient tradition extinct.</p>
    <br><b></b>
    <p>For more information follow the links below:</p>
    <a href="https://uknowledge.uky.edu/world_mexico_huipiles/">Indigenous Clothing--Huipiles </a>
    <br />
    <a href="https://samnoblemuseum.ou.edu/collections-and-research/ethnology/mayan-textiles/pitzer-collection-of-mayan-textiles/regional-variation-in-huipils/">Variation in Huipils </a>
    <!-- end of Blog-->    
     
   <br>
   <br>
   <div class="button">
     <button  type="button" onclick="alert" >Like</button>
     <br><br>
   </div>
   
   
      <div class="wrapper-main">
      <section class="section-default">


    <div>
        <section class="section-default">

            <?php
            if (!isset($_SESSION['id'])) {
                echo '<form action="includes/login.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password"><br><br>
            <button type="submit" name="login-submit">Login</button><br>
          </form>
          <a href="signup.php"><button type="button" class="button">Sign Up</a>';
            }
            else if (isset($_SESSION['id'])) {
                echo '<form action="includes/logout.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
            }
            ?>
        </section>
    </div>


    <!--comment section-->
<?php
if(isset($_SESSION['id'])) {
    echo "<form method='POST' action='" . setComments($conn) . "'>
        <input type='hidden' name='uidUsers' value='".$_SESSION['id']."'>
        <input type='hidden' name='posted' value='" . date('Y-m-d H:i:s') . "'>
        Comments: <textarea rows = '5' cols = '15' name='body'></textarea><br><br>
        <button name='commentSubmit' type='submit'>Comment</button>
        </form>";
}else {
    echo "Log in to comment!";
}
 getComments($conn);




echo "<br>";
require('footer.php');
echo "</div>";
