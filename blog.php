<?php

include 'partials/header.php';

$blog_query = "SELECT * FROM blog ORDER BY date_time DESC";
$blog_result = mysqli_query($connection, $blog_query);



?>


</header>

<head>
    <style>
        .blog-posts {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            overflow-x: hidden;
            justify-content: space-around;
            gap: 15px;
        }

        .blog-post {
            width: 50%;
            scroll-snap-align: start;
        }

        .thumbnail {
            width: 400px;
            aspect-ratio: 1;
        }

        .thumbnail img {
            width: 100%;
        }

        @media screen and (max-width: 1024px) {
            .blog-posts {
                grid-template-columns: 1fr 1fr;
                gap: 3rem;
            }
        }

        @media screen and (max-width:600px) {
            .blog-posts {
                grid-template-columns: 1fr;
            }


        }
    </style>
</head>


<div class="blog">
    <div class="container">
        <div class="blog-posts ">
            <?php while ($blog = mysqli_fetch_assoc($blog_result)) : ?>
                <div class="blog-card">
                    <a href="<?= ROOT_URL ?>single-post.php?id=<?= $blog['id'] ?>">
                        <img src="./images/<?= $blog['thumbnail'] ?>" alt="Curbside fashion Trends: How to Win the Pickup Battle." class="blog-banner" width="300" />
                    </a>

                    <div class="blog-content">
                        <a href="#" class="blog-category"></a>

                        <h3>
                            <a href="#" class="blog-title"><?= $blog['title'] ?></a>
                        </h3>
                        <p class="post__body" style="font-size: 15px;">
                            <?= substr($blog['body'], 0, 100) ?>...
                        </p>
                        <?php
                        $blog_author_id = $blog['blog_author_id'];
                        $author_query = "SELECT * FROM users WHERE id = $blog_author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);

                        ?>
                        <p class="blog-meta">
                            By <cite><?= $author['username'] ?></cite> /
                            <time datetime="2022-03-15"><?= date("M d, Y - H:i", strtotime($blog['date_time'])) ?></time>
                        </p>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</div>



<!--
    - FOOTER
  -->
<?php
include 'partials/footer.php'
?>