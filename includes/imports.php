<?php 

session_start();
$userInfo = null;

if (!isset($_SESSION['loggedInUser'])) {
    $_SESSION['loggedInUser'] = "nodef";
}
$userIsLogged = isset($_SESSION['loggedInUser']) && $_SESSION['loggedInUser'] != "nodef";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles/globalStyles.css" />
    <script src="https://kit.fontawesome.com/d2851d0514.js" crossorigin="anonymous"></script>
    <title>Tienda</title>
</head>
<body>


