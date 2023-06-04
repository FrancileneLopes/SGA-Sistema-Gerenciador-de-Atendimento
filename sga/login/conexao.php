<?php
	$usuario = 'root';
	$senha = '';
	$database = 'sga';
	$host = 'localhost';

	$mysqli = new mysqli($host, $usuario, $senha, $database);

	if ($mysqli->error) {
		die("Falha ao tentar se conectar com o Banco de Dados: " . $mysqli->error);

	}