<?php
session_start();

if (!isset($_SESSION)) {
    header("location:index.php");
    die;
}
if (empty($_SESSION)) {
    header("location:index.php");
    die;
}
include_once 'config.php';

$sql = "SELECT * FROM contato";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Painel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class=" text-danger nav-link" href="sair.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-3 mx-auto">
                <div class="card bg-transparent shadow">
                    <div class="card-header bg-transparent">
                        <h5 class=" card-title text-center">Tabela de contatos</h5>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"> <i class="bi bi-person-plus">Cadastrar</i></button>
                        <table class="table  m-3  table-hover">
                            <thead>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                            </thead>
                            <tr>
                                <?php
                                while ($dados = mysqli_fetch_assoc($resultado)) {
                                    $nome = $dados['nome'];
                                    $email = $dados['email'];
                                    $telefone = $dados['telefone'];

                                ?>
                                    <tbody>
                                        <td> <?php echo $nome  ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $telefone   ?></td>
                                    </tbody>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>