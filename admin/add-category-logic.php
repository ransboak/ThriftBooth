<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if (!$title) {
        $_SESSION['add-category'] = "please enter title";
    } elseif (!$description) {
        $_SESSION['add-category'] = "please enter description";
    }


    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        $add_category_query = "INSERT INTO categories ( title, description) VALUES ('$title', '$description')";
        $add_category_reault = mysqli_query($connection, $add_category_query);
    }


    if (mysqli_errno($connection)) {
        $_SESSION['add-category'] = 'Unable to add category';
        header('location: ' . ROOT_URL . 'admin/add-category.php');
    } else {
        $_SESSION['add-category-success'] = "Category $title added successfully";
        header('location: ' . ROOT_URL . 'admin/manage-categories.php');
    }
} else {
    header('location: ' . ROOT_URL . 'admin/add-category.php');
    die();
}
