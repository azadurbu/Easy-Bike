<?php
class DbConfig 
{
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'easybike_new_2';
    
    protected $connection;
    
    public function __construct()
    {
        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        mysqli_set_charset($this->connection,"utf8");
        return $this->connection;
    }
}
?>
