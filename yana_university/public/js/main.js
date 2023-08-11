let back = document.getElementById('back');
let home = document.getElementById('home');

back.addEventListener('click',function(){
    history.back();
})
home.addEventListener('click',function(){
    location.href = "http://localhost:8888/yana_university/public/index";
})