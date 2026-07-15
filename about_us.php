<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCode - О нас</title>
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
        <p class="title-text">Наши достижения</p>
        <div class="achievements">
            <div class="achievements-one">
                <p>5+ лет — опыта в IT-образовании</p>
            </div>
            <div class="achievements-two">
                <p>2000+ учеников — прошли наши курсы</p>
            </div>
            <div class="achievements-one">
                <p>120+ преподавателей — действующих IT-специалистов</p>
            </div>
            <div class="achievements-two">
                <p>12 школ-партнеров — с госаккредитацией</p>
            </div>
            <div class="achievements-one">
                <p>7 стран — где работают выпускники</p>
            </div>
            <div class="achievements-two">
                <p>50+ стажировок — в IT-компаниях</p>
            </div>
            <div class="achievements-one">
                <p>8 кампусов — в разных районах</p>
            </div>
            <div class="achievements-two">
                <p>1,2 млн рублей — гранты и премии</p>
            </div>
        </div>
        <p class="title-text">Профессионалы своего дела</p>
        <div class="teacher-block">
            <div class="teacher-card">
                <img src="img/teacher_1.png">
                <h2>Сергей Иванов</h2>
                <p>• Python-разработчик</p>
                <p>• Опыт 7 лет</p>
                <p>• 60+ выпускников</p>
            </div>
            <div class="teacher-card">
                <img src="img/teacher_2.png">
                <h2>Анна Морозова</h2>
                <p>• Fullstack-разработчик</p>
                <p>• Опыт 6 лет</p>
                <p>• 55+ выпускников</p>
            </div>
            <div class="teacher-card">
                <img src="img/teacher_3.png">
                <h2>Юрий Михайлов</h2>
                <p>• UI/UX-дизайнер</p>
                <p>• Опыт 6 лет</p>
                <p>• 60+ выпускников</p>
            </div>
        </div>
        <p class="title-text">Партнеры и федеральные проекты</p>
        <div class="partners-block">
            <div class="partners-card">
                <img src="img/Sber.png">
                <h2>Сбер</h2>
                <p>Помогает SmartCode в развитии IT-образования, проводит профориентацию, мастер-классы и обучает
                    преподавателей в рамках совместных образовательных программ.</p>
            </div>
            <div class="partners-card">
                <img src="img/T-Bank.png">
                <h2>Т-Банк</h2>
                <p>Партнерство с Т-Банком дает ученикам SmartCode доступ к бесплатным курсам по финансовой грамотности,
                    IT-лекциям от экспертов и стажировкам для старшеклассников.</p>
            </div>
            <div class="partners-card">
                <img src="img/iPolytech.png">
                <h2>Политех</h2>
                <p>Совместные профориентационные программы, дни открытых дверей, лекции преподавателей Политеха и
                    целевое поступление для лучших выпускников SmartCode.</p>
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
</body>

</html>