<?php 
include("../includes/imports.php");

$_SESSION["loggedInUser"] = "nodef";
header( "Location: login.php" );
?>