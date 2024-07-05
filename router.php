<?php

class Router
{
    private $routes = [];

// Ajout d'une route avec méthode, modèle et rappel 
public function addRoute($method, $pattern, $callback)  
    {
        $this->routes[] = [
            'method' => $method,  // Metode HTTP (GET, POST, etc.)
            'pattern' => $pattern,  // Pattern de l URL
            'callback' => $callback,  // Callback a executé quand la routes correspond
        ];
    }

    // gere la requette
    public function handleRequest($method, $uri)
    {
        foreach ($this->routes as $route) {
           // Vérifiez si la méthode et le modèle de route correspondent à la requête
            if ($route['method'] === $method && preg_match($route['pattern'], $uri, $matches)) {
                array_shift($matches); // Supprime la correspondance complète du résultat
               // Exécute le rappel avec les paramètres extraits de l'URL
                return call_user_func_array($route['callback'], $matches);
            }
        }

        // Si aucune route ne correspond, renvoie une erreur 404
        http_response_code(404);
        echo "404 Not Found";
    }
}
?>
