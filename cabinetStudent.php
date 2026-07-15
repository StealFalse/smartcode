<?php include 'php/checkStudent.php' ?>
<?php include 'php/conectDBPage.php' ?>
<?php $activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'courses'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCode - Личный кабинет</title>
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
    <?php include 'php/modal.php'; ?>
    <p class="title-text">Личный кабинет</p>
    <main>
        <div class="block-cabinet">
            <div class="block-cabinet-header">
                <ul>
                    <li><a href="#" class="cabinet-tab" data-tab="courses" <?php echo ($activeTab == 'courses')  ? 'active' : ''; ?>>Мои курсы</a></li>
                    <li><a href="#" class="cabinet-tab" data-tab="events" <?php echo ($activeTab == 'events') ? 'active' : ''; ?>>Мои мероприятия</a></li>
                    <li><a href="#" class="cabinet-tab" data-tab="wallet" <?php echo ($activeTab == 'wallet') ? 'active' : ''; ?>>Кошелек</a></li>
                    <li><a href="#" class="cabinet-tab" data-tab="profile" <?php echo ($activeTab == 'profile') ? 'active' : ''; ?>>Личные данные</a></li>
                </ul>
            </div>
            <div id="tab-courses" class="tab-pane <?php echo ($activeTab == 'courses') ? 'active' : ''; ?>">
                <p class="title-text-cabinet">Курсы</p>
                <?php if (isset($_SESSION['succesfuly_delete_course_student'])): ?>
                    <p class="succesfulyDeleteCourseStudent"><?php echo $_SESSION['succesfuly_delete_course_student'];
                                                                unset($_SESSION['succesfuly_delete_course_student']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['error_delete_course_student'])): ?>
                    <p class="errorDeleteCourseStudent"><?php echo $_SESSION['error_delete_course_student'];
                                                        unset($_SESSION['error_delete_course_student']); ?></p>
                <?php endif; ?>
                <p class="text-cabinet">Таблица ваших курсов</p>
                <table>
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM courses";
                        $sql2 = "SELECT * FROM user_courses";
                        $res = mysqli_query($conn, $sql);
                        $res2 = mysqli_query($conn, $sql2);

                        $studentId = $_SESSION['user_id'];
                        $enrolledCoursesId = [];

                        while ($row2 = mysqli_fetch_assoc($res2)) {
                            if ($row2['user_id'] == $studentId) {
                                $enrolledCoursesId[] = $row2['course_id'];
                            }
                        }

                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                if (in_array($row['id'], $enrolledCoursesId)) {

                        ?>
                                    <tr id="course-row-<?php echo $row['id']; ?>">
                                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td><?php echo htmlspecialchars(number_format($row['price'], 0, '', '')), '₽/мес'; ?></td>
                                        <td>
                                            <a href="php/delete_course_student.php?id=<?php echo $row['id']; ?>" class="btn-delete-course" onclick="return confirm('Вы уверены, что хотите отказаться от курса? (деньги вернутся на кошелек)')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo 'У вас нет преподаваемых курсов';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="tab-events" class="tab-pane <?php echo ($activeTab == 'events') ? 'active' : ''; ?>">
                <p class="title-text-cabinet">Мероприятия</p>
                <?php if (isset($_SESSION['succesfuly_delete_event_student'])): ?>
                    <p class="successfullyDeleteEventStudent"><?php echo $_SESSION['succesfuly_delete_event_student'];
                                                                unset($_SESSION['succesfuly_delete_event_student']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['error_delete_event_student'])): ?>
                    <p class="errorDeleteEventStudent"><?php echo $_SESSION['error_delete_event_student'];
                                                        unset($_SESSION['error_delete_event_student']); ?></p>
                <?php endif; ?>
                <p class="text-cabinet">Таблица мероприятий на которые вы записаны</p>
                <table>
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Длительность</th>
                            <th>Формат</th>
                            <th>Дата</th>
                            <th>Место</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM events";
                        $sql2 = "SELECT * FROM user_events";
                        $res = mysqli_query($conn, $sql);
                        $res2 = mysqli_query($conn, $sql2);

                        $studentId = $_SESSION['user_id'];
                        $enrolledEventsId = [];

                        while ($row2 = mysqli_fetch_assoc($res2)) {
                            if ($row2['user_id'] == $studentId) {
                                $enrolledEventsId[] = $row2['event_id'];
                            }
                        }

                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                if (in_array($row['id'], $enrolledEventsId)) {

                        ?>
                                    <tr id="course-row-<?php echo $row['id']; ?>">
                                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td><?php echo htmlspecialchars($row['duration']); ?></td>
                                        <td><?php echo htmlspecialchars($row['format']); ?></td>
                                        <td><?php echo htmlspecialchars($row['event_date']); ?></td>
                                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                                        <td>
                                            <a href="php/delete_event_student.php?id=<?php echo $row['id']; ?>" class="btn-delete-course" onclick="return confirm('Вы уверены, что хотите отказаться от мероприятия?');"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo 'У вас нет преподаваемых курсов';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="tab-wallet" class="tab-pane <?php echo ($activeTab == 'wallet') ? 'active' : ''; ?>">
                <p class="title-text-cabinet">Баланс</p>
                <?php if (isset($_SESSION['wallet_success'])): ?>
                    <p class="successfullyWallet"><?php echo $_SESSION['wallet_success'];
                                                    unset($_SESSION['wallet_success']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['wallet_error'])): ?>
                    <p class="errorWallet"><?php echo $_SESSION['wallet_error'];
                                            unset($_SESSION['wallet_error']); ?></p>
                <?php endif; ?>
                <p class="text-cabinet">Ваш баланс: <?php echo number_format($_SESSION['balance'], 0, '', ''); ?>₽</p>
                <form class="walletForm" id="walletForm" method="POST" action="php/wallet.php">
                    <input type="number" id="balanceUp" name="balanceUp" min="1" step="1" placeholder="Введите сумму пополнения" required>
                    <button type="submit" name="but_wallet">Пополнить</button>
                    <button type="submit" class="button-history" name="but_history">История платежей</button>
                </form>
            </div>
            <div id="tab-profile" class="tab-pane <?php echo ($activeTab == 'profile') ? 'active' : ''; ?>">
                <p class="title-text-cabinet">Профиль</p>
                <?php if (isset($_SESSION['success_update'])): ?>
                    <p class="successfullyUpdate"><?php echo $_SESSION['success_update'];
                                                    unset($_SESSION['success_update']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['error_update'])): ?>
                    <p class="errorUpdate"><?php echo $_SESSION['error_update'];
                                            unset($_SESSION['error_update']); ?></p>
                <?php endif; ?>
                <p class="text-cabinet-fio"><?php echo $_SESSION['fio']; ?></p>
                <p class="text-cabinet-inf">Роль: Студент</p>
                <p class="text-cabinet-inf">Телефон: <?php echo $_SESSION['phone'] ?></p>
                <p class="text-cabinet-inf marg">Почта: <?php echo $_SESSION['email'] ?></p>
                <a href="#" class="btn-edit-profile" data-phone="<?php echo $_SESSION['phone'] ?>">Редактировать</a>
            </div>
        </div>
    </main>
    <?php include 'php/modalEvents.php'; ?>
    <?php include 'php/footer.php'; ?>
    <script src="js/copy.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/theme.js"></script>
</body>