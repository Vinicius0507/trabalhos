<?php
session_start();
require_once('conexao.php');

$tarefa = [];

// Verificar se o ID da tarefa foi passado na URL
if (!isset($_GET['id'])) {
    header('Location: index.php'); 
    exit();
} else {
    $tarefaId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tarefas WHERE id = '{$tarefaId}'";
    $query = mysqli_query($conn, $sql);

    // Buscar dados da tarefa
    if (mysqli_num_rows($query) > 0) {
        $tarefa = mysqli_fetch_array($query);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Editar Tarefa <i class="bi bi-card-list"></i></h4>
                        <a href="index.php" class="btn btn-danger">Voltar</a>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($tarefa)): ?>
                            <form action="acoes.php" method="POST">
                                
                                <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

                                <div class="mb-3">
                                    <label for="txtNome" class="form-label">Nome</label>
                                    <input type="text" name="txtNome" id="txtNome" class="form-control" value="<?php echo $tarefa['nome']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="txtTitulo" class="form-label">Título da Tarefa</label>
                                    <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?php echo $tarefa['titulo']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="txtDescricao" class="form-label">Descrição da Tarefa</label>
                                    <textarea class="form-control" rows="5" id="txtDescricao" name="txtDescricao" required><?php echo $tarefa['descricao']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="txtData" class="form-label">Data Limite</label>
                                    <input type="date" name="txtData" id="txtData" class="form-control" value="<?php echo $tarefa['data']; ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="txtStatus" id="statusPendente" value="Pendente" class="form-check-input" <?php echo ($tarefa['status'] == 'Pendente') ? 'checked' : ''; ?> required>
                                        <label for="statusPendente" class="form-check-label">Pendente</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="txtStatus" id="statusConcluido" value="Concluído" class="form-check-input" <?php echo ($tarefa['status'] == 'Concluído') ? 'checked' : ''; ?> required>
                                        <label for="statusConcluido" class="form-check-label">Concluído</label>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <button type="submit" name="update_tarefa" class="btn btn-primary float-end">Salvar</button>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Tarefa não encontrada.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

