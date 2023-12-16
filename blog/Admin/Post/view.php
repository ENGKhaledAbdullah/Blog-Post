<?php
require_once('database.php');
$query = "SELECT * FROM posts";
$result = $conn->query($query);
// Check if there are any posts
if ($result->num_rows > 0) {
    // Loop through each row and display the post data
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $subTitle = $row['subTitle'];
        $author = $row['author'];
        $content = $row['content'];
        $publishDate = $row['publishDate'];
        
        // Display post data
        // echo "<h2>$title</h2>";
        // echo "<h4>$subTitle</h4>";
        // echo "<p>$content</p>";
        // echo "<p>Publish Date: $publishDate</p>";
        // echo "<hr>";
    }
    
} 
else {
    echo "No posts found.";
}

