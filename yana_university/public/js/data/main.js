let book_sign_up = document.getElementById('book_sign_up');
book_sign_up.addEventListener('click',function(){
    console.log('hello');
    location.href = "book/sign_up";
})
let chapter_sign_up = document.getElementById('chapter_sign_up');
chapter_sign_up.addEventListener('click',function(){
    location.href = "chapter/sign_up";
})
let section_sign_up = document.getElementById('section_sign_up');
section_sign_up.addEventListener('click',function(){
    location.href = "section/sign_up";
})