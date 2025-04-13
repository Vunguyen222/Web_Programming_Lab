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
        $username = $_SESSION['username'];
        echo "<h1>Wellcome $username, you have successfully logged in</h1>";
    ?>

    <button type="button" onclick="window.location.href = 'logout.php'">Log out</button>
</body>

</html>

