<?php
    namespace Alura\Cursos\Controller;

    class NovoCurso implements InterfaceControladorRequisicao {
        public function requestProcess(): void {
            require __DIR__ . '/../../views/cursos/formulario-novo-curso.php';
        }
    }
?>