<?php
    require_once dirname(dirname(dirname(__FILE__))) . '/config/config.php';
    class Database {
        public $connection;

        function __construct(){
            try{
                $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

?>