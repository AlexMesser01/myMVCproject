
var i =0;
function progress_bar(){
    i+=1;
    let bar = document.querySelectorAll('.bar')[0];
    let width = getComputedStyle(bar).width;
    if (i >= 100) {
        clearInterval(timer);
    }
    bar.style.width = i+"%" ;
    //console.log(width);
}
var timer = setInterval(() => {
    progress_bar();
}, 100);