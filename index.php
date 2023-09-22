<?php
session_start();


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
</head>

<body>
    <form>
        <div class="container">
            <div class="row mt-5">
                <?php
                if (isset($_SESSION['msg']) and $_SESSION['msg'] != "" and isset($_SESSION['status']) and $_SESSION['status'] != "") {

                ?>
                    <div class="alert <?php echo $_SESSION['status'] ?> alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['msg'] ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php  }
                unset($_SESSION['msg']);
                unset($_SESSION['status']);
                ?>
                <div class="col-6 mx-auto mt-5">
                    <div class="card m-2">
                        <div class="card-header">
                            <h5 class="text-center">Login</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nome:</label>
                                <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Senha:</label>
                                <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn-sm btn btn-primary">Entrar</button>
                            <hr>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Não possui cadastro?clique aqui</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastre-se</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="insere.php" autocomplete="off" method="POST">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" placeholder="digite seu nome" name="nome" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Senha:</label>
                            <input class="form-control" type="password" placeholder="digite sua senha" name="senha">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                            <button name="cadastrar-usuario" type="submit" class="btn btn-primary">Cadastrar-se</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>