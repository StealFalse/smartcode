<?php
session_start();
include 'conectDBPage.php';

$data = json_decode(file_get_contents('php://input'), true);

$sqlEvent = "SELECT title FROM events WHERE id = ?";
$stmtEvent = $conn->prepare($sqlEvent);
$stmtEvent->bind_param('i', $data['id']);
$stmtEvent->execute();
$resultEvent = $stmtEvent->get_result();
$rowEvent = $resultEvent->fetch_assoc();

$sql = "UPDATE events SET title=?, description=?, duration=?, format=?, what_you_get=?, program=?, event_date=?, location=?, image=?, slug=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssssssssi', $data['title'], $data['description'], $data['duration'], $data['format'], $data['what_you_get'], $data['program'], $data['event_date'], $data['location'], $data['image'], $data['slug'], $data['id']);
if ($success = $stmt->execute()) {
    $_SESSION['succesfuly_delete_event_admin'] = 'Вы обновили мероприятие "' . $rowEvent['title'] . '"';
    echo json_encode(['success' => $success, 'redirect' => 'cabinetAdmin.php?tab=events']);
} else {
    $_SESSION['error_delete_event_admin'] = 'Ошибка, повторите позже';
    echo json_encode(['success' => false, 'error' => 'Ошибка базы данных']);
}
exit();
