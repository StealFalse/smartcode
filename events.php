<?php include 'php/conectDBPage.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCode - Мероприятия</title>
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
        <p class="title-text">Афиша</p>
        <div class="events-grid">
            <?php
            $sql = "SELECT * FROM events";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <a href="#" class="btn-events-card" data-events="<?php echo $row['slug']; ?>">
                        <div class="events-card">
                            <img src="<?php echo $row['image']; ?>">
                            <h2 class="events-card-h2"><?php echo htmlspecialchars($row['title']); ?></h2>
                            <p class="events-card-p"><?php echo htmlspecialchars($row['description']) ?></p>
                        </div>
                    </a>
            <?php
                }
            } else {
                echo "Мероприятия недоступны";
            }
            ?>
        </div>
        <p class="title-text">Часто задаваемые вопросы</p>
        <div class="FAQ-block">
            <div class="FAQ-card">
                <h2 class="FAQ-card-h2">Сколько стоят мероприятия?</h2>
                <p class="FAQ-card-p">Все мероприятия абсолютно бесплатны, они стоят лишь вашего времени и желания.</p>
            </div>
            <div class="FAQ-card">
                <h2 class="FAQ-card-h2">Нужна ли предварительная подготовка?</h2>
                <p class="FAQ-card-p">Для хакатонов и воркшопов — базовые знания программирования. Для лекториев и дней
                    открытых дверей — никакой подготовки не нужно.</p>
            </div>
            <div class="FAQ-card">
                <h2 class="FAQ-card-h2">Можно ли участвовать онлайн?</h2>
                <p class="FAQ-card-p">Да. Лектории и чемпионат по кибербезопасности проходят онлайн. Хакатоны и воркшопы
                    — очно.</p>
            </div>
            <div class="FAQ-card">
                <h2 class="FAQ-card-h2">Выдают ли сертификаты?</h2>
                <p class="FAQ-card-p">Да, все участники получают электронный сертификат SmartCode.</p>
            </div>
            <div class="FAQ-card">
                <h2 class="FAQ-card-h2">Как узнать о новых мероприятиях?</h2>
                <p class="FAQ-card-p">Подпишитесь на наш Telegram-канал или следите за новостями на сайте.</p>
            </div>
        </div>
    </main>
    <?php include 'php/footer.php'; ?>
    <?php include 'php/modal.php'; ?>
    <script src="js/copy.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/theme.js"></script>
    <?php include 'php/modalAuth.php'; ?>
    <?php include 'php/modalRegister.php'; ?>
    <?php include 'php/modalReset.php'; ?>
    <?php include 'php/modalEvents.php' ?>
</body>

</html>