<?php
/**
 * Description of Cart
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
 */
namespace Kurt;

class View {
    protected $_template;
    protected $_values = array();

    public function __construct($template) {
        $this->_template = $template;
    }

    public function render(){
        ob_start();
        include $this->_template;
        $buffer = ob_get_clean();
        return $buffer;
    }

    public function setTemplateFile($template){
        $this->_template = $template;
    }

    public function getTemplateFile(){
        return $this->_template;
    }

    public function setValue($key, $value){
        $this->_values[$key] = $value;
    }

    public function getValue($key){
        if (isset($this->_values[$key])) {
            return $this->_values[$key];
        }
        //var_dump($this->_values);
        return null;
    }
    
}
