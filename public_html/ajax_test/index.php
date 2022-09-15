<?php
    header("Content-Type: application/json");
    $post_data = file_get_contents("php://input");
    $parse_data = json_decode($post_data, true);
    //echo $_POST["search_response"];
    //var_dump($_GET);
    //echo "response is it";
    echo "Серевер получил следующие данные - ".$parse_data["searching_data"];
    //var_dump($parse_data);
?>


