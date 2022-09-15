var edit_panel = document.getElementsByClassName("news_item");

for (i = 0; i < edit_panel.length; i++) {
    edit_panel[i].addEventListener("click", function(event){ AjaxAdminDelete(event) });
}
function AjaxAdminDelete(event,i){
    console.log(i);
    if (event.target.className == "delete") {
        let index = Array.from(document.getElementsByClassName("delete")).indexOf(event.target);
        //alert(index);
        let del_name = document.querySelectorAll(".admin_edit_name");
        //let product_name_delete = document.getElementsByClassName("prod_name")[index].textContent;
        //let product_count_delete = document.getElementsByClassName("count_list")[index].textContent;
        //product_count_delete = product_count_delete.split(':').pop();

        if (event.target.parentNode.className == "edit_panel_news") {
            let xhr = new XMLHttpRequest();
                const params = "del_name=" + del_name[index].textContent;
                console.log(params);
                xhr.open("post", "/request/deleteNews", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.addEventListener("load", function(){
                    if (xhr.status !== 200 && xhr.readyState !== 4) {
                        alert("Error");
                        return;
                    } else {
                        console.log(xhr.responseText);
                        console.log(edit_panel[index].parentNode);
                        edit_panel[index].parentNode.removeChild(edit_panel[index]);
                    }
                });
                xhr.send(params);
        } else {
            let xhr = new XMLHttpRequest();
                const params = "del_name=" + del_name[index].textContent;
                console.log(params);
                xhr.open("post", "/request/deleteNews", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.addEventListener("load", function(){
                    if (xhr.status !== 200 && xhr.readyState !== 4) {
                        alert("Error");
                        return;
                    } else {
                        console.log(xhr.responseText);
                        console.log(edit_panel[index].parentNode);
                        edit_panel[index].parentNode.removeChild(edit_panel[index]);
                    }
                });
                xhr.send(params);
        }
    }
}