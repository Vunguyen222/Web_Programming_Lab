
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- end here -->

    <title>Sign in</title>
</head>
<body>
    <?php
        $username = "quangvu";
        $password = "quangvu08082003";
        $error = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $Login_username = $_POST['username'];
            $Login_password = $_POST['password'];


            if($Login_username != $username || $Login_password != $password){
                $error = "Wrong user name or password !!";
                if(!isset($_POST['remember'])){
                    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                        // delete cookie if username and password existing
                        unset($_COOKIE['username']);
                        unset($_COOKIE['password']);
                        setcookie('username', '', time() - 3600); // empty value and old timestamp
                        setcookie('password', '', time() - 3600); // empty value and old timestamp
                    }
                }   
            }
            else{
                if(isset($_POST['remember'])){
                    echo "set remember";
                    if(!isset($_COOKIE['username']) && !isset($_COOKIE['password'])){
                        setcookie("username", $username, time() + (60*60*2));
                        setcookie("password", $password, time() + (60*60*2));
                    }
                }
                else{
                    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                        // delete cookie if username and password existing
                        unset($_COOKIE['username']);
                        unset($_COOKIE['password']);
                        setcookie('username', '', time() - 3600); // empty value and old timestamp
                        setcookie('password', '', time() - 3600); // empty value and old timestamp
                    }
                }
                session_start();
                $_SESSION['username'] = $username; 
                header("Location: info.php");
            }
        }
    ?>

    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        <div class="my-3 text-danger"><?php echo $error?></div>
        </form>
    </div>

    <?php
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
            $Login_username = $_COOKIE['username'];
            $Login_password = $_COOKIE['password'];
            echo "<script>
                document.getElementById('username').value = '$Login_username';
                document.getElementById('password').value = '$Login_password';
                document.getElementById('remember').checked = true;
            </script>";
        }
    ?>
</body>
</html>