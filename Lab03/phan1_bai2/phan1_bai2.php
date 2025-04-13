<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function message($number){
            switch($number){
                case 0:
                    print "Hello<br>";
                    return;
                case 1: 
                    print "How are you?<br>";
                    return ;
                case 2:
                    print "I'm doing well, thank you<br>";
                    return;
                case 3: 
                    print "See you later<br>";
                    return;
                case 4: 
                    print "Good-bye<br>";
                    return; 
            }
        }

        for($a = 5; $a < 10; $a++){
            message($a%5);
        }
    ?>
</body>
</html>
