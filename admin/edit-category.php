<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    }
} else {
    header('location: ' . ROOT_URL . 'admin/manage-categories.php');
    die();
}
?>

<head>
    <link rel="stylesheet" href="../assets/css/signupstyle.css">
</head>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Category</h2>
        <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="POST">
            <input type="hidden" value="<?= $category['id'] ?>" name="id" />
            <input type="text" value="<?= $category['title'] ?>" name="title" placeholder="Title" />
            <textarea rows="4" name="description" placeholder="Description"> <?= $category['description'] ?></textarea>
            <button class="btn" name="submit" type="submit">Update Category</button>
        </form>
    </div>
</section>


<?php
include 'partials/footer.php'
?>