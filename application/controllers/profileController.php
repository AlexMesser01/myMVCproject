<?php
    namespace application\controllers;
    use application\core\Model;
    class profileController extends appController{

        public $avatar;
        public $uploadOk = false;
        public $uploadImg;
        public $imgType = (["/jpeg", "/png", "/jpg"]);

        public function user(){
            $session_data = $_SESSION["user"]["is_auth"];
            $this->setData(compact('session_data'));
            // Если пользователь загружает фотографию
            if (isset($_FILES["ava"])) {
                $this->avatar = $_FILES["ava"];
                $filename = $this->avatar["name"];
                $filesize = $this->avatar["size"];
                $filetype = $this->avatar["type"];
                $this->uploadImg = ROOT."/public_html/source/img/avatars/".basename(explode(".", $this->avatar["tmp_name"])[0]).".".explode(".", $this->avatar["name"])[1];
                foreach ($this->imgType as $key => $value) {
                    if ((strpos($filetype, $value) === false)) {
                        $this->uploadOk = false;
                    } else {
                        $filesize < 50000 ? $this->uploadOk = true : $this->uploadOk = false;
                        break;
                    }
                }
                if ($this->uploadOk) {
                    move_uploaded_file($this->avatar["tmp_name"], $this->uploadImg);
                    $this->model_link::updateColOne( "users", "Avatar", $this->uploadImg, "ID_User", $session_data["ID_User"]);
                    $user_data = $this->model_link::findRow("users", "Email", "'{$session_data["Email"]}'");
                    $_SESSION["user"]["is_auth"] = $user_data[0];
                    //$this->setData(compact('session_data','user_data'));
                }
            }
            // Если пользователь обновляет данные
            if (isset($_POST["change_user_data"])) {
                $responseData = response()["profile_data"]["change_user_data"];
                $username = !empty($_POST["username"]) ? $_POST["username"] : $_SESSION["user"]["is_auth"]["Firstname"];
                $city = !empty($_POST["city"]) ? $_POST["city"] : $_SESSION["user"]["is_auth"]["city"];
                $birthday = !empty($_POST["birthday"]) ? $_POST["birthday"] : $_SESSION["user"]["is_auth"]["birthday"];
                $number = !empty($_POST["number"]) ? $_POST["number"] : $_SESSION["user"]["is_auth"]["number"];
                $gender = !empty($_POST["gender"]) ? $_POST["gender"] : $_SESSION["user"]["is_auth"]["gender"];
                $updData = $this->model_link::updateAll( "users", [ 0 => "Firstname = '$username', city = '$city', number = $number, gender = '$gender', birthday = '$birthday'"], "ID_User", $session_data["ID_User"]); 
                $user_data = $this->model_link::findRow("users", "Email", "'{$session_data["Email"]}'");
                $_SESSION["user"]["is_auth"] = $user_data[0];
                $this->setData(compact('session_data', 'responseData'));
            }
            if (isset($_POST['change_user_settings'])) {
                $setting_success = response()["profile_data"]["change_user_data"];
                $alredy_exists = response()["profile_settings"]["alredy_exists"];
                $email = $_POST["email"];
                $password = $_POST["pswrd"];
                $checkMail = $this->model_link::findRow("users", "Email", "'{$email}'");
                if (empty($checkMail)) {
                    $updData = $this->model_link::updateAll( "users", [ 0 => "Email = '$email', password = '$password'"], "ID_User", $session_data["ID_User"]); 
                    $user_data = $this->model_link::findRow("users", "ID_User", "'{$session_data["ID_User"]}'");
                    $_SESSION["user"]["is_auth"] = $user_data[0];
                    $this->setData(compact('session_data', 'responseSetting'));
                } else {
                    $this->setData(compact('session_data', 'alredy_exists'));
                }
            }
        }
        public function show(){
            $show_user = $_GET['user'];
            $checkUser = $this->model_link::findRow("users", "Firstname", "'{$show_user}'");
            $this->setData(compact('checkUser'));
        }
    }
?>