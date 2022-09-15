// Обработчик события на слайдер
var slide_side = true; // Флаг переключения направления слайдера
//console.log(document.getElementsByClassName("prev")[0]);
let next = document.getElementsByClassName("next")[0].addEventListener("click", function(event){
    slide_side = true;
    slide_of(); 
});

let prev = document.getElementsByClassName("prev")[0].addEventListener("click", function(event){
    slide_side = false;
    slide_of();
    
});
var slider_img = document.getElementsByClassName('slider_img');
let slider_dots = document.getElementsByClassName('dots');
var index_of_img = 0;
var index_of_dots = 0;
var slide = setInterval(slide_of, 5000);
function slide_of(){
    if (slide_side === true) {
        index_of_dots++;
        index_of_img++;
        if (index_of_img > 2) {
            index_of_img = 0;
            index_of_dots = 0;
        }
        for (let i = 0; i < slider_img.length; i++) {
            slider_dots[i].classList.remove("current_dots");
            slider_img[i].classList.remove("current_img");
        }
        //console.log(index_of_img);
            slider_dots[index_of_dots].classList.add('current_dots');
            slider_img[index_of_img].classList.add('current_img');
        } else if (slide_side === false) {
            
            index_of_dots--;
            index_of_img--;
        if (index_of_img < 0) {
            index_of_img = 2;
            index_of_dots = 2
        }
        
        for (let i = 0; i < slider_img.length; i++) {
            slider_dots[i].classList.remove('current_dots');
            slider_img[i].classList.remove('current_img');
        }
        
            slider_dots[index_of_dots].classList.add("current_dots");
            slider_img[index_of_img].classList.add("current_img");
    }
}
if (window.screen.availWidth < 950) {
    window.addEventListener("load", function(event){
        slider_img[0].src = "/prjct_root/public_html/source/img/html_vert.png";
        slider_img[1].src = "/prjct_root/public_html/source/img/css_vert.png";
        slider_img[2].src = "/prjct_root/public_html/source/img/js_vert.png";
    });
}
