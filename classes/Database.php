<?php 

class Database {
    private static $instance = null;
    private $connection = null;

    // public function __construct() {
    //     $this->connection = new mysqli('localhost', 'root', '', 'ebook');
    // }

        public function __construct() {
        $this->connection = new mysqli(
            'bw9k7zxequjsuuqf19x8-mysql.services.clever-cloud.com', 
            'utppn4qutzls3khc', 
            'lYPVChbBNwwidOiH8xKE', 
            'bw9k7zxequjsuuqf19x8');
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self;
        }
        
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}


