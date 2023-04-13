<?php
include_once("/Xampp/htdocs/barbearia/pages/functions/php/functions.php")
?>


<!DOCTYPE html>
<html lang="pt-br">
<title>Todos os Clientes</title>

<head>
    <?php
    head();
    ?>

</head>

<body>
    <?php
    menu();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <h1 class="display-6">Todos os Clientes</h1>
            </div>
            <div class="col-sm-4">
                <h2 class="display-6">Bem vindo, <?php echo $_SESSION['nome']; ?>.</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <?php
                if (isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
                    $mensagem =  filter_input(INPUT_GET, "mensagem", FILTER_SANITIZE_STRING);
                    if ($mensagem == "sucesso") {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="alert-heading">Sucesso!!!</h4>
                            <hr>
                            <p>Operacação realizada com sucesso!!!</p>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Ocorreu um erro em sua operação!!!
                        </div>
                <?php
                    }
                } else {
                    echo " ";
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <a href="./API/views/cadastro.php"><button type="button" class="btn btn-success">Cadastrar
                        Cliente</button></a>
                <hr>
            </div>
        </div>
        <?php
        require_once("./API/model/cadastro.php");
        $listar = new Cadastro();
        if ($retorno = $listar->listarTodosClientes())
            $dados = json_decode($retorno);

        if (isset($dados) && !empty($dados)) {
        ?>
            <div class="row">
                <div class="col-sm-12 border border-secondary">
                    <div class="row">
                        <div class="col-sm-10">
                            &nbsp;
                        </div>
                    </div>

                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col" class="ordenacao">#</th>
                                <th scope="col" class="nome">Nome</th>
                                <th scope="col" class="servico">Serviço</th>
                                <th scope="col">Agendamento</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="acoes">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($dados as $key => $value) {
                            ?>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <tr>
                                            <td class="ordenacao"><?= $i++; ?></td>
                                            <td class="nome"><?= substr_replace($value->nome, (strlen($value->nome) > 30 ? '...' : ''), 30); ?></td>
                                            <td class="servico"><?= substr_replace($value->servico, (strlen($value->servico) > 30 ? '...' : ''), 30); ?></td>
                                            <td><?= $value->horario; ?></td>
                                            <td><?= $value->status; ?></td>
                                            <td><a href="./API/views/cadastro.php?id=<?= $value->id; ?>&acao=buscar"><button type="button" class="btn btn-warning btn-sm acoes">Visualizar/Editar</button></a>
                                        <button type="button" class="btn btn-danger btn-sm acoes" data-toggle="modal" data-target="#excluir<?= $value->id; ?>">Excluir</button></td>
                                        </tr>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="excluir<?= $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="TituloModalCentralizado">Excluir Estoque</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja realmente excluir do cadastro
                                                <b><?= $value->name; ?>?</b>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="./API/controller/cadastro.php?id=<?= $value->id; ?>&acao=excluir"><button type="button" class="btn btn-danger btn-sm">Sim</button></a>
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Não</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php
        } else {
        ?>
            <div class="row">
                <div class="col-12">
                    <p>Não há registros armazenados na base de dados!!!</p>
                </div>
            </div>

        <?php
        }
        ?>

    </div>
    <?php
    rodape();
    ?>
</body>

</html>