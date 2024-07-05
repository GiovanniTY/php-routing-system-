<?php
$router = new Router ();

//Routes pour la home page

$router->addRoute('GET', '/^$/', function () {
    require 'View/home.php';
});

//Routes pour les articles 
$router->addRoute('GET','/^articles$/', function() {
    $controller = new ArticleController();
    $controller->index();
});

//routes pour montrer les details d un article 
$router->addRoute('GET','/^articles-show\/(\d+)$/', function($id) {
    $controller = new ArticleController();
    $controller->show($id);
});
