<?php
include 'partials/header.php';

//fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $product_query = "SELECT * FROM products WHERE id=$id";
    $product_result = mysqli_query($connection, $product_query);
    $product = mysqli_fetch_assoc($product_result);
} else {
    header('location: ' . ROOT_URL . 'admin/manage-products.php');
    die();
}
?>

<head>
    <link rel="stylesheet" href="../assets/css/signupstyle.css">
</head>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit product</h2>

        <form action="<?= ROOT_URL ?>admin/edit-product_-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $product['id'] ?>" />
            <input type="hidden" name="previous_thumbnail_name" value="<?= $product['thumbnail'] ?>" />
            <input type="hidden" name="previous_thumbnail_2_name" value="<?= $product['thumbnail_2'] ?>" />
            <input type="text" name="product" value="<?= $product['product'] ?>" placeholder="Product Name" />
            <div style="display: flex;">
                <h3>₵</h3><input style="width:98%;" value="<?= $product['price'] ?>" placeholder="Price" type="number" name="price">
            </div>
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
            </select>

            <textarea rows="10" name="description" placeholder="description"><?= $product['description'] ?></textarea>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" value="1" name="is_featured" id="is_featured" checked>
                    <label for="is_featured">featured</label>
                </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail">Update Image 1</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <div class="form__control">
                <label for="thumbnail">Update Image 2</label>
                <input type="file" name="thumbnail_2" id="thumbnail_2">
            </div>
            <button class="btn" name="submit" type="submit">Update product</button>
        </form>
    </div>
</section>


<?php
include 'partials/footer.php'
?>