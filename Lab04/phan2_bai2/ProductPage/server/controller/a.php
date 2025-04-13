<?php
    include_once "../model/product.php";
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    $product = new Product(); 
    if(isset($_GET['id'])){
        echo json_encode($product->listById($_GET['id']));
    }
    else{
        echo json_encode($product->list());
    }
?>