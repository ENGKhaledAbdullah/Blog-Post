<?php
require_once('../../partial/database.php');
// var_dump($conn);


echo $title = $_POST[ 'title' ]??'';
$subTitle = $_POST[ 'subTitle' ]??'';
$content = $_POST[ 'content' ]??'';
if(isset($_POST['submit']))
{
    $insertSql = "INSERT INTO posts (title,subTitle,content,author ) VALUES ('".$title."','".$subTitle."','".$content."','Khaled')";
    $conn->query($insertSql);
}

?>

<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel = 'stylesheet' integrity = 'sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin = 'anonymous'>

<title>Document</title>
</head>
<body>

<form method = 'post' class="m-5">
    <div class = 'mb-3'>
        <label for = 'exampleInputEmail1' class = 'form-label'>title Post</label>
        <input name = 'title' type = 'text' class = 'form-control'>
    </div>
    <div class = 'mb-3'>
        <label for = 'exampleInputEmail1' class = 'form-label'>subTitle Post</label>
        <input name = 'subTitle' type = 'text' class = 'form-control'>
    </div>
    <div class = 'form-floating'>
        <textarea name = 'content' class = 'form-control' placeholder = 'Leave a comment here' id = 'floatingTextarea2' style = 'height: 100px'></textarea>
        <label for = 'floatingTextarea2'>Contents</label>
    </div>
    <button type = 'submit' class = 'btn btn-primary mt-3' name="submit">Submit</button>
</form>

</body>
</html>