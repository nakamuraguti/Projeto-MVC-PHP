<?php
    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Usuario;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class RealizarLogin implements InterfaceControladorRequisicao {
        private $repositorioUsuarios;

        public function __construct() {
            $entityManager = (new EntityManagerCreator())->getEntityManager();
            $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
        }

        public function requestProcess(): void {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            if (is_null($email) || $email === false) {
                echo "E-mail Inválido";
                return;
            }

            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

            $usuario = $this->repositorioUsuarios->findOneBy(['email' => $email]);
            
            if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
                echo "E-mail ou Senha Inválidos";
                return;
            }

            session_start();
            $_SESSION['logged'] = true;

            header('Location: /listar-cursos');
        }
    }
?>