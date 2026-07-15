<?php include 'php/checkAdmin.php' ?>
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
    <p class="title-text">Личный кабинет</p>
    <main>
        <div class="block-cabinet">
            <div class="block-cabinet-header">
                <ul>
                    <li><a href="#" class="cabinet-tab" data-tab="courses" <?php echo ($activeTab == 'courses')  ? 'active' : ''; ?>>Курсы</a></li>
                    <li><a href="#" class="cabinet-tab" data-tab="events" <?php echo ($activeTab == 'events')  ? 'active' : ''; ?>>Мероприятия</a></li>
                    <li><a href="#" class="cabinet-tab" data-tab="users" <?php echo ($activeTab == 'users')  ? 'active' : ''; ?>>Пользователи</a></li>
                    <li><a href="#" class="cabinet-tab" data-tab="profile" <?php echo ($activeTab == 'profile')  ? 'active' : ''; ?>>Личные данные</a></li>
                </ul>
            </div>
            <div id="tab-courses" class="tab-pane <?php echo ($activeTab == 'courses')  ? 'active' : ''; ?>">
                <p class="title-text-cabinet">Курсы</p>
                <?php if (isset($_SESSION['succesfuly_delete_course_admin'])): ?>
                    <p class="succesfulyDeleteCourseTeacher"><?php echo $_SESSION['succesfuly_delete_course_admin'];
                                                                unset($_SESSION['succesfuly_delete_course_admin']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['error_delete_course_admin'])): ?>
                    <p class="errorDeleteCourseTeacher"><?php echo $_SESSION['error_delete_course_admin'];
                                                        unset($_SESSION['error_delete_course_admin']); ?></p>
                <?php endif; ?>
                <p class="text-cabinet">Таблица всех курсов школы SmartCode</p>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Расшифровка</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM courses";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                                <tr id="course-row-<?php echo $row['id']; ?>">
                                    <td class="table-id"><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo htmlspecialchars(number_format($row['price'], 0, '', '')), '₽/мес'; ?></td>
                                    <td><?php echo htmlspecialchars($row['slug']); ?></td>
                                    <td>
                                        <a href="#" class="btn-edit-course" data-slug="<?php echo $row['slug']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="php/delete_course.php?id=<?php echo $row['id']; ?>" class="btn-delete-course" onclick="return confirm('Вы уверены, что хотите удалить курс?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<td colspan="5">Курсы не найдены</td>';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="#" class="btn-add-course">Добавить курс</a>
            </div>
            <div id="tab-events" class="tab-pane <?php echo ($activeTab == 'events')  ? 'active' : ''; ?>">
                <p class="title-text-cabinet">Мероприятия</p>
                <?php if (isset($_SESSION['succesfuly_delete_event_admin'])): ?>
                    <p class="succesfulyDeleteCourseTeacher"><?php echo $_SESSION['succesfuly_delete_event_admin'];
                                                                unset($_SESSION['succesfuly_delete_event_admin']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['error_delete_event_admin'])): ?>
                    <p class="errorDeleteCourseTeacher"><?php echo $_SESSION['error_delete_event_admin'];
                                                        unset($_SESSION['error_delete_event_admin']); ?></p>
                <?php endif; ?>
                <p class="text-cabinet">Таблица всех мероприятий школы SmartCode</p>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Формат</th>
                            <th>Расшифровка</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM events";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                                <tr id="event-row-<?php echo $row['id']; ?>">
                                    <td class="table-id"><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['format']); ?></td>
                                    <td><?php echo htmlspecialchars($row['slug']); ?></td>
                                    <td>
                                        <a href="#" class="btn-edit-event" data-slug="<?php echo $row['slug']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="php/delete_event.php?id=<?php echo $row['id']; ?>" class="btn-delete-event" onclick="return confirm('Вы уверены, что хотите удалить мероприятие?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<td colspan="5">Мероприятия не найдены</td>';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="#" class="btn-add-event">Добавить мероприятие</a>
            </div>
            <div id="tab-users" class="tab-pane <?php echo ($activeTab == 'users')  ? 'active' : ''; ?>">
                <p class="title-text-cabinet">Пользователи</p>
                <?php if (isset($_SESSION['succesfuly_delete_user_admin'])): ?>
                    <p class="succesfulyDeleteCourseTeacher"><?php echo $_SESSION['succesfuly_delete_user_admin'];
                                                                unset($_SESSION['succesfuly_delete_user_admin']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['error_delete_user_admin'])): ?>
                    <p class="errorDeleteCourseTeacher"><?php echo $_SESSION['error_delete_user_admin'];
                                                        unset($_SESSION['error_delete_user_admin']); ?></p>
                <?php endif; ?>
                <p class="text-cabinet">Таблица всех пользователей школы SmartCode</p>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Роль</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM users";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                                <tr id="event-row-<?php echo $row['id']; ?>">
                                    <td class="table-id"><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                                    <td>
                                        <a href="#" class="btn-edit-user" data-phone="<?php echo $row['phone']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="php/delete_user.php?id=<?php echo $row['id']; ?>" class="btn-delete-user" onclick="return confirm('Вы уверены, что хотите удалить пользователя?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<td colspan="5">Пользователи не найдены</td>';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="#" class="btn-add-user">Добавить пользователя</a>
            </div>
            <div id="tab-profile" class="tab-pane <?php echo ($activeTab == 'profile')  ? 'active' : ''; ?>">
                <p class="title-text-cabinet">Профиль</p>
                <?php if (isset($_SESSION['success_update'])): ?>
                    <p class="succesfulyDeleteCourseTeacher"><?php echo $_SESSION['success_update'];
                                                                unset($_SESSION['success_update']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['error_update'])): ?>
                    <p class="errorDeleteCourseTeacher"><?php echo $_SESSION['error_update'];
                                                        unset($_SESSION['error_update']); ?></p>
                <?php endif; ?>
                <p class="text-cabinet-fio"><?php echo $_SESSION['fio']; ?></p>
                <p class="text-cabinet-inf">Роль: Администратор</p>
                <p class="text-cabinet-inf">Телефон: <?php echo $_SESSION['phone'] ?></p>
                <p class="text-cabinet-inf marg">Почта: <?php echo $_SESSION['email'] ?></p>
                <a href="#" class="btn-edit-profile" data-phone="<?php echo $_SESSION['phone']; ?>">Редактировать</a>
            </div>
        </div>
    </main>
    <?php include 'php/footer.php'; ?>
    <?php include 'php/modal.php'; ?>
    <script src="js/copy.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/theme.js"></script>
</body>