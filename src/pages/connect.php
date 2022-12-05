<?php

define('DRIVER', 'mysql');
define("HOST", 'localhost');
define("USER", "root");
define("PWD", "");
define("DB", "BD_CRUD");

	try{
		$pdo = new PDO(DRIVER.':host='.HOST.';dbname='.DB, USER, PWD);
		if($pdo){
			echo ("conexão realizada com sucesso!");
		}else{
			echo "Problemas na conexão!";
		}
	}catch(PDOException $e){
		echo utf8_decode("<b>Problemas na conexão:</b> ");
		echo $e->getMessage();
	}
?>