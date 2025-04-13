
<?php
    // global variable
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "shop"; 

    $description = ""; 
    $name = ""; 
    $img = [];

    // connect database
    $conn = new mysqli($servername, $username, $password, $database); 
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // query on table of database
    $sql = "SELECT id, name, description, image FROM products";
    $result = $conn->query($sql); 

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['id'] == 3){
                $description = $row['description'];
                $name = $row['name']; 
            }
            array_push($img, $row['image']);
        }
    }

    $response =  [
        'name' => $name,
        'description' => $description, 
        'img' => $img
    ];
    http_response_code(200);
    header('Content-Type: text/html');
    echo json_encode($response);

    // close connection
    $conn->close(); 
?>
