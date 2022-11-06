<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);



    $delete_query = "DELETE FROM categories where id=$id";
    $delete_result = mysqli_query($connection, $delete_query);

    if (!mysqli_errno($connection)) {
        $_SESSION['delete-category-success'] = "{$category['title']} deleted successfully";
    } else {
        $_SESSION['delete-category'] = "Couldn't delete {$category['title']}";
    }
}
header('location: ' . ROOT_URL . 'admin/manage-categories.php');
