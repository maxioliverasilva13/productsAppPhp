<?php
    include("../includes/imports.php");
    if (isset($_SESSION) && $_SESSION['loggedInUser'] !== NULL && $_SESSION['loggedInUser'] !== "nodef") {
        header( "Location: inicio.php" );
    }
    $loginError = "";

    if (isset($_POST['submit'])) {
        include("../db/connection.php");
        $user_email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT id, nombre, password, email FROM users WHERE email='$user_email'";
        $result = mysqli_query( $conn, $query );       
        if ($result && mysqli_num_rows($result) > 0) {
            while( $row = mysqli_fetch_assoc($result) ) {
                $name       = $row['nombre'];
                $hashedPass = $row['password'];
                $email = $row['email'];
                $uid       = $row['id'];
            }

            // Verifica la pass pasada por la hasheada en la base
            if( password_verify( $password, $hashedPass ) ) {
                // Datos correctos!
                // Guardo en la Sesión
                $_SESSION['loggedInUser'] = $uid;
                // redirijo a página de cliente
                header( "Location: inicio.php" );
            } else { // hashed password didn't verify
                // error
                $loginError = "<div class='w-full my-2 bg-red-500 text-white px-4 py-2 rounded-md text-white font-medium'>Usuario o Password incorrecto. Intente de nuevo.</div>";
            }
        } else {
            $loginError = "<div class='w-full my-2 bg-red-500 text-white px-4 py-2 rounded-md text-white font-medium'>Usuario o Password incorrecto. Intente de nuevo.</div>";
        }


        echo "Enviado";
    } 

?>
<div class="w-full h-full bg-gray-10 flex items-center justify-center">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="w-[540px] h-auto p-5 shadow-md flex flex-col items-center justify-start rounded-[16px]">
        <h1 class="font-semibold text-[28px] text-black mb-5">Login</h1>
        
        <div class="w-full h-auto flex flex-col items-center justify-start gap-4">
            <?php 
                if (isset($loginError)) {
                    echo $loginError;
                }
            ?>

            <input type="email" name="email" class="w-full h-auto shadow-md px-3 py-2 border border-gray-200 rounded-md" placeholder="Email" />
            <input type="password" name="password" class="w-full h-auto shadow-md px-3 py-2 border border-gray-200 rounded-md" placeholder="Password" />

            <input type="submit" name="submit" class="w-full h-auto py-2 bg-blue-500 rounded-lg text-white font-semibold cursor-pointer hover:bg-blue-600 transition-all" />

            <span class="my-2 flex flex-row items-center justify-start">
                No tienes cuenta? <a href="signup.php" class="signup.php text-blue-500 border-b-2 border-transparent hover:border-blue-500 ml-1 cursor-pointer">Sign Up</a>
            </span>
        </div>
    </form>
</div>


<?php 
    include("../components/footer.php")
?>