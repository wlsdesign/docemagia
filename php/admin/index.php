<?php session_start(); include '../../inc/conexao.php'; include '../../inc/funcoes_cripto.php';  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Área Restrita - Roanda Terapia</title>
<link rel="stylesheet" href="css/reset.css" type="text/css">
<!-- <link rel="stylesheet" href="css/screen.css" type="text/css"> -->
<link rel="stylesheet" href="css/jquery.ui.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">

<link href='https://fonts.googleapis.com/css?family=Sigmar+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie7.css" />
<![endif]-->
<link rel="shortcut icon" href="imagens/cadeado.ico" type="image/x-icon" />
<link rel="icon" href="imagens/cadeado.ico"  type="image/jpeg">
</head>
<body class="login">
	<div class="login-box">
		<div class="login-border">
			<div class="login-style">
				<div class="login-header">
					<div class="logo clear">
						<!-- <img src="../../images/logo.png" width="150" alt="" class="picture" /> -->
						<span class="textlogo">
							<span class="title">Doce Magia</span>
							<span class="text">Área Restrita</span>
						</span>
					</div>
				</div>

				<form name="login" action="../../inc/verifica.php" method="post">
					<div class="login-inside">
						<div class="login-data">
							<div class="row clear">
								<label for="user">Login:</label>
								<input type="text" size="25" class="text" id="usuario" name="usuario" placeholder="Nome de usuario"  />
							</div>
							<div class="row clear">
								<label for="password">Senha:</label>
								<input type="password" size="25" class="text" id="senha" name="senha" placeholder="Sua senha" />
							</div>
						<input type="submit" id="logar" name="logar" class="button" value="Entrar" />
						</div>
					</div>
				</form>
				<?php $senha = "carioca"; echo md5($senha); ?>
			</div>
		</div>
	</div>
<div class="login-links">
<p><strong>© 2015 Copyright por <a href="http://www.roandaterapia.com.br/">Doce Magia</a></strong></span> Desenvolvido por <a href="http://wlsdesign.com.br" target="_blank">Wls Design.</a></p>
</div>

</body>
</html>