<?php

include 'conecao.php';


$call_cadastro = 'SELECT * FROM Pessoa';
$query_cadastro = mysqli_query($conn, $call_cadastro);

?>

<!doctype html>
<html lang="en">
  <head>
	<title>TELA DE CADASTRO</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>id</th>
					<th>Nome</th>
					<th>cpf</th>
					<th>data de nascimento</th>
					<th>ocupação</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					while($get_cadastro = mysql_fetch_array($query_cadastro)){
						$id = $get_cadastro['id'];
						$nome = $get_cadastro['nome'];
						$cpf = $get_cadastro['cpf'];
						$dataNascimento = $get_cadastro['data_nascimento'];
						$ocupacao = $get_cadastro['ocupacao'];				

					?>
					<td scope="row"> <?php echo $id;?></td>
					<td><?php echo $nome;?></td>
					<td><?php echo $cpf;?></td>
					<td><?php echo $dataNascimento;?></td>
					<td><?php echo $ocupacao;?></td>
				</tr>

				<?php }?>

			</tbody>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>