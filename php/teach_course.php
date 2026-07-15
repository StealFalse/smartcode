<?php
session_start();
include 'conectDBPage.php';

if ($_SESSION['role'] != 'teacher') {
    echo json_encode(['success' => false, 'error' => 'Доступ только преподавтелям']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$teacherId = $_SESSION['user_id'];
$courseId = $data['course_id'];

$sqlCheck = "SELECT id FROM courses WHERE id = ? AND teacher_id = ?";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bind_param('ii', $courseId, $teacherId);
$stmtCheck->execute();
if ($stmtCheck->get_result()->fetch_assoc()) {
    echo json_encode(['success' => false, 'error' => 'Вы уже ведете этот курс']);
    exit;
}

$sql = "UPDATE courses SET teacher_id = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $teacherId, $courseId);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
