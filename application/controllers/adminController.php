<?php
namespace application\controllers;
use application\core\Model;
class adminController extends appController {
    public $content;
    public $image;
    public function control(){
        $output = $this->model_link::findItems("SELECT * FROM users WHERE Email != 'AdminPanel@gmail.com'");
        $category = $this->model_link::findItems("SELECT category_name FROM news_category");
        $newses = $this->model_link::findItems("SELECT * FROM news");
        $product = $this->model_link::findItems("SELECT * FROM products");
        $this->setData(compact('output', 'category', 'newses', 'product'));
        // Добавляем новость
        if (isset($_POST["add_news"])) {
                $tittle = $_POST["tittle"];
                $descript = $_POST["news_content"];
                $date = $_POST["public_date"];
                $category = $_POST["category"];
                $user = $_SESSION["user"]["is_auth"]["Firstname"];
                $checkNews = $this->model_link::selectTittle("*", "news", "tittle", $_POST["tittle"]);
            if (!empty($checkNews)) {
                // такая новость уже есть
            } else {
                $this->model_link::executeSQL("INSERT INTO news (tittle, content, pulic_date, category, Author) VALUES ('$tittle', '$descript', '$date', '$category', '$user')");
            }
        }
        // Далее если добавляем товар
        if (isset($_POST["add_product"])) {
                $prod_name = $_POST["prod_name"];
                $descript = $_POST["prod_desc"];
                $price = $_POST["pord_price"];
                $avaliable = $_POST["available"];
                $this->image = $_FILES["image"];
                $checkProd = $this->model_link::selectTittle("*", "products", "prod_name", $prod_name);
            if (!empty($checkNews)) {
                // такая новость уже есть
            } else {
                $filetype = explode(".", $this->image["name"])[1];
                $filename = ROOT."/public_html/source/img/avatars/".explode("/", $this->image["tmp_name"])[2].".".$filetype;
                move_uploaded_file($this->image["tmp_name"], $filename);
                //$filepath = ROOT."/public_html/source/img/avatars/".basename(explode());
                //$filepath = "../source/img/avatars";
                $this->model_link::executeSQL("INSERT INTO products (prod_name, prod_desc, prod_price, avaliable, prod_img) VALUES ('$prod_name', '$descript', '$price', '$avaliable', '$filename')");
            }
        }
    }
    public function edit(){
        
                $this->current_news = intval($_GET["id_product"]);
                //debug( intval($this->current_news) );
                $current_prod = $this->model_link->findRow("products", "id_product", $this->current_news);
                //$category = $this->model_link::findItems("SELECT category_name FROM news_category");
                //$author = $this->model_link::findItems("SELECT Firstname FROM users");
                //debug($current_news);
                $this->setData(compact('current_prod'));
            if (isset($_POST["change_prod"])) {
                $prod_name = $_POST["prod_name"];
                $descript = $_POST["prod_desc"];
                $price = $_POST["pord_price"];
                $avaliable = $_POST["available"];
                $image = $_FILES["ava"];
                $this->setData(compact('current_prod'));
                debug($_FILES);
                $filetype = explode(".", $image["name"])[1];
                $filename = ROOT."/public_html/source/img/avatars/".explode("/", $image["tmp_name"])[2].".".$filetype;
                move_uploaded_file($image["tmp_name"], $filename);
                $this->model_link::updColumn("UPDATE products SET prod_name = '$prod_name', prod_desc = '$descript', prod_price = '$price', avaliable = '$avaliable', prod_img = '$filename' WHERE id_product = '$this->current_news'");
                header("Location: ".$_SERVER["REQUEST_URI"]);
                }
    }
}
?>