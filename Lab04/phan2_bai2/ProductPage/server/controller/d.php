<?php
    include_once "../model/product.php";
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $product = new Product(); 
    $id = $_GET['id']; 
    echo json_encode($product->delete($id));
?>