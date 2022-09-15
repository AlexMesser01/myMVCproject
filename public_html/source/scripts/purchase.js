// Объявление переменных
    var wrap = document.getElementsByClassName('cart_wrap')[0]; // Блок для вывода покупок
    var item_of_cart = document.querySelectorAll(".order");
    var avaliable = document.getElementsByClassName('avaliable'); // Строка - Доступно
    let prod_name = document.getElementsByClassName('product_list'); // Строка - продукт
    //let prod_desc = document.getElementsByClassName('prod_desc_list'); // Строка - описания
    let prod_price = document.getElementsByClassName('prod_price'); // Строка - строка цены
    let count = document.getElementsByClassName('count'); // Строка - число купленного
    var btn = document.getElementsByClassName("buy"); // КНОПКА ПОКУПКИ - "КУПИТЬ"
    var cart = document.getElementsByClassName('cart')[0]; // СПИСОК С ПОКУПКАМИ
    var deleteItem = document.getElementsByClassName("ord_cls");
// Появление корзины
    cart.addEventListener('click', function(e){
        let cart_wrap = document.getElementsByClassName('cart_wrap')[0];
        let content_layout = document.getElementsByClassName('wrap')[0];
        console.log(cart_wrap);
        console.log(content_layout);
        content_layout.classList.toggle('content_active');
        cart_wrap.classList.toggle('cart_active');
    });
// + и - для товаров
    var press;
    for (let index = 0; index < document.getElementsByClassName('calc_plus').length; index++) {
        console.log(document.getElementsByClassName('calc_plus')[index]);
        document.getElementsByClassName('calc_plus')[index].addEventListener('click', function(event) {
            increaseNum(event, index);
        });
        document.getElementsByClassName('calc_plus')[index].addEventListener('mousedown', function(event) {
                press = setInterval(() => increaseNum(event, index), 300);
        });

        document.getElementsByClassName('calc_plus')[index].addEventListener('mouseup', function(event) {
            clearInterval(press);
        });
    }
    for (let index = 0; index < document.getElementsByClassName('calc_min').length; index++) {
        console.log(document.getElementsByClassName('calc_min')[index]);
        document.getElementsByClassName('calc_min')[index].addEventListener('click', function(event) {
            decreaseNum(event, index);
        });
        document.getElementsByClassName('calc_min')[index].addEventListener('mousedown', function(event) {
                press = setInterval(() => decreaseNum(event, index), 300);
        });

        document.getElementsByClassName('calc_min')[index].addEventListener('mouseup', function() {
            clearInterval(press);
        });
    }
// Функция инкременции 
    function decreaseNum(event, index) {
        let prod_counter = document.getElementsByClassName('count');
            num =  prod_counter[index].textContent;
            num--;
            if (num <= 0) {
                event.preventDefault();
            } else {
                prod_counter[index].innerHTML = num;
            }
}
// Функция декременции
    function increaseNum(event, index) {
        let prod_counter = document.getElementsByClassName('count');
            num =  prod_counter[index].textContent;
            num++;
            if (num > avaliable[index].textContent) {
                event.preventDefault();
            } else {
                prod_counter[index].innerHTML = num;
            }
    }
// Проверка 0 значения 
    function checkEmptyVal(){
        for (let index = 0; index < avaliable.length; index++) {
            if (avaliable[index].textContent == 0) {
                btn[index].disabled = true;
            } else {
                btn[index].disabled = false;
            }
        }
    }
// Ajax-запрос на покупку 
for (let index = 0; index < document.getElementsByClassName("buy").length; index++) {
    document.getElementsByClassName("buy")[index].addEventListener(("click"), function(e){
            if (avaliable[index].textContent == 0) {
                btn[index].disabled = true;
            } else {
                let xhr = new XMLHttpRequest();
                const params = "prod_name=" + prod_name[index].textContent+ "&avaliable=" + avaliable[index].textContent+ "&prod_price=" + prod_price[index].textContent+ "&count=" + count[index].textContent;
                console.log(params);
                xhr.open("post", "/request/buy", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.addEventListener("load", function(){
                    if (xhr.status !== 200 && xhr.readyState !== 4) {
                        return;
                        alert("Error");
                    } else {
                        if (xhr.responseText != "Have") {
                            // Получаем JSON массив с сервера
                            let out = JSON.parse(xhr.responseText);
                            let cart_list = out.cart;
                            let updAval = out.avaliable;
                            let order = document.createElement('div'); order.classList.add("order");
                            let prod_desc = document.createElement('div'); prod_desc.classList.add("ord_desc");
                            let product = document.createElement('div'); product.classList.add("prod_name"); product.textContent = cart_list.prod_name;
                            let description = document.createElement('div'); 
                            let count = document.createElement('span'); count.classList.add("count_list"); count.textContent = "Количество: "+cart_list.count;
                            let summ = document.createElement('span'); summ.textContent = " Стоимость: "+cart_list.summ;
                            let close_block = document.createElement("div"); close_block.textContent = "X"; close_block.classList.add("ord_cls");
                            prod_desc.appendChild(product);
                            description.appendChild(count);
                            description.appendChild(summ);
                            prod_desc.appendChild(description);
                            order.appendChild(prod_desc); order.appendChild(close_block);
                            // в order - div - товар
                            avaliable[index].innerHTML = updAval;
                            wrap.appendChild(order);
                            checkEmptyVal();
                        } else {
                            // Уведомление о том, что такой товар уже куплен 
                            console.log("Такой товар уже куплен!");
                        }
                    }
                });
                xhr.send(params);
            }
    });
}   
// Объявление события удаления товара 
wrap.addEventListener(("click"), function(e){ AjaxDelete(e);});
    
function AjaxDelete(event){
    if (event.target.className == "ord_cls") {
        console.log(event.target);
        let index = Array.from(document.getElementsByClassName("ord_cls")).indexOf(event.target);
        let product_list = document.querySelectorAll(".products");
        let product_name_delete = document.getElementsByClassName("prod_name")[index].textContent;
        let product_count_delete = document.getElementsByClassName("count_list")[index].textContent;
        product_count_delete = product_count_delete.split(':').pop();
        const params = "product_name_delete=" + product_name_delete+ "&product_count_delete=" + product_count_delete;
        console.log(params);
        let xhr = new XMLHttpRequest();
        xhr.open("post", "/request/delete", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.addEventListener("load", function(){
        if (xhr.status !== 200 && xhr.readyState !== 4) {
            return;
            alert("Error");
        }
        let dom = document.getElementsByClassName("order");
        dom[index].remove();
        for (let i = 0; i < product_list.length; i++) {
            console.log("Перебираем массив товаров");
            if (document.querySelectorAll(".product_list")[i].textContent == product_name_delete) {
                avaliable[i].innerHTML = "" + xhr.responseText;
            }
    
        }
        checkEmptyVal();
        });
        xhr.send(params);
    }
}