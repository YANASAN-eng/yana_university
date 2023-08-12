let link_btn = document.getElementsByClassName('link_btn');
let zundamon_btn = document.getElementById('zundamon_voice');
let voice = new Audio();
let flag = 0;
voice.src = "voice/home/home_zundamon.wav";
let url = [
    "math",
    "physics",
    "programming",
    "illust",
    "bgm",
];
console.log(url);

for(let i = 0;i < url.length;i++){
    link_btn[i].addEventListener('click',function(){
        link_btn[i].style.boxShadow = "none";
        link_btn[i].style.position = "relative";
        link_btn[i].style.top = "10px";
        link_btn[i].style.left = "10px";
        setTimeout(function(){
            link_btn[i].style.boxShadow = "10px 10px rgba(200,200,0,0.7)";
            link_btn[i].style.position = "relative";
            link_btn[i].style.top = "0px";
            link_btn[i].style.left = "0px";
            flag = 1;
        },500);
        if(i != url.length -1){
            setTimeout(function(){
                window.location.href = url[i];
            },600)
        }else{
            setTimeout(function(){
                window.open(url[i],'_blank');
            },600)  
        }
    });
    zundamon_btn.addEventListener('click',function(){
        if(flag == 0){
            voice.play();
            flag = 1;
        }else{
            voice.pause();
            flag = 0;
        }
    })
}
