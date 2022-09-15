<?php
namespace application\controllers;
use application\core\Model;
class mainController extends appController{

    public function index(){
        //echo "Main::Works";
        $news = $this->model_link::getAll("news");
        $this->setData(compact('news'));
        if (isset($_POST["logout"])) {
            if (isset($_SESSION["user"])) {
                Model::updateColOne( 'users', 'Status', 0, "Email", "{$_SESSION["user"]["is_auth"]["Email"]}");
                unset($_SESSION);
                session_destroy();
            }
            
            // В статус записать 0 
        }
        //debug($_SESSION);
        //debug(R::getAll("SELECT * FROM users"));
        //$users = R::dispense('users');
        //$data = R::findAll($users);
        //debug(R::setup($data));

    }
    
}
?>