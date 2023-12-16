<?php
define("ROOT_PATH","/php/dblecture1/blog/");
$conn = new mysqli(hostname:'localhost',username:'root',password:'khlooody9510K',database:'blogdb');
$title = $_POST['title'] ?? '';
$subTitle = $_POST['subTitle'] ?? '';
$content = $_POST['content'] ?? '';

if (isset($_POST['submit'])) {
    $id = $_POST['id']; // Retrieve the ID from the form data

    $updateSql = "UPDATE posts SET title = '$title', subTitle = '$subTitle', content = '$content' WHERE id = $id";
    $updateResult = $conn->query($updateSql);

    if ($updateResult) {
        $message = '<div class="alert alert-success">Post updated successfully!</div>';
        // Redirect to the bloglist page after updating and confirming the update
        header('Location:'.ROOT_PATH.'partial/bloglist.php');
    } else {
        $message = '<div class="alert alert-danger">Failed to update the post.</div>';
    }
}

// Fetch the existing post data if the ID is provided in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $postSql = "SELECT * FROM posts WHERE id = $id";
    $postResult = $conn->query($postSql);

    if ($postResult->num_rows === 0) {
        $message = '<div class="alert alert-danger">Post not found.</div>';
    } else {
        $row = $postResult->fetch_assoc();
        $title = $row['title'];
        $subTitle = $row['subTitle'];
        $content = $row['content'];
    }
}

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

    <form method='post' class="m-5">
        <?php if (isset($_GET['id'])) { ?>
        <input type="hidden" name="id" value="<?= $id ?>">
        <?php } ?>
        <div class='mb-3'>
            <label for='exampleInputEmail1' class='form-label'>title Post</label>
            <input name='title' type='text' class='form-control' value="<?= $title ?>">
        </div>
        <div class='mb-3'>
            <label for='exampleInputEmail1' class='form-label'>subTitle Post</label>
            <input name='subTitle' type='text' class='form-control' value="<?= $subTitle ?>">
        </div>
        <div class='form-floating'>
            <textarea name='content' class='form-control' placeholder='Leave a comment here'
                id='floatingTextarea2' style='height: 100px'><?= $content ?></textarea>
            <label for='floatingTextarea2'>Contents</label>
        </div>
        <button type='submit' class='btn btn-dark mt-3' name="submit"
            onclick="return confirm('Are you sure you want to update the info of this post?')">    
        Update</button>
    </form>

</body>

</html>