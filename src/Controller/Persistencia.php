<?php
    namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao {
        public function __construct() {
            $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        }

        public function requestProcess(): void {
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
            $curso = new Curso();
            $curso->setDescricao($descricao);

            $this->entityManager->persist($curso);
            $this->entityManager->flush();
        }
    }
?>