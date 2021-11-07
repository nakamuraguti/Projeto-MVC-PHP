<?php
    namespace Alura\Cursos\Controller;

    class LoginController extends ControladorHTML implements InterfaceControladorRequisicao {
        public function requestProcess(): void {
            echo $this->renderHTML('login/formulario.php', [
                'title' => 'Login'
            ]);
        }
    }
?>