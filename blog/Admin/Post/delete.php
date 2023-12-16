<?php
require_once('database.php');
// Initialize the message variable
$message = '';

// Handle the deletion
if (isset($_POST['delete'])) {
    $id = $_POST['id']; // Retrieve the ID from the form data

    $deleteSql = "DELETE FROM posts WHERE id = $id";
    $deleteResult = $conn->query($deleteSql);

    if ($deleteResult) {
        $message = '<div class="alert alert-success">Post deleted successfully!</div>';
    } else {
        $message = '<div class="alert alert-danger">Failed to delete the post.</div>';
    }
}

// Fetch posts
$postsSql = "SELECT * FROM posts";
$postsResult = $conn->query($postsSql);
