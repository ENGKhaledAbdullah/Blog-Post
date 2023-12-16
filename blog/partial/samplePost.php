<?php require('../Admin/Post/view.php');?>
<?php require('dateHelper.php');?>
<?php require('header.php');?>
<?php

?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo ROOT_PATH;?>assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?=$title?></h1>
                            <h2 class="subheading"><?=$subTitle?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?=$author?></a>
                                on <?= DateHelper::toDate($publishDate, 'F d, Y')?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                    <?= $content?>
                    </div>
                </div>
            </div>
        </article>
<?php require('footer.php');?>