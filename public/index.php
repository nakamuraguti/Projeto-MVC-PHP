<?php
    require __DIR__ . '/../vendor/autoload.php';

    use Alura\Cursos\Controller\InterfaceControladorRequisicao;

    $path = $_SERVER['PATH_INFO'];
    $routes = require __DIR__ . '/../config/routes.php';

    if (!array_key_exists($path, $routes)) {
        http_response_code(404);
        exit();
    }

    session_start();

    $actionLogin = stripos($path, 'login');

    if (!isset($_SESSION['logged']) && $actionLogin === false) {
        header('Location: /login');
        exit();
    }

    $controllerClass = $routes[$path];
    /** @var InterfaceControladorRequisicao $controller */
    $controller = new $controllerClass();
    $controller->requestProcess();
?>