<?php
include 'partials/header.php';

//get back form data if there was a registration error
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$contact_info = $_SESSION['signup-data']['contact-info'] ?? null;
$address = $_SESSION['signup-data']['address'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;
//delete add user data session
unset($_SESSION['add-user-data']);
?>

<head>
    <link rel="stylesheet" href="../assets/css/signupstyle.css">
</head>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>
        <?php
        if (isset($_SESSION['add-user'])) :
        ?>
            <div class="alert__message error">
                <p><?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                    ?></p>
            </div>
        <?php elseif (isset($_SESSION['add-user-success'])) : ?>
            <div class="alert__message success">
                <p><?= $_SESSION['add-user-success'];
                    unset($_SESSION['add-user-success']);
                    ?></p>
            </div>
        <?php endif ?>
        <form action="add-user-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name" />
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name" />
            <input type="text" name="username" value="<?= $username ?>" placeholder="Username" />
            <input type="email" name="email" value="<?= $email ?>" placeholder="Email" />
            <input type="text" name="contact_info" placeholder="Add Contact" value="<?= $contact_info ?>" />
            <textarea name="address" placeholder="Enter Address" value="<?= $address ?>" id="address" cols="15" rows="3"></textarea>
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password" />
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password" />
            <select name="userrole" value="<?= $is_admin ?>">
                <option value="0"> Buyer</option>
                <option value="1"> Seller</option>
            </select>

            <div class="form__control">
                <label for="avatar">Add Avatar</label>
                <input type="file" name="avatar" name="avatar" value="<?= $avatar ?>" id="avatar">
            </div>
            <button class="btn" name="submit" type="submit">Add User</button>
        </form>
    </div>
</section>

<?php
include 'partials/footer.php'
?>