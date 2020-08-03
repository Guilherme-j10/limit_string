<?php

    namespace app\model\db;

    class Connection 
    {

        public function Connection(): object
        {
            try {
                return $pdo = new \PDO("mysql:host=".HOST."; dbname=".DB_NAME."; charset=utf8", USER, PASSWORD);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

    }