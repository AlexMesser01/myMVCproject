<div class="wrap">
    <div class="admin_lay">
    <h2>Список пользователей:</h2>
    <div class="list_of_users">
        <?php foreach($output as $key => $value): ?>
            <h2 class="admin_change_user">
                <span>
                    <?=$value["Firstname"];?>
                    
                </span>
                <span class="del_user"><?=$value["Status"] == 1 ? "Online" : "Offline";?> X</span>
            </h2>
        <?php endforeach; ?>
    </div>
    <h2>Добавить новость</h2>
    <form class="add_news" action="/admin/control" method="POST">
            
            <input type="text" required name="tittle" placeholder="Заголовок...">
            <textarea name="news_content" required cols="50" rows="5" placeholder="Описание новости..."></textarea>
            <input type="date" required ata-date-format="YYYY MM DD" name="public_date" placeholder="Дата публикации...">
            <select name="category" required>
                <? foreach($category as $value): ?>
                    <option required value="<?=$value["category_name"];?>"><?=$value["category_name"];?></option>
                <? endforeach; ?>
            </select>
            <input type="submit" name="add_news">
    </form>
    <h2>Список доступных новостей: </h2>
    <div  class="edit_panel_news">
    <div class="edit_newses">
        <? foreach($newses as $value): ?>
        <div class="news_item">
            <span class="admin_edit_name"><?=$value['tittle'];?></span>
            <span class="edit_panel_news">
            <span class="edit"><a class="ed" href="/news/index?id_news=<?=$value['id_news'];?>">Ред.</a></span>
            <span class="delete">X</span>
            </span>
        </div>
        <? endforeach; ?>
    </div>
    </div>
    <h2>Добавить товар: </h2>
    <form class="add_news" action="/admin/control" enctype="multipart/form-data" method="POST">
            <input type="text" required name="prod_name" placeholder="Название товара...">
            <textarea name="prod_desc" required cols="50" rows="5"  placeholder="Описание товара..."></textarea>
            <input type="number" required name="pord_price" placeholder="Цена за единицу...">
            <input type="number" required name="available" placeholder="Всего доступно...">
            <input type="file" required name="image" placeholder="Изображение...">
            <input type="submit" name="add_product">
    </form>
    <h2>Список доступных товаров: </h2>
    <div class="edit_panel_prod">
    <div class="edit_newses">
        <? foreach($product as $value): ?>
        <div class="news_item">
            <span class="admin_edit_name"><?=$value['prod_name'];?></span>
            <span class="edit_panel_prod">
            <span class="edit"><a class="ed" href="/admin/edit?id_product=<?=$value['id_product'];?>">Ред.</a></span>
            <span class="delete">X</span>
            </span>
        </div>
        <? endforeach; ?>
    </div>
    </div>
    </div>
</div>
<html lang="en">
<script type="text/javascript" src="../source/scripts/admin.js"></script>
<link rel="stylesheet" type="text/css" href="../source/css/admin.css">

</html>