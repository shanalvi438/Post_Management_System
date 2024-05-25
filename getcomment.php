<?php
include 'db.php';

$post_id = $_GET['post_id'];

$sql = "SELECT * FROM comments WHERE post_id = $post_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "<div class='comment'>
            <p>{$row['content']}</p>
            <button class='delete-comment' data-id='{$row['id']}'>Delete</button>
          </div>";
}
$conn->close();
?>
