let back = document.getElementsByClassName('back');
let home = document.getElementsByClassName('home');

for (let i = 0; i < back.length; i++) {
    back[i].addEventListener('click',function(){
        history.back();
    })
}
for (let i = 0; i < home.length; i++) {
    home[i].addEventListener('click',function(){
        location.href = "http://localhost:8888/home";
    })
}

let hamburger_menu = document.getElementById('hamburger-menu');
let side_menus = document.getElementById('side-menus');
let bar = document.getElementsByClassName('bar');
let body = document.getElementsByTagName('body');
hamburger_menu.addEventListener("click", function() {
    side_menus.classList.toggle('active');
    bar[0].classList.toggle('active0');
    bar[1].classList.toggle('active1');
    bar[2].classList.toggle('active2');
    body[0].classList.toggle('active');
})

let buttons = Array.from(document.getElementsByClassName('acordion-title'));
let acordion = document.getElementsByClassName('acordion');
buttons.forEach((button) => {
    button.addEventListener('click', function() {
        Array.from(acordion).forEach((item) => {
            item.classList.toggle('active');
        })
        button.classList.toggle('active');
    })
})