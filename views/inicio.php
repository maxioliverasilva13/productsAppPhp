<?php
    include("../includes/imports.php");
    include("../components/header.php");
    echo $userIsLogged;
    echo $_SESSION['loggedInUser'];
?>
<div class="">
    <h1>Inicio</h1>
</div>


<?php 
    include("../components/footer.php")
?>