<?php
require('header.php');
require_once('../Admin/Post/view.php');
require_once('../Admin/Post/delete.php');
require('dateHelper.php');

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>

    <title>Document</title>
</head>

<body>
    <!-- Page Header-->
    <header class="masthead"
        style="background-image: url('<?php echo ROOT_PATH;?>assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1 class="text-center" style="font-size:10vw;">Posts</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="my-3">
            <?php echo $message; // Display the message ?>
        </div>
        <table class="table table-striped">
            <tr class="table-dark">
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php foreach ($postsResult as $row) { ?>
            <tr style="height:65px;">
                <td><?= $row['id'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= DateHelper::toDate($row['publishDate'], 'F d, Y h:i A')?></td>
                <td>
                    <a href="<?= ROOT_PATH . 'partial/post.php?id=' . $row['id'] ?>" class="btn btn-primary">Details</a>
                    <a href="<?= ROOT_PATH . 'Admin/Post/update.php?id=' . $row['id'] ?>" class="btn btn-dark">Update</a>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="delete" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                        Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php require('footer.php');?>
</body>

</html>