<?php

class Router {

    private array $routes = [];
    private array $middlewares = [];
    private static string $basePath = 'i';
    private static string $fullDirectory = ''; // ← static property
    private static $app = null; // ← Store the app instance

    public function __construct(string $path = '') {

        // e.g. '/mywebsite' if your project is in a subfolder
        $this->base = rtrim($path, '/');
        self::$basePath = $this->base; // Set the static property
        
        self::$fullDirectory = realpath(__DIR__ . '/../'); // Set the static property
    }

    // -----------------------------------------------
    // Set the app instance (call this from config.php)
    // -----------------------------------------------
    
    public static function setApp($app_instance): void {
        self::$app = $app_instance;
    }

    // -----------------------------------------------
    // Register routes
    // -----------------------------------------------

    public function get(string $path, callable|array $handler, array $middlewares = []): void {
        $this->addRoute('GET', $path, $handler, $middlewares);
    }

    public function post(string $path, callable|array $handler, array $middlewares = []): void {
        $this->addRoute('POST', $path, $handler, $middlewares);
    }

    private function addRoute(string $method, string $path, callable|array $handler, array $middlewares): void {
        $this->routes[] = [
            'method'      => strtoupper($method),
            'path'        => $path,
            'handler'     => $handler,
            'middlewares' => $middlewares,
        ];
    }

    // -----------------------------------------------
    // Register global middleware (runs on every route)
    // -----------------------------------------------

    public function addMiddleware(callable $middleware): void {
        $this->middlewares[] = $middleware;
    }

    // -----------------------------------------------
    // Dispatch the current request
    // -----------------------------------------------

    public function dispatch(): void {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri    = $this->getCurrentUri();

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) continue;

            $params = $this->matchRoute($route['path'], $uri);

            if ($params === false) continue;

            // Run global middlewares first
            foreach ($this->middlewares as $middleware) {
                $result = call_user_func($middleware);
                if ($result === false) return; // middleware blocked the request
            }

            // Run route-specific middlewares
            foreach ($route['middlewares'] as $middleware) {
                $result = call_user_func($middleware);
                if ($result === false) return;
            }

            // Call the handler, passing URL params
            call_user_func_array($route['handler'], $params);
            return;
        }

        // No route matched — redirect to index
        $this->pageNotFound();
    }

    // -----------------------------------------------
    // Match a route pattern against the current URI
    // Returns array of params if matched, false if not
    // -----------------------------------------------

    private function matchRoute(string $routePath, string $uri): array|false {
        // Convert /tailor/:slug → regex /tailor/([^/]+)
        $pattern = preg_replace('/:[a-zA-Z_]+/', '([^/]+)', $routePath);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches); // remove full match
            return $matches;       // return captured params
        }

        return false;
    }

    // -----------------------------------------------
    // Get clean URI (strip base path + query string)
    // -----------------------------------------------

    private function getCurrentUri(): string {
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        // Strip base path (e.g. /mywebsite)
        if ($this->base !== '' && str_starts_with($uri, $this->base)) {
            $uri = substr($uri, strlen($this->base));
        }

        return '/' . trim($uri, '/') ?: '/';
    }

    // -----------------------------------------------
    // Helper: load a view file
    // -----------------------------------------------

    public static function view(string $view, array $data = []): void {
        
        $data['app'] = self::$app; // Inject the app instance into every view automatically
        extract($data); // make $data keys available as variables in the view

        $dir = self::$fullDirectory . '/views/';
        $file = $dir . ltrim($view, '/') . '.php';

        if (file_exists($file)) {

            require $file;
            
        } else {

            // View file not found — show 404 page
            require $dir . 'not_found.php';
        }
    }

    // -----------------------------------------------
    // Redirect to homepage
    // -----------------------------------------------

    public static function pageNotFound(): void {

        $data['app'] = self::$app; // Inject the app instance into every view automatically
        extract($data); // make $data keys available as variables in the view
        // You can customize this to load a 404 view or redirect to home
        require self::$fullDirectory . '/views/' . 'not_found.php';
        exit;
    }

    // -----------------------------------------------
    // Redirect to any URL
    // -----------------------------------------------

    public function redirect(string $url, string $error_msg = ''): void {
        
        header('Location: ' . $url);
        exit;
    }

}
