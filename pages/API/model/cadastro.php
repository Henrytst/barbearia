<?php

class Cadastro
{
    private $id, $nome, $telefone, $servico, $barbeiro, $horario,
        $texto, $status, $created_at, $update_at;
    public $conectar;

    public function __construct()
    {
        try {
            $this->conectar = new PDO("mysql:host=localhost;dbname=BARBEARIA", "root", "");
            $this->conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //echo 'Error: ' . $e->getMessage();
            header('location: /pages/migrations/index.php');
        }
    }
    public function adicionarCliente(
        $nome, $telefone, $servico, $barbeiro, $horario,
        $texto, $status,
        $created_at
    ) {
        $this->dadosCadastrar(
            $nome, $telefone, $servico, $barbeiro, $horario,
        $texto, $status,
            $created_at
        );
        try {
            $stmt = $this->conectar->prepare(
                'INSERT INTO cadastro (nome, telefone, servico, barbeiro, horario, texto, status, created_at) 
                VALUES (:NOME, :TELEFONE, :SERVICO, :BARBEIRO, :HORARIO, :TEXTO, :STATUS, :CRIADO_POR)'
            );
            $stmt->execute(
                array(
                    ":NOME" => $this->getnome(),
                    ":TELEFONE" => $this->gettelefone(),
                    ":SERVICO" => $this->getservico(),
                    ":BARBEIRO" => $this->getbarbeiro(),
                    ":HORARIO" => $this->gethorario(),
                    ":TEXTO" => $this->gettexto(),
                    ":STATUS" => $this->getstatus(),
                    ":CRIADO_POR" => $this->getcreated_at()
                )
            );
            $stmt->rowCount();
            return 1;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function dadosCadastrar(
        $nome, $telefone, $servico, $barbeiro, $horario,
        $texto, $status,
        $created_at
    ) {
        $this->setnome($nome);
        $this->settelefone($telefone);
        $this->setservico($servico);
        $this->setbarbeiro($barbeiro);
        $this->sethorario($horario);
        $this->settexto($texto);
        $this->setstatus($status);
        $this->setcreated_at($created_at);
    }

    public function dadosEditar(
        $nome, $telefone, $servico, $barbeiro, $horario,
        $texto, $status,
        $update_at
    ) {
        $this->setnome($nome);
        $this->settelefone($telefone);
        $this->setservico($servico);
        $this->setbarbeiro($barbeiro);
        $this->sethorario($horario);
        $this->settexto($texto);
        $this->setstatus($status);
        $this->setupdate_at($update_at);
    }

    public function editarCliente(
        $id,
        $nome, $telefone, $servico, $barbeiro, $horario,
        $texto, $status,
        $update_at
    ) {
        $this->setid($id);
        $this->dadosEditar(
            $nome, $telefone, $servico, $barbeiro, $horario,
        $texto, $status,
            $update_at
        );
        try {
            $stmt = $this->conectar->prepare(
                'UPDATE cadastro SET nome=:NOME, telefone=:TELEFONE, servico=:SERVICO, barbeiro=:BARBEIRO, 
                horario=:HORARIO, texto=:TEXTO, status=:STATUS, update_at=:ALTERADO_POR WHERE id=:ID'
            );
            $stmt->execute(array(
                ":ID" => $this->id,
                ":NOME" => $this->getnome(),
                ":TELEFONE" => $this->gettelefone(),
                ":SERVICO" => $this->getservico(),
                ":BARBEIRO" => $this->getbarbeiro(),
                ":HORARIO" => $this->gethorario(),
                ":TEXTO" => $this->gettexto(),
                ":STATUS" => $this->getstatus(),
                ":ALTERADO_POR" => $this->getupdate_at()
            ));
            return 1;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function excluirCliente($id)
    {
        $this->setid($id);
        try {
            $stmt = $this->conectar->prepare('DELETE FROM cadastro where id = :ID');
            $stmt->execute(array(":ID" => $this->id));
            $retorno = $stmt->rowCount();
            return $retorno;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listarTodosClientes()
    {
        $stmt = $this->conectar->prepare('SELECT * FROM cadastro ORDER BY nome ASC');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }
    public function carregarCliente($id)
    {
        $this->setid($id);
        $stmt = $this->conectar->prepare('SELECT * FROM cadastro where id = :ID ORDER BY nome ASC');
        $stmt->execute(array(":ID" => $this->id));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }

    private function setId($id)
    {
        $this->id = $id;
    }
    private function setnome($nome)
    {
        $this->nome = $nome;
    }
    private function settelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    private function setservico($servico)
    {
        $this->servico = $servico;
    }
    private function setbarbeiro($barbeiro)
    {
        $this->barbeiro = $barbeiro;
    }
    private function sethorario($horario)
    {
        $this->horario = $horario;
    }
    private function settexto($texto)
    {
        $this->texto = $texto;
    }
    private function setstatus($status)
    {
        $this->status = $status;
    }
    private function setcreated_at($created_at)
    {
        $this->created_at = $created_at;
    }
    private function setupdate_at($update_at)
    {
        $this->update_at = $update_at;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getnome()
    {
        return $this->nome;
    }
    public function gettelefone()
    {
        return $this->telefone;
    }
    public function getservico()
    {
        return $this->servico;
    }
    public function getbarbeiro()
    {
        return $this->barbeiro;
    }
    public function gethorario()
    {
        return $this->horario;
    }
    public function gettexto()
    {
        return $this->texto;
    }
    public function getstatus()
    {
        return $this->status;
    }
    public function getcreated_at()
    {
        return $this->created_at;
    }
    public function getupdate_at()
    {
        return $this->update_at;
    }
}
