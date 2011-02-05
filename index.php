<?php
/* 
 * Object Oriented approach to an image uploader
 * Kurtis Funai
 */

//make classes:request, controller, form, view, image
set_include_path(dirname(__FILE__) . PATH_SEPARATOR . get_include_path());
define('APPLICATION_PATH', dirname(__FILE__));
session_start();
require_once 'Kurt/Request.php';
require_once 'Kurt/Controller.php';
//require_once 'Kurt/Db.php';
$request = new Kurt\Request;
$controller = new Kurt\Controller;
$controller->setRequest($request);
/*$db = new Kurt\Db;
$dbConn = new PDO('mysql:host=localhost;dbname=ImageUploader', 'uploadusr', 'uploadpass');
$controller->setDb($db);
$db->setDbConnection($dbConn);*/


//$_SESSION["username"] = "love";
//unset($_SESSION["username"]);// = "love";

$action = $request->actionToPerform($request->getQuery());
echo $controller->$action();