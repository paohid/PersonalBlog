<?php

$conn = mysqli_connect("localhost", "root", "", "happy_blog");

if(!$conn) {
    die("connection failed: ".mysqli_connect_error());
}
