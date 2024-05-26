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

    // Set the initial number of comments to display
    $commentsToShow = 3;

    echo "<div class='post'>
            <h2>{$row['title']}</h2>
            <p>{$row['content']}</p>
            <button class='delete-post btn btn-primary' data-id='{$row['id']}'>Delete</button>
            <h3>Comments</h3>
            <div class='comments' data-postid='{$row['id']}'>";

    // Fetch comments for the post
    $SqlQuery = "SELECT * FROM comments WHERE post_id = $postId LIMIT $commentsToShow";
    $Results = $conn->query($SqlQuery);

    while($commentRow = $Results->fetch_assoc()) {
        echo "<div class='comment'>
                <span style='font-size: 24px;'>{$commentRow['content']}</span>:<span>{$commentRow['created_at']}</span>
              </div>";
    }

    // Display the 'Load More' button if there are more comments
    if ($totalComments > $commentsToShow) {
        echo "</div>
              <button class='load-more btn btn-secondary bg-secondary' data-postid='{$row['id']}' data-offset='$commentsToShow'>Load More ($totalComments Comments)</button>";
    } else {
        echo "($totalComments Comments)";
    }

    // Comment form
    echo "<form class='commentForm'>
            <input type='hidden' name='post_id' value='{$row['id']}'>
            <textarea name='content' placeholder='Comment'></textarea>
            <button type='submit' class='btn btn-dark bg-dark'>Comment</button>
          </form>
          </div>";
}

$conn->close();
?>
