<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $contact_info = filter_var($_POST['contact_info'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$firstname || !$lastname) {
        $_SESSION['edit-user'] = 'Invalid form input on edit';
    } else {
        //update user
        $query = "UPDATE users SET firstname ='$firstname' , lastname='$lastname' , username='$username' ,
         is_admin=$is_admin , contact_info='$contact_info' , address='$address' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['edit-user-success'] = "User $firstname $lastname updated successfully";
        } else {
            $_SESSION['edit-user'] = 'Update failed';
            header('location: ' . ROOT_URL . 'admin/manage-users.php');
            die();
        }
    }
}
header('location: ' . ROOT_URL . 'admin/edit-user.php');
die();
