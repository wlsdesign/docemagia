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
			session_destroy();
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
<div class="popup">
	<div class="box-conteudo">
		<a href="javascript:;" class="close fr"><img src="../imagens/close.png" alt="Fechar"></a>

		<form action="" method="POST" id="form" enctype="multipart/form-data">
			<input type="hidden" name="nome" id="nome" value="">
			
			<div class="form">
				<?php
					if (isset($_GET['idUser'])){?>
					<script src="../js/jquery-2.1.4.min.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
						
							$('.popup').fadeIn('fast');
						
						});
					</script>
					<?php
	                    $idUser = $_GET['idUser'];
	                    include('../../../inc/conexao.php');
						$sql = mysql_query("SELECT * FROM users WHERE id = '$idUser'");
						while($ln=mysql_fetch_array($sql)){
	                
                ?>
				<div class="box-form">
					<fieldset>
						<h3 class="titulo-form">Alteração de Usuário</h3>
						<div class="campo">
							<label for="nome">Nome</label>
							<input type="text" name="nome" class="nome" value="<?php echo $ln["nome"] ?>">
						</div>

						<div class="campo">
							<label for="login">Login</label>
							<input type="text" name="login" class="login" value="<?php echo $ln["login"] ?>">
						</div>
						
						<div class="campo">
							<label for="img">Foto do perfil</label>
							<div class="file-img fl">
							    <span class="texto editing-field" editing-default-text="Nenhum arquivo anexado">Nenhum arquivo anexado</span>
							    <input type="file" class="ipt-file editing-field" editing-default-value="" name="file" value=""> <span class="btn-file"></span>
							</div>
							<div class="foto fl"><img src="../imagens/usuario/<?php echo $ln["foto"] ?>" alt=""></div>
						</div>

						<button type="submit" class="salvar fr">Salvar</button>
					</fieldset>
				</div>
				<?php } } ?>
			</div>
		</form>
	</div>
</div>
	<?php include "header.php"; ?>

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
			<form action="cadastra_usuario.php" method="POST" id="addusuario" enctype="multipart/form-data">
				<div class="form">
					<div class="box-form">
						<fieldset>
							<div class="alertas"></div>
							<h3 class="titulo-form">Cadastro de Usuário</h3>
							<div class="campo">
								<label for="nome">Nome*</label>
								<input type="text" name="nome" class="nome" placeholder="Digite o nome" required>
							</div>

							<div class="campo">
								<label for="login">Login*</label>
								<input type="text" name="login" class="login" placeholder="Digite um login" required>
							</div>

							<div class="campo">
								<label for="senha">Senha*</label>
								<input type="password" name="senha" class="senha" placeholder="Digite a senha" required>
							</div>
							
							<div class="campo">
								<label for="img">Foto do perfil</label>
								<div class="file-img">
								    <span class="texto editing-field" editing-default-text="Nenhum arquivo anexado">Nenhum arquivo anexado</span>
								    <input type="file" class="ipt-file editing-field" editing-default-value="" name="foto" value=""> <span class="btn-file"></span>
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

							<button type="submit" class="salvar btn-salva fr">Salvar</button>
						</fieldset>
					</div>
				</div>
			</form>
			
			<h1 class="titulo">Lista dos usuários cadastrados</h1>
		<!-- Lista Usuários -->
			<div id="lista-dados" class="lista-dados">
				<table id="tbl-dados" class="tbl-dados">
					<thead>
						<tr class="tr-head">
							<th class="col-2">Nome</th>
							<th class="col-2">Login</th>
							<th class="col-action">Ações</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						include('../../../inc/conexao.php');
						$sql = mysql_query("SELECT * FROM users");
						while($ln=mysql_fetch_array($sql)){
					?>
						<tr class="tr-body" data-id="<?php echo $ln["id"] ?>">
							<td class="col-3"><?php echo $ln["nome"] ?></td>
							<td class="col-3"><?php echo $ln["login"] ?></td>
							<td class="col-3"><a href="index.php?idUser=<?php echo $ln["id"] ?>" class="editar"><img src="../imagens/editar.png" alt=""></a> <a href="excluir.php?excluir=<?php echo $ln["id"] ?>" class="excluir" onClick='excluir()'><img src="../imagens/trash.png" alt=""></a></td>
						</tr>
					<?php
						}
					 ?>
					</tbody>
				</table>
			</div>
		<!-- Fim Lista Usuários -->

		</section>
		<!-- Fim Content -->
	</div>


<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/users.js"></script>
<script type="text/javascript">
	$("#menu .list-item").eq(0).addClass("ativo");
</script>

</body>
</html>