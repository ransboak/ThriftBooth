<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    //set is_featured to zero if unchecked

    $is_featured = $is_featured == 1 ?: 0;

    //validate form data
    if (!$title) {
        $_SESSION['add-post'] = 'Enter post title';
    } elseif (!$body) {
        $_SESSION['add-post'] = 'Enter post body';
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = 'Select thumbnail';
    } else {

        //WORK ON THUMBNAIL
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
                $_SESSION['add-post'] = 'file too large';
            }
        } else {
            $_SESSION['add-post'] = 'file not supported';
        }
    }



    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-blog-post.php');
        die();
    } else {

        //set is_featured of all post to 0 if is_featured for this post is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE blog SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
        //insert post into database
        $query = "INSERT INTO blog (title, body, thumbnail, blog_author_id, is_featured) 
        VALUES ( '$title', '$body', '$thumbnail_name',  $author_id, $is_featured)";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = 'You added a new post';
            header('location: ' . ROOT_URL . 'admin/manage-blog-posts.php');
        } else {
            $_SESSION['add-post'] = 'Unable to add post please try again';
            header('location: ' . ROOT_URL . 'admin/add-blog-post.php');
        }
    }
}
