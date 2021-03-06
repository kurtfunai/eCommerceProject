<?php
/**
 * Description of Cart
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
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

    public function quoteInput($value) {
        return $this->_db->quote($value);
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

    public function getSingleResult($queryString){
       $result = $this->_db->query($queryString)->fetch(PDO::FETCH_ASSOC);
       return $result;
    }
    
}
