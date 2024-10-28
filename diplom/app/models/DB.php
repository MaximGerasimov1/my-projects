<?php
    class DB extends Controller {
        private static $_db = null;

        public static function getInstence() {
            if(self::$_db == null)
                self::$_db = new PDO('mysql:host=localhost;dbname=link_cut', 'root', 'root');
            return self::$_db;
        }

        private function __construct() {}
        private function __clone() {}
        private function __wakeup() {}
    }