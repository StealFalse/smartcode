<?php
header('ngrok-skip-browser-warning: any-value');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCode - Главная</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/Logo.svg">
</head>

<body>
    <noscript>Пожалуйста включите JS в своем браузере</noscript>
    <?php include 'php/header.php'; ?>
    <main>
        <div class="home-block">
            <div class="home-block-text">
                <p>SmartCode — это учеба в радость и результат, которым гордятся.</p>
            </div>
            <div class="home-grid">
                <div class="home-card">
                    <i class="fas fa-gamepad"></i>
                    <p>Игровой формат обучения</p>
                </div>
                <div class="home-card">
                    <i class="fas fa-laptop-code"></i>
                    <p>Проекты вместо зубрежки</p>
                </div>
                <div class="home-card">
                    <i class="fas fa-folder-open"></i>
                    <p>Портфолио к выпуску</p>
                </div>
                <div class="home-card">
                    <i class="fas fa-graduation-cap"></i>
                    <p>Помощь при поступлении</p>
                </div>
            </div>
        </div>
        <p class="title-text">Обучение</p>
        <div class="education-block">
            <div class="education-text-block">
                <div class="education-text-block-o">
                    <h2>Комфортный темп</h2>
                    <p>Ребенок осваивает программу в удобном для себя режиме. Мы помогаем улучшить оценки и качество
                        знаний
                        без перегрузок.</p>
                </div>
                <div class="education-text-block-o">
                    <h2>Никакого стресса</h2>
                    <p>Итоговые аттестации сдаются дистанционно, всего раз в год. Все тесты составлены из тех вопросов,
                        к
                        которым дети готовятся в течение всего учебного года.</p>
                </div>
                <div class="education-text-block-o">
                    <h2>Аттестат государственного образца</h2>
                    <p>По окончании обучения выдается официальный аттестат о среднем или полном образовании от
                        школы-партнера SmartCode.</p>
                </div>
            </div>
            <img src="img/Education.png" class="img-education">
        </div>

    </main>
    <?php include 'php/footer.php'; ?>
    <?php include 'php/modal.php' ?>
    <script src="js/copy.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/theme.js"></script>
    <?php include 'php/modalAuth.php'; ?>
    <?php include 'php/modalRegister.php'; ?>
    <?php include 'php/modalReset.php'; ?>
</body>

</html>