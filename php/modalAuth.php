<?php
session_start();
include 'conectDBPage.php';
if (isset($_POST['butlog'])) {
    $emailOrPhone = trim($_POST['emailOrPhone']);
    $password = $_POST['password'];
    $redirect_to = isset($_POST['redirect_to']) ? $_POST['redirect_to'] : 'index.php';
    if (filter_var($emailOrPhone, FILTER_VALIDATE_EMAIL)) {
        $field = 'email';
    } else {
        $field = 'phone';
    }
    $sql = "SELECT id, phone, password, secret_word, email, fio, role, balance FROM users WHERE $field = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $emailOrPhone);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (!password_verify($password, $row['password'])) {
            $_SESSION['auth_error'] = 'Неверный пароль';
            $_SESSION['open_modal'] = true;
            header('location: ' . $redirect_to);
            exit();
        } else {
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fio'] = $row['fio'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['balance'] = $row['balance'];
            if ($row['role'] == 'student') {
                header('location: /cabinetStudent.php');
            } elseif ($row['role'] == 'teacher') {
                header('location: /cabinetTeacher.php');
            } elseif ($row['role'] == 'admin') {
                header('location: /cabinetAdmin.php');
            }
            exit();
        }
    } else {
        $_SESSION['auth_error'] = 'Неверный логин';
        $_SESSION['open_modal'] = true;
        header('location: ' . $redirect_to);
        exit();
    }
}
