<?php
    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Helper\FlashMessageTrait;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class Exclusao implements InterfaceControladorRequisicao {
        use FlashMessageTrait;

        private $entityManager;

        public function __construct() {
            $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        }

        public function requestProcess(): void {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            if (is_null($id) || $id === false) {
                $this->defineMessage("danger", "Curso Inexistente");
                header('Location: /listar-cursos');
                return;
            }
            
            $this->defineMessage("success", "Curso Excluído com Sucesso");

            $curso = $this->entityManager->getReference(Curso::class, $id);
            $this->entityManager->remove($curso);
            $this->entityManager->flush();
            header('Location: /listar-cursos');
        }
    }
?>