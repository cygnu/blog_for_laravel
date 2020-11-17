'use strict';

{
    const open_icon = document.getElementById('open_icon');
    const close_icon = document.getElementById('close_icon');
    const header_nav_overlay = document.querySelector('.header_nav_overlay');

    open_icon.addEventListener('click', () => {
        open_icon.classList.remove('show');
        open_icon.classList.add('hide');
        close_icon.classList.remove('hide');
        close_icon.classList.add('show');
        header_nav_overlay.classList.remove('hide');
        header_nav_overlay.classList.add('show');
    });

    close_icon.addEventListener('click', () => {
        open_icon.classList.remove('hide');
        open_icon.classList.add('show');
        close_icon.classList.remove('show');
        close_icon.classList.add('hide');
        header_nav_overlay.classList.remove('show');
        header_nav_overlay.classList.add('hide');
    });

}