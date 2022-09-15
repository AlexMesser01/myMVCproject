<?php
    namespace application\core\Database;
    class Db
    {
        protected $pdo;
        private static $instance;
        private static $config_db;
        public function __construct(){
            self::$config_db = require("config.php");
            $this->pdo = new \PDO("mysql:host=".self::$config_db["host"].";dbname=".self::$config_db["dbname"]."", self::$config_db["login"], self::$config_db["pswrd"]);
            //\R::setup("mysql:host=".self::$config_db["host"].";dbname=".self::$config_db["dbname"]."", self::$config_db["login"], self::$config_db["pswrd"]);   
            //debug(\R::findAll('news'));
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        
        public static function getInstance(){
            if (self::$instance == null) {
                self::$instance = new self;
            }
            return self::$instance;
        }
        public function executeIUD($sql){
            $statement = $this->pdo->prepare($sql);
            return $statement->execute();
        }
        public function query($sql){
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            if ($statement !== null) {
                return $statement->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
    }
    
?>