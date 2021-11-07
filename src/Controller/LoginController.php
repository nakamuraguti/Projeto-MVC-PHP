<?php
    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Helper\HtmlRenderer;

    class LoginController implements InterfaceControladorRequisicao {
        use HtmlRenderer;

        public function requestProcess(): void {
            echo $this->renderHTML('login/formulario.php', [
                'title' => 'Login'
            ]);
        }
    }
?>