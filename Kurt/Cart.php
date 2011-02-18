<?php
/**
 * This class is handles all functionality relating to a users shopping cart.
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
 */
namespace Kurt;

class Cart {
    protected $_items = array();

    public function addItem($productId, $quantity) {
        /**
         * use productId as key so that we can use in_array($productId) in the controller
         */
        if (array_key_exists($productId, $this->_items)) {
            $this->updateQuantity($productId, $this->_items[$productId]['quantity'] + $quantity);
        }
        else { 
            $this->_items[$productId] = array('id' => $productId,'quantity' => $quantity);
        }
    }

    public function removeItem() {
        
    }

    public function getNumberOfItems() {
        return count($this->_items);
    }

    public function setItems($items) {
        $this->_items = $items;
    }

    public function hasItems() {
        return !empty($this->_items);
    }

    public function getItems() {
        return $this->_items;
    }

    public function updateQuantity($productId, $quantity) {
        $this->_items[$productId]['quantity'] = $quantity;
    }
    
}

