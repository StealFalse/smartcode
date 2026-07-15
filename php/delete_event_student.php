<?php
include 'conectDBPage.php';
session_start();

$eventId = $_GET['id'];
$studentId = $_SESSION['user_id'];

$sqlEvent = "SELECT title FROM events WHERE id = ?";
$stmtEvent = $conn->prepare($sqlEvent);
$stmtEvent->bind_param('i', $eventId);
$stmtEvent->execute();
$resultEvent = $stmtEvent->get_result();
$row = $resultEvent->fetch_assoc();
$titleEvent = $row['title'];

$sql = "DELETE FROM user_events WHERE user_id = ? AND event_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $studentId, $eventId);
if ($stmt->execute()) {
    $_SESSION['succesfuly_delete_event_student'] = 'Вы отказались от мероприятия "' . $titleEvent . '"';
} else {
    $_SESSION['error_delete_event_student'] = 'Ошибка, повторите позже';
}


header('location: ../cabinetStudent.php?tab=events');
exit;
