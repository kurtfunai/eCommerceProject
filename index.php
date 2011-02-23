<?php
/* 
 * Object Oriented eCommerce website
 * Kurtis Funai
 */
date_default_timezone_set("America/Toronto");
set_include_path(dirname(__FILE__) . PATH_SEPARATOR . get_include_path());
define('APPLICATION_PATH', dirname(__FILE__));
session_start();
require_once 'Kurt/Request.php';
require_once 'Kurt/Controller.php';
require_once 'Kurt/Db.php';
$request = new Kurt\Request;
$controller = new Kurt\Controller;
$controller->setRequest($request);
$db = new Kurt\Db;
$dbConn = new PDO('mysql:host=localhost;dbname=eCommerceProject', 'eCommerceUser', 'eCommerce');
$controller->setDb($db);
$db->setDbConnection($dbConn);

$action = $request->actionToPerform($request->getQuery());
echo $controller->$action();
