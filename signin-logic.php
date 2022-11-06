<?php
require 'config/database.php';
if (isset($_POST['submit'])) {
    $Username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$Username_email) {
        $_SESSION['signin'] = 'Please enter username or email';
    } elseif (!$password) {
        $_SESSION['signin'] = 'Please enter password';
    } else {
        //fetch data from database
        $fetch_user_query = "SELECT * FROM users WHERE username = '$Username_email' OR email = '$Username_email' ";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);


        if (mysqli_num_rows($fetch_user_result) == 1) {
            //convert record into an associative array
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];

            //compare form password with database password
            if (password_verify($password, $db_password)) {
                $_SESSION['user-id'] = $user_record['id'];
                //set session if user is an admin
                if ($user_record['is_admin'] == 1) {
                    $_SESSION['user_is_admin'] = true;
                }
                //log user in
                header('location: ' . ROOT_URL);
            } else {
                $_SESSION['signin'] = 'Please check your input';
            }
        } else {
            $_SESSION['signin'] = 'user not found';
        }
    }
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
    }
} else {
    header("location: " . ROOT_URL . 'signin.php');
    die();
}
