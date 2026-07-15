<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCode - Контакты</title>
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
        <p class="title-text">Связь с нами</p>
        <div class="contact-grid">
            <div class="contact-card">
                <h2>Филиал SmartCode в Москве</h2>
                <a href="javascript:void(0)" class="copy-btn"
                    onclick="copyToClipboard('ул. Тверская, д. 15, стр. 2')"><i class="fas fa-map-marker-alt"></i>ул.
                    Тверская, д. 15, стр. 2</a>
                <ul>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 903 123-45-67')"><i
                                class="fas fa-phone-alt"></i>+7 903 123-45-67</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 916 987-65-43')"><i
                                class="fas fa-phone-alt"></i>+7 916 987-65-43</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 921 555-88-99')"><i
                                class="fas fa-phone-alt"></i>+7 921 555-88-99</a></li>
                    <li><a href="mailto:moscow@smartcode.ru"><i class="fas fa-envelope"></i>moscow@smartcode.ru</a></li>
                </ul>
                <a href="#" class="contact-btn" data-contact="moscow">О филиале</a>
            </div>

            <div class="contact-card">
                <h2>Филиал SmartCode в Санкт-Петербурге</h2>
                <a href="javascript:void(0)" class="copy-btn" onclick="copyToClipboard('Невский проспект, д. 88')"><i
                        class="fas fa-map-marker-alt"></i>Невский проспект, д. 88</a>
                <ul>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 812 123-45-67')"><i
                                class="fas fa-phone-alt"></i>+7 812 123-45-67</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 812 987-65-43')"><i
                                class="fas fa-phone-alt"></i>+7 812 987-65-43</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 812 555-88-99')"><i
                                class="fas fa-phone-alt"></i>+7 812 555-88-99</a></li>
                    <li><a href="mailto:spb@smartcode.ru"><i class="fas fa-envelope"></i>spb@smartcode.ru</a></li>
                </ul>
                <a href="#" class="contact-btn" data-contact="spb">О филиале</a>
            </div>

            <div class="contact-card">
                <h2>Филиал SmartCode в Новосибирске</h2>
                <a href="javascript:void(0)" class="copy-btn" onclick="copyToClipboard('Красный проспект, д. 101')"><i
                        class="fas fa-map-marker-alt"></i>Красный проспект, д. 101</a>
                <ul>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 383 123-45-67')"><i
                                class="fas fa-phone-alt"></i>+7 383 123-45-67</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 383 987-65-43')"><i
                                class="fas fa-phone-alt"></i>+7 383 987-65-43</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 383 555-88-99')"><i
                                class="fas fa-phone-alt"></i>+7 383 555-88-99</a></li>
                    <li><a href="mailto:nsk@smartcode.ru"><i class="fas fa-envelope"></i>nsk@smartcode.ru</a></li>
                </ul>
                <a href="#" class="contact-btn" data-contact="nsk">О филиале</a>
            </div>

            <div class="contact-card">
                <h2>Филиал SmartCode в Екатеринбурге</h2>
                <a href="javascript:void(0)" class="copy-btn" onclick="copyToClipboard('ул. Малышева, д. 51')"><i
                        class="fas fa-map-marker-alt "></i>ул. Малышева, д. 51</a>
                <ul>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 343 123-45-67')"><i
                                class="fas fa-phone-alt"></i>+7 343 123-45-67</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 343 987-65-43')"><i
                                class="fas fa-phone-alt"></i>+7 343 987-65-43</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 343 555-88-99')"><i
                                class="fas fa-phone-alt"></i>+7 343 555-88-99</a></li>
                    <li><a href="mailto:ekb@smartcode.ru"><i class="fas fa-envelope"></i>ekb@smartcode.ru</a></li>
                </ul>
                <a href="#" class="contact-btn" data-contact="ekb">О филиале</a>
            </div>

            <div class="contact-card">
                <h2>Филиал SmartCode в Казани</h2>
                <a href="javascript:void(0)" class="copy-btn" onclick="copyToClipboard('ул. Баумана, д. 58')"><i
                        class="fas fa-map-marker-alt"></i>ул. Баумана, д. 58</a>
                <ul>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 843 123-45-67')"><i
                                class="fas fa-phone-alt"></i>+7 843 123-45-67</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 843 987-65-43')"><i
                                class="fas fa-phone-alt"></i>+7 843 987-65-43</a></li>
                    <li><a href="javascript:void(0)" onclick="copyToClipboard('+7 843 555-88-99')"><i
                                class="fas fa-phone-alt"></i>+7 843 555-88-99</a></li>
                    <li><a href="mailto:kazan@smartcode.ru"><i class="fas fa-envelope"></i>kazan@smartcode.ru</a></li>
                </ul>
                <a href="#" class="contact-btn" data-contact="kazan">О филиале</a>
            </div>
        </div>
        <p class="title-text">По другим вопросам</p>
        <div class="extra-FAQ-block">
            <div class="extra-FAQ-card">
                <h2>Корпоративное обучение</h2>
                <a href="mailto:corp@smartcode.ru"><i class="fas fa-envelope"></i>corp@smartcode.ru</a>
            </div>
            <div class="extra-FAQ-card">
                <h2>Франшиза</h2>
                <a href="mailto:fransh@smartcode.rus"><i class="fas fa-envelope"></i>fransh@smartcode.ru</a>
            </div>
            <div class="extra-FAQ-card">
                <h2>Для СМИ</h2>
                <a href="mailto:smi@smartcode.ru"><i class="fas fa-envelope"></i>smi@smartcode.ru</a>
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
    <?php include 'php/modalContacts.php' ?>
</body>

</html>