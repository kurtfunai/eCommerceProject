<?php
/**
 * Description of Form
 *
 * @author kurtisfunai
 */
namespace Kurt;

class Form {
    protected $values = array("imageTitle"=>"","imageDescription"=>"");
    protected $errors = array();
    protected $_uploadedFileName;
    protected $_uploadedFilePath;
    
    public function isValid($data, $files){
        $this->populate($data);
        $data = $this->getValues();
        if (!isset($data['imageTitle']) || $data['imageTitle'] =="") {
            $this->errors[] = "No image title";
        }
        if ($files["imageUploaded"]["error"] != 4) {
            
            if ($files["imageUploaded"]["error"] > 0) {
                $this->errors[] = "Upload error: ".$files["imageUploaded"]["error"];
            }
            else{
                //store uploadedFile temp name in protected property
                $this->_uploadedFileName = $files["imageUploaded"]["name"];
                $this->_uploadedFilePath = $files["imageUploaded"]["tmp_name"];
                //var_dump($this->_uploadedTempFileName);
            }
            if ((($files["imageUploaded"]["type"] != "image/gif")
                    && ($files["imageUploaded"]["type"] != "image/jpeg")
                    && ($files["imageUploaded"]["type"] != "image/pjpeg"))){
                    $this->errors[] = "File type must be .gif or .jpeg";
             }
        }
        else {
            $this->errors[] = "No file provided, please upload a .gif or .jpeg";
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

    public function getValues(){
        //return objects from post
        return $this->values;
    }

    public function getTempFileName(){
        //return truncated tmp file name
        //return trim($this->_uploadedTempFileName, "/Applications/MAMP");
        return $this->_uploadedFileName;
    }
    
    public function getTempFilePath(){
        //return truncated tmp file name
        //return trim($this->_uploadedTempFileName, "/Applications/MAMP");
        return $this->_uploadedFilePath;
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
