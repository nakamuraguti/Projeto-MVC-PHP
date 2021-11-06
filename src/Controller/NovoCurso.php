<?php
    namespace Alura\Cursos\Controller;

    class NovoCurso implements InterfaceControladorRequisicao {
        public function requestProcess(): void {
            ?>

            <!DOCTYPE html>
            <html lang="pt-BR">
                <head>
                    <meta charset="UTF-8">
                    <title>Document</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                </head>
                <body>
                <div class="container">
                    <div class="jumbotron">
                        <h1>Cadastrar Novo Curso</h1>
                    </div>
                    
                    <form action="">
                        <div class="form-group">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="text" name="descricao" id="descricao" class="form-control">
                        </div>
                        <button class="btn btn-primary">Salvar</button>
                    </form>
                </div>
                </body>
            </html>

            <?php
        }
    }
?>