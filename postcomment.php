<?php
include 'db.php';

$post_id = $_POST['post_id'];
$content = $_POST['content'];

$sql = "INSERT INTO comments (post_id, content) VALUES ('$post_id', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "New comment created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
