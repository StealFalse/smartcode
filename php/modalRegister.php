<?php
session_start();
include 'conectDBPage.php';

if (isset($_POST['butreg'])) {
    $fio = $_POST['fio'];
    $numPhone = $_POST['numPhone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $secretWord = $_POST['secretWord'];
    $redirect_to = isset($_POST['redirect_to']) ? $_POST['redirect_to'] : 'index.php';

    $sql = "SELECT id FROM users WHERE email = ? OR phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $numPhone);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['auth_error'] = 'Пользователь с такой почтой или телефоном уже существует';
        $_SESSION['open_modal'] = true;
        header('location: ' . $redirect_to);
        exit();
    }

    if ($password !== $repassword) {
        $_SESSION['auth_error'] = 'Введенные пароли не совпадают!';
        $_SESSION['open_modal'] = true;
        header('location: ' . $redirect_to);
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql2 = "INSERT INTO users (fio, email, phone, password, secret_word, role, balance) VALUES (?, ?, ?, ?, ?, 'student', 0)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param('sssss', $fio, $email, $numPhone, $hashedPassword, $secretWord);
    if ($stmt2->execute()) {
        $_SESSION['auth_successfully'] = 'Регистрация успешна!';
        $_SESSION['open_modal'] = true;
        header('location: ' . $redirect_to);
        exit();
    } else {
        $_SESSION['auth_error'] = 'Ошибка регистрации';
        $_SESSION['open_modal'] = true;
        header('location: ' . $redirect_to);
        exit();
    }
}
