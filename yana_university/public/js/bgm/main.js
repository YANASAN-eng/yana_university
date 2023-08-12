window.onload = function(){
    let zundamon_btn = document.getElementById('zundamon_voice');
    let voice = new Audio();
    let flag = 0;
    voice.src = "voice/bgm/bgm_zundamon.wav";
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