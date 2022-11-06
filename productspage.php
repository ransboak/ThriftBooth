<?php

include 'partials/header.php';



$select_products_query = "SELECT * FROM products WHERE NOT is_featured = 1 ORDER BY date_time DESC ";
$products = mysqli_query($connection, $select_products_query);



?>


<head>

</head>

<div class="product-container">
    <div class="container">
        <!--
          - SIDEBAR
        -->

        <div class="sidebar has-scrollbar" data-mobile-menu>
            <div class="sidebar-category">
                <div class="sidebar-top">
                    <h2 class="sidebar-title">Category</h2>

                    <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>

                <ul class="sidebar-menu-category-list">
                    <li class="sidebar-menu-category">
                        <button class="sidebar-accordion-menu" data-accordion-btn>
                            <div class="menu-title-flex">
                                <img src="./assets/images/icons/dress.svg" alt="clothes" width="20" height="20" class="menu-title-img" />

                                <a href="<?= ROOT_URL ?>category-products.php?id=3">
                                    <p class="menu-title">Clothing</p>
                                </a>
                            </div>

                            <!--<div>
                  <ion-icon name="add-outline" class="add-icon"></ion-icon>
                  <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                </div>-->
                        </button>


                    </li>

                    <li class="sidebar-menu-category">
                        <button class="sidebar-accordion-menu" data-accordion-btn>
                            <div class="menu-title-flex">
                                <img src="./assets/images/icons/shoes.svg" alt="footwear" class="menu-title-img" width="20" height="20" />

                                <a href="<?= ROOT_URL ?>category-products.php?id=7">
                                    <p class="menu-title">Footwear</p>
                                </a>
                            </div>


                        </button>

                    </li>

                    <li class="sidebar-menu-category">
                        <button class="sidebar-accordion-menu" data-accordion-btn>
                            <div class="menu-title-flex">
                                <img src="./assets/images/icons/jewelry.svg" alt="clothes" class="menu-title-img" width="20" height="20" />

                                <a href="<?= ROOT_URL ?>category-products.php?id=6">
                                    <p class="menu-title">Jewelry</p>
                                </a>
                            </div>


                        </button>

                    </li>

                    <li class="sidebar-menu-category">
                        <button class="sidebar-accordion-menu" data-accordion-btn>
                            <div class="menu-title-flex">
                                <img src="./assets/images/icons/computer-laptop.svg" alt="perfume" class="menu-title-img" width="20" height="20" />

                                <a href="<?= ROOT_URL ?>category-products.php?id=4">
                                    <p class="menu-title">Electronics</p>
                                </a>
                            </div>


                        </button>

                    </li>


                    <li class="sidebar-menu-category">
                        <button class="sidebar-accordion-menu" data-accordion-btn>
                            <div class="menu-title-flex">
                                <img src="./assets/images/icons/bag.svg" alt="bags" class="menu-title-img" width="20" height="20" />

                                <p class="menu-title">Bags</p>
                            </div>


                        </button>


                    </li>
                </ul>
            </div>

            <div class="product-showcase">
                <h3 class="showcase-heading">best sellers</h3>

                <div class="showcase-wrapper">
                    <div class="showcase-container">
                        <?php
                        $best_seller_query = "SELECT * FROM products ORDER BY date_time ASC LIMIT 4 ";
                        $best_seller_results = mysqli_query($connection, $best_seller_query);
                        ?>
                        <?php while ($best_seller = mysqli_fetch_assoc($best_seller_results)) : ?>
                            <div class="showcase">
                                <a href="single-product.php?id=<?= $best_seller['id'] ?>" class="showcase-img-box">
                                    <img src="./images/<?= $best_seller['thumbnail'] ?>" alt="baby fabric shoes" width="75" height="75" class="showcase-img" />


                                    <div class="showcase-content">
                                        <a href="#">
                                            <h4 class="showcase-title"><?= $best_seller['product'] ?></h4>
                                        </a>

                                        <div class="showcase-rating">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>

                                        <div class="price-box">
                                            <del>₵5.00</del>
                                            <p class="price"><?= $best_seller['price'] ?></p>
                                        </div>
                                </a>
                            </div>
                    </div>


                <?php endwhile ?>




                </div>
            </div>
        </div>
    </div>
    <div class="socials">
        <ul>
            <li>
                <a href="#"><img src="./assets/images/icons/facebook-icon.png" /></a>
            </li>
            <li>
                <a href="#"><img src="./assets/images/icons/instagram-icon.png" /></a>
            </li>
            <li>
                <a href="#"><img src="./assets/images/icons/whatsapp-icon.png" /></a>
            </li>
        </ul>
    </div>


    <!-------All Products--------->

    <div class="product-main">
        <h2 class="title page-2">All Products</h2> <?php if (isset($_SESSION['add-to-cart-success'])) : ?>
            <div class="alert__message success">
                <p><?= $_SESSION['add-to-cart-success'];
                                                        unset($_SESSION['add-to-cart-success']);
                    ?></p>
            </div>
        <?php endif ?>

        <div class="product-grid">
            <?php
            $featured_query = "SELECT * FROM products WHERE is_featured = 1";
            $featured_result = mysqli_query($connection, $featured_query);
            $featured_product = mysqli_fetch_assoc($featured_result);
            ?>
            <?php if (mysqli_num_rows($featured_result) == 1) : ?>
                <div class="store-product showcase">
                    <a href="<?= ROOT_URL ?>single-product.php?id=<?= $featured_product['id'] ?>">
                        <div class="showcase-banner">
                            <img src="./images/<?= $featured_product['thumbnail'] ?>" alt="psp" class="product-img default" width="300" />
                            <img src="./images/<?= $featured_product['thumbnail_2'] ?>" alt="psp" class="product-img hover" width="300" />

                            <p class="showcase-badge angle black">hot cake</p>

                            <div class="showcase-actions">
                                <button class="btn-action">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>

                                <a class="btn-action" href="<?= ROOT_URL ?>single-product.php?id=<?= $featured_product['id'] ?>">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>

                                <button class="btn-action">
                                    <ion-icon name="repeat-outline"></ion-icon>
                                </button>

                                <a class="btn-action" href="<?= ROOT_URL ?>add-to-cart.php?id=<?= $featured_product['id'] ?>">

                                    <ion-icon name="bag-add-outline"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </a>
                    <?php
                    $featured_id = $featured_product['category_id'];
                    $featured_category_query = "SELECT * FROM categories where id=$featured_id";
                    $featured_category_result = mysqli_query($connection, $featured_category_query);
                    $featured_category = mysqli_fetch_assoc($featured_category_result);
                    ?>
                    <div class="product-details showcase-content">
                        <a href="#" class="showcase-category"><?= $featured_category['title'] ?></a>
                        <h3 class="showcase-title">

                            <?= $featured_product['product'] ?>

                        </h3>


                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                        </div>

                        <div class="price-box">
                            <p class="price">₵ <?= $featured_product['price'] ?>.00</p>
                            <del>₵<?= $featured_product['price'] + (0.2 * $featured_product['price']) ?></del>
                        </div>
                    </div>
                </div>
            <?php endif ?>







            <?php while ($product = mysqli_fetch_assoc($products)) : ?>
                <div class="store-product clothing men showcase">
                    <a href="<?= ROOT_URL ?>single-product.php?id=<?= $product['id'] ?>">
                        <div class="showcase-banner">
                            <img src="./images/<?= $product['thumbnail'] ?>" width="300" class="product-img default" />
                            <img src="./images/<?= $product['thumbnail_2'] ?>" alt="<?= $product['product'] ?>" width="300" class="product-img hover" />

                            <div class="showcase-actions">
                                <button class="btn-action">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>


                                <a class="btn-action" href="<?= ROOT_URL ?>single-product.php?id=<?= $product['id'] ?>">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>


                                <button class="btn-action">
                                    <ion-icon name="repeat-outline"></ion-icon>
                                </button>
                                <a class="btn-action" href="<?= ROOT_URL ?>add-to-cart.php?id=<?= $product['id'] ?>">

                                    <ion-icon name="bag-add-outline"></ion-icon>
                                </a>

                            </div>
                        </div>
                    </a>

                    <div class="product-details showcase-content">
                        <?php
                        $category_id = $product['category_id'];
                        $query = "SELECT * FROM categories WHERE id=$category_id";
                        $categories = mysqli_query($connection, $query);
                        $category = mysqli_fetch_assoc($categories);
                        ?>
                        <a href="<?= ROOT_URL ?>category-products.php?id=<?= $product['category_id'] ?>" class="showcase-category"><?= $category['title'] ?></a>
                        <h3 class="showcase-title">

                            <?= substr($product['product'], 0, 25) ?>

                        </h3>


                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                        </div>

                        <div class="price-box">
                            <p class="price">₵ <?= $product['price'] ?>.00</p>
                            <del>₵<?= $product['price'] + (0.2 * $product['price']) ?></del>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>


        </div>
    </div>

</div>
</div>
</div>

<?php
include 'partials/footer.php'
?>