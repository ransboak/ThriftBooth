<?php
include 'partials/header.php';

//fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);


$product = $_SESSION['add-product-data']['product'] ?? null;
$description = $_SESSION['add-product-data']['description'] ?? null;

unset($_SESSION['add-product-data']);

?>

<head>
  <link rel="stylesheet" href="../assets/css/signupstyle.css">
</head>

<section class="form__section">
  <div class="container form__section-container">
    <h2>Add Product</h2>
    <?php
    if (isset($_SESSION['add-product'])) :
    ?>
      <div class="alert__message error">
        <p><?= $_SESSION['add-product'];
            unset($_SESSION['add-product']);
            ?></p>
      </div>
    <?php endif ?>
    <form action="<?= ROOT_URL ?>admin/add-product-logic.php" enctype="multipart/form-data" method="POST">
      <input type="text" name="product" value="<?= $product ?>" placeholder="Product" />
      <div style="display: flex;">
        <h3>₵</h3><input style="width:98%;" placeholder="Price" type="number" name="price">
      </div>
      <select name="category">
        <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
          <option value="<?= $category['id'] ?>"> <?= $category['title'] ?></option>
        <?php endwhile ?>
      </select>

      <textarea rows="10" name="description" value="<?= $description ?>" placeholder="Description"></textarea>
      <?php if (isset($_SESSION['user_is_admin'])) : ?>
        <div class="form__control inline">
          <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
          <label for="is_featured">featured</label>

        </div>
      <?php endif ?>
      <div class="form__control">
        <label for="thumbnail">Add Product Image 1</label>
        <input type="file" name="thumbnail" id="thumbnail">
      </div>
      <div class="form__control">
        <label for="thumbnail_2">Add Product Image 2</label>
        <input type="file" name="thumbnail_2" id="thumbnail">
      </div>
      <div class="form__control">
        <label for="demo">Add Product demo</label>
        <input type="file" name="demo" id="thumbnail">
      </div>
      <button class="btn" name="submit" type="submit">Add Product</button>
    </form>
  </div>
</section>

<?php
include 'partials/footer.php'
?>