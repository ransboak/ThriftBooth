<?php

include 'partials/header.php';
$query = "SELECT * FROM categories ";
$categories = mysqli_query($connection, $query);
$category = mysqli_fetch_assoc($categories);

$select_products_query = "SELECT * FROM products LIMIT 4";
$products = mysqli_query($connection, $select_products_query);
$featured_query = "SELECT * FROM products WHERE is_featured = 1";
$featured_result = mysqli_query($connection, $featured_query);
$featured_product = mysqli_fetch_assoc($featured_result);
?>




<!--
    - MAIN
  -->

<main>
  <!--
      - BANNER
    -->

  <div class="banner">
    <div class="container">
      <div class="slider-container has-scrollbar">
        <div class="slider-item">
          <img src="./assets/images/black-sofa.jpg" alt="Furniture sale" class="banner-img" />

          <div class="banner-content">
            <p class="banner-subtitle">Trending item</p>

            <h2 class="banner-title">50% discount on latest furniture</h2>

            <p class="banner-text">starting at ₵ <b>1200</b>.00</p>

            <a href="#" class="banner-btn">Shop now</a>
          </div>
        </div>

        <div class="slider-item">
          <img src="./assets/images/african banner.webp" alt="African print banner" class="banner-img" />

          <div class="banner-content">
            <p class="banner-subtitle">Trending Clothing</p>

            <h2 class="banner-title">African Prints</h2>

            <p class="banner-text african">starting at ₵; <b>350</b>.00</p>

            <a href="#" class="banner-btn">Shop now</a>
          </div>
        </div>

        <div class="slider-item">
          <img src="./assets/images/banner-3.jpg" alt="new fashion summer sale" class="banner-img" />

          <div class="banner-content">
            <p class="banner-subtitle">Sale Offer</p>

            <h2 class="banner-title">New fashion summer sale</h2>

            <p class="banner-text">starting at ₵; <b>29</b>.99</p>

            <a href="#" class="banner-btn">Shop now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!----socials---->
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
  <!--
      - CATEGORY
    -->
  <!--
  <div class="category">
    <div class="container">
      <div class="category-item-container has-scrollbar">
        <div class="category-item">
          <div class="category-img-box">
            <img src="./assets/images/icons/dress.svg" alt="dress & frock" width="30" />
          </div>

          <div class="category-content-box">
            <div class="category-content-flex">
              <h3 class="category-item-title">Dress & frock</h3>

              <p class="category-item-amount">(53)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>
          </div>
        </div>

        <div class="category-item">
          <div class="category-img-box">
            <img src="./assets/images/icons/coat.svg" alt="winter wear" width="30" />
          </div>

          <div class="category-content-box">
            <div class="category-content-flex">
              <h3 class="category-item-title">Winter wear</h3>

              <p class="category-item-amount">(58)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>
          </div>
        </div>

        <div class="category-item">
          <div class="category-img-box">
            <img src="./assets/images/icons/glasses.svg" alt="glasses & lens" width="30" />
          </div>

          <div class="category-content-box">
            <div class="category-content-flex">
              <h3 class="category-item-title">Glasses & lens</h3>

              <p class="category-item-amount">(68)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>
          </div>
        </div>

        <div class="category-item">
          <div class="category-img-box">
            <img src="./assets/images/icons/shorts.svg" alt="shorts & jeans" width="30" />
          </div>

          <div class="category-content-box">
            <div class="category-content-flex">
              <h3 class="category-item-title">Shorts & jeans</h3>

              <p class="category-item-amount">(84)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>
          </div>
        </div>

        <div class="category-item">
          <div class="category-img-box">
            <img src="./assets/images/icons/tee.svg" alt="t-shirts" width="30" />
          </div>

          <div class="category-content-box">
            <div class="category-content-flex">
              <h3 class="category-item-title">T-shirts</h3>

              <p class="category-item-amount">(35)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>
          </div>
        </div>

        <div class="category-item">
          <div class="category-img-box">
            <img src="./assets/images/icons/jacket.svg" alt="jacket" width="30" />
          </div>

          <div class="category-content-box">
            <div class="category-content-flex">
              <h3 class="category-item-title">Jacket</h3>

              <p class="category-item-amount">(16)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>
          </div>
        </div>

        <div class="category-item">
          <div class="category-img-box">
            <img src="./assets/images/icons/watch.svg" alt="watch" width="30" />
          </div>

          <div class="category-content-box">
            <div class="category-content-flex">
              <h3 class="category-item-title">Watch</h3>

              <p class="category-item-amount">(27)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>
          </div>
        </div>

        <div class="category-item">
          <div class="category-img-box">
            <img src="./assets/images/icons/hat.svg" alt="hat & caps" width="30" />
          </div>

          <div class="category-content-box">
            <div class="category-content-flex">
              <h3 class="category-item-title">Hat & caps</h3>

              <p class="category-item-amount">(39)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>
          </div>
        </div>
      </div>
    </div>
  </div>-->

  <!--
      - PRODUCT
    -->

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
              $best_seller_query = "SELECT * FROM products ORDER BY date_time DESC LIMIT 4 ";
              $best_seller_results = mysqli_query($connection, $best_seller_query);
              ?>
              <?php while ($best_seller = mysqli_fetch_assoc($best_seller_results)) : ?>
                <div class="showcase">
                  <a href="single-product.php?id=<?= $best_seller['id'] ?>" class="showcase-img-box">
                    <img src="./images/<?= $best_seller['thumbnail'] ?>" alt="baby fabric shoes" width="75" height="75" class="showcase-img" />
                  </a>

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
                      <del>₵<?= $best_seller['price'] + (0.2 * $best_seller['price']) ?></del>
                      <p class="price">₵<?= $best_seller['price'] ?></p>
                    </div>
                  </div>
                </div>


              <?php endwhile ?>




            </div>
          </div>
        </div>
      </div>

      <div class="product-box">
        <!--
            - PRODUCT MINIMAL
          -->

        <div class="product-minimal">

          <div class="product-showcase">
            <h2 class="title">New Arrivals</h2>

            <div class="showcase-wrapper has-scrollbar">
              <div class="showcase-container">
                <?php
                $new_arrivals_query = "SELECT * FROM products ORDER BY date_time DESC LIMIT 5";
                $new_arrivals_results = mysqli_query($connection, $new_arrivals_query);
                $new_arrival = mysqli_fetch_assoc($new_arrivals_results);

                ?>
                <?php while ($new_arrival = mysqli_fetch_assoc($new_arrivals_results)) : ?>
                  <div class="showcase">
                    <a href="single-product.php?id=<?= $new_arrival['id'] ?>" class="showcase-img-box">
                      <img src="./images/<?= $new_arrival['thumbnail'] ?>" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img" />
                    </a>

                    <div class="showcase-content">
                      <a href="#">
                        <h4 class="showcase-title">
                          <?= $new_arrival['product'] ?>
                        </h4>
                      </a>

                      <div class="price-box">
                        <p class="price">₵<?= $new_arrival['price'] ?></p>
                        <del>₵<?= $new_arrival['price'] + (0.2 * $new_arrival['price']) ?></del>
                      </div>
                    </div>
                  </div>
                <?php endwhile ?>

              </div>
            </div>
          </div>

          <div class="product-showcase">
            <h2 class="title">Trending</h2>

            <div class="showcase-wrapper has-scrollbar">
              <div class="showcase-container">
                <?php
                $trending_query = "SELECT * FROM products ORDER BY id ASC LIMIT 5";
                $trending_results = mysqli_query($connection, $trending_query);
                $trending = mysqli_fetch_assoc($trending_results);

                ?>
                <?php while ($trending = mysqli_fetch_assoc($trending_results)) : ?>
                  <div class="showcase">
                    <a href="single-product.php?id=<?= $trending['id'] ?>" class="showcase-img-box">
                      <img src="./images/<?= $trending['thumbnail'] ?>" alt="running & trekking shoes - white" class="showcase-img" width="70" />
                    </a>

                    <div class="showcase-content">
                      <a href="#">
                        <h4 class="showcase-title">
                          <?= $trending['product'] ?>
                        </h4>
                      </a>
                      <div class="price-box">
                        <p class="price">₵<?= $trending['price'] ?></p>
                        <del>₵<?= $trending['price'] + (0.2 * $trending['price']) ?></del>
                      </div>
                    </div>
                  </div>
                <?php endwhile ?>

              </div>
            </div>
          </div>

          <div class="product-showcase">
            <h2 class="title">Top Rated</h2>

            <div class="showcase-wrapper has-scrollbar">
              <div class="showcase-container">
                <?php
                $top_rated_query = "SELECT * FROM products ORDER BY product ASC LIMIT 4";
                $top_rated_results = mysqli_query($connection, $top_rated_query);
                $top_rated = mysqli_fetch_assoc($new_arrivals_results);

                ?>
                <?php while ($top_rated = mysqli_fetch_assoc($top_rated_results)) : ?>
                  <div class="showcase">
                    <a href="single-product.php?id=<?= $top_rated['id'] ?>" class="showcase-img-box">
                      <img src="./images/<?= $top_rated['thumbnail'] ?>" alt="pocket watch leather pouch" class="showcase-img" width="70" />
                    </a>

                    <div class="showcase-content">
                      <a href="#">
                        <h4 class="showcase-title">
                          <?= $top_rated['product'] ?>
                        </h4>
                      </a>

                      <div class="price-box">
                        <p class="price">₵ <?= $top_rated['price'] ?></p>
                        <del>₵<?= $top_rated['price'] + (0.2 * $top_rated['price']) ?></del>
                      </div>
                    </div>
                  </div>
                <?php endwhile ?>


              </div>
            </div>
          </div>
        </div>

        <!--
            - PRODUCT FEATURED
          -->
        <?php if (mysqli_num_rows($featured_result) == 1) : ?>
          <div class="product-featured">
            <h2 class="title">Deal of the day</h2>

            <div class="showcase-wrapper has-scrollbar">
              <div class="showcase-container">
                <div class="showcase">
                  <a href="<?= ROOT_URL ?>single-product.php?id=<?= $featured_product['id'] ?>" class="showcase-img-box">
                    <div class="showcase-banner">
                      <img src="./images/<?= $featured_product['thumbnail'] ?>" class="showcase-img" />
                    </div>

                    <div class="showcase-content">
                      <div class="showcase-rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                      </div>

                      <a href="#">
                        <h3 class="showcase-title">
                          <?= $featured_product['product'] ?>
                        </h3>
                      </a>


                      <?php
                      $featured_id = $featured_product['category_id'];
                      $featured_category_query = "SELECT * FROM categories where id=$featured_id";
                      $featured_category_result = mysqli_query($connection, $featured_category_query);
                      $featured_category = mysqli_fetch_assoc($featured_category_result);
                      ?>
                      <a href="<?= ROOT_URL ?>category-products.php?id=<?= $featured_id ?>">
                        <p class="showcase-desc">
                          <?= $featured_category['title'] ?>
                        </p>
                      </a>
                      <p class="showcase-desc">
                        <?= $featured_product['description'] ?>
                      </p>

                      <div class="price-box">
                        <p class="price">₵ <?= $featured_product['price'] ?></p>

                        <del>₵<?= $featured_product['price'] + (0.2 * $featured_product['price']) ?></del>
                      </div>

                      <a class="add-cart-btn" style="width: 35%;" href="<?= ROOT_URL ?>add-to-cart.php?id=<?= $featured_product['id'] ?>">add to cart</a>

                      <div class="showcase-status">
                        <div class="wrapper">
                          <p>already sold: <b>20</b></p>

                          <p>available: <b>40</b></p>
                        </div>

                        <div class="showcase-status-bar"></div>
                      </div>

                      <div class="countdown-box">
                        <p class="countdown-desc">Hurry Up! Offer ends in:</p>

                        <div class="countdown">
                          <div class="countdown-content">
                            <p class="display-number">360</p>

                            <p class="display-text">Days</p>
                          </div>

                          <div class="countdown-content">
                            <p class="display-number">24</p>
                            <p class="display-text">Hours</p>
                          </div>

                          <div class="countdown-content">
                            <p class="display-number">59</p>
                            <p class="display-text">Min</p>
                          </div>

                          <div class="countdown-content">
                            <p class="display-number">00</p>
                            <p class="display-text">Sec</p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>


            </div>
          </div>
        <?php endif ?>

        <!--
            - PRODUCT GRID
          -->

        <div class="product-main">
          <h2 class="title">New Products</h2>

          <div class="product-grid">
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

                    <?= $product['product'] ?>

                  </h3>


                  <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                  </div>

                  <div class="price-box">
                    <p class="price">₵ <?= $product['price'] ?></p>
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




  <!--
      - BLOG
    -->

  <div class="blog">

  </div>
</main>

<?php
include 'partials/footer.php'
?>