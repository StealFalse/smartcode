<?php
session_start();
include 'conectDBPage.php';

$data = json_decode(file_get_contents('php://input'), true);

$teacherId = null;
if (isset($data['teacher_id']) && $data['teacher_id'] !== '' && $data['teacher_id'] !== 'null') {
    $teacherId = (int)$data['teacher_id'];
}

$sql = "INSERT INTO courses (title, description, duration, skills, program, price, image, teacher_id, slug) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssssdsis', $data['title'], $data['description'], $data['duration'], $data['skills'], $data['program'], $data['price'], $data['image'], $teacherId, $data['slug']);
$success = $stmt->execute();
if ($success) {
    $_SESSION['succesfuly_delete_course_teacher'] = 'Вы добавили новый курс "' . $data['title'] . '" в школу SmartCode';
    $_SESSION['succesfuly_delete_course_admin'] = 'Вы добавили новый курс "' . $data['title'] . '" в школу SmartCode';
} else {
    $_SESSION['error_delete_course_teacher'] = 'Ошибка, повторите позже';
    $_SESSION['error_delete_course_admin'] = 'Ошибка, повторите позже';
}

echo json_encode(['success' => $success]);
