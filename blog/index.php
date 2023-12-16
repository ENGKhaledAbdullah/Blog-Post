<?php require('partial/header.php'); ?>
<?php require('partial/dateHelper.php');?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php
            $conn = new mysqli('localhost', 'root', 'khlooody9510K', 'blogdb');
            $limit = 5; 
            $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
            $postsSql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $postsResult = $conn->query($postsSql);
            
            if ($postsResult->num_rows > 0) {
                while ($row = $postsResult->fetch_assoc()) {
                    $postId = $row['id'];
                    $title = $row['title'];
                    $subTitle = $row['subTitle'];
                    $content = $row['content'];
                    $publishDate = $row['publishDate'];
                    $author = $row['author'];
                    ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="partial/post.php?id=<?= $postId ?>">
                            <h2 class="post-title"><?= $title ?></h2>
                            <h3 class="post-subtitle"><?= $subTitle ?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?= $author ?></a>
                            on <?=DateHelper::toDate($row['publishDate'], 'F d, Y h:i A')?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                <?php
                }
            } else {
                echo '<p>No posts found.</p>';
            }

            $conn->close();
            ?>

            <?php if ($offset >= 0) : ?>
                <!-- Pager-->
                <div class="d-flex justify-content-between mb-4">
                    <a class="btn btn-primary text-uppercase" href="?offset=<?= max(0, $offset - $limit) ?>">Newer Posts</a>
                    <?php if ($postsResult->num_rows >= $limit) : ?>
                        <a class="btn btn-primary text-uppercase" href="?offset=<?= $offset + $limit ?>">Older Posts</a>
                    <?php endif; ?>
                </div>
            <?php elseif ($postsResult->num_rows > $limit) : ?>
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase" href="?offset=<?= $offset + $limit ?>">Older Posts</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require('partial/footer.php'); ?>