<?php
require __DIR__  . '/vendor/autoload.php';
require __DIR__ . '/config.php';



$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';

if ($url == '/') {
    require_once __DIR__ . '/controllers/indexController.php';
    $indexController = new IndexController();
    $indexController->homePage();
} else {
    //The first element should be a controller
    $request = $url[0];

    // If a second part is added in the URI, 
    // it should be a method
    $requestedAction = isset($url[1]) ? $url[1] : '';

    // The remain parts are considered as 
    // arguments of the method
    $requestedParams = array_slice($url, 2);

    // Check if controller exists. NB: 
    // You have to do that for the model and the view too
    $controllerlPath = __DIR__ . '/controllers/' . $request . 'Controller.php';

    if (file_exists($controllerlPath)) {
        require_once __DIR__ . '/controllers/' . $request . 'Controller.php';
        $controllerName = ucfirst($request) . 'Controller';
        $controller  = new $controllerName();

        // If there is a method - Second parameter
        if ($requestedAction != '') {
            // then we call the method via the controller
            $controller->$requestedAction($requestedParams);
        }
    } else {

        header('HTTP/1.1 404 Not Found');
        die('404 - The file - ' . $controllerlPath . ' - not found');
    }
}
