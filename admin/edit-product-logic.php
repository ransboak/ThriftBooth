<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $product = filter_var($_POST['product'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];


    //set is_featured to zero if unchecked
    $is_featured = $is_featured == 1 ?: 0;

    //check and validate input
    if (!$product) {
        $_SESSION['edit-product'] = "Couldn't update productname. Invalid form data on edit product page.";
    } elseif (!$price) {
        $_SESSION['edit-product'] = "Couldn't update price. Invalid form data on edit product page.";
    } elseif (!$category_id) {
        $_SESSION['edit-product'] = "Couldn't update category. Invalid form data on edit product page.";
    } elseif (!$description) {
        $_SESSION['edit-product'] = "Couldn't update description. Invalid form data on edit product page.";
    } else {
        //delete existing thumbnail if new thumbnail is available

        if ($thumbnail['name']) {
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if ($previous_thumbnail_path) {
                unlink($previous_thumbnail_path);
            }


            //WORK ON NEW THUMBNAIL
            // rename thumbnail
            $time = time();
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;

            //make sure file is an image
            $allowed_files = ['jpg', 'png', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);

            if (in_array($extension, $allowed_files)) {
                if ($thumbnail['size'] < 2000000) {
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                } else {
                    $_SESSION['edit-product'] = 'file too large';
                }
            } else {
                $_SESSION['edit-product'] = 'file not supported';
            }
        }
    }


    if ($_SESSION['edit-product']) {
        //redirect to manage products page if problem is invalid
        header('location: ' . ROOT_URL . 'admin/manage-products.php');
        die();
    } else {
        //set is_featured to zero if is_featured for this post is 1
        if ($is_featured) {
            $zero_all_is_feature_query = "UPDATE products SET is_featured=0";
            $zero_all_is_feature_result = mysqli_query($connection, $zero_all_is_feature_query);
        }

        //set thumbnail if a new one was uploaded else keep old thumbnail
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        $query = "UPDATE products SET product = '$product', price=$price, description='$description' ,thumbnail='$thumbnail_to_insert',  
        category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1 ";
        $result = mysqli_query($connection, $query);
    }
    if (!mysqli_errno($connection)) {
        $_SESSION['edit-product-success'] = 'Product updated successfully';
        header('location: ' . ROOT_URL . 'admin/manage-products.php');
    } else {
        $_SESSION['edit-product'] = 'Failed to update product';
    }
}
header('location: ' . ROOT_URL . 'admin/index.php');
die();
