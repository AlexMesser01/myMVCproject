    // Формирование Ajax запроса 
    /*function ajaxToServer(){
        let user_data = document.querySelectorAll("#srch_area");
        //const data = "search_data="+document.querySelector('#srch_area').value+"&search_response=fuck yeah, i got it!";
        //const data = "server/index.php?search_data="+document.querySelector('#srch_area').value;
        //const requestURL = 'server/index.php';
        const xhr = new XMLHttpRequest();
        xhr.open('POST', requestURL);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.addEventListener("load", function(){
            if (xhr.status !== 200 && xhr.readyState !== 4) {
                return;
                alert("Error");
            }
                console.log(xhr.responseText);
                document.getElementById('srch_area').value = xhr.response;
        });
        let json_data = {searching_data : document.getElementById("srch_area").value};
        let data = JSON.stringify(json_data);
        xhr.send(data);
    }
    let send_to_Ajax = document.getElementById('send').addEventListener("click", function(event){
        ajaxToServer();
    });

    */
    //// Тренировака JSON
    /*let user_data = {
        name : "John",
        age : 35,
        courses : ["HTML", "CSS", "jQuery"],
        hasArules : false
    }
    let json = JSON.stringify(user_data);
    alert(typeof json);
    console.log(json);*/
    //console.log(window.screen.availWidth);