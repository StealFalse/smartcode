<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCode - Филиалы</title>
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
        <p class="title-text">Где мы находимся</p>
        <div class="branches-block">
            <div class="branches-card">
                <div class="branches-card-text">
                    <h2>Москва</h2>
                    <a href="javascript:void(0)" class="copy-btn-two"
                        onclick="copyToClipboard('ул. Тверская, д. 15, стр. 2')"><i
                            class="fas fa-map-marker-alt"></i>ул. Тверская, д. 15, стр. 2</a>
                    <ul>
                        <li><span>250 рабочих станций с компьютерами</span></li>
                        <li><span>2-этажный кампус</span></li>
                        <li><span>1 игровая комната с настолками и приставкой</span></li>
                        <li><span>1 лаборатория робототехники</span></li>
                        <li><span>1 коворкинг-зона</span></li>
                    </ul>
                </div>
                <a href="#" class="branches_img_js" data-img="moscow">
                    <img src="img/School_mos.png">
                </a>
            </div>

            <div class="branches-card">
                <a href="#" class="branches_img_js" data-img="spb">
                    <img src="img/School_spb.png">
                </a>
                <div class="branches-card-text">
                    <h2>Санкт-Петербург</h2>
                    <a href="javascript:void(0)" class="copy-btn-two"
                        onclick="copyToClipboard('Невский проспект, д. 88')"><i
                            class="fas fa-map-marker-alt"></i>Невский проспект, д. 88</a>
                    <ul>
                        <li><span>200 рабочих станций с компьютерами</span></li>
                        <li><span>3-этажный кампус</span></li>
                        <li><span>2 игровые комнаты с приставками</span></li>
                        <li><span>1 лаборатория робототехники</span></li>
                        <li><span>1 зона отдыха с настолками</span></li>
                    </ul>
                </div>
            </div>

            <div class="branches-card">
                <div class="branches-card-text">
                    <h2>Новосибирск</h2>
                    <a href="javascript:void(0)" class="copy-btn-two"
                        onclick="copyToClipboard('Красный проспект, д. 101')"><i
                            class="fas fa-map-marker-alt"></i>Красный проспект, д. 101</a>
                    <ul>
                        <li><span>180 рабочих станций с компьютерами</span></li>
                        <li><span>2-этажный кампус в небоскрёбе</span></li>
                        <li><span>2 игровые комнаты</span></li>
                        <li><span>8 образовательных кластеров</span></li>
                        <li><span>1 коворкинг-зона</span></li>
                    </ul>
                </div>
                <a href="#" class="branches_img_js" data-img="nsk">
                    <img src="img/School_novosib.png">
                </a>
            </div>

            <div class="branches-card">
                <a href="#" class="branches_img_js" data-img="ekb">
                    <img src="img/School_ekb.png">
                </a>
                <div class="branches-card-text">
                    <h2>Екатеринбург</h2>
                    <a href="javascript:void(0)" class="copy-btn-two"
                        onclick="copyToClipboard('ул. Малышева, д. 51')"><i class="fas fa-map-marker-alt"></i>ул.
                        Малышева, д. 51</a>
                    <ul>
                        <li><span>220 рабочих станций с компьютерами</span></li>
                        <li><span>3-этажный кампус</span></li>
                        <li><span>2 игровые комнаты</span></li>
                        <li><span>1 лаборатория робототехники</span></li>
                        <li><span>1 комната для настольных игр</span></li>
                    </ul>
                </div>
            </div>

            <div class="branches-card">
                <div class="branches-card-text">
                    <h2>Казань</h2>
                    <a href="javascript:void(0)" class="copy-btn-two" onclick="copyToClipboard('ул. Баумана, д. 58')"><i
                            class="fas fa-map-marker-alt"></i>ул. Баумана, д. 58</a>
                    <ul>
                        <li><span>190 рабочих станций с компьютерами</span></li>
                        <li><span>3-этажный кампус</span></li>
                        <li><span>2 игровые комнаты</span></li>
                        <li><span>1 лаборатория робототехники</span></li>
                        <li><span>1 коворкинг-зона</span></li>
                        <li><span>1 комната для настольных игр</span></li>
                    </ul>
                </div>
                <a href="#" class="branches_img_js" data-img="kazan">
                    <img src="img/School_kazan.png">
                </a>
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
    <?php include 'php/modalImg.php' ?>
</body>

</html>