<?php 

$conexao = new mysqli("localhost","root","");
if($conexao->connect_error)
{
    echo "Conexão Falhou: ".$conexao->connect_error;
}
$conexao->query("DROP DATABASE AulaSW");
$create_database = "CREATE DATABASE IF NOT EXISTS AulaSW";
$conexao->query($create_database);
$conexao->query("USE AulaSW");

$tabela_clientes = "CREATE TABLE CLIENTES(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(180) NOT NULL,
    TELEFONE VARCHAR(20)
)";

$tabela_atendente = "CREATE TABLE ATENDENTES(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(180) NOT NULL,
    TELEFONE VARCHAR(20) NOT NULL
)";

$tabela_servicos = "CREATE TABLE SERVICOS(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    SERVICO VARCHAR(180)
)";

$tabela_horarios = "CREATE TABLE HORARIOS(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    HORARIO_INICIO VARCHAR(5) NOT NULL,
    HORARIO_TERMINO VARCHAR(5) NOT NULL,
    DIA_SEMANA VARCHAR(10) NOT NULL
)";

$tabela_atendente_horario = "CREATE TABLE ATENDENTE_HORARIO(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_ATENDENTE INT NOT NULL,
    ID_HORARIO INT NOT NULL,
    CONSTRAINT FK_ATENDENTE FOREIGN KEY (ID_ATENDENTE) REFERENCES ATENDENTES(ID),
    CONSTRAINT FK_HORARIO FOREIGN KEY (ID_HORARIO) REFERENCES HORARIOS(ID)
)";

if ($conexao->query($tabela_clientes)===true)
{
    echo "Tabela Clientes Instalada<br>";
}else{ echo $conexao->error;};

if ($conexao->query($tabela_atendente)===true)
{   
    echo "Tabela atendente instalada com sucesso<br>";
}else{ echo $conexao->error;};

if ($conexao->query($tabela_servicos)===true)
{
    echo "tabela Serviços instalada <br>";
}else{ echo $conexao->error;};

if ($conexao->query($tabela_horarios)===true){
    echo "Tabela Horarios Instalada<br>";
}else{ echo $conexao->error;};

if ($conexao->query($tabela_atendente_horario)===true)
{
    echo "Tabela Atendente x Horario Instalada com sucesso<Br>"; 
}else{ echo $conexao->error;};

