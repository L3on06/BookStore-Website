<?php 

class Database {
    private static $instance = null;
    private $connection = null;

    // public function __construct() {
    //     $this->connection = new mysqli('localhost', 'root', '', 'ebook');
    // }

public function __construct() { $this->connection = new mysqli( 
    'localhost', 
    'id20199999_ebook', 
    'Tii)8ntr)ii86wGV', 
    'id20199999_admin'); }

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


