<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

	include('../../../inc/conexao.php');
	 $sql = mysql_query("SELECT * FROM users");
	 	if(mysql_num_rows($sql) > 0){
			  
			if(!isset($_SESSION['login'])){
				header("Location: ../index.php");
				exit;
			}
		}else{
			header("Location: ../index.php");
		}
 ?>

<!doctype html>
<html lang="pt-BR">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="">
	<meta name="Author" content="">
	<meta http-equiv="imagetoolbar" content="no">
<title>Área Restrita - Adminstrador</title>

	<link rel="stylesheet" href="../css/reset.css" type="text/css">
	<link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	
	<link rel="shortcut icon" href="../imagens/cadeado.ico" type="image/x-icon" />
	<link rel="icon" href="../imagens/cadeado.ico"  type="image/jpeg">
	<link rel="stylesheet" href="../css/jquery-ui.css" />

	<link href='https://fonts.googleapis.com/css?family=Sigmar+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
	
	
<script type="text/javascript">
function excluir() {
    if ( confirm("Tem certeza que deseja excluir esse usuário ?") ) {
        return true;
    }
    return false;
}
</script>

</head>

<body id="home">

	<header id="header" class="clearfix">
		<h1 class="logo fl">Doce magia</h1>
		<div class="user fr">
			<img src="../imagens/user.png" alt="" class="img-user fl">
			<span class="name-user"><?php $sql = mysql_query("SELECT * FROM users WHERE login = '".$_SESSION['login']."' ");
			$resultado = mysql_fetch_array($sql);
			$nome = $resultado['nome']; echo $nome; ?></span>
			<a href="sair.php" class="logout" title="Logout">Sair</a>
		</div>
	</header>

	<div class="breadcrumb">
		<ul class="list-link">
			<!-- <li class="list-item"><a href="" class="link">Link</a></li>
			<li class="list-item divisor">/</li> -->
			<li class="list-item link-ativo">Usuários</li>
		</ul>
	</div>

	<div id="container" class="clearfix">
		<section class="box-menu fl">
			<?php include "menu.php"; ?>
		</section>
	
		<section class="content fr">
			<h1 class="titulo">Usuários</h1>
			<div class="form">
				<div class="box-form">
					<fieldset>
						<h3 class="titulo-form">Cadastro de Usuário</h3>
						<div class="campo">
							<label for="nome">Nome</label>
							<input type="text" name="nome" class="nome">
						</div>

						<div class="campo">
							<label for="login">Login</label>
							<input type="text" name="login" class="login">
						</div>

						<div class="campo">
							<label for="senha">Senha</label>
							<input type="password" name="senha" class="senha">
						</div>

						<button type="submit" class="salvar">Salvar</button>
					</fieldset>
				</div>
			</div>
		</section>
	</div>


<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script type="text/javascript">
	$("#menu .list-item").eq(0).addClass("ativo");
</script>
</body>
</html>