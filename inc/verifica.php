<?php
		header('Content-Type: text/html; charset=utf-8');
		session_start();
		//Incluindo a conexÃ£o com o banco de dados.
		include "conexao.php";
		//Iniciando a sessão
		//Recebendo os dados do formulÃ¡rio.
		$usuario = $_POST['usuario'];
		$senha = md5($_POST['senha']);
		//Verificando se o usuário exite.

		$sql2 = mysql_query("SELECT * FROM users ");
		if(mysql_num_rows($sql2)<1){
			echo "<meta http-equiv='refresh' content='0; URL=../index.php'>
					<script type=\"text/javascript\">alert(\"Status deletado\");
					</script>";
		}else{

		$sql = mysql_query("SELECT * FROM users WHERE login = '$usuario' AND senha = '$senha'");
		
		if(mysql_num_rows($sql)==true){
			while($ln=mysql_fetch_array($sql)){
				$_SESSION['login'] = $ln['login'];

				header("Location: ../php/admin/php/index.php");
			}
		}else{
			echo "<meta http-equiv='refresh' content='0; URL=../php/admin/index.php'>
					<script type=\"text/javascript\">alert(\"Usuário ou senha inválidos\");
					</script>";
			}
		}
	?>