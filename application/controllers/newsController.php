<?php
    namespace application\controllers;
    use application\core\Model;
    class newsController extends appController{

        private $current_news;
        public $newses;
        public $pages;
        public $current_page;
        public $news_on_page = 4;
        public function index(){
            $this->current_news = intval($_GET["id_news"]);
            //debug( intval($this->current_news) );
            $current_news = $this->model_link->findRow("news", "id_news", $this->current_news);
            $category = $this->model_link::findItems("SELECT category_name FROM news_category");
            $author = $this->model_link::findItems("SELECT Firstname FROM users");
            //debug($current_news);
            $this->setData(compact('current_news', 'category', 'author'));
            if (isset($_POST["change_news"])) {
                //debug($_POST);
                $tittle = $_POST['tittle'];
                $news_date = $_POST['news_date'];
                $author = $_POST['author'];
                $category= $_POST['category'];
                $descript = $_POST['descript'];
                $this->model_link::updColumn("UPDATE news SET tittle = '$tittle', content = '$descript', pulic_date = '$news_date', category = '$category' WHERE id_news = '$this->current_news'");
                header("Location: ".$_SERVER["REQUEST_URI"]);
            }
        }
        public function all(){
            $current_news = $this->model_link->getAll("news");
            $on_page = array_chunk($current_news,  $this->news_on_page); // Разделить 10 новостей на кол-во страниц - 10 / 4 - 2
            $this->pages = array_combine(range(1, count($on_page)), $on_page); // 3 СТРАНИЦЫ В ИТОГЕ 
            array_key_exists(intval($_GET["page"]), $this->pages) ? $_GET["page"] : $_GET["page"] = 1;
            $this->current_page = $_GET["page"]; // Текущая страница
            $navigate = $this->pagination_navigation($this->pages, $this->current_page);
            $output = $this->pagination_output($this->pages, $this->current_page);
            $user_out = $this->users_output();
            $this->setData(compact('navigate', 'output', 'user_out'));
        }
        public function pagination_output($news_arr, $current_page){
            
            return $news_arr[$current_page]; // Новости на n страние 
        }
        public function pagination_navigation($news_arr, $current_page){
            $prev1 = intval($current_page - 1);
            $prev2 = intval($current_page - 2);
            $next1 = intval($current_page + 1);
            $next2 = intval($current_page + 2);
            foreach ($news_arr as $key => $value) {
                $navigate[] = "<a style='color:#000;' class='pagination' href='/news/all?page={$key}'>{$key}</a>";
            }
            $p1 = "<a style='color:#000;' class='pagination' href='/news/all?page={$prev1}'><</a>";
            $p2 = $current_page - 2 > 0 ? "<a style='color:#000;' class='pagination' href='/news/all?page={$prev2}'>«</a>" : "";
            $n1 = "<a style='color:#000;' class='pagination' href='/news/all?page={$next1}'>></a>";
            $n2 = $current_page + 2 <= count($news_arr) ? "<a style='color:#000;' class='pagination' href='/news/all?page={$next2}'>»</a>" : "";
            array_unshift($navigate, $p2, $p1);
            array_push($navigate, $n1, $n2);
            return $navigate;
        }
        public function users_output(){
            $output = $this->model_link->getAll('users');
            return $output;
        }
        public function subscribes(){
            //echo "subscribes";
            $output = $this->model_link->getAll('products');
            $this->setData(compact('output'));
        }
    }
    ?>