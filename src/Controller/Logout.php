<?php
    namespace Alura\Cursos\Controller;

    class Logout implements InterfaceControladorRequisicao {
        public function requestProcess(): void {
            session_destroy();
            header('Location: /login');
        }
    }
?>