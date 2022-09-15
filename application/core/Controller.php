<?php
namespace application\core;
use application\core\View;
class Controller{

        public $route;
        public $data;
        public $lay_data;
        public $layout;
        public function __construct($route){
            //echo "Class::Controller";
            $this->route = $route;
            //debug($this->route);
        }
        public function getView(){
            $obj_view = new View($this->route, $this->layout);
            $obj_view->Render($this->data, $this->lay_data);
            //debug($this->layout);
        }
        public function setData($data){
            $this->data = $data;
        }
        public function setLayoutData($lay_data){
            $this->lay_data = $lay_data;
            
        }
}
?>