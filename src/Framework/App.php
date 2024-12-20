<?php 
declare(strict_types=1);


namespace Framework;

class App {
    
    private Router $router;
    private Container $container;

    public function __construct(string $containerDefinitionPath = null)
    {
        $this->router = new Router();
        $this->container = new Container();

        if($containerDefinitionPath) {
            $containerDefinitions = include $containerDefinitionPath;
            $this->container->addDefinitions($containerDefinitions);
        }
    }

    public function run() {
        $path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path,$method,$this->container);
    }

    public function get(string $path,array $controller){
        $this->router->add('GET',$path,$controller);

        return $this;
    }

    public function post(string $path,array $controller){
        $this->router->add('POST',$path,$controller);

        return $this;
    }
    
    public function addMiddleware($middleware) {
        $this->router->addMiddleware($middleware);
    }

    public function add(string $middleware) {

        $this->router->addRouteMiddleware($middleware);
    }

    public function delete(string $path, array $controller) {
        $this->router->add('DELETE', $path, $controller);

        return $this;
    }
}