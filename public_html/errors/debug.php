<?php 
    function debug($debug_obj){
            echo "<pre>";
                var_dump($debug_obj);
            echo "</pre>";
    }
    function response(){
        return [
            "reistration" => 
                ["exists" => "Такой пользователь уже существует"], 
            "authorization" => 
                ["not_found" => "Пользователь не найден"],
            "profile_settings" => 
                ["alredy_exists" => "Данный Email, уже зарегестрирован"],
            "profile_data" =>
                ["change_user_data" => "Данные успешно сохранены"]
        ];
    }
?>