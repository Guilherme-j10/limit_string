<?php

    namespace app\model;
    use app\model\db\Connection;

    class MsgModel extends Connection
    {

        protected $pdo;

        public function __construct()
        {
            $this->pdo = $this->Connection();
        }

        public function save_data(String $msg): bool
        {
            $stmt = $this->pdo->prepare("INSERT INTO msg (msg) VALUES (:msg)");
            $stmt->execute([":msg" => $msg]);

            if($stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function return_data()
        {
            $stmt = $this->pdo->prepare("SELECT * FROM msg ORDER BY id desc");
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        }

        public function delete_item(String $id): bool
        {
            $stmt = $this->pdo->prepare("DELETE FROM msg WHERE id = :id");
            $stmt->execute([':id' => $id]);

            if($stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        } 
    }