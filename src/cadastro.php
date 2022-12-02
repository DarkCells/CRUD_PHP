<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "BD_CRUD";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO Pessoa (nome, cpf, data_nascimento, ocupacao)
		VALUES ('admin', 00000000011, 11112011, 'funcionario')";
	
		$conn->exec($sql);
		echo "Dados Inseridos com Sucesso!";
	}catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
		$conn = null;
?>