<?php
session_start();
include ('db_connect2.php');
require "includes/dbh.inc.php";
include ('comments.php');
error_reporting(E_ALL);
ini_set('display_errors', 1); 

$id = isset ($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; 

if (isset($_SESSION['user_id']))
{

   echo "Welcome " . $id; 

}
if(isset($_COOKIE['emailUsers'])){
$mailuid = $_COOKIE['emailUsers'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UFT-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Personal Blog</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <a href="contact.php"></a>

<!-- Header -->

<header class="w3-container w3-center w3-padding-32">
    
<!--div  class="wrapper-2"-->
  <h1 class="happy"><b>The Happy Blog</b></b></h1>
  <p>Welcome to <span class="w3-tag">Paola's Blog</span></p>
</header>

<!-- Navegation bar-->
<menu>
<div class="w3">
  <div class="w3-bar w3-white  w3-padding w3-card">
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button">Home</a>
      <a href="posts.php" class="w3-bar-item w3-button">Posts</a>
      <a href="contact.php" class="w3-bar-item w3-button">Say hi!</a>
      <a href="signup.php" class="w3-bar-item w3-button">Sign Up</a>
      <br /><br /><b></b><b><b></b></b>
    </div>
  </div>
  </div>
</menu>


 
       



