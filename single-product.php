<?php

include 'partials/header.php';
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);
$category = mysqli_fetch_assoc($categories);


if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $product_query = "SELECT * FROM products WHERE id=$id";
  $product_result = mysqli_query($connection, $product_query);
  $product = mysqli_fetch_assoc($product_result);
  $seller_id = $product['seller_id'];
  $seller_query = "SELECT username FROM users WHERE id=$seller_id";
  $seller_result = mysqli_query($connection, $seller_query);
  $seller = mysqli_fetch_assoc($seller_result);

  $category_id = $product['category_id'];
  $query = "SELECT * FROM categories WHERE id=$category_id";
  $categories = mysqli_query($connection, $query);
  $category = mysqli_fetch_assoc($categories);
} else {
  header('location: ' . ROOT_URL . 'productspage.php');
  die();
}
?>

<section class="container sproduct my-3 pt-4">

  <div class="p-row">
    <div class="col-lg-5 col-md-12 col-12 p-col">
      <img class="img-fluid w-100 pb-1" id="MainImg" src="<?= ROOT_URL . 'images/' . $product['thumbnail'] ?>" alt="">
      <div class="small-img-group">
        <div class="small-img-col"><img src="<?= ROOT_URL . 'images/' . $product['thumbnail_2'] ?>" width="100%" class="small-img" alt=""></div>
        <div class="small-img-col"><img src="<?= ROOT_URL . 'images/' . $product['thumbnail'] ?>" width="100%" class="small-img" alt=""></div>
        <div class="small-img-col"><img src="<?= ROOT_URL . 'images/' . $product['demo'] ?>" width="100%" class="small-img" alt=""></div>
        <div class="small-img-col"></div>
      </div>
    </div>
    <div class="mt-4 col-lg-5 col-md-12 col-12 p-col-2">
      <h6>HOME/<?= $category['title'] ?></h6>
      <h3><?= $product['product'] ?></h3>
      <h2>₵ <?= $product['price'] ?></h2>
      <del style="color: red;">₵<?= $product['price'] + (0.2 * $product['price']) ?></del>
      <select class="my-3">
        <option value="">Select Size</option>
        <option value="">S</option>
        <option value="">M</option>
        <option value="">XL</option>
        <option value="">XXL</option>
      </select>
      <input type="number" value="1">
      <a class="buy-btn mt-2 banner-btn" href="<?= ROOT_URL ?>add-to-cart.php?id=<?= $product['id'] ?>">Add to cart</a>
      <h4 class="mt-3 mb-4">Product Details</h4>
      <h6>Seller: <?= $seller['username'] ?></h6>
      <span><?= $product['description'] ?></span>
    </div>
  </div>
  <!--
            - PRODUCT GRID
          -->

  <div class="product-main mt-5">
    <h2 class="title ">Related Products</h2>

    <div class="product-grid">
      <?php
      $similar_query = "SELECT * FROM products WHERE category_id = $category_id and NOT id = $id Limit 4";
      $similar_results = mysqli_query($connection, $similar_query);
      ?>
      <?php while ($similar = mysqli_fetch_assoc($similar_results)) : ?>
        <div class="showcase">
          <div class="showcase-banner">
            <a href="<?= ROOT_URL ?>single-product.php?id=<?= $similar['id'] ?>">
              <img src=" ./images/<?= $similar['thumbnail'] ?>" alt="Mens Winter Leathers Jackets" width="300" class="product-img default" />
              <img src="./images/<?= $similar['thumbnail_2'] ?>" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover" />
            </a>

            <p class="showcase-badge">15%</p>

            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>


              <a class="btn-action" href="<?= ROOT_URL ?>single-product.php?id=<?= $similar['id'] ?>">
                <ion-icon name="eye-outline"></ion-icon>
              </a>


              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
              <a class="btn-action" href="<?= ROOT_URL ?>add-to-cart.php?id=<?= $similar['id'] ?>">

                <ion-icon name="bag-add-outline"></ion-icon>
              </a>

            </div>
          </div>

          <div class="showcase-content">

            <a href="#">
              <h3 class="showcase-title">
                <?= $similar['product'] ?>
              </h3>
            </a>

            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>

            <div class="price-box">
              <p class="price"><?= $similar['price'] ?></p>
              <del>₵<?= $similar['price'] + (0.2 * $similar['price']) ?></del>
            </div>
          </div>
        </div>
      <?php endwhile ?>


    </div>
  </div>
</section>
<script>
  var MainImg = document.getElementById('MainImg');
  var smallimg = document.getElementsByClassName('small-img');
  smallimg[0].onclick = function() {
    MainImg.src = smallimg[0].src
  }
  smallimg[1].onclick = function() {
    MainImg.src = smallimg[1].src
  }
  smallimg[2].onclick = function() {
    MainImg.src = smallimg[2].src
  }
  smallimg[3].onclick = function() {
    MainImg.src = smallimg[3].src
  }
</script>
<!--
    - FOOTER
  -->
<?php
include 'partials/footer.php'
?>