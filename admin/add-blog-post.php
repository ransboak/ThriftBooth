<?php
include 'partials/header.php';

//fetch categories from database


$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

unset($_SESSION['add-post-data']);

?>

<head>
    <link rel="stylesheet" href="../assets/css/signupstyle.css">
</head>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        <?php
        if (isset($_SESSION['add-post'])) :
        ?>
            <div class="alert__message error">
                <p><?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']);
                    ?></p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Title" />

            <textarea rows="10" name="body" value="<?= $body ?>" placeholder="Body"></textarea>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured">featured</label>

                </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button class="btn" name="submit" type="submit">Add Post</button>
        </form>
    </div>
</section>

<script src="../js/main.js"></script>

<?php
include 'partials/footer.php'
?>