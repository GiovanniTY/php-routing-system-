<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Include router Class
require 'router.php';
//include all your model files here
require 'Model/Article.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';
//include routes
require 'routes.php';

//get the http method of the request 
$method = $_SERVER['REQUEST_METHOD'];
//get de uri of the request 
$uri = $_SERVER['REQUEST_URI'];

//parsea the URL 
$parseedUrl = parse_url($uri);
// remove ever slash 
$path = trim($parseedUrl['path'], '/');

//handle the request using the router

$router->handleRequest($method,$path);