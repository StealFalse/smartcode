<?php
session_start();
include 'conectDBPage.php';

$data = json_decode(file_get_contents('php://input'), true);
$userId = $_SESSION['user_id'];

if (!empty($data['password'])) {
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE users SET phone=?, secret_word=?, email=?, fio=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $data['phone'], $data['secret_word'], $data['email'], $data['fio'], $hashedPassword, $userId);
    $success = $stmt->execute();
} else {
    $sql = "UPDATE users SET phone=?, secret_word=?, email=?, fio=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $data['phone'], $data['secret_word'], $data['email'], $data['fio'], $userId);
    $success = $stmt->execute();
}
if ($success) {
    $_SESSION['phone'] = $data['phone'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['fio'] = $data['fio'];
    $_SESSION['success_update'] = 'Вы успешно обновили профиль';
} else {
    $_SESSION['error_update'] = "Ошибка, повторите позже";
}

echo json_encode(['success' => $success, 'role' => $_SESSION['role']]);
