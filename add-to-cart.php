<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $buyer_id = $_SESSION['user-id'];
    $product_query = "SELECT * FROM products WHERE id=$id";
    $product_result = mysqli_query($connection, $product_query);
    $product = mysqli_fetch_assoc($product_result);
    $product_name = $product['product'];
    $product_price = $product['price'];
    $result = mysqli_query($connection, $query);

    //insert into cart
    $insert_query = "INSERT INTO cart (product, product_price, product_id, buyer_id) VALUES ('$product_name', $product_price, '$id', '$buyer_id')";
    $insert_result = mysqli_query($connection, $insert_query);
    if (!mysqli_errno($connection)) {
        $_SESSION['add-to-cart-success'] = 'Added to cart Successfully';
    }
}
header('location: ' . ROOT_URL . 'productspage.php');
die();
