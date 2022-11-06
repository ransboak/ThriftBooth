<?php

include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $post_query = "SELECT * FROM blog WHERE id = $id";
    $post_result = mysqli_query($connection, $post_query);
    $post = mysqli_fetch_assoc($post_result);
    $blog_author_id = $post['blog_author_id'];
    $author_query = "SELECT * FROM users WHERE id = $blog_author_id";
    $author_result = mysqli_query($connection, $author_query);
    $author = mysqli_fetch_assoc($author_result);
}
$blog_query = "SELECT * FROM blog ";
$blog_result = mysqli_query($connection, $blog_query);



?>


</header>

<head>
    <style>
        :root {
            --form-width: 40%;
        }

        .singlepost {
            margin: 30px 0 2rem;
        }

        .singlepost__container {
            width: 90%;
            background: var(--color-gray-900);
            padding: 1rem 2rem 2rem;
        }

        .singlepost__thumbnail {
            margin: 1rem;
        }


        .singlepost__container p {
            margin-top: 1rem;
            line-height: 1.7;
            width: 100%;
        }

        .post__author {
            display: flex;
            gap: 1rem;
            margin-top: 1.2rem;
        }

        .avatar img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
        }

        .avatar {
            border-radius: 50%;
            overflow: hidden;
            width: 2.5rem;
            height: 2.5rem;
        }

        @media screen and (max-width: 600px) {}

        @media screen and (max-width: 600px) {
            .singlepost__thumbnail {
                width: 80vw;
            }

            .singlepost__thumbnail img {
                width: 100%;
            }

        }
    </style>
</head>
<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>
        <div class="post__author">
            <div class="avatar">
                <img src=" ./images/<?= $author['avatar'] ?>" alt="">
            </div>
            <div class="post__author-info">
                <h5>By: <?= $author['username'] ?></h5>
                <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
            </div>
        </div>
        <div class="singlepost__thumbnail">
            <img src="./images/<?= $post['thumbnail'] ?>" alt="">
        </div>
        <p><?= $post['body'] ?>
        </p>

    </div>
</section>



<!--
    - FOOTER
  -->
<?php
include 'partials/footer.php'
?>