(function () {
    function openModal() {
        var modal = document.querySelector('.modal');
        if (modal) {
            modal.style.display = 'block';
            document.body.classList.add('no-scroll');
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', openModal);
    } else {
        openModal();
    }
})();