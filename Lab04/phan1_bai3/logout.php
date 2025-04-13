<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    button{
        background-color : 	#0080ff ;
        border : 0px; 
        border-radius : 15px;
        height : 50px; 
        width : 100px;
        box-sizing : border-box;
        color: white;
        cursor: pointer; 
        font-size: 20px;
    }

    button:hover{
        background-color : #0040ff;
    }


</style>
<body>
    <?php
        session_start(); 
        echo "<h1>Are you sure to log out ??</h1>";
        if(isset($_POST['logout'])){
            session_destroy();
            header("Location: login.php");
            exit;
        }
    ?>

    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <button type="button" onclick="window.location.href = 'info.php'">Cancel</button>
        <button type="submit" name="logout">Log out</button>
    </form>
</body>

</html>

