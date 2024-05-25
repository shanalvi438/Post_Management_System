<?php
    include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = intval($_POST['post_id']);
    $offset = intval($_POST['offset']);
    $limit = intval($_POST['limit']);

    // Fetch comments
    $commentsSql = "SELECT * FROM comments WHERE post_id = $post_id LIMIT ?, ?";
    $stmt = $conn->prepare($commentsSql);
    $stmt->bind_param('iii', $post_id, $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $comments_html = '';
    while ($row = $result->fetch_assoc()) {
        $comments_html .= "<div class='comment' data-id='{$row['id']}'>{$row['content']}</div>";
    }

    // Count remaining comments
    $countSql = "SELECT COUNT(*) AS count FROM comments WHERE post_id = ? AND id NOT IN (SELECT id FROM comments WHERE post_id = ? LIMIT ?)";
    $stmt = $conn->prepare($countSql);
    $stmt->bind_param('iii', $post_id, $post_id, $offset + $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $remaining_comments = $result->fetch_assoc()['count'];

    $stmt->close();
    $conn->close();

    echo json_encode(['comments_html' => $comments_html, 'remaining_comments' => $remaining_comments]);
}
?>
