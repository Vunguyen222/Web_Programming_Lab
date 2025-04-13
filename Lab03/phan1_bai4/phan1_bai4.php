<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style="border: 2px solid black; width: 400px">
        <?php
        for($i = 1; $i <= 7; $i++){
            $sum = 0; 
            print "<tr>";
            for($j = 0; $j < 7; $j ++){
                $sum += $i; 
                echo "<td style='border: 1px solid black'>".$sum."</td>"; 
            }
            print "</tr>";
        }
        ?>
    </table>

</body>
</html>
