<div class="wrap">
    <?foreach($output as $value):?>
        <div class="products">
            <img class="prod_img" src="<?="..".explode("/home/o/o968434f/o968434f.beget.tech/public_html", $value["prod_img"])[1];?>" alt="">
            <div class="descript">
            <div class="product_list"><?=$value["prod_name"];?></div>
            <!--<div class="prod_desc_list"><?//=$value["prod_desc"];?></div>-->
            <div><span>Доступно: </span><span class="avaliable"><?=$value["avaliable"];?></span></div>
            <div class="prod_counter">
                
                <div><span>Количество: </span>
                <span class="count">1</span></div>

                <div><span class="calc_plus">+</span>
                <span class="calc_min">-</span></div>
                
            </div>
            
            <div class="offer"><div><span>Цена за единицу: </span><span class="prod_price"><?=$value["prod_price"];?></span></div><button class="buy">  Купить</button></div>
            </div>
        </div>
    <?endforeach;?>
</div>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../source/css/news.css">

</html>