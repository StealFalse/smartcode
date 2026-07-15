<?php
include 'conectDBPage.php';
session_start();

$phone = $_GET['phone'];
$sql = "SELECT id, phone, email, fio, secret_word, role, balance FROM users WHERE phone = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $phone);
$stmt->execute();
$result = $stmt->get_result();
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo json_encode(['id' => 0, 'phone' => '', 'email' => '', 'fio' => '', 'secret_word' => '', 'role' => '', 'balance' => '']);
    exit;
}

header('Content-Type: application/json');
echo json_encode($user);
