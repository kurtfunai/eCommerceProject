<?php
/**
 * Description of Cart
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
 */
namespace Kurt;
require_once 'Kurt/Request.php';

class RequestMock extends Request {

    public function isPost() {
        // Returns true if POST, false if not
        return true;
    }

    public function getPost() {
        return array('imagePath' => "path/to/image", 'imageTitle' => "title", 'imageDescription' => "working with image model");
    }

}
