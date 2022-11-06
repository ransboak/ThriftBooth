<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id ";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/manage-users.php');
    die();
}

?>




<head>
    <link rel="stylesheet" href="../assets/css/signupstyle.css">
</head>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>
        <?php
        if (isset($_SESSION['edit-user'])) :
        ?>
            <div class="alert__message error">
                <p><?= $_SESSION['edit-user'];
                    unset($_SESSION['edit-user']);
                    ?></p>
            </div>
        <?php endif ?>
        <form action="edit-user-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" value="<?= $user['id'] ?>" name='id' />
            <input type="text" name="firstname" value="<?= $user['firstname'] ?>" placeholder="First Name" />
            <input type="text" name="lastname" value="<?= $user['lastname'] ?>" placeholder="Last Name" />
            <input type="text" name="username" value="<?= $user['username'] ?>" placeholder="Username" />
            <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Email" />
            <input type="text" name="contact_info" placeholder="Add Contact" value="<?= $user['contact_info'] ?>" />
            <textarea name="address" placeholder="Enter Address" id="address" cols="15" rows="3"><?= $user['address'] ?></textarea>
            <select name="userrole" value="<?= $user['is_admin'] ?>">
                <option value="0"> Buyer</option>
                <option value="1"> Seller</option>
            </select>
            <button class="btn" name="submit" type="submit">Update User</button>
        </form>
    </div>
</section>

<?php
include 'partials/footer.php'
?>