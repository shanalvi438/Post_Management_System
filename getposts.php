<?php
include 'db.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    // Get total number of comments for the post
    $postId = $row['id'];
    $commentCountQuery = "SELECT COUNT(*) as total_comments FROM comments WHERE post_id = $postId";
    $commentCountResult = $conn->query($commentCountQuery);
    $commentCountRow = $commentCountResult->fetch_assoc();
    $totalComments = $commentCountRow['total_comments'];

    echo "<div class='post'>
            <h2>{$row['title']}</h2>
            <p>{$row['content']}</p>
            <button class='delete-post btn btn-primary' data-id='{$row['id']}'>Delete</button>
            <h3>Comments</h3>
            <div class='comments' data-postid='{$row['id']}'>";
    $id = $row['id'];
    $SqlQuery = "SELECT * FROM comments WHERE post_id = $id LIMIT 3";
    $Results = $conn->query($SqlQuery);
    while($commentRow = $Results->fetch_assoc()) {
        echo "<div class='comment'>
                <spna style='font-size: 24px;'>{$commentRow['content']}</spna>:<span>{$commentRow['created_at']}</span>
              </div>";
    }
    echo "</div>
            <button class='load-more btn btn-Secondary bg-secondary' data-postid='{$row['id']}' data-offset='3'>Load More ($totalComments Comments)</button>
            <form class='commentForm'>
                <input type='hidden' name='post_id' value='{$row['id']}'>
                <textarea name='content' placeholder='Comment'></textarea>
                <button type='submit' class='btn btn-dark bg-dark'>Comment</button>
            </form>
          </div>";
}
$conn->close();
?>
