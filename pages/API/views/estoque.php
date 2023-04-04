<?php
include_once("/xampp/htdocs/Shakers/pages/functions/php/functions.php")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    headFormulario();
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
</head>

<body>
    <?php
    menu();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php
                if (!$_GET) {
                    echo "<h3>Cadastrar Estoque</h3>";
                    $dadosPadrao = json_encode(
                        array(
                            0 => array(
                                "name" => "",
                                "categoria" => "",
                                "quantidade" => "",
                                "indisponiveis" => "",
                                "texto" => "",
                                "preco" => "",
                                "precoMedio" => "",
                                "status" => "",
                                "fornecedor" => "",
                                "created_at" => "",
                                "update_at" => "",
                                "id" => "",
                            )
                        )
                    );
                    $dados = json_decode($dadosPadrao);
                } else {
                    if (isset($_GET["id"]) && !empty($_GET["id"])) {
                        echo "<h3>Agendamento de horário</h3>";
                        require_once("../model/estoque.php");
                        $id = filter_input(INPUT_GET, "id", FILTER_DEFAULT);
                        $buscarCliente = new Estoque();
                        $resposta = $buscarCliente->carregarCliente($id);
                        $dados = json_decode($resposta);
                    }
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Modal -->
                <div class="modal fade" id="teste" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TituloModalCentralizado">Excluir Estoque</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                erro
                            </div>
                            <div class="modal-footer">
                                <a href="./API/controller/estoque.php?id=<?= $value->id; ?>&acao=excluir"><button type="button" class="btn btn-danger btn-sm">Sim</button></a>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Não</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($dados as $key => $value)
            ?>
            <div class="col-sm-12">
                <form action="../controller/estoque.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" value="<?= $value->nome; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" value="<?= $value->telefone; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Tipo de Serviço</label>
                                <select class="form-control" name="servico" id="servico" onchange="document.getElementById('preco').value = this.value;">
                                    <option selected disabled> Selecione um Serviço</option>
                                    <option name="corte" id="corte" value="9900">Corte</option>
                                    <option name="barba" id="barba" value="barba">Barba</option>
                                    <option id="corte_barba" value="corte_barba">Corte + Barba</option>
                                    <option id="luzes" value="luzes">Luzes</option>
                                    <option id="hidratacao" value="hidratacao">Hidratação</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Preço</label>
                                <input id="preco" class="form-control money" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Barbeiro</label>
                                <select class="form-control" name="status" id="status">
                                    <option name="status" id="status" selected style="display:none"><?= $value->barbeiro; ?></option>
                                    <option name="status" id="status" value="<?= $value->barbeiro = 'OK'; ?>">Patrick</option>
                                    <option name="status" id="status" value="<?= $value->barbeiro = 'Em Falta'; ?>">João</option>
                                </select>
                                <!--<input type="text" class="form-control" name="status" id="status" value="">-->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" class="form-control" name="data" id="campoData" value="<?= $value->data; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Horário</label>
                                <input type="text" class="form-control timepicker" name="horario" id="horario" value="<?= $value->horario; ?>" min="10:00" max="20:00" step="1800">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label>Observações</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="texto" id="texto" style="height: 200px"><?= $value->texto; ?></textarea>
                                <label for="texto">Faça um comentário aqui:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Preço</label>
                                <input type="text" class="form-control money" name="preco" id="preco" value="<?= $value->preco; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Preço Médio</label>
                                <input type="text" class="form-control money" name="precoMedio" id="precoMedio" value="<?= $value->precoMedio; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Último Fornecedor</label>
                                <input type="text" class="form-control" name="fornecedor" id="fornecedor" value="<?= $value->fornecedor; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Criado Em</label>
                                <input type="text" class="form-control" name="created_at" id="created_at" value="<?= $value->created_at; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Alterado Em</label>
                                <input type="text" class="form-control" name="update_at" id="update_at" value="<?= $value->update_at; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php
                            if ($value->id) {
                            ?>
                                <input type="hidden" class="form-control" name="id" id="id" value="<?= $value->id; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                                <button type="reset" class="btn btn-warning">Limpar</button>
                            <?php
                            }
                            ?>
                            <a href="../../estoque.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    rodapeFormulario();
    ?>
    <script src="../../functions/js/functions.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css">
</body>

</html>