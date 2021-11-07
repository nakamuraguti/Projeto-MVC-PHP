<?php
    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Usuario;
    use Alura\Cursos\Helper\FlashMessageTrait;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class RealizarLogin implements InterfaceControladorRequisicao {
        use FlashMessageTrait;

        private $repositorioUsuarios;

        public function __construct() {
            $entityManager = (new EntityManagerCreator())->getEntityManager();
            $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
        }

        public function requestProcess(): void {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            if (is_null($email) || $email === false) {
                $this->defineMessage("danger", "E-mail Inválido");
                header('Location: /login');
                return;
            }

            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            
            $usuario = $this->repositorioUsuarios->findOneBy(['email' => $email]);
            
            if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
                $this->defineMessage("danger", "E-mail ou Senha Inválidos");
                header('Location: /login');
                return;
            }

            session_start();
            $_SESSION['logged'] = true;

            header('Location: /listar-cursos');
        }
    }
?>