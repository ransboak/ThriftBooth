<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM blog WHERE id=$id";
    $result = mysqli_query($connection, $query);

    //Make sure only  1 post was fetched
    if (mysqli_num_rows($result) == 1) {

        $post = mysqli_fetch_assoc($result);
        $thumbnail_name = $post['thumbnail'];
        $thumbnail_path  = '../images/' . $thumbnail_name;


        if ($thumbnail_path) {
            unlink($thumbnail_path);
            //delete post from database
            $delete_query = "DELETE FROM blog WHERE id=$id LIMIT 1";
            $delete_result = mysqli_query($connection, $delete_query);

            if (!mysqli_errno($connection)) {
                $_SESSION['delete-post-success'] = 'Post deleted Successfully';
            }
        }
    }
}
header('location: ' . ROOT_URL . 'admin/manage-blog-posts.php');
die();
