<?php
include_once('style.php');
include_once('config.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM endereco WHERE id=$id";
    $result = $conexao->query($sqlSelect);
    if ($result->num_rows > 0) {
        while ($dado = mysqli_fetch_assoc($result)) {
            $id = $dado['id'];
            $logradouro = $dado['logradouro'];
            $numero = $dado['numero'];
            $complemento = $dado['complemento'];
            $bairro = $dado['bairro'];
            $cidade = $dado['cidade'];
            $estado = $dado['estado'];
            $cep = $dado['cep'];
        }
    } else {
        header('Location: sistema.php');
    }
} else {
    header('Location: sistema.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>

</head>

<body>
    <a class="btn btn-danger" style="margin: 25px;" href="sistema.php"><i class="fa fa-arrow-left"></i> Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar Cliente</b></legend>
                <br>
                <div class="col-xs-10">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Endereço *</label>
                                <input name="endereco" id="endereco" type="text" class="form-control" value="<?= $logradouro;?>">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>N°</label>
                                <input name="numero" id="numero" type="text" class="form-control" value="<?= $numero;?>">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Complemento</label>
                                <input name="complemento" id="complemento" class="form-control" placeholder="Complemento" value="<?= $complemento;?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Bairro *</label>
                                <input class="form-control" type="text" id="bairro" name="bairro" placeholder="Bairro" value="<?= $bairro;?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input class="form-control" type="text" id="cidade" name="cidade" placeholder="Cidade" value="<?= $cidade;?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Estado</label>
                            <input class="form-control" type="text" id="estado" name="estado" placeholder="UF" value="<?= $estado;?>">
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>CEP *</label>
                                <input require class="form-control" id="cep" type="text" name="cep" data-mask="00.000-000" maxlength="10" value="<?= $cep;?>">
                            </div>
                        </div>
                        <br><br>
                        <input type="hidden" name="id" value=<?php echo $id; ?>>
                        <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>