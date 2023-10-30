<?php

/**
 * Class Router
 *
 * Handles routing and dispatching of HTTP requests.
 */
class Router {
    private readonly string $serverPath;
    private readonly string $methodType;

    private array $availableRoutes = [
        "GET" => [],
        "POST" => [],
        "PATCH" => [],
        "DELETE" => [],
    ];

    /**
     * Router constructor.
     * Initializes the router by extracting the server path and HTTP method of the incoming request.
     */
    public function __construct() {
        $this->serverPath = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        $this->methodType = $_SERVER["REQUEST_METHOD"];
    }

    /**
     * Register a route with the specified HTTP method, path, callable, and optional middlewares.
     *
     * @param string $method      The HTTP method (GET, POST, PATCH, DELETE).
     * @param string $routePath   The path for the route.
     * @param mixed  $callable    The callable to be executed for the route.
     * @param array  $middlewares (Optional) An array of middleware class names to be executed before the route.
     *
     * This method allows you to define routes for your application, specifying the HTTP method,
     * the path, the callable (controller or closure) that handles the route, and optional middlewares.
     *
     *
     * @return void
     */
    public final function makeRoute(string $method, string $routePath, mixed $callable, array $middlewares = []): void
    {
        // Convert the provided HTTP method to uppercase.
        $method = strtoupper($method);

        // Check if the provided HTTP method is valid.
        if ( !isset($this->availableRoutes[$method]) ){
            // If the method is not valid, print an error message.
            echo "Invalid method: $method";

            // Return early, as an invalid method should not proceed.
            return;
        }

        // Store the route information, including the callable and middlewares.
        $this->availableRoutes[$method][$routePath] = [
            // 'callable' represents the function or method to execute when this route is matched.
            'callable' => $callable,
            // 'middlewares' is an array of classes that will be executed before the route's callable.
            'middlewares' => $middlewares,
        ];
    }

    /**
     * Dispatch the HTTP request to the appropriate route and execute associated middlewares and callable.
     *
     * This method checks the incoming request against the defined routes and, if a matching route is found,
     * it executes any specified middlewares before invoking the route's callable (controller or closure).
     *
     * @return void
     */
    public final function dispatch(): void
    {
        // Check if the current request's method and path match any registered route.
        if (isset($this->availableRoutes[$this->methodType][$this->serverPath])) {
            // Get the route information for the matched path.
            $route = $this->availableRoutes[$this->methodType][$this->serverPath];

            // Execute the middleware classes associated with the route.
            foreach ($route['middlewares'] as $middleware) {
                // Create an instance of the middleware class.
                $middlewareInstance = new $middleware();
                // Call the middleware's 'handle' method.
                $middlewareInstance->handle();
            }

            // Get the 'callable' associated with the matched route.
            $callable = $route['callable'];

            // Check if the 'callable' is an array (e.g., ['ControllerClass', 'methodName']).
            if (is_array($callable) && class_exists($callable[0])) {
                // Create an instance of the controller class.
                $controller = new $callable[0]();
                // Call the specified method on the controller.
                echo call_user_func([$controller, $callable[1]]);
            }
            // If the 'callable' is a callable function or closure.
            elseif (is_callable($callable)) {
                // Call the callable function or closure.
                echo call_user_func($callable);
            } else {
                // If the 'callable' is not recognized or callable, display an error message.
                echo "Route is not callable.";
            }
        } else {
            // If there is no matching route, display a "Route not found" error message.
            echo "Route not found.";
        }
    }
}