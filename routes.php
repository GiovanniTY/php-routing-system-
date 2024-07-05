<?php
$router = new Router();

// Routes for the home page
$router->addRoute('GET', '/^$/', function () {
    $controller = new HomepageController();
    $controller->index();
});

// Routes for articles
$router->addRoute('GET', '/^articles$/', function () {
    $controller = new ArticleController();
    $controller->index();
});

// Routes to show the details of an article
$router->addRoute('GET', '/^articles-show\/(\d+)$/', function ($id) {
    $controller = new ArticleController();
    $controller->show($id);
});
