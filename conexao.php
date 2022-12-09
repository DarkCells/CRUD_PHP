<?php
$host = 'localhost';
$db   = 'BD_CRUD'; 
$user = 'root';
$pass = '';
$sgbd = 'mysql';      
$port = 3306;
$table = 'Produto';


try {
    $pdo = new PDO("$sgbd:host=$host;dbname=$db;port=$port", $user, $pass);

}catch(PDOException $e){
    echo '<br><br><b>Mensagem</b>: '. $e->getMessage().'<br>';// Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento
    echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
    echo '<b>Linha</b>: '.$e->getLine().'<br>';
}

// Incluir o funcoes.php
require_once('./funcoes.php');
