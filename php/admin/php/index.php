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
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
			<span class="icon-menu-user"></span>
			<ul class="menu-user off">
				<li class="titulo-divisor"><span class="name-user"><?php $sql = mysql_query("SELECT * FROM users WHERE login = '".$_SESSION['login']."' ");
			$resultado = mysql_fetch_array($sql);
			$nome = $resultado['nome']; echo $nome; ?></span></li>
				<li><a href="edit.php">Editar Perfil</a></li>
				<li><a href="sair.php">Sair</a></li>
			</ul>
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
			<form action="" method="POST" id="form">
				<div class="form">
					<div class="box-form">
						<fieldset>
							<h3 class="titulo-form">Cadastro de Usuário</h3>
							<div class="campo">
								<label for="nome">Nome</label>
								<input type="text" name="nome" class="nome" placeholder="Digite o nome">
							</div>

							<div class="campo">
								<label for="login">Login</label>
								<input type="text" name="login" class="login" placeholder="Digite um login">
							</div>

							<div class="campo">
								<label for="senha">Senha</label>
								<input type="password" name="senha" class="senha" placeholder="Digite a senha">
							</div>
							
							<div class="campo">
								<label for="img">Foto do perfil</label>
								<div class="file-img">
								    <span class="texto editing-field" editing-default-text="Nenhum arquivo anexado">Nenhum arquivo anexado</span>
								    <input type="file" class="ipt-file editing-field" editing-default-value="" name="file" value=""> <span class="btn-file"></span>
								</div>
							</div>

							<!-- <div class="campo">
								<label for="img">Selecione o álbum</label>
								<div class="box-select fl">
								    <select name="tipo" class="tipo-trilho">
								        <option value="0">Selecione um tipo</option>
								        <option value="integras">Íntegras</option>
								        <option value="live">Videos e Ao Vivo</option>
								    </select>
								</div>
							</div> -->

							<button type="submit" class="salvar fr">Salvar</button>
						</fieldset>
					</div>
				</div>
			</form>
		</section>
	</div>


<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script type="text/javascript">
	$("#menu .list-item").eq(0).addClass("ativo");
</script>
</body>
</html>