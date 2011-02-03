<?php
/**
 * Description of ImageModel
 *
 * @author kurtisfunai
 */
namespace Kurt;

class ImageModel {
    protected $_db;

    public function setDb(\Kurt\Db $db){
        $this->_db = $db;
    }

    public function getDb(){
         return $this->_db;
    }

    public function storeFile($filePath, $fileName){
        return move_uploaded_file($filePath, "Uploads/$fileName");
    }

    public function add(array $data, $fileName){
        $data["dateCreated"] = date(DATE_ATOM);
        $data["imagePath"] = "Uploads/$fileName";
        $this->_db->insert($data, "images");
    }   
}