<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Include router Class
require 'router.php';
// Include all your model files here
require 'Model/Article.php';
// Include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';
// Include routes
require 'routes.php';

// Get the HTTP method of the request 
$method = $_SERVER['REQUEST_METHOD'];
// Get the URI of the request 
$uri = $_SERVER['REQUEST_URI'];

// Parse the URL 
$parsedUrl = parse_url($uri);
// Remove any trailing slashes 
$path = trim($parsedUrl['path'], '/');

// Handle the request using the router
$router->handleRequest($method, $path);
