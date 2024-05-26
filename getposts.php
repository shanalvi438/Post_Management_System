<?php
include 'db.php';

$sql = "SELECT * FROM posts ORDER BY created_at  DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $postId = $row['id'];
    $commentCountQuery = "SELECT COUNT(*) as total_comments FROM comments WHERE post_id = $postId";
    $commentCountResult = $conn->query($commentCountQuery);
    $commentCountRow = $commentCountResult->fetch_assoc();
    $totalComments = $commentCountRow['total_comments'];
    $commentsToShow = 3;

    echo "<div class='post'>
            <h2>{$row['title']}</h2>
            <p>{$row['content']}</p>
            <button class='delete-post btn btn-primary' data-id='{$row['id']}'>Delete</button>
            <h3>Comments</h3>
            <div class='comments' data-postid='{$row['id']}'>";

    $SqlQuery = "SELECT * FROM comments WHERE post_id = $postId LIMIT $commentsToShow";
    $Results = $conn->query($SqlQuery);

    while($commentRow = $Results->fetch_assoc()) {
        echo "<div class='comment'>
                <span style='font-size: 24px;'>{$commentRow['content']}</span>:<span>{$commentRow['created_at']}</span>
              </div>";
    }
    
    if ($totalComments > $commentsToShow) {
        echo "</div>
              <button class='load-more btn btn-secondary bg-secondary' data-postid='{$row['id']}' data-offset='$commentsToShow'>Load More ($totalComments Comments)</button>";
    } else {
        echo "($totalComments Comments)</div>";
    }

    echo "<form class='commentForm'>
            <input type='hidden' name='post_id' value='{$row['id']}'>
            <textarea name='content' placeholder='Comment'></textarea>
            <button type='submit' class='btn btn-dark bg-dark'>Comment</button>
          </form>
          </div>";
}

$conn->close();
?>


<!-- Include jQuery -->
<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '.load-more', function() {
        var button = $(this);
        var postId = button.data('postid');
        var offset = button.data('offset');
        var limit = 3; // Number of comments to load at a time

        $.ajax({
            url: 'load_comments.php',
            type: 'POST',
            data: {
                post_id: postId,
                offset: offset,
                limit: limit
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.comments_html) {
                    // Append new comments
                    $('.comments[data-postid="' + postId + '"]').append(data.comments_html);
                    // Update offset
                    button.data('offset', offset + limit);

                    // Hide button if there are no remaining comments
                    if (data.remaining_comments <= 0) {
                        button.hide();
                    }
                }
            }
        });
    });
});
</script>

