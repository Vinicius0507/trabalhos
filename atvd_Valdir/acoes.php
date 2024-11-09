<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create_tarefa'])) { 
    $titulo = trim($_POST['txtTitulo']);
    $descricao = trim($_POST['txtDescricao']);
    $status = trim($_POST['txtStatus']);
    $data = trim($_POST['txtData']);
    $nome = trim($_POST['txtNome']);

    $sql = "INSERT INTO tarefas (titulo, descricao, status, data, nome) VALUES ('$titulo', '$descricao', '$status', '$data', '$nome')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Tarefa criada com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Erro ao criar a tarefa: " . mysqli_error($conn);
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['delete_tarefa']);
    $sql = "DELETE FROM tarefas WHERE id = '$tarefaId'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Tarefa excluída com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Erro ao excluir a tarefa: " . mysqli_error($conn);
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit();
}

if (isset($_POST['update_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['id']);
    $titulo = mysqli_real_escape_string($conn, $_POST['txtTitulo']);
    $descricao = mysqli_real_escape_string($conn, $_POST['txtDescricao']);
    $status = mysqli_real_escape_string($conn, $_POST['txtStatus']);
    $data = mysqli_real_escape_string($conn, $_POST['txtData']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);

    $sql = "UPDATE tarefas SET titulo = '$titulo', descricao = '$descricao', status = '$status', data = '$data', nome = '$nome' WHERE id = '$tarefaId'";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Tarefa atualizada com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Erro ao atualizar a tarefa: " . mysqli_error($conn);
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit();
}
?>
