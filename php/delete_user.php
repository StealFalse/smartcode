<?php
session_start();
include 'conectDBPage.php';
$id = $_GET['id'];

$sqlStudent = "SELECT fio FROM users WHERE id = ?";
$stmtStudent = $conn->prepare($sqlStudent);
$stmtStudent->bind_param('i', $id);
$stmtStudent->execute();
$resultStudent = $stmtStudent->get_result();
$rowStudent = $resultStudent->fetch_assoc();

$sql = "DELETE FROM users WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
if ($stmt->execute()) {
    $_SESSION['succesfuly_delete_user_admin'] = 'Вы успешно удалили пользователя "' . $rowStudent['fio'] . '" из школы SmartCode';
} else {
    $_SESSION['error_delete_user_admin'] = 'Ошибка, повторите позже';
}

header('location: ../cabinetAdmin.php?tab=users');
exit;
