<?php
include 'db.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "<div class='post'>
            <h2>{$row['title']}</h2>
            <p>{$row['content']}</p>
            <button class='delete-post' data-id='{$row['id']}'>Delete</button>
            <h3>Comments</h3>
            <div class='comments' data-postid='{$row['id']}'>";
    $postId = $row['id'];
    $commentSql = "SELECT * FROM comments WHERE post_id = $postId";
    $commentResult = $conn->query($commentSql);
    while($commentRow = $commentResult->fetch_assoc()) {
        echo "<div class='comment'>
                <p>{$commentRow['content']}</p>
                <button class='delete-comment' data-id='{$commentRow['id']}'>Delete</button>
              </div>";
    }
    echo "</div>
            <form class='commentForm'>
                <input type='hidden' name='post_id' value='{$row['id']}'>
                <textarea name='content' placeholder='Comment'></textarea>
                <button type='submit'>Submit</button>
            </form>
          </div>";
}
$conn->close();
?>
