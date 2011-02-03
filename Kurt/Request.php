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

    public function getFiles() {
        return $_FILES;
    }

    public function getQuery() {
        return $_GET;
    }

    public function getSession() {
        return $_SESSION;
    }

    public function actionToPerform($query) {
        if (isset($query["action"])) {
            if ($query["action"] == "login") {
                return "login";
            }
            elseif ($query["action"] == "logout") {
                return "logout";
            }
        }
        return "home";
    }

    public function userLoggedIn($session) {
        if (isset($session['username'])) {
            return true;
        }
        return false;
    }
}
