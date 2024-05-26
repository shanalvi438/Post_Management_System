<?php
include 'db.php';

$id = $_POST['id'];
$content = $_POST['content'];

$sql = "UPDATE comments SET content = '$content' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Comment updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
