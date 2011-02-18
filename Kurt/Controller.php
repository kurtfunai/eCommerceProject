<?php
/**
 * Description of Cart
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
 */
namespace Kurt;

class Controller {
    protected $_db;
    protected $_request;


    public function setRequest(\Kurt\Request $request){
        $this->_request = $request;
    }

    public function setDb(\Kurt\Db $db){
        $this->_db = $db;
    }

    public function productsAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/ProductsTemplate.phtml");
        require_once 'Kurt/Model.php';
        $model = new Model;
        $model->setDb($this->_db);
        $featured = $model->getAllFeaturedProducts();

        if ($featured) {
            foreach ($featured as $key => $value) {
                $view->setValue("featured_".$key, $value);
            }
        }

        $nonFeatured = $model->getAllNonFeaturedProducts();
        if ($nonFeatured) {
                $view->setValue("nonFeatured", $nonFeatured);
        }

        return $view->render();
    }

    public function aboutAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/AboutTemplate.phtml");
        return $view->render();
    }

    public function hireAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/HireTemplate.phtml");
        require_once 'Kurt/ContactForm.php';
        
        return $view->render();
    }

    public function contactAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/ContactTemplate.phtml");
        require_once 'Kurt/ContactForm.php';
        $form = new Form;
        $view->setValue('form', $form);

        if ($this->_request->isPost()) {
            if($view->getValue('form')->isValid($this->_request->getPost())) {
                $_SESSION['sentConfirmation'] = "Thank you, your information has been sent!";
            
                header('Location: index.php?action=contact');
                die();
            }
        }
        return $view->render();

    }
    
    public function cartAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/CartTemplate.phtml");
        require_once 'Kurt/Cart.php';
        $cart = new Cart;
        require_once 'Kurt/Model.php';
        $model = new Model;
        $model->setDb($this->_db);

        $removeId = $this->_request->getQuery("remove");
        /*if ($removeId) {
            if (isset($_SESSION['cart'])) {
                $cart->setItems($_SESSION['cart']);
            }
            $cart->addItem($productId, 1);
            $_SESSION['cart'] = $cart->getItems();
        }*/

        $productId = $this->_request->getQuery("product");
        //if there is a productId addItem to cart class.
        if ($productId) {
            if (isset($_SESSION['cart'])) {
                $cart->setItems($_SESSION['cart']);
            }
            $cart->addItem($productId, 1);
            $_SESSION['cart'] = $cart->getItems();
        }

        //if there is a session variable, query database for each item and add
        //the product into to the cart variable in the session.
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $items=>$item){
                if (!$_SESSION['cart'][$items]['productInfo']) {
                    $_SESSION['cart'][$items]['productInfo'] = $model->getProductInformation($item['id']);
                }
            }
            $view->setValue('cart', $_SESSION['cart']);
        }
        else {
            $_SESSION['cart'] = $cart->getItems();
        }
        return $view->render();
    }

    public function checkoutAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/CheckoutTemplate.phtml");
        return $view->render();
    }

    public function homeAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/ProductsTemplate.phtml");
        return $view->render();
    }

    public function errorAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/ErrorTemplate.phtml");
        return $view->render();
    }

}