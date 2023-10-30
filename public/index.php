<?php

// Include the autoloader to automatically load classes.
require_once __DIR__ . DIRECTORY_SEPARATOR. ".." . DIRECTORY_SEPARATOR . "autoloader.php";

// Create a new Router instance to handle routing.
$router  = new Router();

// Define a route for the root path that echoes "INDEX ROUTE."
$router->makeRoute("GET", "/", function(){
    echo "INDEX ROUTE";
});

// Define a route for the "/home" path that uses the "index" method of the HomeController class.
$router->makeRoute("GET", "/home", [HomeController::class, "index"]);

// Define a route for the "/products" path that lists products and applies middlewares.
$router->makeRoute(
    method: "GET",
    routePath: "/products",
    callable: [ProductController::class, "list"],
    middlewares:[ResponseTypeControl::class, ApiKeyControl::class]
);

// Dispatch the router to handle incoming requests.
$router->dispatch();