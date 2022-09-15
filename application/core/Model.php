<?php
    namespace application\core;
    use application\core\Database\Db;

    
    class Model{
        protected static $db_connect;
        public function __construct(){
            self::$db_connect = Db::getInstance();
            //debug(self::$db_connect);
        }
        public static function getAll($from){
            $sql = "SELECT * FROM {$from}";
            return self::$db_connect->query($sql);
        }
        public static function selectTittle($selectWhat, $from, $where, $value){
            $sql = "SELECT $selectWhat FROM $from WHERE $where = '$value'";
            //debug($sql);
            return self::$db_connect->query($sql);
        }
        public static function deleteItem($sql){
            //debug($sql);
            return self::$db_connect->executeIUD($sql);
        }
        public static function findItems($sql){
            return self::$db_connect->query($sql);
        }
        public static function executeSQL($sql){
            return self::$db_connect->executeIUD($sql);
        }
        public static function findRow($from, $where, $value){
            $sql = "SELECT * FROM {$from} WHERE {$where} = {$value}";
            //debug($sql);
            return self::$db_connect->query($sql);
        }
        public static function insetInto($from = [], $columns, $value){
                $sql = "INSERT INTO {$from[0]} ($columns) VALUES ($value)";
                //debug($sql);
                return self::$db_connect->executeIUD($sql);
        }
        public static function findOneBy($column, $from, $value){
            $sql = "SELECT * FROM {$from} WHERE {$column} LIKE '$value'";
            //debug($sql);
            return self::$db_connect->query($sql);
        }
        public static function updColumn($sql){
            return self::$db_connect->executeIUD($sql);
        }
        public static function updateColOne( $from, $updateCol, $updateValue, $whereColumn, $whereValue){
            $sql = "UPDATE $from SET $updateCol = '$updateValue' WHERE $whereColumn = '$whereValue'";
            //debug($sql);
            return self::$db_connect->executeIUD($sql);
        }
        public static function updSessionVal( $from, $updateCol, $updateValue, $whereColumn, $whereValue){
            $sql = "UPDATE $from SET $updateCol = '$updateValue' WHERE $whereColumn = $whereValue";
            $_SESSION['user']['is_auth']["{$updateCol}"] = $updateValue;
            $_SESSION['user']['layout'] = 1;
            return self::$db_connect->executeIUD($sql);
        }
        public static function updateAll($table, $updRows = [], $whereColumn, $whereValue){
            foreach ($updRows as $key => $value) {
                $sql = "UPDATE $table SET $value WHERE $whereColumn = $whereValue";
                return self::$db_connect->executeIUD($sql);
            }    
        }
    }
?>