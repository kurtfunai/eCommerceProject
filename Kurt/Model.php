<?php
/**
 * Description of Cart
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
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

    public function getProductInformation($productId) {
        $queryString = "SELECT `id`, `productName`,`productAuthor`, `productPrice`,`productDescription`, `productLanguages` FROM `products` WHERE id=". $this->_db->quoteInput($productId) ;
        $results  = $this->_db->getSingleResult($queryString);

        return $results;
    }

    public function getAllFeaturedProducts() {
        $queryString = "SELECT * FROM `products` WHERE `featured` = true";
        $results  = $this->_db->getSingleResult($queryString);

        return $results;
    }

    public function getAllNonFeaturedProducts() {
        $queryString = "SELECT * FROM `products` WHERE `featured` = false";
        $results  = $this->_db->getResults($queryString);

        return $results;
    }
}