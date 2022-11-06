<?php
require 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=Blog web
    , initial-scale=1.0" />
  <title>ThriftBooth.com/signin</title>
  <!----------css stylesheet---------->
  <link rel="shortcut icon" href="assets/images/logo/logoicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/signupstyle.css" />

  <!--------Google Fonts -------->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>

<body>
  <section class="form__section">
    <div class="container form__section-container">
      <h2>Sign In</h2>
      <?php
      if (isset($_SESSION['signup-success'])) :
      ?>
        <div class="alert__message success">
          <p><?= $_SESSION['signup-success'];
              unset($_SESSION['signup-success']);
              ?></p>
        </div>
      <?php elseif (isset($_SESSION['signin'])) : ?>
        <div class="alert__message error">
          <p><?= $_SESSION['signin'];
              unset($_SESSION['signin']);
              ?></p>
        </div>
      <?php endif ?>
      <form action="<?= ROOT_URL ?>signin-logic.php" enctype="multipart/form-data" method="POST">
        <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="Username or Email" />

        <input type="password" name="password" value="<?= $password ?>" placeholder="Password" />
        <button class="btn" type="submit" name="submit">Sign In</button>
        <small>Don't have an account? <a href="signup.php" style="color: white;">Sign Up</a></small>
      </form>
    </div>
  </section>
</body>

</html>