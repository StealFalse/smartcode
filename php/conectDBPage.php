<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_smartcode');
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}
