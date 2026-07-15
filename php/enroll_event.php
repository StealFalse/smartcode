<?php
session_start();
include 'conectDBPage.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    echo json_encode(['success' => false, 'error' => 'Доступ только студентам']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$studentId = $_SESSION['user_id'];
$eventId = $data['event_id'];

$sql = "INSERT INTO user_events (user_id, event_id, created_at) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $studentId, $eventId);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
