<?php

include("includes/imports.php");

if ($userIsLogged) {
    header("Location: views/inicio.php");
} else {
    header("Location: views/login.php");
}

?>
