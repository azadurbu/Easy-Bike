<?php
include_once 'DbConfig.php';
 
class Crud extends DbConfig
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getData($query)
    {        
        $result = $this->connection->query($query);
        
        if ($result == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }
        
    public function execute($query) 
    {
        $result = $this->connection->query($query);
        
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }        
    }

    public function delete($query) 
    {
        $result = $this->connection->query($query);
        $rowsAffected = mysqli_affected_rows($this->connection);

        if ($rowsAffected > 0) 
        {
            return true;
        } 
        else 
        {
            echo 'Error: cannot execute the command';
            return false;
        }        
    }
    
    public function FormatDate($date) 
    {
        $NewDate = trim($date, " ");
        
        $NewDate = explode("-",$NewDate);
        
        $NewDate = $NewDate[2]."-".$NewDate[1]."-".$NewDate[0];
        
        return $NewDate;         
    }

    
    // public function delete($id, $table) 
    // { 
    //     $query = "DELETE FROM $table WHERE id = $id";
        
    //     $result = $this->connection->query($query);
    
    //     if ($result == false) {
    //         echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }
 
    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}
?>