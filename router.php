<?php

class Router
{
    private $routes = [];

    // Add a route with method, pattern, and callback
    public function addRoute($method, $pattern, $callback)
    {
        $this->routes[] = [
            'method' => $method,  // HTTP method (GET, POST, etc.)
            'pattern' => $pattern,  // URL pattern
            'callback' => $callback,  // Callback to execute when the route matches
        ];
    }

    // Handle the request
    public function handleRequest($method, $uri)
    {
        $matched = false;

        foreach ($this->routes as $route) {
            // Check if the method and route pattern match the request
            if ($route['method'] === $method && preg_match($route['pattern'], $uri, $matches)) {
                array_shift($matches); // Remove the full match from the result
                // Execute the callback with the parameters extracted from the URL
                call_user_func_array($route['callback'], $matches);
                $matched = true;
                break;
            }
        }

        // If no route matches, redirect to the home page
        if (!$matched) {
            $this->redirectToHome();
        }
    }

    private function redirectToHome()
    {
        // Redirect to the home page
        header('Location: /');
        exit();
    }
}
