// Модальное окно
const authBtn = document.querySelector('.btn-auth');
const logoutBtn = document.querySelector('.btn-logout');

if (authBtn) {
    authBtn.onclick = function (open) {
        open.preventDefault();
        const modal = document.getElementById('modalLogin');
        if (modal) {
            modal.style.display = 'block';
            document.body.classList.add('no-scroll');
        }
    };
}
// закрытие через крестик для всех окон
document.querySelectorAll('.close').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelectorAll('.modal, .modalCourses, .modalEvents, .modalContacts, .modalImg').forEach(modal => {
            modal.style.display = 'none';
        });
        document.body.classList.remove('no-scroll');
    });
});

// закрытие при клике на затемнение
window.onclick = function (event) {
    if (event.target === event.target.closest('.modal, .modalCourses, .modalEvents, .modalContacts, .modalImg')) {
        document.querySelectorAll('.modal, .modalCourses, .modalEvents, .modalContacts, .modalImg').forEach(modal => {
            modal.style.display = 'none';
        });
        document.body.classList.remove('no-scroll');
    }
};

// закрытие по клавише esc
document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        document.querySelectorAll('.modal, .modalCourses, .modalEvents, .modalContacts, .modalImg').forEach(modal => {
            modal.style.display = 'none';
        });
        document.body.classList.remove('no-scroll');
    }
});

// переключение между окнами
document.querySelectorAll('.switch-modal').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const target = btn.getAttribute('data-target');

        document.querySelectorAll('.modal, .modalCourses').forEach(modal => {
            modal.style.display = 'none';
        });

        let modalToShow = null;
        if (target === 'login') modalToShow = document.getElementById('modalLogin');
        else if (target === 'register') modalToShow = document.getElementById('modalRegister');
        else if (target === 'reset') modalToShow = document.getElementById('modalReset');

        if (modalToShow) {
            modalToShow.style.display = 'block';
            document.body.classList.add('no-scroll');
        }
    });
});

// модальные окна курсов
document.querySelectorAll('.btn-courses-card').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        e.preventDefault();

        const slug = btn.getAttribute('data-courses');

        const responce = await fetch(`php/get_course.php?slug=${slug}`);
        const course = await responce.json();

        document.getElementById('modalCourseTitle').innerText = course.title;
        document.getElementById('modalCourseImage').src = course.image;
        document.getElementById('modalCourseDescription').innerText = course.description;
        document.getElementById('modalCoursePrice').innerText = Number(course.price).toLocaleString('ru-RU');
        document.getElementById('modalCourseDuration').innerText = course.duration;
        document.getElementById('modalCourseSkills').innerText = course.skills;

        const programList = document.getElementById('modalCourseProgram');
        programList.innerHTML = '';
        const programItems = course.program.split('\n');
        programItems.forEach(item => {
            const li = document.createElement('li');
            li.innerText = item;
            programList.appendChild(li);
        });

        document.querySelector('.btn-enroll-course')?.setAttribute('data-course-id', course.id);
        document.querySelector('.btn-teach-course')?.setAttribute('data-course-id', course.id);

        document.getElementById('modalCourse').style.display = 'block';
        document.body.classList.add('no-scroll');
    });
});

// модальные окна мероприятий
document.querySelectorAll('.btn-events-card').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        e.preventDefault();

        const slug = btn.getAttribute('data-events');

        const responce = await fetch(`php/get_event.php?slug=${slug}`);
        const event = await responce.json();

        document.getElementById('modalEventImg').src = event.image;
        document.getElementById('modalEventTitle').innerText = event.title;
        document.getElementById('modalEventDescription').innerText = event.description;
        document.getElementById('modalEventFormat').innerText = event.format;
        document.getElementById('modalEventDuration').innerText = event.duration;
        document.getElementById('modalEventWhatYouGet').innerText = event.what_you_get;

        const programList = document.getElementById('modalEventProgram');
        programList.innerHTML = '';
        const programItems = event.program.split('\n');
        programItems.forEach(item => {
            const li = document.createElement('li');
            li.innerText = item;
            programList.appendChild(li);
        });

        document.querySelector('.btn-enroll-event')?.setAttribute('data-event-id', event.id);

        document.getElementById('modalEvents').style.display = 'block';
        document.body.classList.add('no-scroll');
    });
});

// модальные окна контактов
document.querySelectorAll('.contact-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const target = btn.getAttribute('data-contact');

        document.querySelectorAll('.modalContacts').forEach(modal => {
            modal.style.display = 'none';
        });
        let modalToShow = null;
        if (target === 'moscow') modalToShow = document.getElementById('modalMoscow');
        else if (target === 'spb') modalToShow = document.getElementById('modalSpb');
        else if (target === 'nsk') modalToShow = document.getElementById('modalNovosibirsk');
        else if (target === 'ekb') modalToShow = document.getElementById('modalEkaterinburg');
        else if (target === 'kazan') modalToShow = document.getElementById('modalKazan');

        if (modalToShow) {
            modalToShow.style.display = 'block';
            document.body.classList.add('no-scroll');
        };
    });
});

// модальные окна картинок
document.querySelectorAll('.branches_img_js').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const target = btn.getAttribute('data-img');

        document.querySelectorAll('.modalImg').forEach(modal => {
            modal.style.display = 'none';
        });

        let modalToShow = null;
        if (target === 'moscow') modalToShow = document.getElementById('modalMoscowImg');
        else if (target === 'spb') modalToShow = document.getElementById('modalSpbImg');
        else if (target === 'nsk') modalToShow = document.getElementById('modalNskImg');
        else if (target === 'ekb') modalToShow = document.getElementById('modalEkbImg');
        else if (target === 'kazan') modalToShow = document.getElementById('modalKazanImg');

        if (modalToShow) {
            modalToShow.style.display = 'block';
            document.body.classList.add('no-scroll');
        };
    });
});

// переключение вкладок в личном кабинете
document.querySelectorAll('.cabinet-tab').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const target = btn.getAttribute('data-tab');

        document.querySelectorAll('.tab-pane').forEach(tab => {
            tab.classList.remove('active');
        });

        const activeTab = document.getElementById('tab-' + target);
        if (activeTab) {
            activeTab.classList.add('active');
        };
    });
});

// модальное окно редактирования ввсего
// редактирование курсов
document.querySelectorAll('.btn-edit-course').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        e.preventDefault();
        const slug = btn.getAttribute('data-slug');

        const responce = await fetch(`php/get_course.php?slug=${slug}`);
        const data = await responce.json();

        document.getElementById('formId').value = data.id;
        document.getElementById('formType').value = 'course';
        document.getElementById('formMode').value = 'edit';

        const fields = document.getElementById('formFields');
        fields.innerHTML = `
        <input type="text" id="editTitle" value="${data.title}" placeholder="Название курса" required>
        <input type="text" id="editDescription" value="${data.description}" placeholder="Краткое описание" required>
        <input type="text" id="editDuration" value="${data.duration}" placeholder="Длительность" required>
        <textarea id="editSkills" placeholder="Навыки на выходе" required>${data.skills}</textarea>
        <textarea id="editProgram" placeholder="Программа" required>${data.program}</textarea>
        <input type="number" id="editPrice" value="${data.price}" placeholder="Цена" required>
        <input type="text" id="editImage" value="${data.image}" placeholder="Путь к картинке" required>
        <input type="text" id="editTeacherId" value="${data.teacher_id}" placeholder="ID преподавателя" required>
        <input type="text" id="editSlug" value="${data.slug}" placeholder="Краткое название курса" required>
        `;

        document.getElementById('modalFormTitle').innerText = 'Редактирование';
        document.getElementById('modalForm').style.display = 'block';
        document.body.classList.add('no-scroll');
    });
});
// редактирование мероприятий
document.querySelectorAll('.btn-edit-event').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        e.preventDefault();
        const slug = btn.getAttribute('data-slug');

        const responce = await fetch(`php/get_event.php?slug=${slug}`);
        const data = await responce.json();

        document.getElementById('formId').value = data.id;
        document.getElementById('formType').value = 'event';
        document.getElementById('formMode').value = 'edit';

        const fields = document.getElementById('formFields');
        fields.innerHTML = `
        <input type="text" id="editTitle" value="${data.title}" placeholder="Название мероприятия" required>
        <textarea id="editDescription" placeholder="Краткое описание" required>${data.description}</textarea>
        <input type="text" id="editDuration" value="${data.duration}" placeholder="Длительность" required>
        <input type="text" id="editFormat" value="${data.format}" placeholder="Формат" required>
        <textarea id="editWhatYouGet" placeholder="Что получит студент" required>${data.what_you_get}</textarea>
        <textarea id="editProgram" placeholder="Программа" required>${data.program}</textarea>
        <input type="text" id="editEventDate" value="${data.event_date}" placeholder="Дата" required>
        <input type="text" id="editLocation" value="${data.location}" placeholder="Место" required>
        <input type="text" id="editImage" value="${data.image}" placeholder="Путь к картинке" required>
        <input type="text" id="editSlug" value="${data.slug}" placeholder="Краткое название мероприятия" required>
        `;

        document.getElementById('modalFormTitle').innerText = 'Редактирование';
        document.getElementById('modalForm').style.display = 'block';
        document.body.classList.add('no-scroll');
    });
});
// редактирование пользователей
document.querySelectorAll('.btn-edit-user').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        e.preventDefault();
        const phone = btn.getAttribute('data-phone');

        const responce = await fetch(`php/get_user.php?phone=${phone}`);
        const data = await responce.json();

        document.getElementById('formId').value = data.id;
        document.getElementById('formType').value = 'user';
        document.getElementById('formMode').value = 'edit';

        const fields = document.getElementById('formFields');
        fields.innerHTML = `
        <input type="text" id="editPhone" value="${data.phone}" placeholder="Телефон" pattern="^\d{10,11}$" title="Пример: 89951234567" required>
        <input type="text" id="editSecretWord" value="${data.secret_word}" placeholder="Секретное слово" pattern=".{12,64}" title="Секретное слово должно содержать от 12 до 64 символов" required>
        <input type="text" id="editEmail" value="${data.email}" placeholder="Электронная почта" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" title="Пример: userUse@gmail.com" required>
        <input type="text" id="editFIO" value="${data.fio}" placeholder="ФИО" pattern="^[А-ЯЁ][а-яё]{1,30}\s[А-ЯЁ][а-яё]{1,30}\s[А-ЯЁ][а-яё]{1,30}$" title="Введите ФИО полностью" required>
        <input type="text" id="editRole" value="${data.role}" placeholder="Роль (admin/teacher/student)" required>
        <p class="text-user-inf" id="balance">Баланс пользователя: ${Number(data.balance).toLocaleString('ru-RU')} ₽</p>
        `;

        document.getElementById('modalFormTitle').innerText = 'Редактирование';
        document.getElementById('modalForm').style.display = 'block';
        document.body.classList.add('no-scroll');
    });
});
// редактирование профиля
document.querySelector('.btn-edit-profile')?.addEventListener('click', async (e) => {
    e.preventDefault();
    const phone = e.currentTarget.getAttribute('data-phone');

    const responce = await fetch(`php/get_user.php?phone=${phone}`);
    const data = await responce.json();

    document.getElementById('formId').value = data.id;
    document.getElementById('formType').value = 'profile';
    document.getElementById('formMode').value = 'edit';

    const fields = document.getElementById('formFields');
    fields.innerHTML = `
    <input type="text" id="editPhone" value="${data.phone}" placeholder="Телефон" pattern="^\d{10,11}$" title="Пример: 89951234567" required>
    <input type="text" id="editPassword" placeholder="Новый пароль" pattern=".{12,64}" title="Пароль должен содержать от 12 ло 64 символов" required>
    <input type="text" id="editSecretWord" value="${data.secret_word}" placeholder="Секретное слово" pattern=".{12,64}" title="Секретное слово должно содержать от 12 до 64 символов" required>
    <input type="text" id="editEmail" value="${data.email}" placeholder="Электронная почта" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" title="Пример: userUse@gmail.com" required>
    <input type="text" id="editFIO" value="${data.fio}" placeholder="ФИО" title="Введите ФИО полностью" required>
    `;

    document.getElementById('modalFormTitle').innerText = 'Редактирование';
    document.getElementById('modalForm').style.display = 'block';
    document.body.classList.add('no-scroll');
});
// кнопка сохранения и редактирования
document.getElementById('saveFormBtn')?.addEventListener('click', async () => {
    const mode = document.getElementById('formMode').value;
    const type = document.getElementById('formType').value;
    const id = document.getElementById('formId').value;

    let data = { id: id };

    if (type === 'course') {
        data.title = document.getElementById('editTitle')?.value || '';
        data.description = document.getElementById('editDescription')?.value || '';
        data.duration = document.getElementById('editDuration')?.value || '';
        data.skills = document.getElementById('editSkills')?.value || '';
        data.program = document.getElementById('editProgram')?.value || '';
        data.price = document.getElementById('editPrice')?.value || 0;
        data.image = document.getElementById('editImage')?.value || '';
        data.teacher_id = document.getElementById('editTeacherId')?.value || null;
        if (data.teacher_id === '' || data.teacher_id === 'null') {
            data.teacher_id = null;
        }
        data.slug = document.getElementById('editSlug')?.value || '';
    } else if (type === 'event') {
        data.title = document.getElementById('editTitle')?.value || '';
        data.description = document.getElementById('editDescription')?.value || '';
        data.duration = document.getElementById('editDuration')?.value || '';
        data.format = document.getElementById('editFormat')?.value || '';
        data.what_you_get = document.getElementById('editWhatYouGet')?.value || '';
        data.program = document.getElementById('editProgram')?.value || '';
        data.event_date = document.getElementById('editEventDate')?.value || '';
        data.location = document.getElementById('editLocation')?.value || '';
        data.image = document.getElementById('editImage')?.value || '';
        data.slug = document.getElementById('editSlug')?.value || '';
    } else if (type === 'user') {
        data.phone = document.getElementById('editPhone')?.value || '';
        data.secret_word = document.getElementById('editSecretWord')?.value || '';
        data.email = document.getElementById('editEmail')?.value || '';
        data.fio = document.getElementById('editFIO')?.value || '';
        data.role = document.getElementById('editRole')?.value || '';
    } else if (type === 'profile') {
        data.phone = document.getElementById('editPhone')?.value || '';
        data.secret_word = document.getElementById('editSecretWord')?.value || '';
        data.email = document.getElementById('editEmail')?.value || '';
        data.fio = document.getElementById('editFIO')?.value || '';
        data.password = document.getElementById('editPassword')?.value || '';
    }

    let url = '';
    if (mode === 'edit') {
        if (type === 'profile') {
            url = 'php/update_profile.php';
        } else {
            url = `php/update_${type}.php`;
        }
    } else {
        url = `php/add_${type}.php`;
    }

    try {
        const responce = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        const result = await responce.json();

        if (result.success) {
            if (result.redirect) {
                window.location.href = result.redirect;
            } else if (type === 'profile' && result.role) {
                if (result.role === 'admin') {
                    window.location.href = 'cabinetAdmin.php?tab=profile';
                } else if (result.role === 'teacher') {
                    window.location.href = 'cabinetTeacher.php?tab=profile';
                } else if (result.role === 'student') {
                    window.location.href = 'cabinetStudent.php?tab=profile';
                }
            } else {
                location.reload();
            }
        } else {
            alert('Ошибка при сохранении');
        }
    } catch (error) {
        console.error('Ошибка: ', error);
        alert('Ошибка при сохранении');
    }
});

// добавление курса
document.querySelector('.btn-add-course')?.addEventListener('click', (e) => {
    e.preventDefault();

    document.getElementById('formId').value = 0;
    document.getElementById('formMode').value = 'new';
    document.getElementById('formType').value = 'course';
    document.getElementById('modalFormTitle').innerText = 'Создание';

    const fields = document.getElementById('formFields');
    fields.innerHTML = `
    <input type="text" id="editTitle" placeholder="Название курса" required>
    <input type="text" id="editDescription" placeholder="Краткое описание" required>
    <input type="text" id="editDuration" placeholder="Длительность" required>
    <textarea id="editSkills" placeholder="Навыки на выходе" required></textarea>
    <textarea id="editProgram" placeholder="Программа" required></textarea>
    <input type="number" id="editPrice" placeholder="Цена" required>
    <input type="text" id="editImage" placeholder="Путь к картинке" required>
    <input type="text" id="editTeacherId" placeholder="ID преподавателя (не обязательно)">
    <input type="text" id="editSlug" placeholder="Краткое название" required>
    `;

    document.getElementById('modalForm').style.display = 'block';
    document.body.classList.add('no-scroll');
});

// добавление мероприятия
document.querySelector('.btn-add-event')?.addEventListener('click', (e) => {
    e.preventDefault();

    document.getElementById('formId').value = 0;
    document.getElementById('formMode').value = 'new';
    document.getElementById('formType').value = 'event';
    document.getElementById('modalFormTitle').innerText = 'Создание';

    const fields = document.getElementById('formFields');
    fields.innerHTML = `
        <input type="text" id="editTitle" placeholder="Название мероприятия" required>
        <textarea id="editDescription" placeholder="Краткое описание" required></textarea>
        <input type="text" id="editDuration" placeholder="Длительность" required>
        <input type="text" id="editFormat" placeholder="Формат (очно / онлайн)" required>
        <textarea id="editWhatYouGet" placeholder="Что получит студент" required></textarea>
        <textarea id="editProgram" placeholder="Программа" required></textarea>
        <input type="text" id="editEventDate" placeholder="Дата (2000-12-31)" required>
        <input type="text" id="editLocation" placeholder="Место проведения" required>
        <input type="text" id="editImage" placeholder="Путь к картинке" required>
        <input type="text" id="editSlug" placeholder="Краткое название" required>
    `;

    document.getElementById('modalForm').style.display = 'block';
    document.body.classList.add('no-scroll');
});
// Добавление пользователя
document.querySelector('.btn-add-user')?.addEventListener('click', (e) => {
    e.preventDefault();

    document.getElementById('formId').value = 0;
    document.getElementById('formMode').value = 'new';
    document.getElementById('formType').value = 'user';
    document.getElementById('modalFormTitle').innerText = 'Создание';

    const fields = document.getElementById('formFields');
    fields.innerHTML = `
    <input type="text" id="editPhone" placeholder="Номер телефона" required>
    <input type="text" id="editSecretWord" placeholder="Секретное слово" required>
    <input type="text" id="editEmail" placeholder="Электронная почта" required>
    <input type="text" id="editFIO" placeholder="ФИО" required>
    <input type="text" id="editRole" placeholder="Роль (admin / teacher / student)" required>
    <input type="text" id="editPassword" placeholder="Пароль" required>
    `;

    document.getElementById('modalForm').style.display = 'block';
    document.body.classList.add('no-scroll');
});

// кнопка записаться на курс
document.addEventListener('click', async (e) => {
    const button = e.target.closest('.btn-enroll-course');
    if (!button) return;

    const courseId = button.getAttribute('data-course-id');

    if (!courseId) {
        alert('Ошибка: ID курса не найден');
        return;
    }

    const responce = await fetch('php/enroll_course.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ course_id: courseId })
    });
    const result = await responce.json();

    if (result.success) {
        alert('Вы успешно записались на курс');
        location.reload();
    } else {
        alert(result.error || 'Ошибка записи');
    }
});

// кнопка вести курс
document.addEventListener('click', async (e) => {
    const button = e.target.closest('.btn-teach-course');
    if (!button) return;

    const courseId = button.getAttribute('data-course-id');

    if (!courseId) {
        alert('Ошибка: ID курса не найден');
        return;
    }

    const responce = await fetch('php/teach_course.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ course_id: courseId })
    });
    const result = await responce.json();

    if (result.success) {
        alert('Теперь вы ведете этот курс');
        location.reload();
    } else {
        alert(result.error || 'Ошибка');
    }
});

// кнопка записи на мероприятие
document.addEventListener('click', async (e) => {
    const button = e.target.closest('.btn-enroll-event');
    if (!button) return;

    const eventId = button.getAttribute('data-event-id');

    if (!eventId) {
        alert('Ошибка: ID мероприятия не найден');
        return;
    }

    const responce = await fetch('php/enroll_event.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ event_id: eventId })
    });
    const result = await responce.json();

    if (result.success) {
        alert('Вы успешно записались на мероприятие');
        location.reload();
    } else {
        alert(result.error || 'Вы уже записаны на данное мероприятие');
    }
});

// запрет ввода чего либо кроме цифр в пополнении кошелька
document.getElementById('balanceUp')?.addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// модалка истории платажей
document.querySelector('.button-history')?.addEventListener('click', async (e) => {
    e.preventDefault();

    try {
        const responce = await fetch('php/get_transaction.php');
        const transactions = await responce.json();

        const historyContent = document.getElementById('historyContent');

        if (!transactions || transactions.length === 0) {
            historyContent.innerHTML = '<p>У вас пока нет транзакций</p>';
            document.getElementById('modalHistory').style.display = 'block';
            document.body.classList.add('no-scroll');
            return;
        }
        let rows = '';
        transactions.forEach(transaction => {
            const amount = Number(transaction.amount).toLocaleString('ru-RU');
            const date = new Date(transaction.created_at).toLocaleString('ru-RU', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            const typeT = { enroll: 'Списание', refund: 'Возврат', deposit: 'Пополнение' };
            const typeLabel = typeT[transaction.type] || transaction.type;

            const colorT = { enroll: '#E24A4D', refund: '#2EBC6A', deposit: '#4A90E2' };
            const typeColor = colorT[transaction.type] || '#333';

            rows += `
            <tr>
                <td>${date}</td>
                <td>${amount}</td>
                <td style="color: ${typeColor}; font-weight: bold;">${typeLabel}</td>
                <td>${transaction.description || '-'}</td>
            </tr>
            `;
        });
        historyContent.innerHTML = `
        <table>
            <thead>
                <tr>
                    <th>Дата</th>
                    <th style="min-width: 75px;">Сумма</th>
                    <th style="min-width: 135px">Тип</th>
                    <th>Описание</th>
                </tr>
            </thead>
            <tbody>${rows}</tbody>
        </table>
        `;

        document.getElementById('modalHistory').style.display = 'block';
        document.body.classList.add('no-scroll');
    } catch (error) {
        console.error('Ошибка: ', error);
        document.getElementById('historyContent').innerHTML = '<p>Ошибка загрузки</p>';
    }
})