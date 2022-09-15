var body = document.getElementById("over");
document.getElementById("modal_cls").addEventListener("click", function(event){
    
    body.classList.remove("overlay");
    body.style.overflow = "auto";
    this.parentNode.style.display = "none";
});
