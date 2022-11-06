<?php
require './config/database.php';

if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id ";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
}
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);
$categories_number = mysqli_num_rows($categories);
if (isset($_SESSION['user-id'])) {
    $buyer_id = $id;
} else {
    $buyer_id = 0;
}
$cart_query = "SELECT * FROM cart WHERE buyer_id = $buyer_id";
$cart_result = mysqli_query($connection, $cart_query);
$cart_number = mysqli_num_rows($cart_result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thrift-Booth Website made by Ransford</title>

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./assets/images/logo/logoicon.ico" type="image/x-icon" />

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style.css" />

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="overlay" data-overlay></div>

    <!--
- MODAL
-->

    <div class="modal" data-modal>

        <div class="modal-close-overlay" data-modal-overlay></div>

        <div class="modal-content">
            <button class="modal-close-btn" data-modal-close>
                <ion-icon name="close-outline"></ion-icon>
            </button>

        </div>
    </div>


    <!--
- NOTIFICATION TOAST
-->

    <div class="notification-toast" data-toast>
        <button class="toast-close-btn" data-toast-close>
            <ion-icon name="close-outline"></ion-icon>
        </button>
        <?php
        $pop_up_query = "SELECT * FROM cart ORDER BY id DESC LIMIT 1 ";
        $pop_up_result = mysqli_query($connection, $pop_up_query);
        $pop_up = mysqli_fetch_assoc($pop_up_result);
        $pop_up_id = $pop_up['product_id'];
        $prod_thumbnail_query = "SELECT * FROM products WHERE id = $pop_up_id";
        $prod_thumbnail_result = mysqli_query($connection, $prod_thumbnail_query);
        $prod_thumbnail = mysqli_fetch_assoc($prod_thumbnail_result)
        ?>

        <div class="toast-banner">
            <img src="./images/<?= $prod_thumbnail['thumbnail'] ?>" width="80" height="70" />
        </div>


        <div class="toast-detail">
            <p class="toast-message">Someone in new just bought</p>

            <p class="toast-title"><?= substr($pop_up['product'], 0, 25) ?></p>

            <p class="toast-meta"><time datetime="PT2M">2 Minutes</time> ago</p>
        </div>
    </div>

    <!--
- HEADER
-->

    <header>


        <div class="header-main">
            <div class="container">
                <a href="<?= ROOT_URL ?> " class="header-logo">
                    <img src="./assets/images/logo/logo2.png" alt="Thrift Booth's logo width=" 120" height="36" />
                </a>

                <form action="<?= ROOT_URL ?>search.php" method="GET">
                    <div class="header-search-container">
                        <input type="search" id="search" name="search" class="search-field" placeholder="Search..." />
                        <!--<input type="text" id="search" name="search" class="search-field" placeholder="Enter product name..." />-->
                        <button class="search-btn" type="submit" name="submit">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                </form>



            </div>

            <div class="header-user-actions">


                <div class="header-user-actions">
                    <?php
                    if (isset($_SESSION['user-id'])) :
                    ?>
                        <h2>Hi <?= $user['username'] ?></h2>
                        <div class="nav__profile">

                            <div class="avatar"><img src="<?= ROOT_URL . 'images/' . $user['avatar'] ?>" alt="" /></div>

                            <ul>

                                <li><a href="<?= ROOT_URL ?>admin/manage-products.php">Dashboard</a></li>

                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="signin.php" class="banner-btn">Sign In</a>
                    <?php endif ?>

                    <button class="action-btn">
                        <ion-icon name="heart-outline"></ion-icon>
                        <span class="count">0</span>
                    </button>

                    <button class="action-btn">
                        <a href="cart.php" style="color: black;">
                            <ion-icon name="cart"></ion-icon>

                            <span class="count"><?= $cart_number ?></span>
                        </a>
                    </button>

                </div>
            </div>
        </div>

        <nav class="desktop-navigation-menu">
            <div class="container">
                <ul class="desktop-menu-category-list">
                    <li class="menu-category">
                        <a href="<?= ROOT_URL ?>index.php" class="menu-title">Home</a>

                    </li>

                    <li class="menu-category">
                        <a href="<?= ROOT_URL ?>productspage.php" class="menu-title">All Products</a>


                    </li>


                    <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                        <li class="menu-category">
                            <a href="<?= ROOT_URL ?>category-products.php?id=<?= $category['id'] ?>" class="menu-title"><?= $category['title'] ?></a>
                        </li>
                    <?php endwhile ?>
                    <li class="menu-category">
                        <a href="<?= ROOT_URL ?>blog.php" class="menu-title">Blog</a>

                    </li>
                </ul>
            </div>
        </nav>
        <div class="mobile-bottom-navigation">
            <button class="action-btn" data-mobile-menu-open-btn>
                <ion-icon name="menu-outline"></ion-icon>
            </button>


            <a class="action-btn" href="cart.php">
                <ion-icon name="cart"></ion-icon>
                <span class="count"><?= $cart_number ?></span>
            </a>

            <button class="action-btn">
                <a href="index.php">
                    <ion-icon name="home-outline"></ion-icon>
                </a>
            </button>

            <button id="home" class="action-btn">
                <ion-icon name="heart-outline"></ion-icon>

                <span class="count">0</span>
            </button>

            <button class="action-btn" data-mobile-menu-open-btn>
                <ion-icon name="grid-outline"></ion-icon>
            </button>
        </div>

        <nav class="mobile-navigation-menu has-scrollbar" data-mobile-menu>
            <div class="menu-top">
                <h2 class="menu-title">Menu</h2>

                <button class="menu-close-btn" data-mobile-menu-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>

            <ul class="mobile-menu-category-list">
                <li class="menu-category">
                    <a href="index.php" class="menu-title">Home</a>
                </li>
                <li class="menu-category">
                    <a href="productspage.php" data-filter="all" class="menu-title btn">All Products</a>
                </li>
                <?php
                $category_query = "SELECT * FROM categories";
                $categories = mysqli_query($connection, $category_query);
                ?>
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <li class="menu-category">

                    </li>
                    <li class="menu-category">
                        <a href="<?= ROOT_URL ?>category-products.php?id=<?= $category['id'] ?>" class="menu-title"><?= $category['title'] ?></a>
                    </li>
                <?php endwhile ?>








                <li class="menu-category">
                    <a href="blog.php" class="menu-title">Blog</a>
                </li>



            </ul>



            <div class="menu-bottom">
                <ul class="menu-category-list">
                    <li class="menu-category">
                        <button class="accordion-menu" data-accordion-btn>
                            <p class="menu-title">Language</p>

                            <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                        </button>

                        <ul class="submenu-category-list" data-accordion>
                            <li class="submenu-category">
                                <a href="#" class="submenu-title">English</a>
                            </li>

                            <li class="submenu-category">
                                <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                            </li>

                            <li class="submenu-category">
                                <a href="#" class="submenu-title">Fren&ccedil;h</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-category">
                        <button class="accordion-menu" data-accordion-btn>
                            <p class="menu-title">Currency</p>
                            <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                        </button>

                        <ul class="submenu-category-list" data-accordion>
                            <li class="submenu-category">
                                <a href="#" class="submenu-title">GHS ₵</a>
                            </li>
                            <li class="submenu-category">
                                <a href="#" class="submenu-title">USD &dollar;</a>
                            </li>
                            <li class="submenu-category">
                                <a href="#" class="submenu-title">EUR &euro;</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
    </header>