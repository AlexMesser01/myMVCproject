<?php
namespace application\controllers;
use application\core\Controller;
use application\core\Model;

class appController extends Controller{

    protected $model_link;
    public $user_cart;
        public function __construct($route){
            
            //$_SESSION["user"] = ["is_auth" => null, "layout" => 0];
            $this->model_link = new Model();
            
            parent::__construct($route);
            if (isset($_SESSION["user"]["is_auth"])) {
                if ($_SESSION["user"]["is_auth"]!=NULL) {
                    $cart = $this->model_link::selectTittle("*", "cart", "ord_customer", $_SESSION["user"]["is_auth"]["Email"]);
                    $this->setLayoutData(compact('cart'));
                }
            }
           
            //debug($this);
            //debug($this);
            //$this->setData(compact('user_cart'));
        }
}
?>