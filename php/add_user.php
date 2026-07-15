<?php
session_start();
include 'conectDBPage.php';

$data = json_decode(file_get_contents('php://input'), true);

$hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
$sql = "INSERT INTO users (phone, secret_word, email, fio, role, password, balance) VALUES (?, ?, ?, ?, ?, ?, 0)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssss', $data['phone'], $data['secret_word'], $data['email'], $data['fio'], $data['role'], $hashedPassword);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
