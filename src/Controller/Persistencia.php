<?php
    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Helper\FlashMessageTrait;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class Persistencia implements InterfaceControladorRequisicao {
        use FlashMessageTrait;

        private $entityManager;

        public function __construct() {
            $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        }

        public function requestProcess(): void {
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
            $curso = new Curso();
            $curso->setDescricao($descricao);

            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            
            $alertType = 'success';

            if (!is_null($id) && $id !== false) {
                $curso->setId($id);
                $this->entityManager->merge($curso);
                $this->defineMessage($alertType, "Curso Alterado com Sucesso");
            } else {
                $this->entityManager->persist($curso);
                $this->defineMessage($alertType, "Curso Adicionado com Sucesso");
            }
            $this->entityManager->flush();

            header('Location: /listar-cursos', false, 302);
        }
    }
?>