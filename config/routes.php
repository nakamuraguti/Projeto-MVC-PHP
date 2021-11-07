<?php
    use  Alura\Cursos\Controller\{ListarCursos,NovoCurso,Persistencia,Exclusao};

    $routes = [
        '/listar-cursos' => ListarCursos::class,
        '/novo-curso' => NovoCurso::class,
        '/salvar-curso' => Persistencia::class,
        '/excluir-curso' => Exclusao::class
    ];

    return $routes;
?>