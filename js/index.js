

function load() {
    setInterval(slideshow, 5000);
    setInterval(window.scrollTo(0, 630), 100000);


}

function logout() {
    var p = "<?php session_destroy(); ?>"
}

function alertsubmit() {
    alert('You must Loging frist');
}