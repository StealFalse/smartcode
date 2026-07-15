<?php
include 'conectDBPage.php';
session_start();

$courseId = $_GET['id'];
$teacherId = $_SESSION['user_id'];

$sql = "UPDATE courses SET teacher_id = NULL WHERE id = ? AND teacher_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $courseId, $teacherId);
$stmt->execute();

$sqlCourse = "SELECT title FROM courses WHERE id = ?";
$stmtCourse = $conn->prepare($sqlCourse);
$stmtCourse->bind_param('i', $courseId);
if ($stmtCourse->execute()) {
    $resultCourse = $stmtCourse->get_result();
    $rowCourse = $resultCourse->fetch_assoc();
    $_SESSION['succesfuly_delete_course_teacher'] = 'Теперь вы не ведете курс "'  . $rowCourse['title'] . '"';
} else {
    $_SESSION['error_delete_course_teacher'] = 'Ошибка, повторите позже';
}


header('location: ../cabinetTeacher.php?tab=courses');
exit;
