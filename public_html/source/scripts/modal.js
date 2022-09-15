
document.getElementsByClassName("show_modal")[0].addEventListener("click", function(event){

    let modal = document.getElementsByClassName("authorization")[0];
    body.style.overflow = "hidden";
    body.classList.add("overlay");
    modal.style.display = "flex";
    
});

var modal_switch = document.querySelectorAll(".modal_switch > p");
for (let index = 0; index < modal_switch.length; index++) {
    modal_switch[index].addEventListener("click", function(event){
        let reg = document.getElementsByClassName("registr")[0];
        let login = document.getElementsByClassName("login")[0];
        let r = document.getElementsByClassName("r")[0];
        let a = document.getElementsByClassName("a")[0];
        if (event.target.className == "a") {
            this.style.fontWeight = "900";
            r.style.fontWeight = "100";
            reg.style.display = "none";
            login.style.display = "flex";
        } else if (event.target.className == "r"){
            reg.style.display = "flex";
            this.style.fontWeight = "900";
            a.style.fontWeight = "100";
            login.style.display = "none";
        }
    });
}