<?php
/**
 * Created by PhpStorm.
 * User: molodtsov
 * Date: 01.10.15
 * Time: 19:42
 */
require_once '../Core/App.php';


\Core\App::initVendors();
\Core\App::autoload();

// region Routes
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/',            ['\Uno\Controllers\Index','indexAction']);
    $r->addRoute('POST', '/',           ['\Uno\Controllers\Game','createAction']);
    $r->addRoute('GET', '/{id:\d+}',    ['\Uno\Controllers\Game','getAction']);
    $r->addRoute('POST', '/{id:\d+}',   ['\Uno\Controllers\Game','updateAction']);
    // Or alternatively
//    $r->addRoute('GET', '/user/{id:\d+}[/{name}]', 'common_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {

    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        header("HTTP/1.0 404 Not Found");
        exit(1);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // ... 405 Method Not Allowed
        header("HTTP/1.0 405 Method Not Allowed");
        exit(1);
        break;
    case FastRoute\Dispatcher::FOUND:
//        $handler = $routeInfo[1];
//        $vars = $routeInfo[2];
        // ... call $handler with $vars
        break;
}
// endregion
//print "<pre>";
//$class = $routeInfo[1][0];
//$method = $routeInfo[1][1];
//var_dump($httpMethod, $routeInfo, $_REQUEST);
//print "</pre>";
$data = call_user_func_array($routeInfo[1], $routeInfo[2]);

echo $data;
