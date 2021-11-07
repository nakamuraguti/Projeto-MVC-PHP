<?php
    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Helper\HtmlRenderer;

    class NovoCurso implements InterfaceControladorRequisicao {
        use HtmlRenderer;
        
        public function requestProcess(): void {
            echo $this->renderHTML('cursos/formulario-novo-curso.php', [
                'title' => 'Novo Curso'
            ]);
        }
    }
?>