
// Main Navigation Animation with underline

let home = document.querySelector('#home');
let about = document.querySelector('#about');
let select = document.querySelector('#select-bodypart');
let contact = document.querySelector('#contact');

window.addEventListener('scroll', () => {
    
    let screen = window.pageYOffset;

    if (about.offsetTop >= screen && select.offsetTop > screen) {
        document.querySelector('.about').setAttribute("id", "active");
        document.querySelector('.home').removeAttribute("id", "active");
        document.querySelector('.select-bodypart').removeAttribute("id", "active");
        document.querySelector('.contact').removeAttribute("id", "active");
        console.log('scrolling...');
    }
    else if (select.offsetTop >= screen && contact.offsetTop > screen) {
        document.querySelector('.select-bodypart').setAttribute('id', 'active');
        document.querySelector('.home').removeAttribute('id', 'active');
        document.querySelector('.contact').removeAttribute('id', 'active');
        document.querySelector('.about').removeAttribute('id', 'active');
    }
    else if (contact.offsetTop >= screen){
        document.querySelector('.contact').setAttribute('id', 'active');
        document.querySelector('.about').removeAttribute('id', 'active');
        document.querySelector('.select-bodypart').removeAttribute('id', 'active');
        document.querySelector('.home').removeAttribute('id', 'active');
    }
    else {
        document.querySelector('.home').removeAttribute('id', 'active');
        document.querySelector('.about').removeAttribute('id', 'active');
        document.querySelector('.select-bodypart').removeAttribute('id', 'active');
        document.querySelector('.contact').removeAttribute('id', 'active');
    }
});

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