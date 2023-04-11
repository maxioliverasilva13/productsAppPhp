<?php 

$BD = "tienda";
$HOST = "localhost";
$USER = "root";
$PASS = "root";

$conn = mysqli_connect( $HOST, $USER, $PASS, $BD );


if( !$conn ) {
    die( "Connection failed: " . mysqli_connect_error() );
}

?>