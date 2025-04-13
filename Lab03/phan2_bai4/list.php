<?php
    // global variable  
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "shop"; 

    $arr = array(array());
    // init data for array 
    for($i = 0; $i < 3; $i++){
        for($j = 0; $j < 2; $j++){
            $arr[$i][$j] = "";
        }
    }


    // connect database
    $conn = new mysqli($servername, $username, $password, $database); 

    if($conn -> connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // query database
    $sql = "SELECT price, image FROM products"; 
    $result = $conn->query($sql); 

    if($result->num_rows > 0){
        $x = 0; 
        while($row = $result->fetch_assoc()){
            $arr[$x][0] = $row['price'];
            $arr[$x][1] = $row['image'];
            $x++; 
        }
    }

    http_response_code(200);
    header('Content-Type: text/html');
    echo json_encode($arr);

    // close connection
    $conn -> close(); 
?>


