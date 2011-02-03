<?php
/**
 * Description of Db
 *
 * @author kurtisfunai
 */
namespace Kurt;
use PDO;

class Db {
    protected $_db;
    
    public function setDbConnection($dbConn) {
       $this->_db = $dbConn;
    }

    public function getDbConnection($dbConn) {
       return $this->_db;
    }

    public function insert($data, $tableName){
        
        $queryString = "INSERT INTO ". $tableName ."(";
        foreach($data as $key=>$value){
            $queryString .= "$key, ";
        }
        $queryString = rtrim($queryString,", ");
        $queryString .= ") VALUES (";
        foreach($data as $key=>$value){
            $quotedValue = $this->_db->quote($value);
            $queryString .= "$quotedValue, ";
        }
        $queryString = rtrim($queryString,", ");
        $queryString .= ")";
        $try = $this->_db->exec($queryString);
        if (!$try) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->_db->errorInfo());
        }
    }

    public function getResults($queryString){
       $result = $this->_db->query($queryString)->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
    
}
