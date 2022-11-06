<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM cart WHERE id=$id";
    $result = mysqli_query($connection, $query);

    //Make sure only  1 product was fetched
    if (mysqli_num_rows($result) == 1) {

        $product = mysqli_fetch_assoc($result);



        //delete product from database
        $delete_query = "DELETE FROM cart WHERE id=$id LIMIT 1";
        $delete_result = mysqli_query($connection, $delete_query);

        if (!mysqli_errno($connection)) {
            $_SESSION['delete-product-success'] = 'product deleted Successfully';
        }
    }
}

header('location: ' . ROOT_URL . 'cart.php');
die();
