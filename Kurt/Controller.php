<?php
/**
 * Description of Controller
 *
 * @author kurtisfunai
 */
namespace Kurt;

class Controller {
    protected $_request;

    public function setRequest(\Kurt\Request $request){
        $this->_request = $request;
    }

    public function productsAction() {
        require_once 'Kurt/View.php';
        $view = new View;
        $view->setTemplateFile(APPLICATION_PATH."/Templates/ProductsTemplate.phtml");
        return $view->render();
    }

    public function aboutAction() {
        require_once 'Kurt/View.php';
        $view = new View;
        $view->setTemplateFile(APPLICATION_PATH."/Templates/AboutTemplate.phtml");
        return $view->render();
    }

    public function hireAction() {
        require_once 'Kurt/View.php';
        $view = new View;
        $view->setTemplateFile(APPLICATION_PATH."/Templates/HireTemplate.phtml");
        return $view->render();
    }

    public function contactAction() {
        require_once 'Kurt/View.php';
        $view = new View;
        $view->setTemplateFile(APPLICATION_PATH."/Templates/ContactTemplate.phtml");
        return $view->render();
    }

    public function homeAction() {
        require_once 'Kurt/View.php';
        $view = new View;
        $view->setTemplateFile(APPLICATION_PATH."/Templates/ProductsTemplate.phtml");
        return $view->render();
    }

    public function errorAction() {
        require_once 'Kurt/View.php';
        $view = new View;
        $view->setTemplateFile(APPLICATION_PATH."/Templates/ErrorTemplate.phtml");
        return $view->render();
    }

}