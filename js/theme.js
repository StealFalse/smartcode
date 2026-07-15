// Темная тема
const themeBtn = document.querySelector('.themeBtn');
const header = document.querySelector('header');
const headerLinks = document.querySelectorAll('.header-left .header-fast-links ul li a');
const headerLogo = document.querySelector('.logo a p');
const footer = document.querySelector('footer');
const footerLogo = document.querySelector('.footer-block-one p');
const footerLinks = document.querySelectorAll('.footer-block-bot ul li a');
const homeCard = document.querySelectorAll('.home-card');
const btnAuth = document.querySelector('.btn-auth');

function setTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-theme');
        header.classList.add('dark-theme');
        headerLinks.forEach(links => links.classList.add('dark-theme'));
        headerLogo.classList.add('dark-theme');
        footer.classList.add('dark-theme');
        footerLogo.classList.add('dark-theme');
        footerLinks.forEach(links => links.classList.add('dark-theme'));
        homeCard.forEach(links => links.classList.add('dark-theme'));
        if (btnAuth) {
            btnAuth.classList.add('dark-theme');
        };
        document.querySelector('.themeBtn .fa-sun').style.display = 'inline-block';
        document.querySelector('.themeBtn .fa-moon').style.display = 'none';
        localStorage.setItem('theme', 'dark');
    } else {
        document.body.classList.remove('dark-theme');
        header.classList.remove('dark-theme');
        headerLinks.forEach(links => links.classList.remove('dark-theme'));
        headerLogo.classList.remove('dark-theme');
        footer.classList.remove('dark-theme');
        footerLogo.classList.remove('dark-theme');
        footerLinks.forEach(links => links.classList.remove('dark-theme'));
        homeCard.forEach(links => links.classList.remove('dark-theme'));
        if (btnAuth) {
            btnAuth.classList.remove('dark-theme');
        };
        document.querySelector('.themeBtn .fa-sun').style.display = 'none';
        document.querySelector('.themeBtn .fa-moon').style.display = 'inline-block';
        localStorage.setItem('theme', 'light');
    };
};

const savedTheme = localStorage.getItem('theme');
if (savedTheme) {
    setTheme(savedTheme);
};

themeBtn.onclick = function (e) {
    e.preventDefault();
    const isDark = document.body.classList.contains('dark-theme');
    setTheme(isDark ? 'light' : 'dark');
};