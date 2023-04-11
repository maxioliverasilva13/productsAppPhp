<?php
    $signUpInfo = "";
    include("../includes/imports.php");

    if (isset($_POST['submit'])) {
        include("../db/connection.php");
        $user_email = $_POST['email'];
        $password = $_POST['password'];
        $user_name = $_POST['name'];

        $existsQuery = "SELECT name, password FROM users WHERE email='$user_email'";
        //$query = "INSERT INTO users (name, email, password) values ($user_name,$user_email,$password)";

        $existsResult = mysqli_query( $conn, $existsQuery );    
            
        if ($existsResult && mysqli_num_rows($existsResult) > 0) {
            $signUpInfo = "<div class='w-full my-2 bg-red-500 text-white px-4 py-2 rounded-md text-white font-medium'>Usuario ya existente</div>";
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $insertQuery = "INSERT INTO users (nombre, email, password) values ('$user_name','$user_email','$password')";
            $insertResult = mysqli_query($conn, $insertQuery);
            if ($insertResult) {
            echo "aca 1";
                $_SESSION["loggedInUser"] = $conn->insert_id;
                $signUpInfo = "<div class='w-full my-2 bg-green-400 text-white px-4 py-2 rounded-md text-white font-medium'>Usuario Registrado correctamente</div>";
            } else {
            echo "aca 2";
                $signUpInfo = "<div class='w-full my-2 bg-red-500 text-white px-4 py-2 rounded-md text-white font-medium'>Error al registrarse</div>";
            }
        }
    } 

?>
<div class="w-full h-full bg-gray-10 flex items-center justify-center">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="w-[540px] h-auto p-5 shadow-md flex flex-col items-center justify-start rounded-[16px]">
        <h1 class="font-semibold text-[28px] text-black mb-5">Sign Up</h1>
        
        <div class="w-full h-auto flex flex-col items-center justify-start gap-4">
            <?php 
                if (isset($signUpInfo)) {
                    echo $signUpInfo;
                }
            ?>

            <input type="name" name="name" class="w-full h-auto shadow-md px-3 py-2 border border-gray-200 rounded-md" placeholder="Nombre" />
            <input type="email" name="email" class="w-full h-auto shadow-md px-3 py-2 border border-gray-200 rounded-md" placeholder="Email" />
            <input type="password" name="password" class="w-full h-auto shadow-md px-3 py-2 border border-gray-200 rounded-md" placeholder="Password" />

            <input type="submit" name="submit" class="w-full h-auto py-2 bg-blue-500 rounded-lg text-white font-semibold cursor-pointer hover:bg-blue-600 transition-all" />
        
            <span class="my-2 flex flex-row items-center justify-start">
                Ya tienes cuenta? <a href="login.php" class="signup.php text-blue-500 border-b-2 border-transparent hover:border-blue-500 ml-1 cursor-pointer">Login</a>
            </span>
        </div>
    </form>
</div>


<?php 
    include("../components/footer.php")
?>