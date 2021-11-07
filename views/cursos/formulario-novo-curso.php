<?php include __DIR__ . '/../header.php'; ?>

    <form action="/salvar-curso" method="POST">
        <div class="form-group">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>
    
<?php include __DIR__ . '/../footer.php'; ?>