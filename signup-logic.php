<?php
require 'config/database.php';

//get signup form data if signup button was clicked

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $contact_info = filter_var($_POST['contact_info'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    //validate input
    if (!$firstname) {
        $_SESSION['signup'] = "Please enter your first name";
    } elseif (!$lastname) {
        $_SESSION['signup'] = "Please enter your Last name";
    } elseif (!$username) {
        $_SESSION['signup'] = "Please enter your Username";
    } elseif (!$email) {
        $_SESSION['signup'] = "Please enter a valid email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "password should be 8+ characters";
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "Please add avatar";
    } else {
        //check if passwords do not match
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = 'passwords do not match';
        } else {
            //hash passwords
            $hashed_password = password_hash(
                $createpassword,
                PASSWORD_DEFAULT
            );
            //check if username or email already exists in the database

            $user_check_query = "SELECT * FROM users WHERE username = '$username'  OR email ='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            //if there are any rows
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = 'Username or email already exists';
            } else {
                //WORK ON  AVATAR
                //rename avatar
                $time = time(); //make each image name unique using timestamp
                $avatar_name = $time . $avatar['name']; // append current time name to image
                $avatar_tmp_name = $avatar['tmp_name']; //get avatar tmp name for upload
                $avatar_destination_path = 'images/' . $avatar_name; //destination of upload

                //make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
                //check if extension is an allowed extension
                if (in_array($extension, $allowed_files)) {
                    //make sure image is not to large (1mb+)
                    if ($avatar['size'] < 1000000) {
                        //upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "file too large, should be less than 1mb";
                    }
                } else {
                    $_SESSION['signup'] = "file should be png jpg or jpeg";
                }
            }
        }
    }
    //redirect back to signup page if there was any error
    if (isset($_SESSION['signup'])) {
        //pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        //insert new user into users table
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar,
         is_admin, address, contact_info) VALUES ('$firstname', '$lastname', '$username', '$email', '$hashed_password',
          '$avatar_name', 0, '$address', '$contact_info')";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        //if everything went well 
        if (!mysqli_errno($connection)) {
            //then redirect to login page with success message
            $_SESSION['signup-success'] = 'Registration successful. Please login';
            header('location: ' . ROOT_URL . 'signin.php');
        }
    }
} else {
    //if button wasnt clicked , bounce back to signup page
    header('location:' . ROOT_URL . 'signup.php');
    die();
}
