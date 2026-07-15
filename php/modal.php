<div id="modalLogin" class="modal">
    <a href="" class="close"><i class="fas fa-times"></i></a>
    <form class="modal-content" id="authForm" method="POST" action="php/modalAuth.php">
        <div class="modal-content-logo">
            <img src="img/Logo.svg">
            <h2>SmartCode</h2>
            <p>Вход в аккаунт</p>
        </div>
        <div class="modal-content-form">
            <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p class="errorAuth">
                <?php
                if (isset($_SESSION['auth_error'])) {
                    echo $_SESSION['auth_error'];
                    unset($_SESSION['auth_error']);
                }
                ?>
            </p>
            <p class="successfullyAuth">
                <?php
                if (isset($_SESSION['auth_successfully'])) {
                    echo $_SESSION['auth_successfully'];
                    unset($_SESSION['auth_successfully']);
                }
                ?>
            </p>
            <input type="text" placeholder="Email или номер телефона" id="emailOrPhone" name="emailOrPhone" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$|^\d{10,11}$" title="ivan@gmail.com / 89041954865" required>
            <input type="password" placeholder="Пароль" id="password" name="password" pattern=".{12,64}" title="Пароль должен содержать от 12 до 64 символов" required>
            <button type="submit" class="aut" name="butlog">Войти</button>
        </div>
        <hr>
        <div class="modal-content-block-btn">
            <button type="button" class="switch-modal" data-target='register'>Регистрация</button>
            <button type="button" class="switch-modal" data-target='reset'>Забыли пароль</button>
        </div>
    </form>
</div>
<div id="modalRegister" class="modal">
    <a href="" class="close"><i class="fas fa-times"></i></a>
    <form class="modal-content" id="regForm" method="POST" action="php/modalRegister.php">
        <div class="modal-content-logo">
            <img src="img/Logo.svg">
            <h2>SmartCode</h2>
            <p>Регистрация</p>
        </div>
        <div class="modal-content-form">
            <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p class="errorAuth">
                <?php
                if (isset($_SESSION['auth_error'])) {
                    echo $_SESSION['auth_error'];
                    unset($_SESSION['auth_error']);
                }
                ?>
            </p>
            <p class="successfullyAuth">
                <?php
                if (isset($_SESSION['auth_successfully'])) {
                    echo $_SESSION['auth_successfully'];
                    unset($_SESSION['auth_successfully']);
                }
                ?>
            </p>
            <input type="text" placeholder="Иванов Иван Иванович" id="fio" name="fio" pattern="^[А-ЯЁ][а-яё]{1,30}\s[А-ЯЁ][а-яё]{1,30}\s[А-ЯЁ][а-яё]{1,30}$" title="Введите ФИО полностью" required>
            <input type="text" placeholder="Номер телефона" id="numPhone" name="numPhone" pattern="^\d{10,11}$" title="Номер телефона должен содержать от 10 до 11 символов" required>
            <input type="email" placeholder="Электронная почта" id="email" name="email" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" required>
            <input type="password" placeholder="Пароль" id="password" name="password" pattern=".{12,64}" title="Пароль должен содержать от 12 до 64 символов" required>
            <input type="password" placeholder="Повторите пароль" id="repassword" name="repassword" pattern=".{12,64}" title="Пароль должен содержать от 12 до 64 символов" required>
            <input type="text" placeholder="Секретное слово для восстановления" id="secretWord" pattern=".{3,20}" title="Секретное слово должно содержать от 3 до 20 символов" name="secretWord"
                required>
            <button type="submit" class="aut" name="butreg">Зарегистрироваться</button>
            <button type="button" class="switch-modal modal-btn-home" data-target='login'>Назад</button>
        </div>
    </form>
</div>
<div id="modalReset" class="modal">
    <a href="" class="close"><i class="fas fa-times"></i></a>
    <form class="modal-content" id="resetForm" method="POST" action="php/modalReset.php">
        <div class="modal-content-logo">
            <img src="img/Logo.svg">
            <h2>SmartCode</h2>
            <p>Восстановление пароля</p>
        </div>
        <div class="modal-content-form">
            <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p class="errorAuth">
                <?php
                if (isset($_SESSION['auth_error'])) {
                    echo $_SESSION['auth_error'];
                    unset($_SESSION['auth_error']);
                }
                ?>
            </p>
            <p class="successfullyAuth">
                <?php
                if (isset($_SESSION['auth_successfully'])) {
                    echo $_SESSION['auth_successfully'];
                    unset($_SESSION['auth_successfully']);
                }
                ?>
            </p>
            <input type="text" placeholder="Email или номер телефона" id="emailOrPhoneReset" name="emailOrPhoneReset" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$|^\d{10,11}$" title="ivan@gmail.com / 89041954865"
                required>
            <input type="text" placeholder="Секретное слово" id="secretWordReset" name="secretWordReset" pattern=".{3,20}" title="Кодовое слово должно содержать от 3 до 20 символов" required>
            <input type="password" placeholder="Новый пароль" id="passwordReset" name="passwordReset" pattern=".{12,64}" title="Пароль должен содержать от 12 до 64 символов" required>
            <input type="password" placeholder="Повторите пароль" id="repasswordReset" name="repasswordReset" pattern=".{12,64}" title="Пароль должен содержать от 12 до 64 символов" required>
            <button type="submit" class="aut" name="butRes">Сменить пароль</button>
            <button type="button" class="switch-modal modal-btn-home" data-target='login'>Назад</button>
        </div>
    </form>
</div>
<div id="modalForm" class="modal">
    <a href="#" class="close"><i class="fas fa-times"></i></a>
    <div class="modal-content">
        <div class="modal-content-logo">
            <img src="img/Logo.svg">
            <h2>SmartCode</h2>
            <p id="modalFormTitle">Редактирование</p>
        </div>
        <div class="modal-content-form">
            <input type="hidden" id="formId">
            <input type="hidden" id="formMode">
            <input type="hidden" id="formType">
            <div id="formFields"></div>
            <button type="button" id="saveFormBtn" class="aut">Сохранить</button>
        </div>
    </div>
</div>
<div id="modalHistory" class="modal">
    <a href="#" class="close"><i class="fas fa-times"></i></a>
    <div class="modal-content">
        <div class="modal-content-logo">
            <img src="img/Logo.svg">
            <h2>SmartCode</h2>
            <p>История</p>
        </div>
        <div class="modal-content-form">
            <div id="historyContent">
                <p></p>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['open_modal']) && $_SESSION['open_modal']): ?>
    <script src="js/modalAuth.js"></script>
<?php unset($_SESSION['open_modal']);
endif; ?>