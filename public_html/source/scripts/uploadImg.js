/*document.getElementById("upload_img").addEventListener(("change"), function(e){
    let menu = document.getElementsByClassName("search_menu")[0];
        console.log(this.value);
        //menu.classList.add("active_search");
        let xhr = new XMLHttpRequest();
        const params = "search_data=" + this.value;
        xhr.open("post", "/prjct_root/request/image", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.addEventListener("load", function(){
            if (xhr.status !== 200 && xhr.readyState !== 4) {
                return;
                alert("Error");
            }
                //console.log(xhr.responseText);
                //menu.innerHTML = xhr.responseText;
                console.log(xhr.responseText);
        });
        xhr.send(params);
        //console.log("0");
        //menu.classList.remove("active_search");
});*/
document.querySelector("input[type='file']").addEventListener(("change"), function(e){
    this.parentNode.submit();
});