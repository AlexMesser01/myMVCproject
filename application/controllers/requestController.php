<?php
    namespace application\controllers;
    use application\core\Model;
    class requestController{
        
        public $uploadOk = 0;
        public $imgType = ([".jpeg", ".png", ".jpg"]);
        public static $model_link;
        public function __construct(){
            self::$model_link = new Model();
        }
        public function search(){
            $data = self::$model_link::findOneBy("tittle", "news", $_POST["search_data"]."%");
            foreach ($data as $key => $value) {
                $id_user = $value["id_news"];
                $id_key = array_search($value["id_news"], $data[$key]);
                echo "<p class='search_result'><a href=/news/index?{$id_key}={$id_user}>".$value['tittle']."</a></p>";
            }
        }
        public function image(){
            $exp = explode("/", $_POST["search_data"]);
            $filename = end($exp);
            $filepath = "../source/img/avatars";
            foreach ($this->imgType as $key => $value) {
                if (strpos($filename, $value)) {         
                    $this->uploadOk = 1;
                } else {
                    echo "Не соответсвует типу изображений";
                }
            }
        }
        public function autentification(){
            //debug($_POST["email"]);
            if (isset($_POST["auth_send"])) {
                unset($_SESSION["auth_error"]);
               $responseAuth = response()["authorization"]["not_found"];
               $uniqueMail = self::$model_link::findRow("users", "Email", "'{$_POST["email"]}'");
               if (empty($uniqueMail)) {
                    $_SESSION["auth_error"] = "Пользователь не найден";
               } else {
                    self::$model_link::updateColOne( 'users', 'Status', 1, "Email", "{$_POST["email"]}");
                    $uniqueMail = self::$model_link::findRow("users", "Email", "'{$_POST["email"]}'");
                    if ($_POST["email"] == "AdminPanel@gmail.com") {
                         $_SESSION["user"] = ["is_auth" => $uniqueMail[0], "layout" => "Admin"];
                    } else {
                        $_SESSION["user"] = ["is_auth" => $uniqueMail[0], "layout" => 1];
                    }
               }
               header("Location: {$_SERVER["HTTP_REFERER"]}");
               debug($_POST["email"]);
    
            } else if (isset($_POST["reg_send"])){
                unset($_SESSION["reg_error"]);
                $username = $_POST["username"];
                $responseReg = response()["reistration"]["exists"];
                $email = "{$_POST["email"]}";
                $pswrd = $_POST["pswrd"];
                $birthday = "2001-08-10";
                $uniqueMail = self::$model_link::findRow("users", "Email", "'{$email}'");
                !empty($uniqueMail) ? $_SESSION["reg_error"] = "Такой пользователь уже существует" :  self::$model_link::insetInto(["users"], "Firstname, Email, Status, password, city, number, gender, birthday", "'{$username}', '{$email}', 23232323, '{$pswrd}', 'Город', '00000000000', 'Пол', '{$birthday}'");  
                header("Location: {$_SERVER["HTTP_REFERER"]}");
            } 
        }
        public function buy(){
            $prod_name = $_POST["prod_name"];
            //$prod_desc = $_POST["prod_desc"];
            $count = $_POST["count"];
            $prod_price = $_POST["prod_price"];
            $summ = $prod_price * $count;
            $customer = $_SESSION["user"]["is_auth"]["Email"];
            $checkCart = self::$model_link::findItems("SELECT * FROM cart WHERE ord_product = '$prod_name' AND ord_count = '$count' AND ord_customer = '$customer'");
            if (empty($checkCart)) {
                // Обновить столбик доступно в таблице продукции 
                self::$model_link::updColumn("UPDATE `products` SET `avaliable`= `avaliable` - $count  WHERE `prod_name` = '$prod_name'");
                // Добавить в таблицу корзины продукт
                self::$model_link::insetInto(["cart"], "ord_product , ord_count, ord_price, ord_sum, ord_customer ", "'{$prod_name}', '{$count}', '{$prod_price}', '{$summ}', '{$_SESSION["user"]["is_auth"]["Email"]}'");  
                $updCount = self::$model_link::selectTittle("avaliable", "products", "prod_name", $prod_name);
                // Вернуть покупки пользователя;
                $cart = ["prod_name" => $prod_name, "count" => $count, "summ" => $summ];
                $avaliable =  intval($updCount[0]["avaliable"]);
                $output = ["avaliable" => $avaliable, "cart" => $cart];
                echo json_encode($output);
            } else {
                echo "Have";
            }
        }
        public function delete(){
            $prod_name = $_POST["product_name_delete"]; // Продукт 
            $prod_count = ltrim($_POST["product_count_delete"]); // Сколько купили 
            $customer = $_SESSION["user"]["is_auth"]["Email"];
            $find_delete = self::$model_link::deleteItem("DELETE FROM cart WHERE ord_product = '$prod_name' AND ord_count = '$prod_count' AND ord_customer = '$customer'");
            if ($find_delete) {
                self::$model_link::updColumn("UPDATE `products` SET `avaliable`= `avaliable` + $prod_count  WHERE `prod_name` = '$prod_name'");
                $updCountDelete = self::$model_link::findItems("SELECT `avaliable` FROM `products` WHERE `prod_name` = '$prod_name'");
                $output = $updCountDelete[0]["avaliable"];
                echo $output;
                //var_dump($updCountDelete[0]["avaliable"]);
            }
            return true;
            //debug(($prod_count));
        }
        public function deleteProd(){
            //echo "Удалил продукт";
            $del_name = $_POST["del_name"];
            $checkName = self::$model_link::findItems("SELECT * FROM products WHERE prod_name = '$del_name'");
            if (!empty($checkName)) {
                $find_delete = self::$model_link::deleteItem("DELETE FROM products WHERE prod_name = '$del_name'");
                $output = self::$model_link::findItems("SELECT prod_name FROM products");
                foreach($output as $value){
                    //debug($value);
                    $data = $value["prod_name"];
                    echo "<span class='admin_edit_name'>$data</span></br>";
                }
            }
        }
        public function deleteNews(){
            //echo "Удалил новотть";
            $del_name = $_POST["del_name"];
            $checkName = self::$model_link::findItems("SELECT * FROM news WHERE tittle = '$del_name'");
            if (!empty($checkName)) {
                $find_delete = self::$model_link::deleteItem("DELETE FROM news WHERE tittle = '$del_name'");
                $output = self::$model_link::findItems("SELECT tittle FROM news");
                foreach($output as $value){
                    //debug($value);
                    $data = $value["tittle"];
                    echo "<span class='admin_edit_name'>$data</span><span class='edit'>Ред.</span><span class='delete'>X</span></br>";
                }
            }
        }
    }
?>