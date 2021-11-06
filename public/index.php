<?php
    require __DIR__ . '/../vendor/autoload.php';

    use Alura\Cursos\Controller\ListarCursos;
    use Alura\Cursos\Controller\NovoCurso;

    switch($_SERVER['PATH_INFO']) {
        case '/listar-cursos':
            $controller = new ListarCursos();
            $controller->requestProcess();
            break;
        case '/novo-curso':
            $controller = new NovoCurso();
            $controller->requestProcess();
            break;
        default:
            echo "Erro 404";
    }
?>