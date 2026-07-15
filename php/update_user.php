<?php
session_start();
include 'conectDBPage.php';

$data = json_decode(file_get_contents('php://input'), true);

$sql = "UPDATE users SET phone=?, secret_word=?, email=?, fio=?, role=? WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('sssssi', $data['phone'], $data['secret_word'], $data['email'], $data['fio'], $data['role'], $data['id']);
if ($success = $stmt->execute()) {
    $_SESSION['succesfuly_delete_user_admin'] = 'Вы успешно обновили профиль пользователя с ID "' . $data['id'] . '"';
    echo json_encode(['success' => $success, 'redirect' => 'cabinetAdmin.php?tab=users']);
} else {
    $_SESSION['error_delete_user_admin'] = 'Ошибка, повторите позже';
    echo json_encode(['success' => false, 'error' => 'Ошибка базы данных']);
}
exit();
