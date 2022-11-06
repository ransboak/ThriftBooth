<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $seller_id = $_SESSION['user-id'];
    $product = filter_var($_POST['product'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
    $thumbnail_2 = $_FILES['thumbnail_2'];
    $thumbnail_3 = $_FILES['thumbnail_3'];

    //set is_featured to zero if unchecked

    $is_featured = $is_featured == 1 ?: 0;

    //validate form data
    if (!$product) {
        $_SESSION['add-product'] = 'Enter products product';
    } elseif (!$price) {
        $_SESSION['add-product'] = 'Enter product price';
    } elseif (!$category_id) {
        $_SESSION['add-product'] = 'Select products category';
    } elseif (!$description) {
        $_SESSION['add-product'] = 'Enter products description';
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-product'] = 'Select thumbnail';
    } else {

        //WORK ON THUMBNAIL
        // rename thumbnail
        $time = time();
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_2_name = $time . $thumbnail_2['name'];
        $thumbnail_3_name = $time . $thumbnail_3['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_2_tmp_name = $thumbnail_2['tmp_name'];
        $thumbnail_3_tmp_name = $thumbnail_3['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;
        $thumbnail_2_destination_path = '../images/' . $thumbnail_2_name;
        $thumbnail_3_destination_path = '../images/' . $thumbnail_3_name;

        //make sure file is an image
        $allowed_files = ['jpg', 'png', 'jpeg', 'webp', 'mov', 'mkv', 'gif'];

        $extension = explode('.', $thumbnail_name);
        $extension_2 = explode('.', $thumbnail_2_name);
        $extension_3 = explode('.', $thumbnail_3_name);
        $extension = end($extension);
        $extension_2 = end($extension_2);
        $extension_3 = end($extension_3);

        if (in_array($extension, $allowed_files)) {
            if ($thumbnail['size'] < 2000000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-product'] = 'file too large';
            }
        } else {
            $_SESSION['add-product'] = 'file not supported';
        }


        if (in_array($extension_2, $allowed_files)) {
            if ($thumbnail_2['size'] < 2000000000) {
                move_uploaded_file($thumbnail_2_tmp_name, $thumbnail_2_destination_path);
            } else {
                $_SESSION['add-product'] = 'file too large';
            }
        } else {
            $_SESSION['add-product'] = 'file not supported';
        }
    }



    if (isset($_SESSION['add-product'])) {
        $_SESSION['add-product-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-product.php');
        die();
    } else {

        //set is_featured of all products to 0 if is_featured for this products is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE products SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
        //insert products into database
        $query = "INSERT INTO products (product, price, description, thumbnail, thumbnail_2, demo, category_id, seller_id, is_featured) 
        VALUES ( '$product', $price, '$description',  '$thumbnail_name', '$thumbnail_2_name', '$thumbnail_3_name', $category_id, $seller_id, $is_featured)";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['add-product-success'] = 'You added a new product';
            header('location: ' . ROOT_URL . 'admin/manage-products.php');
        } else {
            $_SESSION['add-product'] = 'Unable to add product please try again';
            header('location: ' . ROOT_URL . 'admin/manage-products.php');
        }
    }
}
