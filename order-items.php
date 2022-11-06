<?php
require 'config/database.php';

if (isset($_SESSION['user-id'])) {
    $buyer_id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $product_query = "SELECT * FROM cart WHERE buyer_id = $buyer_id ";
    $product_result = mysqli_query($connection, $product_query);
    $product = mysqli_fetch_assoc($product_result);
    $product_id = $product['product_id'];
    $product_name = $product['product'];
    $product_price = $product['product_price'];


    //insert into orders
    $insert_query = "INSERT INTO orders (product_name, product_id_, buyer, product_price) VALUES ('$product_name', $product_id, $buyer_id, $product_price)";
    $insert_result = mysqli_query($connection, $insert_query);

    $delete_query = "DELETE FROM cart WHERE buyer_id = $buyer_id";
    $delete_result = mysqli_query($connection, $delete_query);

    if (!mysqli_errno($connection)) {
        $_SESSION['order-success'] = 'Order Placed Successfully';
        header('location: ' . ROOT_URL . 'cart.php');
    } else {
        header('location: ' . ROOT_URL . 'cart.php');
    }
}
