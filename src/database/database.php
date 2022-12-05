<?php
global $con;
function conectar(){
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = 'BD_CRUD';
    
    
    global $con;
    $con = new mysqli($servidor, $usuario, $senha, $banco);
    
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    echo "Conectado";
}

function fecharConexao(){
    global $con;
    $con->close();
}

function lerDados($tabela, $campos){
    global $con;
    $sql = "SELECT $campos FROM $tabela";
    $resultado = $con->query($sql);
    return $resultado;
}

function lerDadosWhere($tabela, $campos, $where){
    global $con;
    $sql = "SELECT $campos FROM $tabela WHERE $where";
    $resultado = $con->query($sql);
    return $resultado;
}

function inserePessoa($tabela, $nome, $cpf, $data_nascimento, ){
    global $con;
    $sql = "INSERT INTO $tabela (Nome, cpf, data_nascimento) VALUES (\"$nome\", $cpf,$data_nascimento)";

    if ($con->query($sql) === TRUE) {
        echo "<br>Pessoa Criada com sucesso!";
    } else {
        echo "<br>Error: " . $sql . "<br>" . $con->error;
    }
}

function atualizaPessoa($tabela, $nome, $cpf, $data_nascimento, $id){
    global $con;
    $sql = "UPDATE $tabela SET Nome=\"$nome\", CPF=$cpf, $data_nascimento WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "<br>Pessoa Atualizada com sucesso!";
    } else {
        echo "<br>Error: " . $sql . "<br>" . $con->error;
    }
}

function deletarPessoa($tabela, $id){
    global $con;
    $sql = "DELETE FROM $tabela WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "<br><b>Pessoa deltada com sucesso!</b>";
    } else {
        echo "<br>Error: " . $sql . "<br>" . $con->error;
    }
}
?>