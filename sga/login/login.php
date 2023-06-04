<?php 
	include('conexao.php');

//validação de usuário e senha:

//Se existir usuario e senha:
	if(isset($_POST['usuario']) || isset($_POST['senha'])){

		//Verificação se não foi preenchido em branco:
		if(strlen($_POST['usuario']) == 0){
			echo "Preencha o campo de Usuário!";

		} elseif (strlen($_POST['senha']) == 0)  {
			echo "Preencha o campo de senha!";

//Evitar a vunerabilidade, sql injection...
		} else{
			$usuario = $mysqli->real_escape_string($_POST['usuario']);
			$senha = $mysqli->real_escape_string($_POST['senha']);

			$sql_code = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
			$sql_query = $mysqli->query($sql_code) or die ("Falha na execução do código SQL: ".$mysqli->error);
			$quantidade = $sql_query->num_rows;

			if ($quantidade == 1) {
				$usuario = $sql_query->fetch_assoc();

				if (!isset($_SESSION)) {
					session_start();
				}

				$_SESSION['id'] = $usuario['id'];

				header("Location: paineladm.php");

			} else{
				echo "Falha ao logar! Usuário ou senha incorretos!";
			}
		}
	}
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - SGA</title>
</head>
<body>
	<h2>Acesse o SGA - Sistema de Gerenciador de Atendimento:</h2>
	<form action="" method="POST">
		<label>Usuário:</label>
		<input type="text" name="usuario" placeholder="Insira o nome de usuário">
		<br> <br>
		<label>Senha:</label>
		<input type="password" name="senha" placeholder="Insira sua senha">
		<br><br>
		<button type="submit">Entrar</button>
	</form>
</body>
</html>