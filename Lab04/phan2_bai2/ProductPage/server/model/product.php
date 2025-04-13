<?php
    include_once "../config.php";
    header('Content-Type: application/json; charset=utf-8');
    
    class Product{
        function listById($id){
            global $conn; 
            $sql = "SELECT * FROM products WHERE id=$id";
            $arr = []; 
            $result = $conn -> query($sql); 
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $arr[] = $row; 
                }
                $arr["status"] = "200";
                http_response_code(200);
            }
            else{
                http_response_code(202);
                $arr["status"] = "202";
            }
            return $arr; 
        }

        function list(){
            global $conn; 
            $sql = "SELECT * FROM products";
            $arr = []; 
            $result = $conn -> query($sql); 
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $product = $row;
                    $arr[] = $product; 
                }
                $arr["status"] = "200";
                http_response_code(200);
            }   
            else{
                http_response_code(202);
                $arr["status"] = "202";
            } 
            return $arr; 
        }

        function add($data){
            global $conn; 
            $id = $data -> id; 
            $name = $data -> name; 
            $description = $data -> description; 
            $price = $data -> price; 
            $img = $data -> url;
            
            $sql = "INSERT INTO products (id, name, description, price, image) VALUES ($id, '$name', '$description', $price, '$img')";
            if($conn -> query($sql)){
                $arr["status"] = "200";
                http_response_code(200);
            }
            else{
                http_response_code(202);
                $arr["status"] = "202";
            }
            return $arr; 
        }

        function delete($id){
            global $conn; 
            $sql = "DELETE FROM products WHERE id=$id";
            $arr = []; 
            if($conn->query($sql)){
                http_response_code(200);
                $arr["status"] = "200";
            }
            else{
                http_response_code(202);
                $arr["status"] = "202";
            }
            return $arr;
        }


        function update($data){
            global $conn; 
            $id = $data -> id; 
            $name = $data -> name; 
            $description = $data -> description; 
            $price = $data -> price; 
            $img = $data -> url;
            $arr = []; 

            $sql = "UPDATE products SET name='$name', description='$description', price=$price, image='$img' WHERE id=$id";
            if($conn->query($sql)){
                http_response_code(200);
                $arr["status"] = "200";
            }
            else{
                http_response_code(202);
                $arr["status"] = "202";
            }
            return $arr; 
        }
    }
?>