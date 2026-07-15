<?php
session_start();
include 'conectDBPage.php';

$data = json_decode(file_get_contents('php://input'), true);

$role = $_SESSION['role'];

$sqlCourse = "SELECT title FROM courses WHERE id = ?";
$stmtCourse = $conn->prepare($sqlCourse);
$stmtCourse->bind_param('i', $data['id']);
$stmtCourse->execute();
$resultCourse = $stmtCourse->get_result();
$rowCourse = $resultCourse->fetch_assoc();

$sql = "UPDATE courses SET title=?, description=?, duration=?, skills=?, program=?, price=?, image=?, teacher_id=?, slug=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssssdsisi', $data['title'], $data['description'], $data['duration'], $data['skills'], $data['program'], $data['price'], $data['image'], $data['teacher_id'], $data['slug'], $data['id']);
if ($success = $stmt->execute()) {
    if ($role == 'admin') {
        echo json_encode(['success' => $success, 'redirect' => 'cabinetAdmin.php?tab=courses']);
        $_SESSION['succesfuly_delete_course_admin'] = 'Вы успешно обновили курс "' . $rowCourse['title'] . '"';
    } else {
        echo json_encode(['success' => $success, 'redirect' => 'cabinetTeacher.php?tab=courses']);
        $_SESSION['succesfuly_delete_course_teacher'] = 'Вы успешно обновили курс "' . $rowCourse['title'] . '"';
    }
} else {
    $_SESSION['error_delete_course_admin'] = 'Ошибка, повторите позже';
    echo json_encode(['success' => false, 'error' => 'Ошибка базы данных']);
}

exit();
