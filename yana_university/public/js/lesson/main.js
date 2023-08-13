let chapter_btn = document.getElementsByClassName('chapter_btn');
let section_btn = document.getElementsByClassName('section_btn');

let chapter = document.getElementsByClassName('chapter');
let section = document.getElementsByClassName('section');
let chapter_flag = [];
let section_flag = [];

for(let i = 0;i < chapter_btn.length;i++){
    chapter_flag.push(0);
}
for(let i = 0;i < section_btn.length;i++){
    section_flag.push(0);
}

for(let i = 0;i < chapter_btn.length;i++){
    chapter_btn[i].addEventListener('click',function(){
        if(chapter_flag[i] == 0){
            chapter[i].style.display = 'none';
            chapter_flag[i] = 1;
        }else{
            chapter[i].style.display = 'block';
            chapter_flag[i] = 0;
        }
    })
}
for(let i = 0;i < section_btn.length;i++){
    section_btn[i].addEventListener('click',function(){
        if(section_flag[i] == 0){
            section[i].style.display = 'none';
            section_flag[i] = 1;
        }else{
            section[i].style.display = 'block';
            section_flag[i] = 0;
        }
    })
}