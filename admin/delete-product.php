<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connection, $query);

    //Make sure only  1 product was fetched
    if (mysqli_num_rows($result) == 1) {

        $product = mysqli_fetch_assoc($result);
        $thumbnail_name = $product['thumbnail'];
        $thumbnail_2_name = $product['thumbnail_2'];
        $thumbnail_path  = '../images/' . $thumbnail_name;
        $thumbnail_2_path  = '../images/' . $thumbnail_2_name;


        if ($thumbnail_path || $thumbnail_2_path) {
            unlink($thumbnail_path);
            unlink($thumbnail_2_path);

            //delete product from database
            $delete_query = "DELETE FROM products WHERE id=$id LIMIT 1";
            $delete_result = mysqli_query($connection, $delete_query);

            if (!mysqli_errno($connection)) {
                $_SESSION['delete-product-success'] = 'product deleted Successfully';
            }
        }
    }
}
header('location: ' . ROOT_URL . 'admin/manage-products.php');
die();
