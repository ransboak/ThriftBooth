<?php
require 'config/constants.php';

//get back form data if there was a registration error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$contact_info = $_SESSION['signup-data']['contact-info'] ?? null;
$address = $_SESSION['signup-data']['address'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
//delete sign up data session
unset($_SESSION['signup-data']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ThriftBooth.com/signup</title>
  <!----------css stylesheet---------->
  <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/signupstyle.css" />
  <link rel="shortcut icon" href="assets/images/logo/logoicon.ico" type="image/x-icon" />

  <!--------Google Fonts -------->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>

<body>
  <section class="form__section">
    <div class="container form__section-container">
      <h2>Sign Up</h2>
      <?php
      if (isset($_SESSION['signup'])) :
      ?>
        <div class="alert__message error">
          <p><?= $_SESSION['signup'];
              unset($_SESSION['signup']);
              ?></p>

        </div>
      <?php endif ?>
      <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
        <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name" />
        <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name" />
        <input type="text" name="username" value="<?= $username ?>" placeholder="Username" />
        <input type="email" name="email" value="<?= $email ?>" placeholder="Email" />
        <input type="text" name="contact_info" placeholder="Add Contact" value="<?= $contact_info ?>" />
        <textarea name="address" placeholder="Enter Address" value="<?= $address ?>" id="address" cols="15" rows="3"></textarea>
        <input type="password" name="createpassword" placeholder="Create Password" />
        <input type="password" name="confirmpassword" placeholder="Confirm Password" />
        <div class="form__control">
          <label for="avatar">Use Avatar</label>
          <input type="file" name="avatar" id="avatar" />
        </div>
        <button class="btn" type="submit" name="submit">Sign Up</button>
        <small>Already have an account? <a href="<?= ROOT_URL ?>signin.php" style="color: white;">Sign In</a></small>
      </form>
    </div>
  </section>
</body>

</html>