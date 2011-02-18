<?php
/**
 * Description of Cart
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
 */
namespace Kurt;

class CartForm {
    protected $values = array("quantities"=>"");
    protected $errors = array();

    public function isValid($data){
        $this->populate($data);
        $data = $this->getValues();
        foreach ($data as $key => $product) {
            foreach ($product as $key=>$value)
                if (!is_numeric($value)) {
                   $this->errors[] = "Please enter numeric quantities";
                }
        }
        return empty($this->errors);
    }

    public function populate($data){
        //put objects from array back into form
        foreach($data as $key=>$value){
            if (array_key_exists($key, $this->values)) {
                $this->values[$key] = $value;
            }
        }
    }

    public function getValue($formElement) {
        if (isset($this->values[$formElement]) && $this->values[$formElement] != "") {
            return $this->values[$formElement];
        }
        return null;
    }

    public function getValues(){
        //return objects from post
        return $this->values;
    }

    public function hasErrors(){
        //checks for errors
        return !empty($this->errors);
    }

    public function getErrorMessages(){
        //get the error messages
        return $this->errors;
    }
}