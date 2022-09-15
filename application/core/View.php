<?php
namespace application\core;
class View{
    
    public $page;
    public $content;
    public $layout;

    public function __construct($route, $layout){
        //debug($route);
        $this->page = $route["controller"];
        $this->content = $route["action"];
        $this->layout = 'authorizate';
        if (isset($_SESSION["user"])) {
            if ($_SESSION["user"]["layout"] == "Admin") {
                    $this->layout = 'admin';
                
                } else if ($_SESSION["user"]["layout"] == 1){
                    $this->layout = LAYOUT; 
                }
        } else {
            $this->layout = 'authorizate'; 
        }
        
    }
    public function Render($data, $lay_data){
        if ($lay_data !== null) {
             extract($lay_data);
        }
        if ($data !== null) {
           extract($data);
        }
        //debug($data);
        $upload_layout = ROOT."/application/views/layout/".$this->layout.".php";
        $upload_content = ROOT."/application/views/pages/".$this->page."/".$this->content.".php";
        //debug($upload_layout);
        ob_start();
            require($upload_content);
        $content = ob_get_clean();
        require($upload_layout);
           //debug($upload_content);
           //require($upload_content);
    }
}
?>