<?php

include 'partials/header.php';

if (isset($_SESSION['user-id'])) {
  $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM users WHERE id=$id ";
  $result = mysqli_query($connection, $query);
  $user = mysqli_fetch_assoc($result);
}
if (isset($_SESSION['user-id'])) {
  $buyer_id = $id;
} else {
  $buyer_id = 0;
}
$cart_query = "SELECT * FROM cart WHERE buyer_id = $buyer_id";
$cart_result = mysqli_query($connection, $cart_query);

?>


</header>
<section class="pt-5 mt-5 container">
  <h2 class="pt-5">Shopping cart</h2>
  <hr>
</section>
<section id="cart-container" class="big-container container">
  <?php if (isset($_SESSION['order-success'])) : ?>
    <div class="alert__message success">
      <p><?= $_SESSION['order-success'];
          unset($_SESSION['order-success']);
          ?></p>
    </div>
  <?php endif ?>
  <?php if (mysqli_num_rows($cart_result) > 0) : ?>

    <table width="100%">
      <thead>
        <tr>
          <td>Remove</td>
          <td>Images</td>
          <td>Product</td>
          <td>Price</td>

        </tr>
      </thead>

      <tbody>

        <?php while ($cart_products = mysqli_fetch_assoc($cart_result)) : ?>
          <tr>
            <td>
              <a href="<?= ROOT_URL ?>delete-product.php?id=<?= $cart_products['id'] ?>">
                <ion-icon name="trash-outline"></ion-icon>
              </a>
            </td>
            <?php
            $cart_prod_id = $cart_products['product_id'];
            $select_product = "SELECT * FROM products WHERE id = $cart_prod_id";
            $select_product_result = mysqli_query($connection, $select_product);
            $select_product_img = mysqli_fetch_assoc($select_product_result);
            ?>
            <td><img src="<?= ROOT_URL . 'images/' . $select_product_img['thumbnail'] ?>"></td>
            <td>

              <h5><?= $cart_products['product'] ?></h5>
            </td>
            <td>
              <h5><?= $cart_products['product_price'] ?></h5>
            </td>

          </tr>
        <?php endwhile ?>
      </tbody>
    </table>
  <?php else : ?>

    <h4 style="margin: 10rem; text-align :center;">There are no products here</h4>
  <?php endif ?>
</section>

<section id="cart-bottom" class="big-container container">
  <div class="row">
    <div class="coupon ">
      <div>
        <h5>COUPON</h5>
        <p>Enter coupon code</p>
        <div class="coupon_code"><input type="text" placeholder="Coupon code">
          <button class="banner-btn">APPLY COUPON</button>
        </div>

      </div>
    </div>
    <div class="total">
      <?php
      $select_product = "SELECT sum(product_price) AS value_sum FROM cart WHERE buyer_id = $buyer_id";
      $total = mysqli_query($connection, $select_product);
      $new_total = mysqli_fetch_assoc($total);
      $subtotal = $new_total['value_sum'] * 1;
      $shipping = $subtotal * 0.2;
      $sum = $subtotal + $shipping;

      ?>
      <div>
        <h5>CART TOTAL</h5>
        <div class="cart_total">
          <h6>Subtotal</h6>
          <p>₵<?= $subtotal ?></p>
        </div>
        <div class="cart_total">
          <h6>Shipping</h6>
          <p>₵<?= $shipping ?></p>
        </div>
        <hr>

        <div class="cart_total">
          <h6>Total</h6>
          <p>₵ <?= $sum ?></p>
        </div>
        <?php
        $cart_query = "SELECT * FROM cart WHERE buyer_id = $buyer_id";
        $cart_result = mysqli_query($connection, $cart_query);
        $cart_prod = mysqli_fetch_assoc($cart_result);
        ?>
        <a class="banner-btn proceed" href="<?= ROOT_URL ?>order-items.php">PROCEED TO CHECKOUT</a>
      </div>
    </div>
  </div>
</section>

<section id="cart-container" class="small-container container">
  <?php $cart_query = "SELECT * FROM cart  WHERE buyer_id = $buyer_id ";
  $cart_result = mysqli_query($connection, $cart_query);
  ?>
  <?php if (mysqli_num_rows($cart_result) > 0) : ?>
    <table width="100%">
      <thead>
        <tr>
          <td>Remove</td>
          <td>Product</td>
          <td>Price</td>
        </tr>
      </thead>
      <tbody>
        <?php while ($cart_products = mysqli_fetch_assoc($cart_result)) : ?>
          <tr>
            <td>
              <a href="<?= ROOT_URL ?>delete-product.php?id=<?= $cart_products['id'] ?>">
                <ion-icon name="trash-outline"></ion-icon>
              </a>
            </td>
            <?php
            $cart_prod_id = $cart_products['product_id'];
            $select_product = "SELECT * FROM products WHERE id = $cart_prod_id";
            $select_product_result = mysqli_query($connection, $select_product);
            $select_product_img = mysqli_fetch_assoc($select_product_result);
            ?>
            <td><img src="<?= ROOT_URL . 'images/' . $select_product_img['thumbnail'] ?>"></td>
            <td>
              <h5><?= $cart_products['product_price'] ?></h5>
            </td>

          </tr>



        <?php endwhile ?>


      </tbody>


    </table>
  <?php else : ?>

    <h4 style="margin: 10rem; text-align :center;">There are no products here</h4>
  <?php endif ?>
</section>
</section>

<section id="cart-bottom" class="small-container container">
  <div class="row">
    <div class="coupon ">
      <div>
        <h5>COUPON</h5>
        <p>Enter coupon code</p>
        <div class="coupon_code"><input type="text" placeholder="Coupon code">
          <button class="banner-btn">APPLY COUPON</button>
        </div>

      </div>
    </div>
    <div class="total">
      <?php
      $select_product = "SELECT sum(product_price) AS value_sum FROM cart  WHERE buyer_id = $buyer_id ";
      $total = mysqli_query($connection, $select_product);
      $new_total = mysqli_fetch_assoc($total);
      $subtotal = $new_total['value_sum'];
      $shipping = $subtotal * 0.2;
      $sum = $subtotal + $shipping;

      ?>
      <div>
        <h5>CART TOTAL</h5>
        <div class="cart_total">
          <h6>Subtotal</h6>
          <p>₵<?= $subtotal ?></p>
        </div>
        <div class="cart_total">
          <h6>Shipping</h6>
          <p>₵<?= $shipping ?></p>
        </div>
        <hr>
        <div class="cart_total">
          <h6>Total</h6>
          <p>₵<?= $sum ?></p>
        </div>
        <?php
        $cart_query = "SELECT * FROM cart ";
        $cart_result = mysqli_query($connection, $cart_query);
        $cart_prod = mysqli_fetch_assoc($cart_result);

        ?>
        <a class="banner-btn proceed" href="<?= ROOT_URL ?>order-items.php?id=<?= $cart_prod['buyer_id'] ?>">PROCEED TO CHECKOUT</a>

      </div>
    </div>
  </div>
</section>



<!--
    - FOOTER
  -->
<?php
include 'partials/footer.php'
?>