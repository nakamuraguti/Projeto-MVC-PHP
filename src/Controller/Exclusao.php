<?php
    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class Exclusao implements InterfaceControladorRequisicao {
        private $entityManager;

        public function __construct() {
            $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        }

        public function requestProcess(): void {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            if (is_null($id) || $id === false) {
                $_SESSION['alertType'] = "danger";
            $_SESSION['message'] = "Curso Inexistente";
                header('Location: /listar-cursos');
                return;
            }

            $_SESSION['alertType'] = "success";
            $_SESSION['message'] = "Curso Excluído com Sucesso";

            $curso = $this->entityManager->getReference(Curso::class, $id);
            $this->entityManager->remove($curso);
            $this->entityManager->flush();
            header('Location: /listar-cursos');
        }
    }
?>