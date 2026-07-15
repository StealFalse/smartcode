<?php
include 'conectDBPage.php';

$slug = $_GET['slug'];
$sql = "SELECT * FROM courses WHERE slug = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $slug);
$stmt->execute();
$result = $stmt->get_result();
$course = mysqli_fetch_assoc($result);

header('Content-Type: application/json');
echo json_encode($course);
