let clear = document.getElementById("clear_btn");
clear.addEventListener('click', function(event){
    let srch_area = document.getElementById("srch_area").value = "";
    let menu = document.getElementsByClassName("search_menu")[0];
    menu.classList.remove("active_search");
});

// Открытие подпунктов меню для мобильных устройств и для дектопных
if (window.screen.availWidth < 950) {
    let menu_list = document.getElementsByClassName('menu_top_name'); 
    var menu_top_close = document.querySelectorAll(".close_menu")[0].addEventListener("click", function(event){
        console.log(this.parentNode.parentNode.parentNode);
        //let header = document.querySelectorAll(".header");
        this.classList.toggle("active");
        this.parentNode.classList.toggle("active_top_nav");
        this.parentNode.parentNode.classList.toggle("header_active");
        this.parentNode.parentNode.parentNode.classList.toggle("body_active");
    });
    for (let index = 0; index < menu_list.length; index++) {
    var showMenu = true;
    menu_list[index].addEventListener("click", function(){
        
        let submenu = document.getElementsByClassName("submenu");
        if (showMenu) {
            submenu[index].classList.toggle("submenu_active");
            showMenu = false;
        } else {
            for (let i = 0; i < submenu.length; i++) {
                submenu[i].classList.remove("submenu_active");
                showMenu = true;
            }
        }   
    });
    }
} else {
    document.querySelectorAll(".close_menu")[0].style.display = "none";
    let menu_list = document.getElementsByClassName('menu_list'); 
    for (let i = 0; i < menu_list.length; i++) {
        menu_list[i].addEventListener('mouseenter', on_tittle);
        menu_list[i].addEventListener('mouseleave', leave_tittle);
    }
    function on_tittle(){
        this.children[1].style.display = "block"
    }
    function leave_tittle(){
        this.children[1].style.display = "none"
    }
}
// Поисковой запрос 
function isEmpty(str) {
    return !str.trim().length;
}
document.getElementById("srch_area").addEventListener(("input"), function(e){
    let menu = document.getElementsByClassName("search_menu")[0];
    if( this.value.length > 0 ) {
        //console.log(this.value);
        menu.classList.add("active_search");
        let xhr = new XMLHttpRequest();
        const params = "search_data=" + this.value;
        xhr.open("post", "/request/search", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.addEventListener("load", function(){
            if (xhr.status !== 200 && xhr.readyState !== 4) {
                return;
                alert("Error");
            }
                //console.log(xhr.responseText);
                menu.innerHTML = xhr.responseText;
        });
        xhr.send(params);
      } else {
        console.log("0");
        menu.classList.remove("active_search");
      }
});