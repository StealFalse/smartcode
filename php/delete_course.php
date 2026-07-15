<?php
session_start();
include 'conectDBPage.php';

$id = $_GET['id'];

$sqlCourse = "SELECT title FROM courses WHERE id = ?";
$stmtCourse = $conn->prepare($sqlCourse);
$stmtCourse->bind_param('i', $id);
$stmtCourse->execute();
$resultCourse = $stmtCourse->get_result();
$rowCourse = $resultCourse->fetch_assoc();

$sql = "DELETE FROM courses WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
if ($stmt->execute()) {
    $_SESSION['succesfuly_delete_course_admin'] = 'Вы успешно удалили курс "' . $rowCourse['title'] . '" из школы SmartCode';
} else {
    $_SESSION['error_delete_course_admin'] = 'Ошибка, повторите позже';
}

header('location: ../cabinetAdmin.php?tab=courses');
exit;
