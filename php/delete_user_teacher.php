<?php
include 'conectDBPage.php';
session_start();

$studentId = $_GET['id'];
$teacherId = $_SESSION['user_id'];

$sqlStudent = "SELECT fio FROM users WHERE id = ?";
$stmtStudent = $conn->prepare($sqlStudent);
$stmtStudent->bind_param('i', $studentId);
$stmtStudent->execute();
$resultStudent = $stmtStudent->get_result();
$rowStudent = $resultStudent->fetch_assoc();

$sql = "DELETE FROM user_courses WHERE user_id = ? AND course_id IN (SELECT id FROM courses WHERE teacher_id = ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $studentId, $teacherId);
if ($stmt->execute()) {
    $_SESSION['succesfuly_delete_user_teacher'] = 'Вы удалили пользователя "' . $rowStudent['fio'] . '" из своих курсов';
} else {
    $_SESSION['error_delete_user_teacher'] = 'Ошибка, повторите позже';
}

header('location: ../cabinetTeacher.php?tab=students');
exit;
