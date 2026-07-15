<?php
if (isset($_GET['butCabinet']) && isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    if ($role === 'student') {
        header('location: /cabinetStudent.php');
    } elseif ($role === 'teacher') {
        header('location: /cabinetTeacher.php');
    } elseif ($role === 'admin') {
        header('location: /cabinetAdmin.php');
    }
    exit();
}
