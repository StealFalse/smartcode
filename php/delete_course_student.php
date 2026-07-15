<?php
include 'conectDBPage.php';
session_start();

$courseId = $_GET['id'];
$studentId = $_SESSION['user_id'];

$sqlCourse = "SELECT title, price FROM courses WHERE id = ?";
$stmtCourse = $conn->prepare($sqlCourse);
$stmtCourse->bind_param('i', $courseId);
$stmtCourse->execute();
$resultCourse = $stmtCourse->get_result();
$row = $resultCourse->fetch_assoc();
$titleCourse = $row['title'];
$priceCourse = $row['price'];

$sql = "DELETE FROM user_courses WHERE user_id = ? AND course_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $studentId, $courseId);
if ($stmt->execute()) {
    $_SESSION['succesfuly_delete_course_student'] = 'Вы отказались от курса "' . $titleCourse . '", на ваш счет возвращены ' . number_format($priceCourse, 0, '', '') . "₽";
    $sqlBalance = "UPDATE users SET balance = balance + ? WHERE id = ?";
    $stmtBalance = $conn->prepare($sqlBalance);
    $stmtBalance->bind_param('di', $priceCourse, $studentId);
    $stmtBalance->execute();

    $sqlBN = "SELECT balance FROM users WHERE id = ?";
    $stmtBN = $conn->prepare($sqlBN);
    $stmtBN->bind_param('i', $studentId);
    $stmtBN->execute();
    $resultBN = $stmtBN->get_result();
    $rowBN = $resultBN->fetch_assoc();
    $_SESSION['balance'] = $rowBN['balance'];

    $description = 'Возврат средств за курс: ' . $titleCourse;
    $sqlTransaction = "INSERT INTO transactions (user_id, amount, type, description, created_at) VALUES (?, ?, 'refund', ?, NOW())";
    $stmtTransaction = $conn->prepare($sqlTransaction);
    $stmtTransaction->bind_param('ids', $studentId, $priceCourse, $description);
    $stmtTransaction->execute();
} else {
    $_SESSION['error_delete_course_student'] = 'Ошибка, повторите позже';
}

header('location: ../cabinetStudent.php?tab=courses');
exit;
