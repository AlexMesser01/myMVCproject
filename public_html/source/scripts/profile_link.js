document.getElementsByClassName("show_profile")[0].addEventListener("click", function (params) {
    let user_menu = document.getElementsByClassName("user_menu")[0];
    user_menu.classList.toggle("profile_active");
});