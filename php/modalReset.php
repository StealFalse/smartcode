<?php
session_start();
include 'conectDBPage.php';

if (isset($_POST['butRes'])) {
    $emailOrPhoneReset = $_POST['emailOrPhoneReset'];
    $secretWord = $_POST['secretWordReset'];
    $newPassword = $_POST['passwordReset'];
    $newPasswordConfirm = $_POST['repasswordReset'];
    $redirect_to = isset($_POST['redirect_to']) ? $_POST['redirect_to'] : 'index.php';
    if (filter_var($emailOrPhoneReset, FILTER_VALIDATE_EMAIL)) {
        $field = 'email';
    } else {
        $field = 'phone';
    };
    $sql = "SELECT id, phone, password, secret_word, email, fio, role, balance FROM users WHERE $field = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $emailOrPhoneReset);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($secretWord !== $row['secret_word']) {
            $_SESSION['auth_error'] = 'Неверное секретное слово';
            $_SESSION['open_modal'] = true;
            header('location: ' . $redirect_to);
            exit();
        } else {
            if ($newPassword !== $newPasswordConfirm) {
                $_SESSION['auth_error'] = 'Пароли не совпадают';
                $_SESSION['open_modal'] = true;
                header('location: ' . $redirect_to);
                exit();
            }
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sqlNewPass = 'UPDATE users SET password = ? WHERE id = ?';
            $stmtNewPass = $conn->prepare($sqlNewPass);
            $stmtNewPass->bind_param('si', $hashedPassword, $row['id']);
            $stmtNewPass->execute();
            $_SESSION['auth_successfully'] = 'Пароль успешно изменен';
            $_SESSION['open_modal'] = true;
            header('location: ' . $redirect_to);
            exit();
        }
    } else {
        $_SESSION['auth_error'] = 'Такой почты или телефона не существует';
        $_SESSION['open_modal'] = true;
        header('location: ' . $redirect_to);
        exit();
    }
}
