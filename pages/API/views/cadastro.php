<?php
include_once("/Xampp/htdocs/barbearia/pages/functions/php/functions.php")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    headFormulario();
    ?>
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
                    echo "<h3>Cadastro</h3>";
                    $dadosPadrao = json_encode(
                        array(
                            0 => array(
                                "nome" => "",
                                "telefone" => "",
                                "servico" => "",
                                "barbeiro" => "",
                                "horario" => "",
                                "texto" => "",
                                "status" => "",
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
                        require_once("../model/cadastro.php");
                        $id = filter_input(INPUT_GET, "id", FILTER_DEFAULT);
                        $buscarCliente = new Cadastro();
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
                                <h5 class="modal-title" id="TituloModalCentralizado">Excluir Cadastro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                erro
                            </div>
                            <div class="modal-footer">
                                <a href="./API/controller/cadastro.php?id=<?= $value->id; ?>&acao=excluir"><button type="button" class="btn btn-danger btn-sm">Sim</button></a>
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
                <form action="../controller/cadastro.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" value="<?= $value->nome; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telefone para Contato</label>
                                <input type="text" class="form-control phone_with_ddd" name="telefone" id="telefone" value="<?= $value->telefone; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo de Serviço</label>
                                <select class="form-control" name="servico" id="servico" onchange="document.getElementById('preco').value = this.value;"required>
                                    <option selected style="display:none"><?= $value->servico; ?></option>
                                    <option name="corte" id="corte" value="<?= $value->servico = 'R$: 30,00  |  Corte'; ?>">Corte</option>
                                    <option name="barba" id="barba" value="<?= $value->servico = 'R$: 40,00  | Barba'; ?>">Barba</option>
                                    <option id="corte_barba" value="<?= $value->servico = 'R$: 50,00  |  Corte + Barba'; ?>">Corte + Barba</option>
                                    <option id="luzes" value="<?= $value->servico = 'R$: 60,00  |  Luzes'; ?>">Luzes</option>
                                    <option id="hidratacao" value="<?= $value->servico = 'R$: 80,00  |  Hidratação'; ?>">Hidratação</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Preço</label>
                                <input id="preco" class="form-control money" type="text" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Barbeiro</label>
                                <select class="form-control" name="barbeiro" id="barbeiro"required>
                                    <option name="barbeiro" id="barbeiro" selected style="display:none"><?= $value->barbeiro; ?></option>
                                    <option name="barbeiro" id="barbeiro" value="<?= $value->barbeiro = 'Patrick'; ?>">Patrick</option>
                                    <option name="barbeiro" id="barbeiro" value="<?= $value->barbeiro = 'João'; ?>">João</option>
                                </select>
                                <!--<input type="text" class="form-control" name="status" id="status" value="">-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Horário</label>
                                <input type="text" class="form-control horario" name="horario" id="horario" value="<?= $value->horario; ?>">
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
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option name="status" id="status" selected style="display:none"><?= $value->status; ?></option>
                                    <option name="status" id="status" value="<?= $value->status = 'agendado'; ?>">Agendado</option>
                                    <option name="status" id="status" value="<?= $value->status = 'cancelado'; ?>">Cancelado</option>
                                    <option name="status" id="status" value="<?= $value->status = 'realizado'; ?>">Realizado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data de Criação</label>
                                <input type="text" class="form-control" name="created_at" id="created_at" value="<?= $value->created_at; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data da Última Modificação</label>
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
                            <a href="../../cadastro.php" class="btn btn-danger">Cancelar</a>
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
</body>

</html>