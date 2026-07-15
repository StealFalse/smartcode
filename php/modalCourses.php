<div id="modalCourse" class="modalCourses">
    <a href="" class="close"><i class="fas fa-times"></i></a>
    <div class="modal-content-courses">
        <div class="left-block-courses">
            <img src="" id="modalCourseImage">
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'student'): ?>
                <button class="btn-enroll-course" data-course-id="">Записаться</button>
            <?php endif; ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher'): ?>
                <button class="btn-teach-course" data-course-id="">Вести курс</button>
            <?php endif; ?>
        </div>
        <div class="right-block-courses">
            <p class="title-text" id="modalCourseTitle"></p>
            <p class="block-courses-text"><strong>Краткое описание</strong>: <span id="modalCourseDescription"></span></p>
            <p class="block-courses-text"><strong>Стоимость</strong>: <span id="modalCoursePrice"></span> ₽/мес</p>
            <p class="block-courses-text"><strong>Длительность</strong>: <span id="modalCourseDuration"></span></p>
            <p class="block-courses-text"><strong>Навыки на выходе</strong>: <span id="modalCourseSkills"></span></p>
            <p class="block-courses-text"><strong>Программа</strong>:</p>
            <ol id="modalCourseProgram"></ol>
        </div>
    </div>
</div>