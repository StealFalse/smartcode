<div id="modalEvents" class="modalEvents">
    <a href="" class="close"><i class="fas fa-times"></i></a>
    <div class="modal-content-events">
        <div class="left-block-events">
            <img src="" id="modalEventImg">
        </div>
        <div class="right-block-events">
            <p class="title-text" id="modalEventTitle"></p>
            <p class="block-events-text"><strong>Краткое описание</strong>: <span id="modalEventDescription"></span></p>
            <p class="block-events-text"><strong>Формат</strong>: <span id="modalEventFormat"></span></p>
            <p class="block-events-text"><strong>Длительность</strong>: <span id="modalEventDuration"></span></p>
            <p class="block-events-text"><strong>Что вы получите</strong>: <span id="modalEventWhatYouGet"></span></p>
            <p class="block-events-text"><strong>Программа</strong>:</p>
            <ol id="modalEventProgram"></ol>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'student'): ?>
                <button class="btn-enroll-event" data-event-id="">Записаться</button>
            <?php endif; ?>
        </div>
    </div>
</div>