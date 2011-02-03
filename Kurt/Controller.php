<?php
/**
 * Description of Controller
 *
 * @author kurtisfunai
 */
namespace Kurt;

class Controller {
    protected $_db;
    protected $_request;
    
    public function add(){
        require_once 'Kurt/Form.php';
        $form = new Form;
        require_once 'Kurt/View.php';
        $view = new View;
        $view->setForm($form);
        
        if (!$this->_request->userLoggedIn($this->_request->getSession())) {
            header('Location: index.php?action=login');
            die();
        }
        
            $view->setTemplateFile(APPLICATION_PATH."/Templates/FormTemplate.phtml");

            if ($this->_request->isPost()) {
               $data = $this->_request->getPost();
               $files = $this->_request->getFiles();

               if ($form->isValid($data, $files)) {
                  require_once 'Kurt/ImageModel.php';
                  $imageModel = new ImageModel;
                  $imageModel->setDb($this->_db);
                  $imageModel->storeFile($form->getTempFilePath(),$form->getTempFileName());
                  $imageModel->add($form->getValues(),$form->getTempFileName());

                  $_SESSION['completionNotification'] = "You have successfully uploaded your image.";
                  header( 'Location: index.php' );
                  die();
               }
               else{
                   return $view->render();
               }
            }
            else{
               return $view->render();
            }
    }

    public function setRequest(\Kurt\Request $request){
        $this->_request = $request;
    }

    public function setDb(\Kurt\Db $db){
        $this->_db = $db;
    }

    public function displayLoginForm(){
        //$_GET["action"] = "login";
        require_once 'Kurt/LoginForm.php';
        $form = new LoginForm;
        require_once 'Kurt/View.php';
        $view = new View;
        $view->setLoginForm($form);

        $view->setTemplateFile(APPLICATION_PATH."/Templates/LoginTemplate.phtml");

        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            $files = $this->_request->getFiles();
            if ($form->isValid($data, $files)) {
                require_once 'Kurt/LoginModel.php';
                $loginModel = new LoginModel;
                $loginModel->setDb($this->_db);
                
                if($loginModel->checkUserInfo($form->getUsername(), $form->getPassword())){
                    $_SESSION['username'] = $form->getUsername();
                }
                else {
                    $_SESSION['incorrectInfo'] = "Your username or password may be incorrect, please try again.";
                }

                header( 'Location: index.php' );
                die();
            }
        }
        return $view->render();
    }

    public function home(){
        return $this->add();
    }

    public function login(){
       // return $this->displayLoginForm();
        return $this->displayLoginForm();
    }
    
    public function logout(){
        if (isset($_SESSION['username'])){
            unset($_SESSION['username']);
        }
        $_SESSION['logoutNotification'] = "Logged out.";
        header( 'Location: index.php' );
        die();
    }

}