<?php
    namespace Alura\Cursos\Controller;

    class NovoCurso extends ControladorHTML implements InterfaceControladorRequisicao {
        public function requestProcess(): void {
            echo $this->renderHTML('cursos/formulario-novo-curso.php', [
                'title' => 'Novo Curso'
            ]);
        }
    }
?>