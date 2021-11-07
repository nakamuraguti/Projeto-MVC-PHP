<?php
    use  Alura\Cursos\Controller\{ListarCursos,NovoCurso,Persistencia,Exclusao,EditarCurso, LoginController, RealizarLogin};

    $routes = [
        '/listar-cursos' => ListarCursos::class,
        '/novo-curso' => NovoCurso::class,
        '/salvar-curso' => Persistencia::class,
        '/excluir-curso' => Exclusao::class,
        '/alterar-curso' => EditarCurso::class,
        '/login' => LoginController::class,
        '/action-login' => RealizarLogin::class
    ];

    return $routes;
?>