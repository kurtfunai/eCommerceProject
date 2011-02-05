<?php
/**
 * Description of Form
 *
 * @author kurtisfunai
 */
namespace Kurt;

class Form {
    protected $values = array("contactName"=>"","contactInfo"=>"","contactDescription"=>"");
    protected $errors = array();
    protected $_uploadedFileName;
    protected $_uploadedFilePath;
    
    public function isValid($data){
        $this->populate($data);
        $data = $this->getValues();
        if (!isset($data['contactName']) || $data['contactName'] =="") {
            $this->errors[] = "Please enter a contact name";
        }
        if (!isset($data['contactInfo']) || $data['contactInfo'] =="") {
            $this->errors[] = "Please enter an email or phone number to reach you at";
        }
        if (!isset($data['contactDescription']) || $data['contactDescription'] =="") {
            $this->errors[] = "Please enter a description of how I can help";
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

    public function repopulateForm($formElement, $defaultValue) {
        if ($this->values[$formElement] == "") {
            echo $defaultValue;
        }
        else {
            echo $this->values[$formElement];
        }
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
