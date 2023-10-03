<?php

include 'config.php';
session_start();
$nome = mysqli_escape_string($conexao,$_POST['nome']);
$senha = mysqli_escape_string($conexao,$_POST['senha']);
$sql = "SELECT * FROM usuario WHERE nome = '$nome'";
$resultado = mysqli_query($conexao,$sql);
    $banco = mysqli_fetch_assoc($resultado);

    if (password_verify($senha,$banco['senha'])) {
        $_SESSION['nome'] = $nome;
        $_SESSION['senha'] = $senha;
        $_SESSION['id'] = $banco['id'];
        header("location:painel.php");
        die;
    }else {
       $_SESSION['msg'] = "Usuário nao existe";
       $_SESSION['status'] = "alert-danger";
        header("location:index.php");
    die;
    }