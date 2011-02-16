<?php
/**
 * Description of Cart
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
 */
namespace Kurt;

class Cart {
    protected $_items = array();

    public function addItem($productId) {
        $this->_items[] = $productId;
    }

    public function removeItem() {
        
    }

    public function getNumberOfItems() {
        return count($this->_items);
    }

    public function setItems($items) {
        $this->_items = $items;
    }

    public function getItems() {
        return $this->_items;
    }
    
}

