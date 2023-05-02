const navbar = document.getElementsByTagName('nav')[0];
window.addEventListener('scroll', function () {
    console.log(window.scrollY);
    if (window.scrollY > 30) {
        navbar.classList.add('nav-color');
    } else {
        navbar.classList.remove('nav-color');
    }
})



