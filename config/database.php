<?php
    class Database {
        private $host = 'localhost';
        private $db_name = 'meteo_db';
        private $username = 'root';
        private $passeword = '';
        public $conn;

        protected function getConnection() {
            $this->conn = null;

            try{
                $this->conn = new PDO("mysql:host=" . $this->host. ";dbname=". $this->db_name, $this->username, $this->passeword);
                $this->conn->exec("set name utf8");
            }catch(PDOException $exception){
                echo"Connection error:". $exception->getMessage();
            }
            return $this->conn;
        }
    }