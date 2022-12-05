<h3>CRUD Pessoas</h3>
<?php include('menu.php'); ?>
Situação do Banco de dados: 
<?php 
include('database.php');
conectar();
if (isset($_GET['op'])){
    if ($_GET['op'] == 'atu'){
        $resultado = lerDadosWhere('Cliente', '*', 'id = '. $_GET['id']);
        $resultado = $resultado->fetch_assoc();
        $id = $resultado["id"];
        $nome = $resultado["nome"];
        $cpf = $resultado["cpf"];
        $data_nascimento = $resultado["data_nascimento"];
    }

    if ($_GET['op'] == 'del'){
        deletarPessoa('Cliente', $_GET['id']);
    }
}

?>
<div>
    <h6>Dados de pessoa</h6>
    <form action="crud_Cliente.php" method="POST">
        <label for="id">ID: </label>
        <input type="number" name="id" disabled='disabled' 
                value="<?php if(isset($id)){echo $id;} ?>"><br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" minlength="3" required
                value="<?php if(isset($nome)){echo $nome;} ?>"><br>
        <label for="CPF">CPF:</label>
        <input type="text" name="CPF" required
                value="<?php if(isset($cpf)){echo $cpf;} ?>"><br>
		<label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required
                value="<?php if(isset($data_nascimento)){echo $data_nascimento;} ?>"><br>		
        <input type="submit" value="Cadastrar/Atualizar">
    </form>
</div>
<h6>Dados do banco de pessoas</h6>
<?php

// Inserir Pessoa desde que o ID nao exista!
if (isset($_POST['nome']) && !isset($_GET['id'])){
    if(strlen($_POST['nome']) >= 3 && $_POST['CPF'] > 0){
        insereCliente('Pessoa', $_POST['nome'], $_POST['CPF']);
    }
}

if (isset($_POST['nome']) && isset($_GET['id'])){
    if(strlen($_POST['nome']) >= 3 && $_POST['CPF'] > 0){
        atualizaCliente('Cliente', $_POST['nome'], $_POST['CPF'], $id);
    }
}
?>
<table>
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Atualizar</th>
        <th>Deletar</th>
    </thead>
    <tbody>
        <?php
        $resultado = lerDados('Cliente', '*');
        if (@$resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo "<td>" . $row["nome"]. "</td>";
                echo "<td>" . $row["cpf"]. "</td>";
                echo "<td>" . $row["data_nascimento"]. "</td>";
                echo "<td>" . "<a href='crud_Cliente.php?op=atu&id=". $row["id"] ."'>" .
                        "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>" 
                        . "</a></td>";
                echo "<td>" . "<a href='crud_pessoas.php?op=del&id=". $row["id"] ."'>" .
                        "<i class=\"fa fa-trash\" aria-hidden=\"true\"></i>" 
                        . "</a></td>";
                echo "</tr>";
            }
        } else {
            echo "Vazio";
        }
        ?>
    </tbody>
</table>
<?php
fecharConexao();
?>