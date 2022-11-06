<?php
include 'partials/header.php';

//fetch categories from database


if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $post_query = "SELECT * FROM blog WHERE id=$id";
    $post_result = mysqli_query($connection, $post_query);
    $post = mysqli_fetch_assoc($post_result);
} else {
    header('location: ' . ROOT_URL . 'admin/index.php');
    die();
}
?>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>

        <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $post['id'] ?>" />
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>" />
            <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title" />
            <textarea rows="10" name="body" placeholder="Body"><?= $post['body'] ?></textarea>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" value="1" name="is_featured" id="is_featured" checked>
                    <label for="is_featured">featured</label>
                </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail">Update Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button class="btn" name="submit" type="submit">Update Post</button>
        </form>
    </div>
</section>

<script src="../js/main.js"></script>
<?php
include '../partials/footer.php'
?>