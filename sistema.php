<?php
    include_once('config.php');
    include_once('style.php');

    $query = "SELECT * FROM endereco";
    $result = mysqli_query($conexao, $query);

    if (!$result) {
        die("Erro ao consultar o banco de dados: " . mysqli_error($conexao));
    }

    // Coletar todos os dados em um array
    $dados = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $dados[] = $row;
    }

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM endereco WHERE id LIKE '%$data%' or logradouro LIKE '%$data%' or bairro LIKE '%$data%' or cidade LIKE '%$data%' or estado LIKE '%$data%' or cep LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM endereco ORDER BY id DESC";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA DE CADASTRO DE ENDEREÇO</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DE CADASTRO DE ENDEREÇO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="home.php" class="btn me-5" style="background-color: black; color: white;">Sair</a>
        </div>
    </nav>
    <br>
    <div class="box-search">
        <div class="d-flex" style="margin-left: 25px;">
            <a href="formulario.php" class="btn btn-success me-5" style="background-color: #009595">Cadastrar endereço</a>
        </div>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">UF</th>
                    <th scope="col">CEP</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados as $dado): ?>
                    <tr>
                        <td><?= $dado['id'] ?></td>
                        <td><?= $dado['logradouro'] . ", " . $dado['numero'] . ", " . $dado['complemento'] . ", " . $dado['bairro']?></td>
                        <td><?= $dado['cidade'] ?></td>
                        <td><?= $dado['estado'] ?></td>
                        <td><?= $dado['cep'] ?></td>
                        <td>
                        <a class='btn btn-sm btn-primary' href="<?= 'edit.php?id=' . $dado['id'] ?>" title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                        </a> 
                        <a class='btn btn-sm btn-danger'  href="<?= 'delete.php?id=' . $dado['id'] ?>" title='Deletar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
</html>