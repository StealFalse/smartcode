<?php
session_start();
include 'conectDBPage.php';

if (isset($_POST['but_wallet'])) {
    $balanceUp = $_POST['balanceUp'];
    $studentId = $_SESSION['user_id'];
    $sql = "UPDATE users SET balance = balance + ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('di', $balanceUp, $studentId);
    $updateStmt = $stmt->execute();
    $stmt->close();
    if ($updateStmt) {
        $sqlNew = "SELECT balance FROM users WHERE id = ?";
        $stmtNew = $conn->prepare($sqlNew);
        $stmtNew->bind_param('i', $studentId);
        $stmtNew->execute();
        $resultNew = $stmtNew->get_result();
        $row = $resultNew->fetch_assoc();
        $_SESSION['balance'] = $row['balance'];
        $stmtNew->close();

        $sqlTransaction = "INSERT INTO transactions (user_id, amount, type, description, created_at) VALUES (?, ?, 'deposit', 'Пополнение баланса', NOW())";
        $stmtTransaction = $conn->prepare($sqlTransaction);
        $stmtTransaction->bind_param('id', $studentId, $balanceUp);
        $stmtTransaction->execute();
        $stmtTransaction->close();

        $_SESSION['wallet_success'] = 'Вы пополнили баланс на ' . number_format($balanceUp, 0, '', '') . '₽';

        header('location: ../cabinetStudent.php?tab=wallet');
        exit;
    } else {
        echo 'Ошибка пополнения';
    }
}
