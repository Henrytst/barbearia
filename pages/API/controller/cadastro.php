<?php

session_start();

if (!isset($_SESSION["nome"])) {
    header("location: ../../../index.php");
    exit;
}

require_once('../model/cadastro.php');

if ($_POST) {
    if (
        isset($_POST["nome"]) && isset($_POST["servico"])
        && !empty($_POST["nome"]) && !empty($_POST["servico"])
    ) {

        date_default_timezone_set('America/Sao_Paulo');
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING);
        $servico = filter_input(INPUT_POST, "servico", FILTER_SANITIZE_STRING);
        $barbeiro = filter_input(INPUT_POST, "barbeiro", FILTER_DEFAULT);
        $horario = filter_input(INPUT_POST, "horario", FILTER_DEFAULT);
        $texto = filter_input(INPUT_POST, "texto", FILTER_DEFAULT);
        $status = filter_input(INPUT_POST, "status", FILTER_DEFAULT);
        $created_at = date('d/m/Y   |   H:i:s');
        $update_at = date('d/m/Y  |  H:i:s');

        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

            $editarCliente = new Cadastro();
            $resposta = $editarCliente->editarCliente(
                $id,
                $nome,
                $telefone,
                $servico,
                $barbeiro,
                $horario,
                $texto,
                $status,
                $update_at
            );
            if ($resposta = 1) header('location: ../../cadastro.php?mensagem=sucesso');
            else header('location: ../views/cadastro.php?mensagem=erro');
        } else {
            $adicionarCliente = new Cadastro();
            $resposta = $adicionarCliente->adicionarCliente(
                $nome,
                $telefone,
                $servico,
                $barbeiro,
                $horario,
                $texto,
                $status,
                $created_at
            );
            if ($resposta = 1) header('location: ../../cadastro.php?mensagem=sucesso');
            else header('location: ../views/cadastro.php?mensagem=erro');
        }
    } else {
        echo "Campos obrigatórios não preenchidos!!!";
    }
} elseif ($_GET) {
    if (isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["acao"]) && !empty($_GET["acao"])) {
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $acao = filter_input(INPUT_GET, "acao", FILTER_SANITIZE_STRING);

        if ($acao == "excluir") {
            $buscarCliente = new Cadastro();
            $resposta = $buscarCliente->excluirCliente($id);
            if ($resposta > 0)
                header('location: ../../cadastro.php?mensagem=sucesso');
            else {
                header('location: ../../cadastro.php?mensagem=erro');
            }
        }
    }
}
