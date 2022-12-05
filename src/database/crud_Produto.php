<h3>CRUD Pessoas</h3>
<?php include('menu.php'); ?>
Situação do Banco de dados: 
<?php 
include('database.php');
conectar();
if (isset($_GET['op'])){
    if ($_GET['op'] == 'atu'){
        $resultado = lerDadosWhere('Produto', '*', 'id = '. $_GET['id']);
        $resultado = $resultado->fetch_assoc();
        $id = $resultado["id"];
        $descricao = $resultado["descricao"];
        $fornecedor = $resultado["fornecedor"];
        $quantidade = $resultado["quantidade"];
    }

    if ($_GET['op'] == 'del'){
        deletarProduto('Produto', $_GET['id']);
    }
}

?>
<div>
    <h6>Dados de Produtos</h6>
    <form action="crud_Produto.php" method="POST">
        <label for="id">ID: </label>
        <input type="number" name="id" disabled='disabled' 
                value="<?php if(isset($id)){echo $id;} ?>"><br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" minlength="3" required
                value="<?php if(isset($descricao)){echo $descricao;} ?>"><br>
        <label for="fornecedor">Fornecedor:</label>
        <input type="text" name="fornecedor" required
                value="<?php if(isset($fornecedor)){echo $fornecedor;} ?>"><br>
		<label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required
                value="<?php if(isset($quantidade)){echo $quantidade;} ?>"><br>		
        <input type="submit" value="Cadastrar/Atualizar">
    </form>
</div>

<h6>Dados do banco de Produto</h6>
<?php


if (isset($_POST['descricao']) && !isset($_GET['id'])){
    if(strlen($_POST['descricao']) >= 3 && $_POST['fornecedor'] > 0){
        insereProduto('Produto', $_POST['descricao'], $_POST['fornecedor']);
    }
}

if (isset($_POST['descricao']) && isset($_GET['id'])){
    if(strlen($_POST['descricao']) >= 3 && $_POST['fornecedor'] > 0){
        atualizaProduto('Produto', $_POST['descricao'], $_POST['forncedor'], $id);
    }
}
?>
<table>
    <thead>
        <th>ID</th>
        <th>Descrição</th>
        <th>Fornecedor</th>
        <th>Atualizar</th>
        <th>Deletar</th>
    </thead>
    <tbody>
        <?php
        $resultado = lerDados('Produto', '*');
        if (@$resultado->num_rows > 0) {
            // output data of each row
            while($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo "<td>" . $row["descricao"]. "</td>";
                echo "<td>" . $row["fornecedor"]. "</td>";
                echo "<td>" . $row["quantidade"]. "</td>";
                echo "<td>" . "<a href='crud_Produto.php?op=atu&id=". $row["id"] ."'>" .
                        "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>" 
                        . "</a></td>";
                echo "<td>" . "<a href='curd_Produto.php?op=del&id=". $row["id"] ."'>" .
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