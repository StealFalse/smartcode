<?php
session_start();
include 'conectDBPage.php';

$data = json_decode(file_get_contents('php://input'), true);

$sql = "INSERT INTO events (title, description, duration, format, what_you_get, program, event_date, location, image, slug) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssssssss', $data['title'], $data['description'], $data['duration'], $data['format'], $data['what_you_get'], $data['program'], $data['event_date'], $data['location'], $data['image'], $data['slug']);
if ($success = $stmt->execute()) {
    $_SESSION['succesfuly_delete_event_admin'] = 'Вы добавили новое мероприятие "' . $data['title'] . '" в школу SmartCode';
} else {
    $_SESSION['error_delete_event_admin'] = 'Ошибка, повторите позже';
}

echo json_encode(['success' => $success]);
