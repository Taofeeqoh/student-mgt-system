
document.addEventListener("DOMContentLoaded", function() {
    var menubtn = document.querySelector('#menubtn');
    var menu = document.querySelector('#menu');

    menubtn.addEventListener('click', function() {
        menu.classList.toggle('show');
    });
});
