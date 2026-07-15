<?php include 'php/conectDBPage.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCode - Курсы</title>
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
        <p class="title-text">Каталог</p>
        <div class="courses-grid">
            <?php
            $sql = "SELECT * FROM courses";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <div class="courses-card">
                        <img src="<?php echo $row['image'] ?>">
                        <h2><?php echo htmlspecialchars($row['title']) ?></h2>
                        <p><?php echo htmlspecialchars($row['description']) ?></p>
                        <p>От <?php echo number_format($row['price'], 0, '', ' '); ?> ₽/мес</p>
                        <a href="#" class="btn-courses-card" data-courses="<?php echo $row['slug'] ?>">Подробнее</a>
                    </div>
            <?php
                }
            } else {
                echo 'Курсы недоступны';
            }
            ?>
        </div>
        <p class="title-text">Процесс записи на курс</p>
        <div class="process-block">
            <h1 class="process-block-h1">Шаг 1. Авторизуйся</h1>
            <p class="process-block-p">Нажми на кнопку «Авторизация» в правом верхнем углу. Введи свой номер телефона или email и пароль. Если у тебя ещё нет аккаунта — зарегистрируйся за пару минут.</p>
            <h1 class="process-block-h1">Шаг 2. Пополни кошелек</h1>
            <p class="process-block-p">Перейди в личный кабинет и открой вкладку «Кошелёк». Укажи сумму пополнения и нажми «Пополнить». Средства поступят на твой баланс мгновенно — можешь сразу переходить к выбору курса.</p>
            <h1 class="process-block-h1">Шаг 3. Выбери курс</h1>
            <p class="process-block-p">В разделе «Курсы» найди подходящее направление. Нажми «Подробнее», чтобы изучить программу, длительность и стоимость. Убедись, что на балансе достаточно средств для оплаты.</p>
            <h1 class="process-block-h1">Шаг 4. Запишись на курс</h1>
            <p class="process-block-p">В модальном окне курса нажми кнопку «Записаться». Деньги автоматически спишутся с твоего кошелька, а курс появится в разделе «Мои курсы» в личном кабинете. С этого момента ты — студент SmartCode!</p>
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
    <?php include 'php/modalCourses.php' ?>
</body>

</html>