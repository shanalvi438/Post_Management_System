<?php
include 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM posts WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
