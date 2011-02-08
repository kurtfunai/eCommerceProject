<?php
/**
 * Description of Controller
 *
 * @author kurtisfunai
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
        else {
            //return "There are no featured products";
        }

        $nonFeatured = $model->getAllNonFeaturedProducts();
        if ($nonFeatured) {
                $view->setValue("nonFeatured", $nonFeatured);
        }
        else {
            //return "There are no non featured products";
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
        require_once 'Kurt/Form.php';
        $form = new Form;
        $view->setForm($form);

        if ($this->_request->isPost()) {
            if($form->isValid($this->_request->getPost())) {
                $_SESSION['sentConfirmation'] = "Thank you, your information has been sent!";
            }
        }
        return $view->render();
    }

    public function contactAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/ContactTemplate.phtml");
        require_once 'Kurt/Form.php';
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
    
    public function buyNowAction() {
        require_once 'Kurt/View.php';
        $view = new View(APPLICATION_PATH."/Templates/ProductInfoTemplate.phtml");
        $productId = $this->_request->getQuery("product");

        if ($productId) {
            require_once 'Kurt/Model.php';
            $model = new Model;
            $model->setDb($this->_db);
            $productInfo = $model->getProductInformation($productId);
            foreach ($productInfo as $key => $value) {
                $view->setValue($key, $value);
            }
        }
        else {
            //return error message
        }
        
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