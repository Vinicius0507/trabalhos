<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tarefas";
$tarefa = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="p-3 mb-2 bg-dark-subtle text-dark-emphasis rounded">
                <h4 class="d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-list-check"></i> Suas tarefas aqui</span>
                    <a href="tarefa-create.php" class="btn btn-outline-dark">Adicionar tarefas</a>
                </h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
                    <?php foreach ($tarefa as $tarefas): ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-header">
                                    <h5 class="card-title"><?php echo ($tarefas['titulo']); ?></h5>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <p class="card-text flex-grow-3" style="margin-top: 20px"><?php echo ($tarefas['descricao']); ?></p>
                                    <p class="card-text">
                                        <small class="text-muted">Status: <?php echo ($tarefas['status']); ?></small>
                                    </p>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <?php echo date('d/m/Y', strtotime($tarefas['data'])); ?>
                                        </small>
                                        <small class="text-muted"><?php echo ($tarefas['nome']); ?></small>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <a href="tarefa-edit.php?id=<?php echo $tarefas['id']; ?>" class="btn btn-outline-secondary btn-sm">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <form action="acoes.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Tem certeza que deseja excluir?')" name="delete_tarefa" type="submit" value="<?php echo $tarefas['id']; ?>" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash"></i> Excluir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html
