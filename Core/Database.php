<?php

namespace Core;

class Database
{
    public static $database = null;
    private $_host;
    private $_user;
    private $_password;
    private $_dbname;
    private $_handle;

    private function __construct()
    {
        $this->_host     = 'localhost';
        $this->_user     = 'root';
        $this->_password = 'root';
        $this->_dbname   = 'my_cinema';
        $this->_handle   = null;

        try {
            $this->_handle = new \PDO("mysql:host=$this->_host;dbname=$this->_dbname", $this->_user, $this->_password);
            $this->_handle->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
        } catch (\PDOException $e) {
            die('Connection failed or database cannot be selected : ' . $e->getMessage());
        }
    }
 
    public static function getDatabase()
    {
        if (is_null(self::$database)) {
            self::$database = new self();
        }
        return self::$database;
    }
 
    public function handle()
    {
        return $this->_handle;
    }
}