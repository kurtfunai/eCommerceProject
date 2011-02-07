<?php
/**
 * Description of ImageModel
 *
 * @author kurtisfunai
 */
namespace Kurt;

class Model {
    protected $_db;

    public function setDb(\Kurt\Db $db){
        $this->_db = $db;
    }

    public function getDb(){
         return $this->_db;
    }

    public function getProductInformation($productId){
        $queryString = "SELECT `productName`,`productPrice`,`productDescription` FROM `products` WHERE id=". $this->_db->quoteInput($productId) ;
        $results  = $this->_db->getResults($queryString);

        return $results;
    }
 
}