<?php session_start();
include 'headerCabinet.php';
?>
<header>
    <div class="header-left">
        <div class="logo">
            <a href="index.php"><img src="img/Logo.svg"></a>
            <a href="index.php">
                <p>SmartCode</p>
            </a>
        </div>
        <div class="header-fast-links">
            <ul>
                <li><a href="about_us.php">О нас</a></li>
                <li><a href="courses.php">Курсы</a></li>
                <li><a href="events.php">Мероприятия</a></li>
                <li><a href="contacts.php">Контакты</a></li>
                <li><a href="branches.php">Филиалы</a></li>
            </ul>
        </div>
    </div>
    <div class="header-right">
        <a href="#" class="themeBtn">
            <i class="fas fa-sun" style="display: none;"></i>
            <i class="fas fa-moon"></i>
        </a>
        <?php
        if (!isset($_SESSION['role'])) {
            echo '<a href="#" class="btn-auth">Авторизация</a>';
        } else {
            echo '<a href="?butCabinet=1" class="icon-user"><i class="fas fa-user"></i></a>';
            echo '<a href="php/logout.php" class="btn-logout">Выйти</a>';
        }
        ?>
    </div>
</header>