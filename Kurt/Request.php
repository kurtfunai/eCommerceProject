<?php
/**
 * Description of Request
 *
 * @author kurtisfunai
 */
namespace Kurt;

class Request {
    
    public function isPost() {
        // Returns true if POST, false if not
        return $_SERVER['REQUEST_METHOD'] == "POST";
    }

    public function getPost() {
        return $_POST;
    }

    public function getQuery($name = null) {
        if ($name) {
            if (isset($_GET[$name])) {
                return $_GET[$name];
            }
            else {
                return null;
            }
        }
        return $_GET;
    }

    public function getSession() {
        return $_SESSION;
    }

    public function getFiles() {
        return $_FILES;
    }
    
    public function actionToPerform($query) {
        $page = "";
        if (isset($query["action"])) {
            if ($query["action"] == "products") {
                $page = "products";
            }
            elseif ($query["action"] == "about") {
                $page = "about";
            }
            elseif ($query["action"] == "hire") {
                $page = "hire";
            }
            elseif ($query["action"] == "contact") {
                $page = "contact";
            }
            elseif ($query["action"] == "buy") {
                $page = "buyNow";
            }
            else {
                $page = "error";
            }
        }
        else {
            $page = "home";
        }
        return $page."Action";
    }

}
