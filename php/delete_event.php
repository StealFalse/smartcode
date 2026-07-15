<?php
session_start();
include 'conectDBPage.php';

$id = $_GET['id'];

$sqlEvent = "SELECT title FROM events WHERE id = ?";
$stmtEvent = $conn->prepare($sqlEvent);
$stmtEvent->bind_param('i', $id);
$stmtEvent->execute();
$resultEvent = $stmtEvent->get_result();
$rowEvent = $resultEvent->fetch_assoc();

$sql = "DELETE FROM events WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
if ($stmt->execute()) {
    $_SESSION['succesfuly_delete_event_admin'] = 'Вы удалили мероприятие "' . $rowEvent['title'] . '" из школы SmartCode';
} else {
    $_SESSION['error_delete_event_admin'] = 'Ошибка, повторите позже';
}

header('location: ../cabinetAdmin.php?tab=events');
exit;
