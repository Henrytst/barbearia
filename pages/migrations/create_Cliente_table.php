<?php

class CreateTable
{
    public function CreateTable()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=BARBEARIA", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $slqCreateTable = 'CREATE TABLE cadastro(
                id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                nome varchar(255) NOT NULL,
                telefone varchar(50) DEFAULT NULL,
                servico varchar(255) NOT NULL,
                barbeiro varchar(255) NOT NULL,
                horario varchar(255) NOT NULL,
                texto varchar(255) DEFAULT NULL,
                status varchar(255) DEFAULT NULL,
                created_at varchar(255) DEFAULT NULL,
                update_at varchar(255) DEFAULT NULL
            )';

            $stmt = $pdo->prepare($slqCreateTable);
            $stmt->execute();

           /* $pdo = new PDO("mysql:host=localhost;dbname=BARBEARIA", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $slqCreateTable = 'CREATE TABLE fornecedor(
                id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name varchar(255) NOT NULL,
                localizacao varchar(255) NOT NULL,
                preco decimal(10,2) NOT NULL,
                produto varchar(255) NOT NULL,
                created_at varchar(255) DEFAULT NULL,
                update_at varchar(255) DEFAULT NULL
            )';

            $stmt = $pdo->prepare($slqCreateTable);
            $stmt->execute();

            $pdo = new PDO("mysql:host=localhost;dbname=BARBEARIA", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $slqCreateTable = 'CREATE TABLE estoque(
                id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name varchar(255) NOT NULL,
                categoria varchar(255) NOT NULL,
                quantidade varchar(255) NOT NULL,
                indisponiveis varchar(255) NOT NULL,
                status varchar(255) NOT NULL,
                texto mediumtext NOT NULL,
                preco decimal(10,2) NOT NULL,
                precoMedio decimal(10,2) NOT NULL,
                fornecedor varchar(255) NOT NULL,
                created_at varchar(255) DEFAULT NULL,
                update_at varchar(255) DEFAULT NULL
            )';

            $stmt = $pdo->prepare($slqCreateTable);
            $stmt->execute();

            $pdo = new PDO("mysql:host=localhost;dbname=BARBEARIA", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $slqCreateTable = 'CREATE TABLE preparo(
                id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name varchar(255) NOT NULL,
                categoria varchar(255) NOT NULL,
                texto mediumtext NOT NULL,
                mo decimal(10,2) NOT NULL,
                preco decimal(10,2) NOT NULL,
                status varchar(255) NOT NULL,
                created_at varchar(255) DEFAULT NULL,
                update_at varchar(255) DEFAULT NULL
            )';

            $stmt = $pdo->prepare($slqCreateTable);
            $stmt->execute();

            $pdo = new PDO("mysql:host=localhost;dbname=BARBEARIA", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $slqCreateTable = 'CREATE TABLE cliente(
                id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                instagram varchar(255) NOT NULL,
                facebook varchar(255) NOT NULL,
                redes varchar(255) NOT NULL,
                tipo varchar(255) NOT NULL,
                texto mediumtext NOT NULL,
                created_at varchar(255) DEFAULT NULL,
                update_at varchar(255) DEFAULT NULL
            )';

            $stmt = $pdo->prepare($slqCreateTable);
            $stmt->execute();*/
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
