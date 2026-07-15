<?php
session_start();
include 'conectDBPage.php';

$data = json_decode(file_get_contents('php://input'), true);
$studentId = $_SESSION['user_id'];
$courseId = $data['course_id'];

$sqlPrice = "SELECT title, price FROM courses WHERE id = ?";
$stmtPrice = $conn->prepare($sqlPrice);
$stmtPrice->bind_param('i', $courseId);
$stmtPrice->execute();
$resultPrice = $stmtPrice->get_result();
$coursePrice = $resultPrice->fetch_assoc();

if (!$coursePrice) {
    echo json_encode(['success' => false, 'error' => 'Курс не найден']);
    exit;
}

$sqlCheck = "SELECT id FROM user_courses WHERE user_id = ? AND course_id = ?";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bind_param('ii', $studentId, $courseId);
$stmtCheck->execute();
if ($stmtCheck->get_result()->fetch_assoc()) {
    echo json_encode(['success' => false, 'error' => 'Вы уже записаны на этот курс']);
    exit;
}

$sqlBalance = "SELECT balance FROM users WHERE id = ?";
$stmtBalance = $conn->prepare($sqlBalance);
$stmtBalance->bind_param('i', $studentId);
$stmtBalance->execute();
$resultBalance = $stmtBalance->get_result();
$userBalance = $resultBalance->fetch_assoc();

if ($userBalance['balance'] < $coursePrice['price']) {
    echo json_encode(['success' => false, 'error' => 'Недостаточно средств']);
    exit;
}

$sqlDWB = "UPDATE users SET balance = balance - ? WHERE id = ?";
$stmtDWB = $conn->prepare($sqlDWB);
$stmtDWB->bind_param('di', $coursePrice['price'], $studentId);
$success = $stmtDWB->execute();

if ($success) {
    $description = 'Запись на курс: ' . $coursePrice['title'];
    $sqlTransaction = "INSERT INTO transactions (user_id, amount, type, description, created_at) VALUES (?, ?, 'enroll', ?, NOW())";
    $stmtTransaction = $conn->prepare($sqlTransaction);
    $stmtTransaction->bind_param('ids', $studentId, $coursePrice['price'], $description);
    $stmtTransaction->execute();

    $sql = "INSERT INTO user_courses (user_id, course_id, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $studentId, $courseId);
    $stmt->execute();

    $sqlNB = "SELECT balance FROM users WHERE id = ?";
    $stmtNB = $conn->prepare($sqlNB);
    $stmtNB->bind_param('i', $studentId);
    $stmtNB->execute();
    $resultNB = $stmtNB->get_result();
    $NB = $resultNB->fetch_assoc();
    $_SESSION['balance'] = $NB['balance'];
} else {
    $success = false;
}

echo json_encode(['success' => $success]);
