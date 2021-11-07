<?php
    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class ListarCursos extends ControladorHTML implements InterfaceControladorRequisicao {
        private $repositorioDeCursos;

        public function __construct() {
            $entityManager = (new EntityManagerCreator())->getEntityManager();
            $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
        }

        public function requestProcess(): void {
            $cursos = $this->repositorioDeCursos->findAll();
            echo $this->renderHTML('cursos/lista-cursos.php', [
                'title' => 'Lista de Cursos',
                'cursos' => $cursos
            ]);
        }
    }
?>