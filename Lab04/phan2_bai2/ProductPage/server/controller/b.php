<?php
    include_once "../model/product.php";
    // header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $product = new Product(); 
    $data = json_decode(file_get_contents("php://input"));
    echo json_encode($product->add($data));
?>