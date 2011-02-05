<?php
/**
 * Description of View
 *
 * @author kurtisfunai
 */
namespace Kurt;

class View {
    protected $_form;
    protected $_loginForm;
    protected $_template;

    public function __construct($template) {
        $this->_template = $template;
    }

    public function render(){
        ob_start();
        include $this->_template;

        $buffer = ob_get_clean();
        return $buffer;
    }

    public function getTemplateFile(){
        return $this->_template;
    }

    public function setForm(\Kurt\Form $form){
        $this->_form = $form;
    }

    public function getForm(){
        return $this->_form;
    }

    public function setLoginForm(\Kurt\LoginForm $form){
        $this->_loginForm = $form;
    }

    public function getLoginForm(\Kurt\LoginForm $form){
         return $this->_loginForm;
    }
    
}
