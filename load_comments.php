<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = intval($_POST['post_id']);
    $offset = intval($_POST['offset']);
    $limit = intval($_POST['limit']);

    // Fetch comments
    $commentsSql = "SELECT * FROM comments WHERE post_id = ? LIMIT ?, ?";
    $stmt = $conn->prepare($commentsSql);
    $stmt->bind_param('iii', $post_id, $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $comments_html = '';
    while ($row = $result->fetch_assoc()) {
        $comments_html .= "<div class='comment' data-id='{$row['id']}'>
                            <span style='font-size: 24px;'>{$row['content']}</span>:<span>{$row['created_at']}</span>
                           </div>";
    }

    // Count total comments for the post
    $countSql = "SELECT COUNT(*) AS count FROM comments WHERE post_id = ?";
    $stmt = $conn->prepare($countSql);
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    $total_comments = $stmt->get_result()->fetch_assoc()['count'];

    // Calculate remaining comments
    $remaining_comments = max(0, $total_comments - ($offset + $limit));

    $stmt->close();
    $conn->close();

    echo json_encode(['comments_html' => $comments_html, 'remaining_comments' => $remaining_comments]);
}
?>
