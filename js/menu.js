// Hamburger Menu Animation on Side

let cross = document.querySelector('.fa-times');
let sidenav = document.querySelector('.side-nav');
let bars = document.querySelector('.fa-bars');

function openMenu () {
    sidenav.style.width = '60%';
    // console.log('Opened up menu!')
};

function closeMenu () {
    sidenav.style.width = '0%';
};