<?php

if (isset($_POST['submit'])) {
    // print_r('Endereço: ' . $_POST['endereco']);
    // print_r('<br>');
    // print_r('N°: ' . $_POST['numero']);
    // print_r('<br>');
    // print_r('Complemento: ' . $_POST['complemento']);
    // print_r('<br>');
    // print_r('Bairro: ' . $_POST['bairro']);
    // print_r('<br>');
    // print_r('Cidade: ' . $_POST['cidade']);
    // print_r('<br>');
    // print_r('Estado: ' . $_POST['estado']);

    include_once('config.php');

    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    $result = mysqli_query($conexao, "INSERT INTO endereco(logradouro,numero,complemento,bairro,cidade,estado, cep) 
        VALUES ('$endereco','$numero','$complemento','$bairro','$cidade','$estado', '$cep')");
    
    header("Location: sistema.php");
}

include_once('style.php');

?>
<div class="content-wrapper">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="col-lg-12" style="text-align: center;">
                <h2 style="margin-bottom: 20px;"><i>Endereço</i></h2>
            </div>
            <form action="formulario.php" method="POST">
                <div class="row">
                    <div class="box-body">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Endereço *</label>
                                                <input name="endereco" id="endereco" type="text" class="form-control" placeholder="Endereço">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>N°</label>
                                                <input name="numero" id="numero" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Complemento</label>
                                                <input name="complemento" id="complemento" class="form-control" placeholder="Complemento">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Bairro *</label>
                                                <input class="form-control" type="text" id="bairro" name="bairro" placeholder="Bairro">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input class="form-control" type="text" id="cidade" name="cidade" placeholder="Cidade">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Estado</label>
                                            <input class="form-control" type="text" id="estado" name="estado" placeholder="UF">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>CEP *</label>
                                                <input require class="form-control" id="cep" type="text" name="cep" data-mask="00.000-000" maxlength="10" placeholder="CEP">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-success buscar" type="button" name="busca_cep" onclick="buscarCep()">
                                                <i class="fa fa-search"></i><span> Buscar CEP</span>
                                            </button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary pull-right" id="button-salvar" name="submit" style="padding: 6px 30px; margin-top: 25px;">Inserir</button>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
</section>
</div>
<script>
    // Função para preencher os campos de endereço com os dados retornados da API
    function preencherEndereco(dados) {
        console.log(dados);
        document.getElementById('endereco').value = dados.logradouro;
        document.getElementById('complemento').value = dados.complemento;
        document.getElementById('bairro').value = dados.bairro;
        document.getElementById('cidade').value = dados.localidade;
        document.getElementById('estado').value = dados.uf;
        document.getElementById('cep').value = dados.cep;
    }

    // Função para fazer a busca do CEP e preencher os campos
    function buscarCep() {
        const cep = document.getElementById('cep').value.replace(/\D/g, ''); // Removendo não números
        if (cep.length !== 8) {
            return;
        }

        // Fazer a chamada à API de consulta de CEP
        fetch('https://viacep.com.br/ws/' + cep + '/json/')
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    preencherEndereco(data);
                    document.getElementById('endereco').style.display = 'block';
                    document.getElementById('complemento').style.display = 'block';
                    document.getElementById('bairro').style.display = 'block';
                    document.getElementById('cidade').style.display = 'block';
                    document.getElementById('estado').style.display = 'block';
                    document.getElementById('cep').style.display = 'block';

                } else {
                    // Lidar com o erro, por exemplo, limpar os campos
                    document.getElementById('endereco').style.display = 'none';
                    document.getElementById('complemento').style.display = 'none';
                    document.getElementById('bairro').style.display = 'none';
                    document.getElementById('cidade').style.display = 'none';
                    document.getElementById('estado').style.display = 'none';
                    document.getElementById('cep').style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Erro ao buscar o CEP:', error);
                document.getElementById('endereco').style.display = 'none';
                document.getElementById('complemento').style.display = 'none';
                document.getElementById('bairro').style.display = 'none';
                document.getElementById('cidade').style.display = 'none';
                document.getElementById('estado').style.display = 'none';
                document.getElementById('cep').style.display = 'none';
            });
    }
</script>